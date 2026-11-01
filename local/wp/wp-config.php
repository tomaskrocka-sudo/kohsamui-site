<?php
define('DB_NAME','local'); define('DB_USER',''); define('DB_PASSWORD',''); define('DB_HOST','localhost');
define('DB_CHARSET','utf8mb4'); define('DB_COLLATE','');
define('DB_ENGINE','sqlite');
define('WP_HOME','http://localhost:8080'); define('WP_SITEURL','http://localhost:8080');
define('WP_DEBUG', true); define('WP_DEBUG_DISPLAY', false); define('WP_DEBUG_LOG', true);
define('DISALLOW_FILE_EDIT', true); define('WP_AUTO_UPDATE_CORE', false); define('AUTOMATIC_UPDATER_DISABLED', true);
define('WP_ENVIRONMENT_TYPE','local');
$table_prefix='wp_';
define('AUTH_KEY','local-dev-key-1'); define('SECURE_AUTH_KEY','local-dev-key-2'); define('LOGGED_IN_KEY','local-dev-key-3'); define('NONCE_KEY','local-dev-key-4');
define('AUTH_SALT','local-dev-salt-1'); define('SECURE_AUTH_SALT','local-dev-salt-2'); define('LOGGED_IN_SALT','local-dev-salt-3'); define('NONCE_SALT','local-dev-salt-4');
if (!defined('ABSPATH')) define('ABSPATH', __DIR__ . '/');
require_once ABSPATH . 'wp-settings.php';
