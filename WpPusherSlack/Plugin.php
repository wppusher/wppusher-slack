<?php

namespace WpPusherSlack;

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
            array($this, 'adminMenu')
        );
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
}
