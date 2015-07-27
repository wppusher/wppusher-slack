<?php

namespace WpPusherSlack\Notifications;

class PluginWasInstalled implements Notification
{
    protected $file;

    public static function fromFile(\Pusher\Actions\PluginWasInstalled $action)
    {
        $notification = new static;

        $notification->file = $action->plugin->file;

        return $notification;
    }

    public function getMessage()
    {
        return 'Plugin `' . $this->file . '` was installed on `' . site_url() . '`';
    }
}
