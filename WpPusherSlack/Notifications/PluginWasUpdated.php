<?php

namespace WpPusherSlack\Notifications;

class PluginWasUpdated implements Notification
{
    protected $file;

    public static function fromFile($file)
    {
        $notification = new static;

        $notification->file = $file;

        return $notification;
    }

    public function getMessage()
    {
        return 'Plugin `' . $this->file . '` was updated on `' . site_url() . '`';
    }
}
