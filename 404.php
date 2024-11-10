<?php
    /**
     * Automatically includes all PHP files from the 'inc' directory.
     *
     * This script scans the 'inc' directory within the theme's directory for all PHP files
     * and includes them. This is useful for organizing theme functions into separate files
     * such as setup.php, enqueue.php, helpers.php, customizer.php, etc.
     *
     * @package cells
     */
?>

<?php get_header(); ?>

<article>
    <h1>
        <?php esc_html_e( 'Error 404', 'test' ); ?>
    </h1>
    <p>
        <?php esc_html_e( 'Try to search something else:', 'test' ); ?>
    </p>
    <?php get_search_form(); ?>
</article>

<?php get_footer(); ?>