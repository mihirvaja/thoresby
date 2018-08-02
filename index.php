<?php get_header(); ?>

        <?php /* The loop */ ?>
        <?php if ( have_posts() ) : ?>

 			<?php while ( have_posts() ) : the_post(); ?>
			
				
					
			<?php endwhile; ?>
			
		<?php endif; ?>	
		
			
<?php get_footer(); ?>