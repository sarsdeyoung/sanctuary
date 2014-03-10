<?php
/**
 * The Template for displaying all single posts.
 *
 * @package sanctuary
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

        
        <div id="main-cabin-section">
				<?php
         
				/*
				*  Show selected image if value exists
				*  Return value = URL
				*/
         
                if( get_field('cabinpage_background_image') ):
                    ?><img src="<?php the_field('cabinpage_background_image'); ?>" alt="" /><?php
                endif;
                
                ?>
            
              	<div id="cabin-content"> 
					
                    <div id="cabin-gallery">
                    	<?php
 
						$images = get_field('cabin_images');
						 
						if( $images ): ?>
							<div id="slider" class="flexslider">
								<ul class="slides">
									<?php foreach( $images as $image ): ?>
									<li data-thumb="<?php echo $image['sizes']['thumbnail']; ?>">
									<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
									<p><?php echo $image['caption']; ?></p>
									</li>
									<?php endforeach; ?>
								</ul>
							</div>
							<?php
						 
							/*
							*  The following code creates the thumbnail navigation
							*/
						 
							?>
							
						<?php endif; 
 
					?>
                    
                    </div>		
                     
                    <div id="cabin-details">
                        <h1><?php the_field('cabin_name'); ?></h1>
                        
                        <p><?php the_field('cabin_description'); ?></p>
                        
                        <h2>Art making features:</h2>
                            <p><?php the_field('art_features'); ?></p>
                        
                        <h2>Standard cabin features include:</h2>
                            <p><?php the_field('cabin_features'); ?></p>
                        
                        <p><?php the_field('cabin_rates'); ?></p>
                        
                        <button type="button">check availability</button>
                    </div>
                    
                </div>
                    
        </div>
       

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>

			<?php sanctuary_post_nav(); ?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>