<?php

namespace WpPusherSlack\Settings;

class Channel implements Setting
{
    /**
     * Register the setting.
     */
    public function register()
    {
        add_settings_field(
            'wppusher-slack-channel',
            'Channel',
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

        $channel = isset($slackSettings['wppusher-slack-channel'])
            ? $slackSettings['wppusher-slack-channel']
            : null;

        return require __DIR__ . '/../../views/partials/channel.php';
    }
}
