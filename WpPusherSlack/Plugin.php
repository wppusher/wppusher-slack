<?php

namespace WpPusherSlack;
use WpPusherSlack\Settings\SlackbotUrl;
use WpPusherSlack\Settings\Channel;
use WpPusherSlack\Settings\EnableNotifications;
use WpPusherSlack\Notifications\Notifier;
use WpPusherSlack\Notifications\PluginWasInstalled;
use WpPusherSlack\Notifications\ThemeWasInstalled;
use WpPusherSlack\Notifications\PluginWasUpdated;
use WpPusherSlack\Notifications\ThemeWasUpdated;

/**
 * Class Plugin
 * @package WpPusherSlack
 */
class Plugin
{
    /**
     * Initialise plugin.
     */
    public function init()
    {
        // Figure out if we are working on the site admin panel or
        // the network admin.
        add_action(
            is_multisite() ? 'network_admin_menu' : 'admin_menu',
            array($this, 'adminMenu'),
            20 // make sure priority is lower than the WP Pusher plugin
        );

        // Register settings
        add_action('admin_init', array($this, 'registerSettings'));

        // Register notifications
        $notifier = new Notifier;
        add_action('wppusher_plugin_was_installed', function($file) use ($notifier) {
            $notification = PluginWasInstalled::fromFile($file);
            $notifier->notify($notification);
        });
        add_action('wppusher_theme_was_installed', function($stylesheet) use ($notifier) {
            $notification = ThemeWasInstalled::fromStylesheet($stylesheet);
            $notifier->notify($notification);
        });
        add_action('wppusher_plugin_was_updated', function($file) use ($notifier) {
            $notification = PluginWasUpdated::fromFile($file);
            $notifier->notify($notification);
        });
        add_action('wppusher_theme_was_updated', function($stylesheet) use ($notifier) {
            $notification = ThemeWasUpdated::fromStylesheet($stylesheet);
            $notifier->notify($notification);
        });
    }

    /**
     * Add admin menu items.
     */
    public function adminMenu()
    {
        $slackSettingsView = function () {
            // The view responsible for the Slack notification settings.
            return require __DIR__ . '/../views/slack-settings.php';
        };

        // Add a the Slack settings view as a submenu item to the
        // WP Pusher admin menu.
        add_submenu_page(
            'wppusher',
            'WP Pusher Slack Notifications',
            'Slack', 'manage_options',
            'wppusher-slack',
            $slackSettingsView
        );
    }

    /**
     * Register the settings.
     */
    public function registerSettings()
    {
        $sanitizer = array($this, 'sanitize');

        $slackbotUrl = new SlackbotUrl;
        $channel = new Channel;
        $enabled = new EnableNotifications;

        register_setting('wppusher_slack_group', 'wppusher_slack', $sanitizer);

        add_settings_section('wppusher-slack', 'Slack Notifications', '', 'wppusher-slack');

        $slackbotUrl->register();
        $channel->register();
        $enabled->register();
    }

    /**
     * Sanitize settings values.
     *
     * @param $input
     * @return array
     */
    public function sanitize($input)
    {
        return array_map(function($value) {
            return sanitize_text_field(strip_tags(stripslashes($value)));
        }, $input);
    }
}
