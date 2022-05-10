<?php
if (!defined('WP_UNINSTALL_PLUGIN')) {
    exit;
}

$options = ['wpfmsolid_install_timestamp'];

foreach ($options as $option) {
    if (get_option($option)) delete_option($option);
}