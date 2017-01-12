<?php

namespace WpPusherSlack\Settings;

class ServiceType implements Setting
{
    /**
     * Register the setting.
     */
    public function register()
    {
        add_settings_field(
            'wppusher-slack-service-type',
            'Service Type',
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

        $service_type = isset($slackSettings['wppusher-slack-service-type'])
            ? $slackSettings['wppusher-slack-service-type']
            : null;

        return require __DIR__ . '/../../views/partials/service-type.php';
    }
}
