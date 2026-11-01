<?php
/**
 * Plugin Name: KP Opening hours (Open now badges)
 * Description: [kp_open spec="Mo-Sa 09:00-21:00; Su 10:00-18:00"] or [kp_open spec="24/7"] renders a live "Open now / Closed" badge in Thai time. Places with a kp_hours_spec field get the badge automatically. Specs use schema.org openingHours syntax; "PH off" notes are shown as text.
 * Version: 0.1.0
 */
if ( ! defined( 'ABSPATH' ) ) exit;

/** Parse "Mo-Fr 08:00-20:00; Sa,Su 09:00-17:00" | "24/7" → [day(1..7) => [[from,to],...]] minutes. */
function kp_hours_parse( $spec ) {
	$spec = preg_replace( '/(?<=\d),\s*(?=(Mo|Tu|We|Th|Fr|Sa|Su)\b)/i', '; ', trim( (string) $spec ) ); $days = array( 'mo' => 1, 'tu' => 2, 'we' => 3, 'th' => 4, 'fr' => 5, 'sa' => 6, 'su' => 7 ); $out = array_fill( 1, 7, array() );
	if ( preg_match( '#^(24/7|mo-su 00:00-24:00)$#i', $spec ) ) { foreach ( $out as $d => $_ ) $out[ $d ][] = array( 0, 1440 ); return $out; }
	foreach ( preg_split( '/\s*[;|]\s*/', $spec ) as $part ) {
		if ( ! preg_match( '/^([A-Za-z,\- ]+)\s+(.+)$/', trim( $part ), $m ) ) continue;
		$ds = array(); foreach ( explode( ',', strtolower( str_replace( ' ', '', $m[1] ) ) ) as $chunk ) { if ( preg_match( '/^(\w\w)-(\w\w)$/', $chunk, $r ) && isset( $days[ $r[1] ], $days[ $r[2] ] ) ) { $a = $days[ $r[1] ]; $b = $days[ $r[2] ]; for ( $i = $a; ; $i = $i % 7 + 1 ) { $ds[] = $i; if ( $i === $b ) break; } } elseif ( isset( $days[ $chunk ] ) ) $ds[] = $days[ $chunk ]; }
		foreach ( explode( ',', $m[2] ) as $rng ) { if ( ! preg_match( '/(\d{1,2}):(\d{2})\s*-\s*(\d{1,2}):(\d{2})/', $rng, $t ) ) continue; $f = $t[1] * 60 + $t[2]; $to = $t[3] * 60 + $t[4]; foreach ( $ds as $d ) $out[ $d ][] = array( $f, $to <= $f ? $to + 1440 : $to ); }
	}
	return $out;
}
/** Server-side status (initial render; JS refreshes it in the browser). */
function kp_hours_status( $spec, $now = null ) {
	$h = kp_hours_parse( $spec ); if ( ! array_filter( $h ) ) return null;
	$now = $now ?: new DateTimeImmutable( 'now', new DateTimeZone( 'Asia/Bangkok' ) ); $dow = (int) $now->format( 'N' ); $min = (int) $now->format( 'G' ) * 60 + (int) $now->format( 'i' );
	$fmt = fn( $m ) => sprintf( '%02d:%02d', intdiv( $m % 1440, 60 ), $m % 60 ); $dn = array( 1 => 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun' );
	$prev = $dow === 1 ? 7 : $dow - 1;
	foreach ( $h[ $prev ] as $r ) if ( $r[1] > 1440 && $min < $r[1] - 1440 ) return array( 'open' => true, 'text' => 'Open now · closes ' . $fmt( $r[1] ) );
	foreach ( $h[ $dow ] as $r ) if ( $min >= $r[0] && $min < $r[1] ) return array( 'open' => true, 'text' => $r[0] === 0 && $r[1] >= 1440 && count( array_filter( $h ) ) === 7 ? 'Open 24 hours' : 'Open now · closes ' . $fmt( $r[1] ) );
	for ( $i = 0; $i < 8; $i++ ) { $d = ( $dow - 1 + $i ) % 7 + 1; foreach ( $h[ $d ] as $r ) if ( $i > 0 || $r[0] > $min ) return array( 'open' => false, 'text' => 'Closed · opens ' . $fmt( $r[0] ) . ( $i === 0 ? '' : ( $i === 1 ? ' tomorrow' : ' ' . $dn[ $d ] ) ) ); }
	return array( 'open' => false, 'text' => 'Closed' );
}
function kp_open_badge( $spec, $note = '' ) {
	$s = kp_hours_status( $spec ); if ( ! $s ) return '';
	return '<span class="kp-open ' . ( $s['open'] ? 'is-open' : 'is-closed' ) . '" data-hours="' . esc_attr( $spec ) . '" title="Opening hours: ' . esc_attr( $spec . ( $note ? ' (' . $note . ')' : '' ) ) . '"><i aria-hidden="true"></i><span>' . esc_html( $s['text'] ) . '</span></span>';
}
add_shortcode( 'kp_open', function ( $a ) { $a = shortcode_atts( array( 'spec' => '', 'note' => '' ), $a ); return kp_open_badge( $a['spec'], $a['note'] ); } );
/** Places: automatic badge next to the title area via the_content prepend when kp_hours_spec is set. */
add_filter( 'the_content', function ( $c ) {
	if ( is_admin() || ! is_singular( 'kp_place' ) || ! in_the_loop() ) return $c;
	$spec = get_post_meta( get_the_ID(), 'kp_hours_spec', true ); if ( ! $spec ) return $c;
	return '<p class="kp-open-row"><strong>Opening hours:</strong> ' . esc_html( get_post_meta( get_the_ID(), 'kp_hours', true ) ?: $spec ) . ' ' . kp_open_badge( $spec ) . '</p>' . $c;
}, 8 );
/** Browser refresh (Thai time), so cached pages stay correct; re-checks every minute. */
add_action( 'wp_footer', function () { ?>
<script id="kp-hours">(function(){var D={mo:1,tu:2,we:3,th:4,fr:5,sa:6,su:7},N=['','Mon','Tue','Wed','Thu','Fri','Sat','Sun'];function parse(s){s=s.replace(/(\d),\s*(?=(Mo|Tu|We|Th|Fr|Sa|Su)\b)/gi,'$1; ');var o={1:[],2:[],3:[],4:[],5:[],6:[],7:[]};if(/^(24\/7|mo-su 00:00-24:00)$/i.test(s.trim())){for(var d=1;d<8;d++)o[d].push([0,1440]);return o}s.split(/\s*[;|]\s*/).forEach(function(p){var m=p.trim().match(/^([A-Za-z,\- ]+)\s+(.+)$/);if(!m)return;var ds=[];m[1].toLowerCase().replace(/ /g,'').split(',').forEach(function(c){var r=c.match(/^(\w\w)-(\w\w)$/);if(r&&D[r[1]]&&D[r[2]]){for(var i=D[r[1]];;i=i%7+1){ds.push(i);if(i===D[r[2]])break}}else if(D[c])ds.push(D[c])});m[2].split(',').forEach(function(g){var t=g.match(/(\d{1,2}):(\d{2})\s*-\s*(\d{1,2}):(\d{2})/);if(!t)return;var f=+t[1]*60+ +t[2],e=+t[3]*60+ +t[4];if(e<=f)e+=1440;ds.forEach(function(d){o[d].push([f,e])})})});return o}function pad(n){return(n<10?'0':'')+n}function fm(m){m%=1440;return pad(Math.floor(m/60))+':'+pad(m%60)}function st(s){var h=parse(s),n=new Date(new Date().toLocaleString('en-US',{timeZone:'Asia/Bangkok'})),dw=n.getDay()||7,mi=n.getHours()*60+n.getMinutes(),pv=dw===1?7:dw-1,i,j,r,all=0;for(i=1;i<8;i++)if(h[i].length)all++;for(j=0;j<h[pv].length;j++){r=h[pv][j];if(r[1]>1440&&mi<r[1]-1440)return[1,'Open now · closes '+fm(r[1])]}for(j=0;j<h[dw].length;j++){r=h[dw][j];if(mi>=r[0]&&mi<r[1])return[1,(r[0]===0&&r[1]>=1440&&all===7)?'Open 24 hours':'Open now · closes '+fm(r[1])]}for(i=0;i<8;i++){var d=(dw-1+i)%7+1;for(j=0;j<h[d].length;j++){r=h[d][j];if(i>0||r[0]>mi)return[0,'Closed · opens '+fm(r[0])+(i===0?'':(i===1?' tomorrow':' '+N[d]))]}}return[0,'Closed']}function run(){document.querySelectorAll('.kp-open[data-hours]').forEach(function(el){var s=st(el.getAttribute('data-hours'));el.classList.toggle('is-open',!!s[0]);el.classList.toggle('is-closed',!s[0]);el.querySelector('span').textContent=s[1]})}run();setInterval(run,60000)})();</script>
<?php }, 30 );
