<?php

/* CAMBIAR NOMBRE AL EXTRACTO DEL POST*/
//
// add_filter( 'gettext', 'wpse22764_gettext', 10, 2 );
// function wpse22764_gettext( $translation, $original )
// {
//   global $post;
//   if(!empty($post)){
//     if ($post->post_type == "contratacion") {
//       if ( 'Excerpt' == $original ) {
//         return 'Objeto de la Contratación';
//       }else{
//           $pos = strpos($original, 'Excerpts are optional hand-crafted summaries of your');
//           if ($pos !== false) {
//               return  'Ingresar objeto de la Contratación aquí';
//           }
//       }
//     }
//     }
//
//     return $translation;
// }
/* FORMULARIO SENCILLO Y CON EDITORES DE TEXTO */
/*$contrataciones = array(
  array('id'=>'modalidad','texto'=>'Modalidad'),
  array('id'=>'expediente_numero','texto'=>'Expediente Nº'),
  array('id'=>'recepcion_ofertas','texto'=>'Recepción de ofertas'),
  array('id'=>'fecha_tope','texto'=>'Fecha tope para recibir ofertas'),
  array('id'=>'fecha_apertura','texto'=>'Fecha y hora de apertura'),
  array('id'=>'consulta','texto'=>'Consultar a')
);



    // var_dump($pliego);
  echo "<table>";
    foreach ( $contrataciones as $contratacion){
      $contenido="";
        foreach ($contenido_campos_actualizados as $key => $value){
          if( $contratacion['id'] == $key) $contenido = $value[0];
      }
    echo "<tr>";
    echo '<td><label for="'.$contratacion['id'].'">'.$contratacion['texto'].'</label></td>';
    echo '<td><input type="text" id="'.$contratacion['id'].'" name="'.$contratacion['id'].'" placeholder="Ingrese '.$contratacion['texto'].'" size="75" value="'.$contenido.'"/></td>';
    echo "</tr>";
  }
*/

  /*echo "<tr>";
  echo "<td><label for='pliego'>Documentos adjuntos</label></td>";
  echo "<td><br>";
  wp_editor($pliego, 'pliego', array(
          'wpautop'               =>      true,
          'media_buttons' =>      true,
          'textarea_name' =>      'pliego',
          'textarea_rows' =>      10,
          'teeny'                 =>      true
          ));
  echo "</td>";
  echo "</tr>";
  echo "<tr>";
  echo "<td><label for='circulares'>Circulares</label></td>";
  echo "<td><br><br>";
  wp_editor($circulares, 'circulares', array(
          'wpautop'               =>      true,
          'media_buttons' =>      true,
          'textarea_name' =>      'circulares',
          'textarea_rows' =>      10,
          'teeny'                 =>      true
          ));
  echo "<br></td>";
  echo "</tr>";
  echo "</table>";

}*/
/*
add_action( 'save_post', 'add_pliego_field', 10, 1 );

function add_pliego_field( $post_id ) {
  global $post;
  if ($post->post_type != 'suplemento'){
      return;
  }
  $pliego = str_replace( "\r\n\r\n", '<br />', $_POST['pliego'] );
  $pliego = str_replace( "\r\n", '<br />', $_POST['pliego'] );
  update_post_meta($post_id, 'pliego', $pliego );
}

add_action( 'save_post', 'add_circulares_field', 10, 1 );

function add_circulares_field( $post_id ) {
global $post;
if ($post->post_type != 'suplemento'){
    return;
}
$circulares = str_replace( "\r\n\r\n", '<br />', $_POST['circulares'] );
$circulares = str_replace( "\r\n", '<br />', $_POST['circulares'] );
      update_post_meta($post_id, 'circulares', $circulares );
}
*/

 ?>
