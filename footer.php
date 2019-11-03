<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package nexter
 */

?>

<footer class="footer">
	<ul class="nav">
			<!-- <li class="nav"><a href="#" class="nav__link">Find your dream home</a></li>
			<li class="nav"><a href="#" class="nav__link">Request proposal</a></li>
			<li class="nav"><a href="#" class="nav__link">Download home planner</a></li>
			<li class="nav"><a href="#" class="nav__link">Find your dream home</a></li>
			<li class="nav"><a href="#" class="nav__link">Contact us</a></li>
			<li class="nav"><a href="#" class="nav__link">Submit your property</a></li>
			<li class="nav"><a href="#" class="nav__link">Come work with us</a></li> -->
			<?php
      wp_nav_menu(array( 'theme_location' => 'footer-menu', 'link_class' => 'nav__link' ));
			?>
	</ul>

	


	<p class="copyright">
			&copy; 2019 by Zvi Eshel
	</p>

</footer>

	<?php wp_footer(); ?>
	</body>
</html>
