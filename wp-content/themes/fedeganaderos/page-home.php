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
		
		<div class="inner">
			<div class="item-info">
				<h2>Soluciones Completas para fincas ganaderas</h2>
				<p>Manejo de agua - Técnologia lechera - Insumos - Implementacion de riego</p>
				<a href="<?php echo esc_url( home_url( '/contactenos' ) ); ?>" class="btn btn-negro">Contáctenos</a>
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
	<section class="home-categories">
		<div class="inner">
			<div class="home-categories-container">
				<div class="home-categories-item">
					<figure class="home-categories-item-img">
						<img src="<?php echo get_template_directory_uri(); ?>/img/products.jpg" alt="">
					</figure>
					<h3>Productos</h3>
					<span class="icon"><i class="fas fa-arrow-right"></i></span>
					<a href="#products" class="home-categories-item-link anchor"></a>
				</div>
				<div class="home-categories-item">
					<figure class="home-categories-item-img">
						<img src="<?php echo get_template_directory_uri(); ?>/img/repuestos.jpg" alt="">
					</figure>
					<h3>Repuestos</h3>
					<span class="icon"><i class="fas fa-arrow-right"></i></span>
					<a href="#" class="home-categories-item-link"></a>
				</div>
				<div class="home-categories-item">
					<figure class="home-categories-item-img">
						<img src="<?php echo get_template_directory_uri(); ?>/img/financiamiento.jpg" alt="">
					</figure>
					<h3>Financiamiento</h3>
					<span class="icon"><i class="fas fa-arrow-right"></i></span>
					<a href="<?php echo esc_url( home_url( '/financiamiento' ) ); ?>" class="home-categories-item-link"></a>
				</div>
			</div>
		</div>
	</section>
	<section class="intro" id="products">
		<div class="inner">
			<h2 class="text-center">Soluciones</h2>
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
										
											if(count($products_ids) > 0){ ?>
												<div class="solution-products">
													<div class="solution-products-container flex-container-sb">
												<?php 
													foreach ($products_ids as $product_id ) :

													$id = get_post_thumbnail_id($product_id);
													$thumb_url = wp_get_attachment_image_src($id, 'producto-thumb', true);
												
												?>

													<div class="solution-products-item">
															<a href="#solution-products-popup-<?= $product_id ?>" class="solution-products-item-link solution-products-popup-link">
															
																		
															<div class="solution-products-item-bg" style="background-image: url('<?= $thumb_url[0] ?>')"></div>
																		
																			
															
															
															<div class="solution-products-item-border">
																<div class="solution-products-item-border-left"></div>
																<div class="solution-products-item-border-right"></div>
																<div class="solution-products-item-content">
																<h3 class="solution-products-item-title"><?php echo get_the_title($product_id ) ?></h3>
																<!-- <p class="solution-products-item-description">Lorem ipsum dolor, sit amet consectetur adipisicing elit. </p> -->
																</div>
															</div>
															</a>
															<div id="solution-products-popup-<?= $product_id ?>" class="solution-popup white-popup mfp-hide mfp-with-anim">
																<h3 class="popup-title"><?php the_title(); ?></h3>
																<div class="popup-thumbnail">
																<?php the_post_thumbnail('home-item-large'); ?>
																</div><!-- .post-thumbnail -->
																<?php 
																	$content_post = get_post($product_id);
																	$content = $content_post->post_content;
																	$content = apply_filters('the_content', $content);
																	$content = str_replace(']]>', ']]&gt;', $content);
																	echo $content;
																?>
															
																
								
															</div>
															
								
								
													</div>
												
													
												<?php endforeach; ?>
												</div>
											</div>
											<?php }else{?>
											
											<a href="<?php echo esc_url( home_url( '/contactenos' ) ); ?>" class="solution-link">
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
											<a href="<?php echo esc_url( home_url( '/contactenos' ) ); ?>" class="btn-discover inline-block px-4 py-3 uppercase bg-white font-bold hover:bg-black hover:text-white ">Más información</a>
										</p>
									</div>
								</div>
							</section>

                            
                    
                        
                        <?php

                        $index++;
					endwhile;
				endif;

                    ?>
	

	<!-- <section class="solution text-white px-10">
		<div class="flex container mx-auto items-center">
			<a href="#" class="solution-link">
				<div class="solution-img">
					<img src="<?php echo get_template_directory_uri(); ?>/img/promo.jpg">
				</div>
			</a>
			<div class="solution-content text-center mx-auto">
				<h2 class="text-3xl leading-none mb-4 uppercase">Soluciones para riego</h2>
				<p class="leading-normal mb-4">Ofrecemos toda la gama de Sistemas de Riego para todo tipo de cultivos, por gravedad con tubería de compuertas, por aspersión fija, móvil o semi móvil; y sistemas de bajo volumen, micro-aspersión y goteo. 
				Brindamos un servicio llave en mano que incluye diseño, instalación personalizada con todos los materiales necesarios para una correcta instalación.
				Todos nuestros productos son fabricados bajo las tecnologías mas avanzadas lo cual le otorgan en sello de calidad- ISO.
				</p>
				<p>
					<a href="#" class="btn-discover inline-block px-4 py-3 uppercase bg-white font-bold hover:bg-black hover:text-white ">Más información</a>
				</p>
			</div>
		</div>
	</section> -->

	<!-- <section class="solution text-white px-10">
		<div class="flex container mx-auto items-center">
			<div class="solution-products">
				<div class="solution-products-container flex-container-sb">
                      
					
 
					<div class="solution-products-item">
							 <a href="#solution-products-popup-1" class="solution-products-item-link solution-products-popup-link">
							  
										
							  <div class="solution-products-item-bg" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/product.jpg')"></div>
										 
											 
							  
							  
							   <div class="solution-products-item-border">
								 <div class="solution-products-item-border-left"></div>
								 <div class="solution-products-item-border-right"></div>
								 <div class="solution-products-item-content">
								   <h3 class="solution-products-item-title">Lorem ipsum dolor sit amet.</h3>
								   <p class="solution-products-item-description">Lorem ipsum dolor, sit amet consectetur adipisicing elit. </p>
								 </div>
							   </div>
							 </a>
							 <div id="solution-products-popup-1" class="solution-popup white-popup mfp-hide mfp-with-anim">
								 <h3 class="popup-title"><?php the_title(); ?></h3>
								 <div class="popup-thumbnail">
								   <?php /*the_post_thumbnail('home-item-large');*/ ?>
								 </div>
								 <?php /*the_content()*/ ?>
								   Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae facere fugiat excepturi tenetur quos repudiandae cupiditate quis officiis placeat aspernatur esse dolore aperiam magnam voluptas, eos vel nostrum recusandae. Sequi.
								 
 
							   </div>
							
 
 
					</div>
					<div class="solution-products-item">
							 <a href="#solution-products-popup-1" class="solution-products-item-link solution-products-popup-link">
							  
										
							  <div class="solution-products-item-bg" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/product.jpg')"></div>
										 
											 
							  
							  
							   <div class="solution-products-item-border">
								 <div class="solution-products-item-border-left"></div>
								 <div class="solution-products-item-border-right"></div>
								 <div class="solution-products-item-content">
								   <h3 class="solution-products-item-title">Lorem ipsum dolor sit amet.</h3>
								   <p class="solution-products-item-description">Lorem ipsum dolor, sit amet consectetur adipisicing elit. </p>
								 </div>
							   </div>
							 </a>
							 <div id="solution-products-popup-1" class="solution-popup white-popup mfp-hide mfp-with-anim">
								 <h3 class="popup-title"><?php the_title(); ?></h3>
								 <div class="popup-thumbnail">
								   <?php /*the_post_thumbnail('home-item-large');*/ ?>
								 </div>
								 <?php /*the_content()*/ ?>
								   Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae facere fugiat excepturi tenetur quos repudiandae cupiditate quis officiis placeat aspernatur esse dolore aperiam magnam voluptas, eos vel nostrum recusandae. Sequi.
								 
 
							   </div>
							
 
 
					</div>
					<div class="solution-products-item">
							 <a href="#solution-products-popup-1" class="solution-products-item-link solution-products-popup-link">
							  
										
							  <div class="solution-products-item-bg" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/product.jpg')"></div>
										 
											 
							  
							  
							   <div class="solution-products-item-border">
								 <div class="solution-products-item-border-left"></div>
								 <div class="solution-products-item-border-right"></div>
								 <div class="solution-products-item-content">
								   <h3 class="solution-products-item-title">Lorem ipsum dolor sit amet.</h3>
								   <p class="solution-products-item-description">Lorem ipsum dolor, sit amet consectetur adipisicing elit. </p>
								 </div>
							   </div>
							 </a>
							 <div id="solution-products-popup-1" class="solution-popup white-popup mfp-hide mfp-with-anim">
								 <h3 class="popup-title"><?php the_title(); ?></h3>
								 <div class="popup-thumbnail">
								   <?php /*the_post_thumbnail('home-item-large');*/ ?>
								 </div>
								 <?php /*the_content()*/ ?>
								   Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae facere fugiat excepturi tenetur quos repudiandae cupiditate quis officiis placeat aspernatur esse dolore aperiam magnam voluptas, eos vel nostrum recusandae. Sequi.
								 
 
							   </div>
							
 
 
					</div>
					<div class="solution-products-item">
							 <a href="#solution-products-popup-1" class="solution-products-item-link solution-products-popup-link">
							  
										
							  <div class="solution-products-item-bg" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/product.jpg')"></div>
										 
											 
							  
							  
							   <div class="solution-products-item-border">
								 <div class="solution-products-item-border-left"></div>
								 <div class="solution-products-item-border-right"></div>
								 <div class="solution-products-item-content">
								   <h3 class="solution-products-item-title">Lorem ipsum dolor sit amet.</h3>
								   <p class="solution-products-item-description">Lorem ipsum dolor, sit amet consectetur adipisicing elit. </p>
								 </div>
							   </div>
							 </a>
							 <div id="solution-products-popup-1" class="solution-popup white-popup mfp-hide mfp-with-anim">
								 <h3 class="popup-title"><?php the_title(); ?></h3>
								 <div class="popup-thumbnail">
								   <?php /*the_post_thumbnail('home-item-large');*/ ?>
								 </div>
								 <?php /*the_content()*/ ?>
								   Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae facere fugiat excepturi tenetur quos repudiandae cupiditate quis officiis placeat aspernatur esse dolore aperiam magnam voluptas, eos vel nostrum recusandae. Sequi.
								 
 
							   </div>
							
 
 
					</div>
					<div class="solution-products-item">
							 <a href="#solution-products-popup-1" class="solution-products-item-link solution-products-popup-link">
							  
										
							  <div class="solution-products-item-bg" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/product.jpg')"></div>
										 
											 
							  
							  
							   <div class="solution-products-item-border">
								 <div class="solution-products-item-border-left"></div>
								 <div class="solution-products-item-border-right"></div>
								 <div class="solution-products-item-content">
								   <h3 class="solution-products-item-title">Lorem ipsum dolor sit amet.</h3>
								   <p class="solution-products-item-description">Lorem ipsum dolor, sit amet consectetur adipisicing elit. </p>
								 </div>
							   </div>
							 </a>
							 <div id="solution-products-popup-1" class="solution-popup white-popup mfp-hide mfp-with-anim">
								 <h3 class="popup-title"><?php the_title(); ?></h3>
								 <div class="popup-thumbnail">
								   <?php /*the_post_thumbnail('home-item-large');*/ ?>
								 </div>
								 <?php /*the_content()*/ ?>
								   Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae facere fugiat excepturi tenetur quos repudiandae cupiditate quis officiis placeat aspernatur esse dolore aperiam magnam voluptas, eos vel nostrum recusandae. Sequi.
								 
 
							   </div>
							
 
 
					</div>
					<div class="solution-products-item">
							 <a href="#solution-products-popup-1" class="solution-products-item-link solution-products-popup-link">
							  
										
							  <div class="solution-products-item-bg" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/product.jpg')"></div>
										 
											 
							  
							  
							   <div class="solution-products-item-border">
								 <div class="solution-products-item-border-left"></div>
								 <div class="solution-products-item-border-right"></div>
								 <div class="solution-products-item-content">
								   <h3 class="solution-products-item-title">Lorem ipsum dolor sit amet.</h3>
								   <p class="solution-products-item-description">Lorem ipsum dolor, sit amet consectetur adipisicing elit. </p>
								 </div>
							   </div>
							 </a>
							 <div id="solution-products-popup-1" class="solution-popup white-popup mfp-hide mfp-with-anim">
								 <h3 class="popup-title"><?php the_title(); ?></h3>
								 <div class="popup-thumbnail">
								   <?php /*the_post_thumbnail('home-item-large');*/ ?>
								 </div>
								 <?php /*the_content()*/ ?>
								   Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae facere fugiat excepturi tenetur quos repudiandae cupiditate quis officiis placeat aspernatur esse dolore aperiam magnam voluptas, eos vel nostrum recusandae. Sequi.
								 
 
							   </div>
							
 
 
					</div>
							
 
						 
						 
						
 
 
					   
					</div>
			</div>
			
			<div class="solution-content text-center mx-auto">
				<h2 class="text-3xl leading-none mb-4 uppercase">Soluciones para manejo de agua</h2>
				<p class="leading-normal mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco</p>
				<p>
					<a href="#" class="btn-discover inline-block px-4 py-3 uppercase bg-white font-bold hover:bg-black hover:text-white ">Discover</a>
				</p>
			</div>
		</div>
	</section>
	<section class="solution text-white px-10">
		<div class="flex container mx-auto items-center">
			<a href="#" class="solution-link">
				<div class="solution-img">
					<img src="<?php echo get_template_directory_uri(); ?>/img/promo.jpg">
				</div>
			</a>
			<div class="solution-content text-center mx-auto">
				<h2 class="text-3xl leading-none mb-4 uppercase">Suministro de productos e insumos</h2>
				<p class="leading-normal mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco</p>
				<p>
					<a href="#" class="btn-discover inline-block px-4 py-3 uppercase bg-white font-bold hover:bg-black hover:text-white ">Más información</a>
				</p>
			</div>
		</div>
	</section>
	<section class="solution text-white px-10">
		<div class="flex container mx-auto items-center">
			<a href="#" class="solution-link">
				<div class="solution-img">
					<img src="<?php echo get_template_directory_uri(); ?>/img/promo.jpg">
				</div>
			</a>
			<div class="solution-content text-center mx-auto">
				<h2 class="text-3xl leading-none mb-4 uppercase">Servicios de maquinaria</h2>
				<p class="leading-normal mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco</p>
				<p>
					<a href="#" class="btn-discover inline-block px-4 py-3 uppercase bg-white font-bold hover:bg-black hover:text-white ">Más información</a>
				</p>
			</div>
		</div>
	</section> -->

	

	
	
	
	
<?php
/*get_sidebar();*/
get_footer();
