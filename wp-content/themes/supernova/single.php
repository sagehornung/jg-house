<?php
/**
 * The template for displaying all single posts.
 *
 * @package supernova
 */

get_header(); ?>

	<div id="primary" class="<?php sup_primary_classes( false, 'large-12 medium-12 small-12 column' ); ?>">

		<?php do_action( 'sup_primary_start' ); ?>

		<main id="main" class="sup-site-main" role="main">

					<?php do_action( 'sup_main_start' );

		while ( have_posts() ) : the_post();

			 get_template_part( 'template-parts/content', 'page' );

			 sup_author_profile();
			 sup_post_navigation();

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
