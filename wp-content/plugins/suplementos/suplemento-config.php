<?php

// function add_registro_acceso_contratacion($post){
//   if (is_user_logged_in()) :
//     // stuff here for user roles that can edit pages: editors and administrators
//     if( current_user_can('edit_others_pages') ) return false;
//       $current_user = wp_get_current_user();
//       $usuario = $current_user->user_login;
//       $email = $current_user->user_email;
//       $titulo_post = get_the_title($post);
//
//       mysql_query("INSERT INTO `administrativa`.`control_acceso_contrataciones` (`usuario`, `email`, `titulo_post`) VALUES ('$usuario', '$email', '$titulo_post');");
//
//   endif;
// }

/* Creación de custom type post contratación */
function especiales() {
  $labels = array(
   'name'               => _x( 'Suplementos', 'post type general name' ),
   'singular_name'      => _x( 'Suplemento', 'post type singular name' ),
   'add_new'            => _x( 'Crear nuevo', 'suplemento' ),
   'add_new_item'       => __( 'Agregar suplemento' ),
   'edit_item'          => __( 'Editar suplemento' ),
   'new_item'           => __( 'Nuevo suplemento' ),
   'all_items'          => __( 'Todas los Suplementos' ),
   'view_item'          => __( 'Ver suplementos' ),
   'search_items'       => __( 'Buscar suplementos' ),
   'not_found'          => __( 'No se encontraron suplementos' ),
   'not_found_in_trash' => __( 'No se encontraron suplementos en la papelera' ),
   'parent_item_colon'  => '',
   'menu_name'          => 'Especiales'
 );
 $args = array(
   'labels'        => $labels,
   'description'   => 'Todos los suplementos',
   'public'        => true,
   'menu_position' => 5,
   'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
   'has_archive'   => true,
   'menu_icon'     => 'dashicons-align-right',
 );
  register_post_type( 'suplemento', $args );
}
add_action( 'init', 'especiales' );

/* Mostrar el rubro en mostrar todos */
function my_cpt_support_author() {
    add_post_type_support( 'suplemento', 'suplemento_domingo' );
}
add_action('init', 'my_cpt_support_author');

/*Mensajes de este nuevo menu */
function my_updated_messages( $messages ) {
  global $post, $post_ID;
  $messages['suplemento'] = array(
    0 => '',
    1 => sprintf( __('Suplemento actualizada. <a href="%s">Ver Suplemento</a>'), esc_url( get_permalink($post_ID) ) ),
    2 => __('Campo actualizado.'),
    3 => __('Campo eliminado.'),
    4 => __('Suplemento actualizada.'),
    5 => isset($_GET['revision']) ? sprintf( __('Suplemento recuperado - revisión %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
    6 => sprintf( __('Suplemento publicado. <a href="%s">Ver Suplemento</a>'), esc_url( get_permalink($post_ID) ) ),
    7 => __('Suplemento guardada.'),
    8 => sprintf( __('Suplemento enviada. <a target="_blank" href="%s">Vista previa</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
    9 => sprintf( __('Suplemento programado para: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Vista previa</a>'), date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
    10 => sprintf( __('Borrador actualizado. <a target="_blank" href="%s">Vista previa</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
  );
  return $messages;
}
add_filter( 'post_updated_messages', 'my_updated_messages' );

/*
    Categorias --> MENU EN POST ESPECIAL
*/

/*Generar una taxonomia => rama de categorias */
function my_taxonomies_suplemento_domingo() {
  $labels = array(
    'name'              => _x( 'T+ de domingo', 'taxonomy general name' ),
    'singular_name'     => _x( 'suplemento domingo', 'taxonomy singular name' ),
    'search_items'      => __( 'Buscar suplementos domingo' ),
    'all_items'         => __( 'Todos los suplementos domingo' ),
    'parent_item'       => __( 'Parent Suplemento Category' ),
    'parent_item_colon' => __( 'Parent Suplemento Category:' ),
    'edit_item'         => __( 'Editar Suplemento' ),
    'update_item'       => __( 'Actualizar Suplemento de Domingo' ),
    'add_new_item'      => __( 'Agregar nuevo Suplemento de Domingo' ),
    'new_item_name'     => __( 'Nuevo Suplemento de Domingo' ),
    'menu_name'         => __( 'T+ de Domingo' ),
  );
  $args = array(
    'labels' => $labels,
    'hierarchical' => true,
  );
  register_taxonomy( 'suplemento_domingo', 'suplemento', $args );
}

add_action( 'init', 'my_taxonomies_suplemento_domingo', 0 );

/*Generar una taxonomia => rama de categorias */

function my_taxonomies_especiales_mixtos() {
  $labels = array(
    'name'              => _x( 'Mixtos', 'taxonomy general name' ),
    'singular_name'     => _x( 'Mixto', 'taxonomy singular name' ),
    'search_items'      => __( 'Buscar especiales mixtos' ),
    'all_items'         => __( 'Todos los especiales mixtos' ),
    'parent_item'       => __( 'Parent especiales mixtos Category' ),
    'parent_item_colon' => __( 'Parent especiales mixtos Category:' ),
    'edit_item'         => __( 'Editar especial mixtos' ),
    'update_item'       => __( 'Actualizar especial mixtos' ),
    'add_new_item'      => __( 'Agregar nuevo especial mixtos' ),
    'new_item_name'     => __( 'Nuevo especial mixtos' ),
    'menu_name'         => __( 'Mixtos' ),
  );
  $args = array(
    'labels' => $labels,
    'hierarchical' => true,
  );
  register_taxonomy( 'suplemento_mixto', 'suplemento', $args );
}

add_action( 'init', 'my_taxonomies_especiales_mixtos', 0 );


/*
    DATOS OBLIGATORIOS - BOXES
*/
add_action( 'add_meta_boxes', 'suplemento_general' );
function suplemento_general(){
      add_meta_box(
          'suplemento_general',
          __( 'ARMAR SUPLEMENTO', 'myplugin_textdomain' ),
          'suplemento_build_content',
          'suplemento',
          'advanced',
          'high'
      );
  }


/*GENERAR VISTA EN LA CREACION/EDICION*/
function suplemento_build_content( $post ) {
  wp_nonce_field( plugin_basename( __FILE__ ), 'suplemento_general_nonce' );

  echo "<table class='table tabla_suplementos'>";
  echo "<tr>";
  echo "<th>LUGAR</th>";
  echo "<th>CATEGORÍAS</th>";
  echo "<th>NOTICIAS</th>";
  echo "</tr>";
  echo g1v3m3_suplementos($post);
  echo "</table>";

}

/* GUARDAR INFO DE LOS META BOXs*/
add_action( 'save_post', 'suplemento_box_save' );
function suplemento_box_save( $post_id ) {

  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
  return;

  if ( !wp_verify_nonce( $_POST['suplemento_general_nonce'], plugin_basename( __FILE__ ) ) )
  return;

  if ( 'page' == $_POST['post_type'] ) {
    if ( !current_user_can( 'edit_page', $post_id ) )
    return;
  } else {
    if ( !current_user_can( 'edit_post', $post_id ) )
    return;
  }

  $suplementos = getSuplementos();
    foreach ( $suplementos as $suplemento){
      $id = $suplemento["id"];
      $name = $suplemento["name"];
      $noticias = $suplemento["noticiaSeleccionada"];
      update_post_meta( $post_id, $id, $_POST[$name] );
      update_post_meta( $post_id, $noticias, $_POST[$noticias] );
    }

}

?>
