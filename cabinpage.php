<?php
/*
 * Template Name: cabinpage
 */

get_header(); ?>

        
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
        
        
        <?php
 
/*
*  Show selected image if value exists
*  Return value = URL
*/
 
		if( get_field('cabinpage_background_image') ):
			?><img src="<?php the_field('cabinpage_background_image'); ?>" alt="" /><?php
		endif;
		
		?>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>					

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>