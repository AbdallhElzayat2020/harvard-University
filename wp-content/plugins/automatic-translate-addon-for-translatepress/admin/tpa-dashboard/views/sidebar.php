<!-- Right Sidebar -->
<div class="tpa-dashboard-sidebar">
    <div class="tpa-dashboard-status">
        <h3><?php _e('Auto Translation status', $text_domain); ?></h3>
        <div class="tpa-dashboard-sts-top">
            <?php

            $all_data = get_option('cpt_dashboard_data', array());

            if (!is_array($all_data) || !isset($all_data['tpa'])) {

                $all_data['tpa'] = []; // Ensure $all_data['tpa'] is an array

            }

            $totals = array_reduce($all_data['tpa'] ?? [], function($carry, $translation) {
                // Ensure all values are properly handled
                $carry['string_count'] += intval($translation['string_count'] ?? 0);
                $carry['character_count'] += intval($translation['character_count'] ?? 0);
                $carry['time_taken'] += intval($translation['time_taken'] ?? 0);
                
                // Track unique post IDs
                if (!empty($translation['post_id'])) {
                    $carry['plugins_themes'][$translation['post_id']] = 1;
                }
                return $carry;
            }, ['string_count' => 0, 'character_count' => 0, 'time_taken' => 0, 'plugins_themes' => []]);
            // Update the time taken string using the new function
            $time_taken_str = tpa_format_time_taken($totals['time_taken'] ,$text_domain);
            ?>
            <span><?php echo esc_html(tpa_format_number($totals['string_count'], $text_domain)); ?></span>
            <span><?php _e('Total Strings Translated!', $text_domain); ?></span>
        </div>
        <ul class="tpa-dashboard-sts-btm">
            <li><span><?php _e('Total Characters', $text_domain); ?></span> <span><?php echo esc_html(tpa_format_number($totals['character_count'], $text_domain)); ?></span></li>
            <li><span><?php _e('Total Pages / Posts', $text_domain); ?></span> <span><?php echo esc_html(count($totals['plugins_themes'])); ?></span></li>
            <li><span><?php _e('Time Taken', $text_domain); ?></span> <span><?php echo esc_html($time_taken_str); ?></span></li>
        </ul>
    </div>
    <div class="tpa-dashboard-translate-full">
        <h3><?php _e('Automatically Translate Plugins & Themes', $text_domain); ?></h3>
        <div class="tpa-dashboard-addon first">
            <div class="tpa-dashboard-addon-l">
                <strong><?php echo esc_html(tpa_get_plugin_display_name('automatic-translator-addon-for-loco-translate', $text_domain)); ?></strong>
                <span class="addon-desc"><?php _e('Loco addon to translate plugins and themes.', $text_domain); ?></span>
                <?php if (tpa_is_plugin_installed('automatic-translator-addon-for-loco-translate')): ?>
                    <span class="installed"><?php _e('Installed', $text_domain); ?></span>
                <?php else: ?>
                    <a href="<?php echo esc_url(admin_url('plugin-install.php?s=Automatic+translate+addon+for+loco+translate+by+coolplugins&tab=search&type=term')); ?>" class="tpa-dashboard-btn" target="_blank"><?php _e('Install', $text_domain); ?></a>
                <?php endif; ?>
            </div>
            <div class="tpa-dashboard-addon-r">
                <img src="<?php echo esc_url(TPA_URL . 'admin/tpa-dashboard/images/atlt-logo.png'); ?>" alt="<?php _e('TranslatePress Addon', $text_domain); ?>">
            </div>
        </div>
    </div>
    <div class="tpa-dashboard-rate-us">
        <h3><?php _e('Rate Us ⭐⭐⭐⭐⭐', $text_domain); ?></h3>
        <p><?php _e('We\'d love your feedback! Hope this addon made auto-translations easier for you.', $text_domain); ?></p>
        <a href="https://wordpress.org/support/plugin/automatic-translate-addon-for-translatepress/reviews/#new-post" class="review-link" target="_blank"><?php _e('Submit a Review →', $text_domain); ?></a>
    </div>
</div>

<?php

function tpa_format_time_taken($time_taken, $text_domain) {
    if ($time_taken === 0) return __('0', $text_domain);
    if ($time_taken < 60) return sprintf(__('%d sec', $text_domain), $time_taken);
    if ($time_taken < 3600) {
        $min = floor($time_taken / 60);
        $sec = $time_taken % 60;
        return sprintf(__('%d min %d sec', $text_domain), $min, $sec);
    }
    $hours = floor($time_taken / 3600);
    $min = floor(($time_taken % 3600) / 60);
    return sprintf(__('%d hours %d min', $text_domain), $hours, $min);
}

function tpa_is_plugin_installed($plugin_slug) {
    $plugins = get_plugins();
    
    // Check if the plugin is installed
    if ($plugin_slug === 'automatic-translator-addon-for-loco-translate') {
        return isset($plugins['automatic-translator-addon-for-loco-translate/automatic-translator-addon-for-loco-translate.php']) || isset($plugins['loco-automatic-translate-addon-pro/loco-automatic-translate-addon-pro.php']);
    }
    return false; // Return false if no match found
}

function tpa_get_plugin_display_name($plugin_slug, $text_domain) {
    $plugins = get_plugins();

    // Define free and pro plugin paths
    $plugin_paths = [
        'automatic-translator-addon-for-loco-translate' => [
            'free' => 'automatic-translator-addon-for-loco-translate/automatic-translator-addon-for-loco-translate.php',
            'pro'  => 'loco-automatic-translate-addon-pro/loco-automatic-translate-addon-pro.php',
            'free_name' => __('Automatic Translate Addon For Loco Translate', $text_domain),
            'pro_name'  => __('Loco Automatic Translate Addon PRO', $text_domain),
        ],
    ];

    // Check if the provided plugin slug exists
    if (!isset($plugin_paths[$plugin_slug])) {
        return $plugin_slug['free_name'];
    }

    $free_installed = isset($plugins[$plugin_paths[$plugin_slug]['free']]);
    $pro_installed = isset($plugins[$plugin_paths[$plugin_slug]['pro']]);

    // Determine which version is installed
    if ($pro_installed) {
        return $plugin_paths[$plugin_slug]['pro_name'];
    } elseif ($free_installed) {
        return $plugin_paths[$plugin_slug]['free_name'];
    } else {
        return $plugin_paths[$plugin_slug]['free_name'];
    }
}

function tpa_format_number($number, $text_domain) {
    if ($number >= 1000000000) {
        return round($number / 1000000000, 1) . __('B', $text_domain);
    } elseif ($number >= 1000000) {
        return round($number / 1000000, 1) . __('M', $text_domain);
    } elseif ($number >= 1000) {
        return round($number / 1000, 1) . __('K', $text_domain);
    }
    return $number;
}

