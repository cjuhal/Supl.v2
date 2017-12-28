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

function init() {

	$file = plugin_dir_path(__FILE__). '/export/suplemento-view.php';
	$destino = get_template_directory() . '/template-parts/suplemento-view.php';
   if (!rename($file, $destino)) {
   	echo "<script><alert>Error al copiar $file...\n</alert></script>";
	}

	$file = plugin_dir_path(__FILE__). '/export/content-single-suplemento.php';
	$destino = get_template_directory() . '/template-parts/content-single-suplemento.php';
	 if (!rename($file, $destino)) {
		echo "<script><alert>Error al copiar $file...\n</alert></script>";
	}

	$file = plugin_dir_path(__FILE__). '/export/single-suplemento.php';
	$destino = get_template_directory() . '/single-suplemento.php';
	 if (!rename($file, $destino)) {
		echo "<script><alert>Error al copiar $file...\n</alert></script>";
	}

	$file = plugin_dir_path(__FILE__). '/export/archive-suplemento.php';
	$destino = get_template_directory() . '/archive-suplemento.php';
	 if (!rename($file, $destino)) {
		echo "<script><alert>Error al copiar $file...\n</alert></script>";
	}

	file_put_contents(__DIR__.'/log.txt', ob_get_contents());
}
register_activation_hook( __FILE__, 'init' );


 ?>
