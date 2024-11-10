<?php
    /**
     * This script initializes and registers all ACF blocks defined in the 'blocks' directory within the theme's directory.
     * It also sets up custom paths for saving and loading ACF JSON field groups.
     *
     * @package cells
     */

define('ACF_JSON_DIR', get_template_directory() . '/acf-json');
define('BLOCKS_DIR', get_template_directory() . '/blocks');

/**
 * Initialize and register ACF blocks.
 */
function cells_acf_init() {
    if( function_exists('acf_register_block') ) {
        $blocks = array(
            array(
                'name'        => 'image-with-info',
                'title'       => __('Image with info'),
                'description' => __('Image with info block.'),
                'keywords'    => array('image', 'info', 'media', 'text'),
                'category'    => 'content',
                'icon'        => 'excerpt-view',
            ),
            array(
                'name'        => 'banner-with-info',
                'title'       => __('Banner with info'),
                'description' => __('Banner with info block.'),
                'keywords'    => array('banner', 'info', 'media', 'text'),
                'category'    => 'content',
                'icon'        => 'excerpt-view',
            ),
            array(
                'name'        => 'recent-posts',
                'title'       => __('Recent posts'),
                'description' => __('Recent posts block.'),
                'keywords'    => array('recent', 'posts', 'news', 'category'),
                'category'    => 'content',
                'icon'        => 'excerpt-view',
            ),
            array(
                'name'				=> 'featured-cards-grid',
                'title'				=> __('Featured cards grid'),
                'description'		=> __('Featured cards grid block.'),
                'keywords'			=> array( 'featured', 'cards', 'grid', 'column' ),
                'category'			=> 'content',
                'icon'				=> 'excerpt-view',
            ),
        );

        foreach ($blocks as $block) {
            error_log('Registering block: ' . $block['name']);
            acf_register_block(array(
                'name'            => sanitize_key($block['name']),
                'title'           => sanitize_text_field($block['title']),
                'description'     => sanitize_text_field($block['description']),
                'render_callback' => 'cells_acf_block_render_callback',
                'category'        => sanitize_key($block['category']),
                'icon'            => sanitize_text_field($block['icon']),
                'keywords'        => array_map('sanitize_text_field', $block['keywords']),
            ));
        }
    } else {
        error_log('acf_register_block function does not exist');
    }
}
add_action('acf/init', 'cells_acf_init');

/**
 * Generic callback function to include “template parts” for our blocks.
 *
 * @param array $block The block settings and attributes.
 */
function cells_acf_block_render_callback( $block ) {
    $slug = str_replace('acf/', '', $block['name']);
    // include a template part from within the "blocks" folder
    if( file_exists( BLOCKS_DIR . "/{$slug}/{$slug}.php") ) {
        include( BLOCKS_DIR . "/{$slug}/{$slug}.php");
    }
}
add_filter('acf/settings/load_json', 'cells_acf_json_load_paths');

/**
 * Set custom paths for loading ACF JSON field groups.
 *
 * @param array $paths The existing paths.
 * @return array The modified paths.
 */
function cells_acf_json_load_paths($paths) {
    // Clear the default paths
    $paths = array();

    // Path of the general acf-json folder in the theme
    $paths[] = ACF_JSON_DIR;

    // Automatically add all block folders
    foreach (glob(BLOCKS_DIR . '/*', GLOB_ONLYDIR) as $block_dir) {
        $paths[] = $block_dir;
    }

    return $paths;
}
add_filter('acf/settings/save_json', 'cells_acf_json_save_path');

/**
 * Set custom paths for saving ACF JSON field groups.
 *
 * @param string $path The existing path.
 * @return string The modified path.
 */
function cells_acf_json_save_path($path) {
    // Check if the field group corresponds to a specific block
    $screen = get_current_screen();
    if ($screen && strpos($screen->id, 'acf-field-group') !== false) {
        $field_group = acf_get_field_group(get_the_ID());

        // Automatically handle all blocks
        foreach (glob(BLOCKS_DIR . '/*', GLOB_ONLYDIR) as $block_dir) {
            $block_name = basename($block_dir);
            if (isset($field_group['location'])) {
                foreach ($field_group['location'] as $location_group) {
                    foreach ($location_group as $location) {
                        if ($location['param'] === 'block' && strpos($location['value'], 'acf/') === 0) {
                            $location_value = str_replace('acf/', '', $location['value']);
                            if ($location_value === $block_name) {
                                return $block_dir;
                            }
                        }
                    }
                }
            }
        }
    }
    
    // Save in the default general JSON folder
    return ACF_JSON_DIR;
}

?>