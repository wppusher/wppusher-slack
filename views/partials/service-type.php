<label for="webhook">Webhook</label>
<input type="radio" id="webhook" <?php checked( $service_type, 'webhook' ); ?> name="wppusher_slack[wppusher-slack-service-type]" value="webhook">
<label for="slackbot">Slackbot</label>
<input type="radio" id="slackbot" <?php checked( $service_type, 'slackbot'); ?> name="wppusher_slack[wppusher-slack-service-type]" value="slackbot">
