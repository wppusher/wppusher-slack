<?php

namespace WpPusherSlack\Settings;

class EnableNotifications implements Setting
{
    /**
     * Register the setting.
     */
    public function register()
    {
        add_settings_field(
            'wppusher-slack-enabled',
            'Enable notifications',
            array($this, 'display'),
            'wppusher-slack',
            'wppusher-slack'
        );
    }

    /**
     * Display the setting page.
     */
    public function display()
    {
        $slackSettings = get_option('wppusher_slack');

        $enabled = isset($slackSettings['wppusher-slack-enabled'])
            ? $slackSettings['wppusher-slack-enabled']
            : false;

        return require __DIR__ . '/../../views/partials/enable_notifications.php';
    }
}
