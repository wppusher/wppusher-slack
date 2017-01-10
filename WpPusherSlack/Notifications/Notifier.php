<?php

namespace WpPusherSlack\Notifications;

class Notifier
{
    public function notify(Notification $notification )
    {

        $slackSettings = get_option('wppusher_slack');

        $enabled = isset($slackSettings['wppusher-slack-enabled'])
            ? $slackSettings['wppusher-slack-enabled']
            : false;
        $url = isset($slackSettings['wppusher-slack-post-url'])
            ? $slackSettings['wppusher-slack-post-url']
            : null;

        if ( ! $enabled ) {
            return null;
        }

        $result = wp_remote_post($url, array(
            'body' => json_encode( array( 'text' => $notification->getMessage() ) )
        ));

    }
}
