<?php

namespace WpPusherSlack\Notifications;

class PluginWasInstalled implements Notification
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
        return 'Plugin `' . $this->file . '` was installed on `' . site_url() . '`';
    }
}
