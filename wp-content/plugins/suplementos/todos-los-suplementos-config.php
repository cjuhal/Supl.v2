<?php


/* AGREGAR COLUMNA A EL EDITOR DE TODOS LOS POST */
function get_suplemento_domingo_content ($post_ID){
  $terms = wp_get_post_terms( $post_ID, 'suplemento_domingo', array("fields" => "all") );
  $suplemento = $terms[0];
  return $suplemento->name;
}

function get_suplemento_mixto_content ($post_ID){
  $terms = wp_get_post_terms( $post_ID, 'suplemento_mixto', array("fields" => "all") );
  $suplemento = $terms[0];
  return $suplemento->name;
}

// Agregar columnas a la vista todos los suplementos
function custom_columns_head($defaults) {
    $defaults['suplemento_domingo'] = 'Domingo';
    $defaults['suplemento_mixto'] = 'Mixto';
    return $defaults;
}

// Asignarle contenido a la vista todos los suplementos
function custom_columns_content($column_name, $post_ID) {
    if ($column_name == 'suplemento_domingo') {
        $suplemento_content = get_estado_content($post_ID);
        if ($suplemento_content) {
            echo '<strong>' . $suplemento_content . '</strong>';
        }
    }
    if ($column_name == 'suplemento_mixto') {
        $suplemento_content = get_rubro_content($post_ID);
        if ($suplemento_content) {
            echo '<strong class="column-date">' . $suplemento_content . '</strong>';
        }
    }
}

add_filter('manage_posts_columns', 'custom_columns_head');
add_action('manage_posts_custom_column', 'custom_columns_content', 10, 2);

 ?>
