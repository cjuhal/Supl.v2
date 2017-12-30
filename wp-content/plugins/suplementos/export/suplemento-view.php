<?php
$campos = get_post_custom();
$id_portada = $campos["noticia_0"][0];
$id_entrevistas = $campos["noticia_1"][0];
$id_librosLibres = $campos["noticia_2"][0];
$id_noticias_relacionadas_1 = $campos["noticia_3"][0];
$id_noticias_relacionadas_2 = $campos["noticia_4"][0];
$id_noticias_relacionadas_3 = $campos["noticia_5"][0];

$principal = get_post( $id_portada , ARRAY_A );
$entrevistas = get_post( $id_entrevistas , ARRAY_A );
$librosLibres = get_post( $id_librosLibres, ARRAY_A );
$noticias_relacionadas_1 = get_post( $id_noticias_relacionadas_1, ARRAY_A );
$noticias_relacionadas_2 = get_post( $id_noticias_relacionadas_2, ARRAY_A );
$noticias_relacionadas_3 = get_post( $id_noticias_relacionadas_3, ARRAY_A );

//url=>guid, titulo => post_title, img => get_the_post_thumbnail_url($campos["noticia_0"][0]);

?>
<!-- VISTA -->
			<div class="vc_row wpb_row vc_inner td-pb-row">
				<div class="wpb_column vc_column_container td-pb-span12">
					<div class="vc_column-inner vc_custom_1494962293751">
						<div class="wpb_wrapper">
							<div class="wpb_single_image wpb_content_element vc_align_left">
								<figure class="wpb_wrapper vc_figure">
									<a href="http://www.nodalcultura.am/" target="_self" class="vc_single_image-wrapper   vc_box_border_grey"><img width="1000" height="140" src="https://www.nodal.am/wp-content/uploads/2017/05/SuplementoNodalCulturaHeader.png" class="vc_single_image-img attachment-full" alt="" srcset="http://www.nodal.am/wp-content/uploads/2017/05/SuplementoNodalCulturaHeader.png 1000w, https://www.nodal.am/wp-content/uploads/2017/05/SuplementoNodalCulturaHeader-300x42.png 300w, http://www.nodal.am/wp-content/uploads/2017/05/SuplementoNodalCulturaHeader-768x108.png 768w, https://www.nodal.am/wp-content/uploads/2017/05/SuplementoNodalCulturaHeader-600x84.png 600w, https://www.nodal.am/wp-content/uploads/2017/05/SuplementoNodalCulturaHeader-696x97.png 696w" sizes="(max-width: 1000px) 100vw, 1000px"></a>
								</figure>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!--TITULO-->
			<h4 style="font-size: 30px;color: #883ba5;text-align: left;font-family:Montserrat;font-weight:700;font-style:normal" class="vc_custom_heading cursor_off vc_custom_1505511191131">
				<span class="ez-toc-section" id="30_anos_de_la_muerte_de_Peter_Tosh">
					<a href="<?php echo $principal["guid"]; ?>"><?php the_title(); ?></a>
				</span>
			</h4>
			<!-- /FIN TITULO -->

			<!--ROW TOP -->
			<div class="vc_row wpb_row vc_inner td-pb-row">

			<!--COLUMNA IZQUIERDA -->
				<div class="wpb_column vc_column_container td-pb-span3">
					<div class="vc_column-inner ">
						<div class="wpb_wrapper">

						<!--EXCERPT - Columna informativa  -->
							<div class="wpb_text_column wpb_content_element  vc_custom_1505512636920">
								<div class="wpb_wrapper">
									<p><?php the_excerpt(); ?></p>
								</div>
							</div>
						<!-- /EXCERPT - Columna informativa  -->

						<!--NOTICIA - LibrosLibres  -->
						<div class="wpb_single_image wpb_content_element vc_align_left">
							<figure class="wpb_wrapper vc_figure">
								<a href="<?php echo $librosLibres["guid"];?>" target="_self" class="vc_single_image-wrapper   vc_box_border_grey">
									<img class="vc_single_image-img " src="<?php echo get_the_post_thumbnail_url($id_librosLibres); ?>" width="350" height="250" alt="Libros Libres" title="Libros Libres">
								</a>
							</figure>
						</div>
						<h3 style="font-size: 13px;color: #883ba5;line-height: normal;text-align: left;font-family:Montserrat;font-weight:400;font-style:normal" class="vc_custom_heading vc_custom_1505511369428">
							<span class="ez-toc-section" id="LibrosLibres_Repensar_Venezuela_desde_la_izquierda_y_contra_la_indiferencia_de_Daniel_Chavez_Hernan_Ouvina_y_Mabel_Thwaites_Rey">
								<a href="<?php echo $librosLibres["guid"];?>" title="LibrosLibres"><?php echo $librosLibres["post_title"];?></a>
							</span>
						</h3>
						<!-- /NOTICIA - LibrosLibres  -->

						<!--NOTICIA - Entrevista  -->
						<div class="wpb_single_image wpb_content_element vc_align_left">
							<figure class="wpb_wrapper vc_figure">
								<a href="<?php echo $entrevistas["guid"];?>" target="_self" class="vc_single_image-wrapper   vc_box_border_grey">
									<img class="vc_single_image-img " src="<?php echo get_the_post_thumbnail_url($id_entrevistas);?>" width="350" height="250" alt="Entrevista" title="Entrevista">
								</a>
							</figure>
						</div>
						<h3 style="font-size: 13px;color: #883ba5;line-height: normal;text-align: left;font-family:Montserrat;font-weight:400;font-style:normal" class="vc_custom_heading vc_custom_1505511717971">
							<span class="ez-toc-section" id="Entrevista_Rojo_Cordova_poeta_mexicano_El_eslam_de_poesia_es_una_herramienta_social_muy_sabrosa">
								<a href="<?php echo $entrevistas["guid"];?>" title="Entrevista"><?php echo $entrevistas["post_title"];?></a>
							</span>
						</h3>


					</div>
				</div>
			</div>
			<!-- /COLUMNA IZQUIERDA -->

			<!--COLUMNA DERECHA -->
			<div class="wpb_column vc_column_container td-pb-span9">
				<div class="vc_column-inner ">
					<div class="wpb_wrapper">
					<!--PORTADA -->
						<div class="wpb_single_image wpb_content_element vc_align_center">
							<figure class="wpb_wrapper vc_figure">
							<a href="<?php echo $principal["guid"]; ?>" target="_self" class="vc_single_image-wrapper   vc_box_border_grey">
								<img class="vc_single_image-img " src="<?php echo get_the_post_thumbnail_url($id_portada); ?>" width="650" height="800" alt="portada" title="Portada" style="height: 800px">
							</a>
							</figure>
						</div>
						<!-- TENTATIVO A BORRAR-->
						<h1 style="font-size: 20px;color: #ffffff;text-align: left;font-family:Montserrat;font-weight:700;font-style:normal" class="vc_custom_heading shadow_title_ch vc_custom_1505511169182">
							<span class="ez-toc-section" id="PeterToshPeter_Tosh_el_reggae_de_la_liberacion">
								<a href="<?php echo $principal["guid"]; ?>" title="Portada"><?php echo $principal["post_title"]; ?></a>
							</span>
						</h1>
						<!-- /TENTATIVO A BORRAR-->
					<!--/PORTADA -->
					</div>
				</div>
			</div>
			<!--/COLUMNA DERECHA -->
		</div>
		<!--/ROW TOP -->

		<!--/ROW BOTTOM -->
		<div class="vc_row wpb_row vc_inner td-pb-row vc_custom_1494900607303">
		<!-- NOTICIA RELACIONADA 1 -->
			<div class="wpb_column vc_column_container td-pb-span4">
				<div class="vc_column-inner "><div class="wpb_wrapper">
					<div class="wpb_single_image wpb_content_element vc_align_left">
						<figure class="wpb_wrapper vc_figure">
							<a href="<?php echo $noticias_relacionadas_1["guid"];?>" target="_self" class="vc_single_image-wrapper   vc_box_border_grey">
								<img class="vc_single_image-img " src="<?php echo get_the_post_thumbnail_url($id_noticias_relacionadas_1);?>" alt="Noticias Relacionadas 1" title="Noticias Relacionadas 1" style="width:350px; height: 187px">
							</a>
						</figure>
					</div>
					<h3 style="font-size: 13px;color: #883ba5;line-height: normal;text-align: left;font-family:Montserrat;font-weight:400;font-style:normal" class="vc_custom_heading vc_custom_1505511893251">
						<span class="ez-toc-section" id="PeterTosh_Sin_homenajes_oficiales_el_Museo_Peter_Tosh_recibe_a_los_visitantes">
							<a href="<?php echo $noticias_relacionadas_1["guid"];?>" title="Noticias Relacionadas 1"><?php echo $noticias_relacionadas_1["post_title"];?></a>
						</span>
					</h3>
				</div>
			</div>
		</div>
		<!-- /NOTICIA RELACIONADA 1 -->
		<!-- NOTICIA RELACIONADA 2 -->
		<div class="wpb_column vc_column_container td-pb-span4">
			<div class="vc_column-inner ">
				<div class="wpb_wrapper">
					<div class="wpb_single_image wpb_content_element vc_align_left">
						<figure class="wpb_wrapper vc_figure">
							<a href="<?php echo $noticias_relacionadas_2["guid"];?>" target="_self" class="vc_single_image-wrapper   vc_box_border_grey">
								<img class="vc_single_image-img " src="<?php echo get_the_post_thumbnail_url($id_noticias_relacionadas_2);?>" alt="Noticias Relacionadas 2" title="Noticias Relacionadas" style="width:350px; height: 187px">
							</a>
						</figure>
					</div>
					<h3 style="font-size: 13px;color: #883ba5;line-height: normal;text-align: left;font-family:Montserrat;font-weight:400;font-style:normal" class="vc_custom_heading vc_custom_1505512009487">
						<span class="ez-toc-section" id="PeterTosh_Una_larga_mirada_sobre_su_obra">
							<a href="<?php echo $noticias_relacionadas_2["guid"];?>" title="Noticias Relacionadas 2"><?php echo $noticias_relacionadas_2["post_title"];?></a>
						</span>
					</h3>
				</div>
			</div>
		</div>
		<!-- /NOTICIA RELACIONADA 2 -->
		<!-- NOTICIA RELACIONADA 3 -->
		<div class="wpb_column vc_column_container td-pb-span4">
			<div class="vc_column-inner ">
				<div class="wpb_wrapper">
					<div class="wpb_single_image wpb_content_element vc_align_left">
						<figure class="wpb_wrapper vc_figure">
							<a href="<?php echo $noticias_relacionadas_3["guid"];?>" target="_self" class="vc_single_image-wrapper   vc_box_border_grey">
								<img class="vc_single_image-img " src="<?php echo get_the_post_thumbnail_url($id_noticias_relacionadas_3);?>" alt="Noticia Relacionada 3" title="Noticia Relacionada 3" style="width:350px; height: 187px">
							</a>
						</figure>
					</div>
					<h3 style="font-size: 13px;color: #883ba5;line-height: normal;text-align: left;font-family:Montserrat;font-weight:400;font-style:normal" class="vc_custom_heading vc_custom_1505512094623">
						<span class="ez-toc-section" id="PeterTosh_Stepping_Razor_Red_X_un_documental_sobre_Peter_Tosh">
							<a href="<?php echo $noticias_relacionadas_3["guid"];?>" title="Noticia Relacionada 3"><?php echo $noticias_relacionadas_3["post_title"];?></a>
						</span>
					</h3>
				</div>
			</div>
		</div>
		<!-- /NOTICIA RELACIONADA 3 -->
	</div>
	<!--/ROW BOTTOM -->

	<!-- FOOTER -->
	<div class="vc_separator wpb_content_element vc_separator_align_center vc_sep_width_100 vc_sep_pos_align_center vc_separator_no_text vc_custom_1494976253965  vc_custom_1494976253965">
		<span class="vc_sep_holder vc_sep_holder_l">
			<span style="border-color:#883ba5;" class="vc_sep_line"></span>
		</span>
		<span class="vc_sep_holder vc_sep_holder_r">
			<span style="border-color:#883ba5;" class="vc_sep_line"></span>
		</span>
	</div>
	<div class="vc_row wpb_row vc_inner td-pb-row">
		<div class="wpb_column vc_column_container td-pb-span4">
			<div class="vc_column-inner ">
				<div class="wpb_wrapper">
					<div class="wpb_single_image wpb_content_element vc_align_left">
						<figure class="wpb_wrapper vc_figure">
							<a href="http://wwww.nodalcultura.am/" target="_self" class="vc_single_image-wrapper   vc_box_border_grey">
								<img width="1277" height="354" src="https://www.nodal.am/wp-content/uploads/2017/05/nodalCulturaSuplementoFooter.png" class="vc_single_image-img attachment-full" alt="" srcset="https://www.nodal.am/wp-content/uploads/2017/05/nodalCulturaSuplementoFooter.png 1277w, https://www.nodal.am/wp-content/uploads/2017/05/nodalCulturaSuplementoFooter-300x83.png 300w, https://www.nodal.am/wp-content/uploads/2017/05/nodalCulturaSuplementoFooter-768x213.png 768w, https://www.nodal.am/wp-content/uploads/2017/05/nodalCulturaSuplementoFooter-1024x284.png 1024w, https://www.nodal.am/wp-content/uploads/2017/05/nodalCulturaSuplementoFooter-600x166.png 600w, https://www.nodal.am/wp-content/uploads/2017/05/nodalCulturaSuplementoFooter-696x193.png 696w, https://www.nodal.am/wp-content/uploads/2017/05/nodalCulturaSuplementoFooter-1068x296.png 1068w" sizes="(max-width: 1277px) 100vw, 1277px">
							</a>
						</figure>
					</div>
				</div>
			</div>
		</div>
		<div class="wpb_column vc_column_container td-pb-span8 vc_hidden-xs">
			<div class="vc_column-inner ">
				<div class="wpb_wrapper">
					<div class="wpb_single_image wpb_content_element vc_align_left  vc_custom_1495051087949">
						<figure class="wpb_wrapper vc_figure">
							<a href="http://wwww.nodal.am/" target="_self" class="vc_single_image-wrapper   vc_box_border_grey">
								<img width="653" height="73" src="https://www.nodal.am/wp-content/uploads/2017/05/nodal_cultura_txt_footer1.png" class="vc_single_image-img attachment-full" alt="" srcset="https://www.nodal.am/wp-content/uploads/2017/05/nodal_cultura_txt_footer1.png 653w, https://www.nodal.am/wp-content/uploads/2017/05/nodal_cultura_txt_footer1-300x34.png 300w, https://www.nodal.am/wp-content/uploads/2017/05/nodal_cultura_txt_footer1-600x67.png 600w" sizes="(max-width: 653px) 100vw, 653px">
							</a>
						</figure>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--/FOOTER -->
<!-- /VISTA -->
