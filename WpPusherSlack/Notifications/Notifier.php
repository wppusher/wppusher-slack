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
        $service_type = isset($slackSettings['wppusher-slack-service-type'])
            ? $slackSettings['wppusher-slack-service-type']
            : false;
        $url = isset($slackSettings['wppusher-slack-post-url'])
            ? $slackSettings['wppusher-slack-post-url']
            : null;

        if ( ! $enabled ) {
            return null;
        }

        $message = $notification->getMessage();

        if( $service_type === 'slackbot' ) {
          $url = add_query_arg(array('channel' => '%23' . $channel), $url);
          $body = $message;
        }

        if( $service_type === 'webhook' ) {
          $body = json_encode( array( 'text' => $notification->getMessage() ) );
        }

        $result = wp_remote_post($url, array(
            'body' => $body
        ));

    }
}
