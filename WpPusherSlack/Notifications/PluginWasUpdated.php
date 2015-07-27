<?php

namespace WpPusherSlack\Notifications;

class PluginWasUpdated implements Notification
{
    protected $file;

    public static function fromFile(\Pusher\Actions\PluginWasUpdated $action)
    {
        $notification = new static;

        $notification->file = $action->plugin->file;

        return $notification;
    }

    public function getMessage()
    {
        return 'Plugin `' . $this->file . '` was updated on `' . site_url() . '`';
    }
}
