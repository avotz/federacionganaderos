<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * Template Name: Page Home 
 * @package fedeganaderos
 */

get_header();
?>
<section class="banner">
		
		<!-- <div class="inner">
			<div class="item-info">
				<h2>Soluciones Completas para fincas ganaderas</h2>
				<p>Manejo de agua - Técnologia lechera - Insumos - Implementacion de riego</p>
				<a href="<?php echo esc_url( home_url( '/contactenos' ) ); ?>" class="btn btn-rojo">Contáctenos</a>
			</div>
		</div> -->
			
		<div class="banner-slider">
				<div class="banner-slide w-full h-screen" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/pattern.png'), url('<?php echo get_template_directory_uri(); ?>/img/bg.jpg')">
					<div class="inner">
						<div class="item-info">
							<h2>Soluciones Completas para fincas ganaderas</h2>
							<p>NUESTRO COMPROMISO: LLEVAR TECNOLOGÍAS Y SERVICIOS A LAS CÁMARAS  CON TOTAL ACOMPAÑAMIENTO</p>
							<a href="<?php echo esc_url( home_url( '/contactenos' ) ); ?>" class="btn btn-rojo">Contáctenos</a>
						</div>
					</div>
				</div>
				<div class="banner-slide w-full h-screen" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/pattern.png'), url('<?php echo get_template_directory_uri(); ?>/img/bg2.jpg')">
					<div class="inner">
						<div class="item-info">
							<h2>Manejo de agua - Técnologia lechera - Equipo e Insumos - Implementacion de riego</h2>
							
							<a href="<?php echo esc_url( home_url( '/contactenos' ) ); ?>" class="btn btn-rojo">Contáctenos</a>
						</div>
					</div>
				</div>
				<div class="banner-slide w-full h-screen" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/pattern.png'), url('<?php echo get_template_directory_uri(); ?>/img/bg3.jpg')">
				<div class="inner">
						<div class="item-info">
							<h2>Tecnología de adaptación al cambio climático</h2>
							
							<a href="<?php echo esc_url( home_url( '/contactenos' ) ); ?>" class="btn btn-rojo">Contáctenos</a>
						</div>
					</div>
				</div>
			</div> 
			<!-- <div class="banner-video">
				<video autoplay poster="<?php echo get_template_directory_uri(); ?>/img/bg.jpg" loop>
					<source src="<?php echo get_template_directory_uri(); ?>/img/video.webm" type="video/webm">
					<source src="<?php echo get_template_directory_uri(); ?>/img/video.ogv" type="video/ogg">
					<source src="<?php echo get_template_directory_uri(); ?>/img/video.mp4" type="video/mp4">
				</video>
					    
			</div>	    -->
			
				
		  	  	
	</section>
	
	<section class="intro" id="products">
		<div class="inner">
			<h2 class="text-center">Productos y Servicios</h2>
		</div>
	
	</section>
	<?php
                    $args = array(
                      'post_type' => 'solucion',
                        //'order' => 'ASC',
                      'orderby' => array('menu_order' => 'ASC', 'title' => 'ASC'),
                      'posts_per_page' => 50,
                      /*'tax_query' => array(
                        /*array(
                          'taxonomy' => 'view',
                          'field' => 'slug',
                          //'terms' => array('garden'),
                          //'operator' => 'NOT IN',
                        )
                     )*/


                    );


                    $items = new WP_Query($args);
                    // Pagination fix
                    $temp_query = $wp_query;
                    $wp_query = null;
                    $wp_query = $items;
                    $index = 0;
                    if ($items->have_posts()) :
                      while ($items->have_posts()) :
                        $items->the_post();

						?>
							<section class="solution text-white px-10">
								<div class="flex container mx-auto items-center">
										<?php  $products_ids = rwmb_meta( 'rw_producto' );
											
											
											if(count($products_ids) > 0){ 

												$query = new WP_Query( array(
													'post_type' => 'producto',
													'orderby' => array('menu_order' => 'ASC', 'title' => 'ASC'),
													
													'post__in' => $products_ids,
												) );
												if ( $query->have_posts() ) {
													
												
												?>
												<div class="solution-products solution-media">
													<div class="solution-products-container ">
												<?php 
													while ( $query->have_posts() ) : $query->the_post();
													
													$id = get_post_thumbnail_id($post->ID);
													$thumb_url = wp_get_attachment_image_src($id, 'producto-thumb', true);
												
												?>

													<div class="solution-products-item">
															<a href="#solution-products-popup-<?= $post->ID ?>" class="solution-products-item-link solution-products-popup-link">
															
																		
															<div class="solution-products-item-bg" style="background-image: url('<?= $thumb_url[0] ?>')"></div>
																		
																			
															
															
															<div class="solution-products-item-border">
																<div class="solution-products-item-border-left"></div>
																<div class="solution-products-item-border-right"></div>
																<div class="solution-products-item-content">
																<h3 class="solution-products-item-title"><?php the_title(); ?></h3>
																<!-- <p class="solution-products-item-description">Lorem ipsum dolor, sit amet consectetur adipisicing elit. </p> -->
																</div>
															</div>
															</a>
															<div id="solution-products-popup-<?= $post->ID ?>" class="solution-popup white-popup mfp-hide mfp-with-anim">
																<h3 class="popup-title"><?php the_title(); ?></h3>
																<!-- <div class="popup-thumbnail">
																<?php /*the_post_thumbnail('home-item-large');*/ ?>
																</div> -->
																<?php 
																	the_content();
																	/*$content_post = get_post($product_id);
																	$content = $content_post->post_content;
																	$content = apply_filters('the_content', $content);
																	$content = str_replace(']]>', ']]&gt;', $content);
																	echo $content;*/
																?>
															
																
								
															</div>
															
								
								
													</div>
												
													
												<?php 
													endwhile; 
													wp_reset_postdata();
												?>
												
												</div>
											
											</div>
										<?php } 
											
											}else{?>
											<?php if( rwmb_meta( 'rw_url_video_solution' ) ) : ?>
												<a href="<?php  echo rwmb_meta( 'rw_url_video_solution' ) ?>" class="solution-link solution-media popup-video">
											<?php else : ?>
												<a href="<?php echo esc_url( home_url( '/contactenos' ) ); ?>" class="solution-link solution-media">
											<?php endif ?>
												<div class="solution-img">
												<?php if (has_post_thumbnail()) :

												$id = get_post_thumbnail_id($post->ID);
												$thumb_url = wp_get_attachment_image_src($id, 'solution-item', true);
												$large_url = wp_get_attachment_image_src($id, 'solution-item-large', true);
												?>
														
													
												
												<img src="<?php echo $thumb_url[0] ?>">
														
															
												<?php endif; ?>
												
												</div>
											</a>

											<?php
											}
											?>
									
									
									<div class="solution-content text-center mx-auto">
										<h2 class="text-3xl leading-none mb-4 uppercase"><?php the_title(); ?></h2>
										<p class="leading-normal mb-4"><?php the_content(); ?></p>
										<p>
										<?php if ($post->post_name == 'financiamiento') : ?>
											<a href="<?php echo esc_url( home_url( '/financiamiento' ) ); ?>" class="btn-discover inline-block px-4 py-3 uppercase bg-white font-bold hover:bg-black hover:text-white ">Más información</a>
										<?php else: ?>
											<a href="<?php echo esc_url( home_url( '/contactenos' ) ); ?>" class="btn-discover inline-block px-4 py-3 uppercase bg-white font-bold hover:bg-black hover:text-white ">Más información</a>
										<?php endif; ?>
										</p>
									</div>
								</div>
							</section>

                            
                    
                        
                        <?php

                        $index++;
					endwhile;
					wp_reset_postdata();
				endif;

                    ?>
	


	
	
	
	
<?php
/*get_sidebar();*/
get_footer();
