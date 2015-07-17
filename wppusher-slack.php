<?php

/**
 * Plugin Name: WP Pusher Slack Notifications
 * Plugin URI: https://github.com/wppusher/wppusher-slack
 * Description: Get a notification in Slack every time something is deployed.
 * Version: 0.0.1
 * Author: WP Pusher
 * Author URI: http://wppusher.com
 * License: GNU GENERAL PUBLIC LICENSE
 */

require __DIR__ . '/autoload.php';

use WpPusherSlack\Plugin;

$plugin = new Plugin;
$plugin->init();
