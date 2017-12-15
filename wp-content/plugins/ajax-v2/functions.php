<?php

/**
 * Plugin Name: Ajax v2
 * Plugin URI: http://www.valakax.com
 * Description: Ajax by me
 * Version: 1.0.0
 * Author: Christian Juhal
 * Author URI: http://www.valakax.com
 * License: GPL2
 */


 //Insertar Javascript js y enviar ruta admin-ajax.php
 add_action('wp_enqueue_scripts', 'valakax_insertar_js');
add_action( 'admin_enqueue_scripts', 'valakax_insertar_js' );
 function valakax_insertar_js(){

 	//if (!is_home()) return;

 	wp_register_script('ajax', plugins_url(). '/ajax-v2/js/ajax.js', array('jquery'), '1.1', true );
 	wp_enqueue_script('ajax');
  wp_enqueue_style( 'loading', plugins_url( '/css/loading.css', __FILE__ ) );

 	wp_localize_script('ajax','ajax_vars',['ajaxurl'=>admin_url('admin-ajax.php')]);
 }




 //Devolver datos a archivo js
 add_action('wp_ajax_nopriv_ajax_valakax','valakax_enviar_contenido');
 add_action('wp_ajax_ajax_valakax','valakax_enviar_contenido');

 function valakax_enviar_contenido()
 {

 	$id_post = absint($_POST['id_post']);
  $index = absint($_POST['index_post']);

  $opciones = get_list_subpost($id_post);

  $content = "<select name='combo_noticias_$index' id='combo_noticias_$index'>";
  $content .= $opciones;
  $content .= "</select>";

  // $content = "<td><label for='noticias'>Lista de noticias</label></td>";
  // $content .="<td><br>";
  // $content .= "<select name='combo_noticias' id='combo_noticias'>";
  // $content .= $opciones;
  // $content .= "</select></td>";

  //return $content;

 	//$content = apply_filters('the_content', get_post_field('post_content', $id_post));

 	//sleep(2);

 	echo $content;

 	wp_die();
 }


 function get_list_subpost($id){
   $result = "";

   $args = array('category'	=> $id);

   $posts = get_posts($args);

   foreach($posts as $post)
   $result .= '<option value="'.$post->ID.'">' . $post->post_title . ' ('. $post->ID .') </option>';

   return $result;
 }

 ?>
