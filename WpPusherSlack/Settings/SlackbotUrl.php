<?php

namespace WpPusherSlack\Settings;

class SlackbotUrl implements Setting
{
    /**
     * Register the setting.
     */
    public function register()
    {
        add_settings_field(
            'wppusher-slack-post-url',
            'Slackbot URL',
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

        $url = isset($slackSettings['wppusher-slack-post-url'])
            ? $slackSettings['wppusher-slack-post-url']
            : null;

        return require __DIR__ . '/../../views/partials/post-url.php';
    }
}
