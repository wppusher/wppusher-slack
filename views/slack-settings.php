<div class="wrap">
    <h2>
        <img src="<?php echo plugins_url('assets/wp-pusher-slack-banner.png', __DIR__); ?>" width="772">
    </h2>

    <?php settings_errors(); ?>

    <form method="POST" action="<?php echo admin_url(); ?>options.php">
        <?php settings_fields('wppusher_slack_group'); ?>
        <?php do_settings_sections('wppusher-slack'); ?>
        <?php submit_button(); ?>
    </form>
</div>
