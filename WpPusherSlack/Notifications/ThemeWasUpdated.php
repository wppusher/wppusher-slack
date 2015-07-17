<?php

namespace WpPusherSlack\Notifications;

class ThemeWasUpdated implements Notification
{
    private $stylesheet;

    public static function fromStylesheet($stylesheet)
    {
        $notification = new static;

        $notification->stylesheet = $stylesheet;

        return $notification;
    }

    public function getMessage()
    {
        return 'Theme `' . $this->stylesheet . '` was updated on `' . site_url() . '`';
    }
}
