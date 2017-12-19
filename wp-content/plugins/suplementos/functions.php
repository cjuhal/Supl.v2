<?php

/**
 * Plugin Name: Suplementos
 * Plugin URI: http://www.valakax.com
 * Description: Plugin para administrar e incluir las paginas para los especiales de fin de semana
 * Version: 1.0.0
 * Author: Christian Juhal
 * Author URI: http://www.valakax.com (coming soon)
 * License: GPL2
 */

/* include archivos de configuración */

include('suplemento-config.php');
//include('todos-los-suplementos-config.php');
//include('otros-meta-box-config.php');



/* Genera el array de los campos */
 function getSuplementos(){
   $suplementos = array();
   $titulos = array('Portada','Entrevista','Libros Libres','Noticia Relacionada [izquierda]', 'Noticia Relacionada [centro]','Noticia Relacionada [derecha]');
   foreach ($titulos as $index => $titulo) {
       array_push($suplementos, array('id'=>'categorias_'.$index,'name'=>'categorias_'.$index,'titulo'=>$titulo, 'noticiaSeleccionada'=>'noticia_'.$index, 'noticias'=>'noticias_'.$index,'index'=>$index));
   }
   return $suplementos;
 }

/*Genera una tabla de combos / selectores con las categorias y sus noticias */
 function g1v3m3_suplementos($post){
   $suplementos = getSuplementos();
   $content="";
   foreach ($suplementos as $suplemento) {

     $index = $suplemento["index"];

     $content .= "<tr>";
       $content .= "<td>";
       $content .= "<b>$suplemento[titulo]</b>";
       $content .= "</td>";
       $content .= "<td>";
         $content .= "<select class='categorias' data-post='$post->ID' name='$suplemento[name]' id='$suplemento[id]'>";
           $content .= get_list_categories($suplemento["name"],$post);
         $content .= "</select>";
       $content .= "</td>";
       $content .= "<td>";
         $content .= "<span name='$suplemento[noticias]' id='$suplemento[noticias]'></span>";
       $content .= "</td>";
     $content .= "</tr>";
   }

   return $content;
 }

/*obtener listado de categorias el 0 es para tomar la jerarquia mas importante del arbol de categorias */
 function get_list_categories($suplemento,$post){
   return get_list_subcategories(0,$suplemento,$post);
 }

/* crea en formato de opciones para un combo select la lista de categorias */
 function get_list_subcategories($parent,$suplemento,$post){
   $result = "";

   $args = array(
     'taxonomy'	=>"category",
     'parent'	=> $parent,
     'hide_empty' => 0
   );
   $selected="";
   $id = get_post_meta( $post->ID, $suplemento, false );

   $categories = get_categories($args);

   foreach($categories as $category){
     if(isset($id[0]))
     if($category->cat_ID == $id[0]){ $selected = "selected"; } else { $selected = "";}

     $result .= '<option value="'.$category->cat_ID.'" '.$selected.' >' . $category->cat_name . ' ('.$category->cat_ID. ') </option>';

   }
   return $result;
 }

 /*Genera opciones con las noticias de una categoria */
  function get_list_subpost($id_categoria,$index, $post){
    $result = "";
    $args = array('category'	=> $id_categoria);
    $noticias = get_posts($args);

    $id_noticia = get_post_meta( $post, "noticia_$index", false );


    foreach($noticias as $noticia){
      if($noticia->ID == $id_noticia[0]){ $selected = "selected"; } else { $selected = "";}
      $result .= '<option value="'.$noticia->ID.'" '.$selected.'>' . $noticia->post_title . ' ('. $noticia->ID .') </option>';
    }

    return $result;
  }


  /*Insertar Javascript js y enviar ruta admin-ajax.php*/

  add_action('wp_enqueue_scripts', 'valakax_insertar_js');
  add_action( 'admin_enqueue_scripts', 'valakax_insertar_js' );

  function valakax_insertar_js(){
    	wp_register_script('ajax', plugins_url(). '/suplementos/js/ajax.js', array('jquery'), '1.1', true );
    	wp_enqueue_script('ajax');
     wp_enqueue_style( 'loading', plugins_url( '/css/loading.css', __FILE__ ) );

    	wp_localize_script('ajax','ajax_vars',['ajaxurl'=>admin_url('admin-ajax.php')]);
  }


  /*Devolver datos a archivo js*/

  add_action('wp_ajax_nopriv_ajax_valakax','valakax_enviar_contenido');
  add_action('wp_ajax_ajax_valakax','valakax_enviar_contenido');
 /*funcion llamada por ajax para devolver un selector con noticias determinadas*/
  function valakax_enviar_contenido(){

    	$id_categoria = absint($_POST['id_post']);
     $index = absint($_POST['index_post']);
     $post = absint($_POST['post']);

     $opciones = get_list_subpost($id_categoria,$index,$post);

     $content = "<select name='noticia_$index' id='noticia_$index'>";
     $content .= $opciones;
     $content .= "</select>";

    	echo $content;

    	wp_die();
  }

 ?>
