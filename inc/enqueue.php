<?php
    /**
     * 
     * Enqueue scripts and styles 
     *
     * @package cells
     */
?>

<?php

/**
 * Enqueue general assets
 */
function cells_enqueue_general_assets() {
    // Registrar y encolar estilos generales
    if (file_exists(get_template_directory() . '/dist/css/style.css')) {
        $general_style_path = get_template_directory_uri() . '/dist/css/style.css';
        $general_style_version = filemtime(get_template_directory() . '/dist/css/style.css');
        wp_enqueue_style(
            'general-style',            // Handle del estilo
            $general_style_path,        // Ruta del archivo CSS
            array(),                    // Dependencias (vacío si no tiene)
            $general_style_version      // Versionado dinámico basado en la modificación del archivo
        );
    }

    // Registrar y encolar scripts generales
    if (file_exists(get_template_directory() . '/dist/js/script.js')) {
        $general_script_path = get_template_directory_uri() . '/dist/js/script.js';
        $general_script_version = filemtime(get_template_directory() . '/dist/js/script.js');
        wp_enqueue_script(
            'general-script',           // Handle del script
            $general_script_path,       // Ruta del archivo JS
            array(),                    // Dependencias (vacío si no tiene)
            $general_script_version,    // Versionado dinámico basado en la modificación del archivo
            true                        // Cargar el script en el footer
        );
    }
}
add_action('wp_enqueue_scripts', 'cells_enqueue_general_assets');

/**
 * Enqueue custom block assets
 */
function cells_register_custom_block_assets() {

    // Obtiene la ruta absoluta de la carpeta 'blocks' dentro del tema
    $blocks_dir = get_template_directory() . '/blocks';

    // Inicializa un array para almacenar los nombres de las carpetas
    $folder_names = [];

    // Verifica que la carpeta 'blocks' exista
    if (is_dir($blocks_dir)) {
        // Abre la carpeta
        if ($handle = opendir($blocks_dir)) {
            // Recorre cada elemento en la carpeta
            while (false !== ($entry = readdir($handle))) {
                // Verifica que sea una carpeta y no '.' o '..'
                if ($entry != '.' && $entry != '..' && is_dir($blocks_dir . '/' . $entry)) {
                    $folder_names[] = $entry; // Añade el nombre de la carpeta al array
                }
            }
            // Cierra la carpeta
            closedir($handle);
        }
    }

    // Bucle para registrar tanto los estilos como los scripts
    foreach ($folder_names as $block) {
        // Ruta del archivo CSS
        if (file_exists(get_template_directory() . '/blocks/' . $block . '/' . $block . '.css')) {
            $style_path = get_template_directory_uri() . '/blocks/' . $block . '/' . $block . '.css';
            $style_version = filemtime(get_template_directory() . '/blocks/' . $block . '/' . $block . '.css');
            // Registrar el estilo para el bloque
            wp_register_style(
                $block . '-style',        // Handle del estilo
                $style_path,              // Ruta del archivo CSS
                array(),                  // Dependencias (vacío si no tiene)
                $style_version            // Versionado dinámico basado en la modificación del archivo
            );
        }

        // Ruta del archivo JS
        if (file_exists(get_template_directory() . '/blocks/' . $block . '/' . $block . '.js')) {
            $script_path = get_template_directory_uri() . '/blocks/' . $block . '/' . $block . '.js';
            $script_version = filemtime(get_template_directory() . '/blocks/' . $block . '/' . $block . '.js');
            // Registrar el script para el bloque
            wp_register_script(
                $block . '-script',       // Handle del script
                $script_path,             // Ruta del archivo JS
                array('wp-blocks', 'wp-element', 'wp-editor'),  // Dependencias de Gutenberg
                $script_version,          // Versionado dinámico basado en la modificación del archivo
                true                      // Cargar el script en el footer
            );
        }

        // Encolar el estilo y script cuando el bloque esté en uso
        if (has_block('acf/'.$block)) {
            wp_enqueue_style($block . '-style');
            wp_enqueue_script($block . '-script');
        }
    }
}
add_action('wp_enqueue_scripts', 'cells_register_custom_block_assets');

?>