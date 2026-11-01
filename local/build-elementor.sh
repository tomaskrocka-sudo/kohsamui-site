#!/bin/bash
set -x
cd /home/claude/kohsamui-site/local/dl/elementor
export COMPOSER_ALLOW_SUPERUSER=1 CI=true NODE_OPTIONS=--max-old-space-size=4096
php ../../composer.phar install --no-dev --optimize-autoloader --no-interaction --no-scripts 2>&1 | tail -5
npm ci --no-audit --no-fund --loglevel=error 2>&1 | tail -5
(cd packages && npm ci --no-audit --no-fund --loglevel=error 2>&1 | tail -5)
npm run build:packages 2>&1 | tail -15
npx grunt build 2>&1 | tail -30
ls -la build 2>/dev/null | head; ls assets/js | head; ls assets/css | head
echo BUILD_DONE
