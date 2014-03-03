<?php
/*
 * Template Name: homepage
 */

get_header(); ?>

        
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
        

				<?php if(get_field('home_section')): $i=0; ?>
                
     
                <?php while(has_sub_field('home_section')): $i++; ?>
                
    					<div class="heading-group-<?php echo $i; ?>">
                        	<div id="group" >
                                <h1 id="home-heading"><?php the_sub_field('home_heading') ?></h1>
                                <h2 id="home-subhead"><?php the_sub_field('home_subhead') ?></h2>
                            	<img src="<?php $image = get_sub_field('home_image'); echo $image['url'] ?>" />
                            </div>
         				</div>
                        
                <?php endwhile; ?>
       			<?php endif; ?>
        

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>					

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>