<?php
    /**
     * Automatically includes all PHP files from the 'inc' directory.
     *
     * This script scans the 'inc' directory within the theme's directory for all PHP files
     * and includes them. This is useful for organizing theme functions into separate files
     * such as theme-setup.php, blocks-setup.php, enqueue.php, helpers.php, customizer.php, etc.
     *
     * @package cells
     */
?>

<?php

    $inc_files = glob(get_template_directory() . '/inc/*.php');
    foreach ($inc_files as $file) {
        require_once $file;
    }

?>