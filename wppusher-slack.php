<?php

/**
 * Plugin Name: WP Pusher Slack Notifications
 * Plugin URI: https://github.com/wppusher/wppusher-slack
 * Description: Get a notification in Slack every time something is deployed from Git with WP Pusher.
 * Version: 1.0.0
 * Author: WP Pusher
 * Author URI: http://wppusher.com
 * License: GNU GENERAL PUBLIC LICENSE
 */

// If this file is called directly, abort.
if ( ! defined('WPINC')) {
    die;
}

require __DIR__ . '/autoload.php';

use WpPusherSlack\Plugin;

$plugin = new Plugin;
$plugin->init();
