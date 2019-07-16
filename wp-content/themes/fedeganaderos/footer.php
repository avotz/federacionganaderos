<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package fedeganaderos
 */

?>


<footer class="footer">
		<div class="footer-top">
			<div class="inner">
				<div class="footer-top-container">
					<div class="footer-top-item">
						<h4>Servicio de atención al cliente:</h4>
						<p>(506) 1234 546 12 - (506) 1234 546 12</p>
					</div>
					<div class="footer-top-item">
						<h4>Contácte un asesor</h4>
						<a href="<?php echo esc_url( home_url( '/contactenos' ) ); ?>" class="btn-discover black inline-block px-4 py-3 uppercase bg-white font-bold hover:bg-black hover:text-white ">Contáctenos</a>
						
					</div>
					<div class="footer-top-item social">
						<h4>Siguenos:</h4>
						<div class="redes">
							<a href="#"><i class="fab fa-facebook"></i></a>
							<a href="#"><i class="fab fa-twitter"></i></a>
							<a href="#"><i class="fab fa-youtube"></i></a>
						</div>
						
					</div>
				</div>
				<div class="copy">
						Federación Ganaderos &copy; 2019. Avotz
					</div>
			</div>
			
		</div>
		<!-- <div class="footer-bottom">
			<div class="inner">
				<div class="footer-bottom-container">
					<nav class="footer-menu">
							<ul class="footer-menu-ul">
									<li class="footer-menu-item">
										<a href="#" class="footer-menu-link">Terminos y condiciones</a>
									</li>
									<li class="footer-menu-item">
										<a href="#" class="footer-menu-link">Politicas de privacidad</a>
									</li>
									<li class="footer-menu-item">
										<a href="#" class="footer-menu-link anchor">Preguntas Frecuentes</a>
									</li>
									
									
									
								</ul>
						</nav>
					
				</div>
			</div>
			
		</div> -->
	</footer>

<?php wp_footer(); ?>

</body>
</html>
