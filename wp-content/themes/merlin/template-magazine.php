<?php
/**
 * Template Name: Magazine Homepage
 *
 * Description: A custom page template for displaying the magazine homepage widgets.
 *
 * @package Merlin
 */
 
get_header(); 

// Get Theme Options from Database
$theme_options = merlin_theme_options();

// Display Featured Post Slideshow if activated
if ( isset($theme_options['slider_magazine']) and $theme_options['slider_magazine'] == true ) :

	get_template_part( 'template-parts/post-slider' );

endif;
?>
		
	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		
		<?php if ( function_exists( 'themezee_breadcrumbs' ) ) themezee_breadcrumbs(); ?>
			
		<?php // Display Magazine Homepage Widgets
		if( is_active_sidebar('magazine-homepage') ) : ?>

			<div id="magazine-homepage-widgets" class="widget-area clearfix">

				<?php dynamic_sidebar('magazine-homepage'); ?>

			</div><!-- #magazine-homepage-widgets -->

		<?php // Display Description about Magazine Homepage Widgets when widget area is empty
		else : 
		
			// Display only to users with permission
			if ( current_user_can( 'edit_theme_options' ) ) : ?>

				<p class="empty-widget-area">
					<?php esc_html_e( 'Please go to Appearance &#8594; Widgets and add at least one widget to the "Magazine Homepage" widget area. You can use the Category Posts widgets to set up the theme like the demo website.', 'merlin' ); ?>
				</p>
				
			<?php endif;

		endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->
	
	<?php get_sidebar(); ?>
	
<?php get_footer(); ?>