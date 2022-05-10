<?php

namespace WpFileManagerSolid;


if (file_exists(WPFMSOLID_VENDOR_DIR . 'autoload.php')) {
    require_once WPFMSOLID_VENDOR_DIR . 'autoload.php';
}

if (file_exists(WPFMSOLID_VENDOR_DIR . '/elFinder/php/autoload.php')) {
    require_once WPFMSOLID_VENDOR_DIR. '/elFinder/php/autoload.php';
}

/**
 * @return void
 */
function activatePlugin() {

    $installedVersion = get_option('wpfmsolid_version', false);

    if(!$installedVersion || version_compare(WPFMSOLID_VERSION, $installedVersion, '>') ) {
        update_option('wpfmsolid_version', WPFMSOLID_VERSION);
        update_option('wpfmsolid_install_timestamp', time());
    }

}
add_action('admin_init' , 'WpFileManagerSolid\activatePlugin' );
