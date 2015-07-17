<?php

namespace WpPusherSlack\Notifications;

class Notifier
{
    public function notify(Notification $notification)
    {
        $slackSettings = get_option('wppusher_slack');

        $channel = isset($slackSettings['wppusher-slack-channel'])
            ? $slackSettings['wppusher-slack-channel']
            : null;
        $enabled = isset($slackSettings['wppusher-slack-enabled'])
            ? $slackSettings['wppusher-slack-enabled']
            : false;
        $url = isset($slackSettings['wppusher-slack-post-url'])
            ? $slackSettings['wppusher-slack-post-url']
            : null;

        if ( ! $enabled) {
            return null;
        }

        // Add channel, including hashtag, to url.
        $fullUrl = add_query_arg(array('channel' => '%23' . $channel), $url);

        $result = wp_remote_post($fullUrl, array(
            'body' => $notification->getMessage()
        ));
    }
}
