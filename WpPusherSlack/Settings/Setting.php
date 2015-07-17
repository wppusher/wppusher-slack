<?php

namespace WpPusherSlack\Settings;

/**
 * Interface for the WordPress Settings API.
 *
 * @package WpPusherSlack
 */
interface Setting
{
    /**
     * Register the setting.
     */
    public function register();

    /**
     * Display the setting page.
     */
    public function display();
}
