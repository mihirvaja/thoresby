<?php /* Template Name: Homepage */ ?>
<?php get_header(); ?>

<?php /* The loop */ ?>
<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<p>hi</p>
	<?php

		if(get_field('video_or_images') == "images"){
		
			$images = get_field('images');

			echo "<div class=\"header-image-container scrolldiv\">";
			
			if(count($images) == 1){
				echo "<div class=\"header-image\" style=\"background-image: url(" . $images[0]['image']['url'] . ")\"></div>";
			}else{
				echo "<ul class=\"bxslider\">";
				foreach($images as $i){
					echo "<li>";
						echo "<div class=\"header-image\" style=\"background-image: url(" . $i['image']['url'] . ")\"\"></div>";
					echo "</li>";
				}
				echo "</ul>";
			}

			echo "<div class=\"width-container\">";
			echo "<div class=\"header-image-text\">" . get_field('caption') . "</div>";
			echo "</div>";

			echo "</div>";
	
		} else {
			echo "<div class=\"header-image-container scrolldiv\">";

				echo "<div class=\"header-image\">";

				echo "<video class=\"header-video\" poster=\"" . get_field('placeholder_image')['url'] . "\" autoplay muted>";
				echo "<source src=\"" . get_field('vimeo_code') . "\"></source>";
				echo "</video>";

				echo "<div class=\"width-container\">";
				echo "<div class=\"header-image-text\">" . get_field('caption') . "</div>";
				echo "</div>";

				echo "</div>";
			echo "</div>";
		}

	?>


	<?php if( have_rows('blocks') ): ?>

		<div class="hp-blocks-row-container">
			
		<?php $count = 1; ?>

		<?php while( have_rows('blocks') ): the_row(); 

			// vars
			$textbox = get_sub_field('text_box');
			$imagebox = get_sub_field('image_box');
			

			?>

			<div class="hp-blocks-row <?php if($count == 1){ echo " scrolldiv"; } ?>" style="background-color: <?php echo $textbox['background_colour']; ?>">

				<div class="textbox" style="background-color: <?php echo $textbox['background_colour']; ?>;background-image: url(<?php echo $textbox['background_image']['url']; ?>)">
					<div class="content"><?php echo $textbox['content']; ?></div>

					<?php if($textbox['link_text']) { ?>
						<div class="link">
							<?php if($textbox['link_type'] == "external"){ ?>
								<a href="<?php echo $textbox['link']['url']; ?>">
							<?php }?>
									
							<?php if($textbox['link_type'] == "video"){ ?>
								<a class="videofancybox" href="http://player.vimeo.com/video/<?php echo $textbox['text_vimeo_code']; ?>?&autoplay=1">
							<?php }?>

							<?php if($textbox['link_type'] == "image"){ ?>
								<a class="fancybox" href="<?php echo $textbox['overlay_image']['url']; ?>">
							<?php }?>
								
							<?php echo $textbox['link_text']; ?>
							
							</a></div>
					<?php } ?>
					
					
					
				</div>

				
				<div class="imagebox" style="background-image: url(<?php echo $imagebox['image']['url']; ?>)">

				<?php if($textbox['link_text']) { ?>
					<?php if($textbox['link_type'] == "external"){ ?>
						<a href="<?php echo $textbox['link']['url']; ?>">
					<?php }?>
							
					<?php if($textbox['link_type'] == "video"){ ?>
						<a class="videofancybox" href="http://player.vimeo.com/video/<?php echo $textbox['text_vimeo_code']; ?>?&autoplay=1">
					<?php }?>

					<?php if($textbox['link_type'] == "image"){ ?>
						<a class="fancybox" href="<?php echo $textbox['overlay_image']['url']; ?>">
					<?php }?>
				<?php } ?>

					<?php if($imagebox['add_play_button']) { ?>
						<div class="image-arrow">
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 97.46 97.46"><defs>
							<style>.cls-1,.cls-7{fill:none;}.cls-2{isolation:isolate;}.cls-3{clip-path:url(#clip-path);}.cls-4{mix-blend-mode:multiply;}.cls-5{clip-path:url(#clip-path-3);}.cls-7{stroke:#fff;stroke-miterlimit:10;stroke-width:2px;}.cls-8{fill:#fff;}</style>
							<clipPath id="clip-path" transform="translate(111 61.46)"><rect class="cls-1" x="-111" y="-61.46" width="97.46" height="97.46"/></clipPath><clipPath id="clip-path-3" transform="translate(111 61.46)"><rect class="cls-1" x="-120" y="-68.46" width="115.46" height="105.46"/></clipPath></defs><title>Untitled-1</title><g class="cls-2"><g id="Layer_1" data-name="Layer 1"><g class="cls-3"><g class="cls-3"><g class="cls-4"><g class="cls-5"><path class="cls-6" style="fill:rgba(<?php echo hex2rgb($textbox['background_colour']); ?>, 0.5);" d="M-14.54-12.73A47.73,47.73,0,0,1-62.27,35,47.73,47.73,0,0,1-110-12.73,47.73,47.73,0,0,1-62.27-60.46,47.73,47.73,0,0,1-14.54-12.73" transform="translate(111 61.46)"/><path class="cls-7" d="M-14.54-12.73A47.73,47.73,0,0,1-62.27,35,47.73,47.73,0,0,1-110-12.73,47.73,47.73,0,0,1-62.27-60.46,47.73,47.73,0,0,1-14.54-12.73Z" transform="translate(111 61.46)"/></g></g></g><polyline class="cls-8" points="35.71 73.69 73.38 48.78 35.71 23.77"/><g class="cls-3"><path class="cls-7" d="M-14.54-12.73A47.73,47.73,0,0,1-62.27,35,47.73,47.73,0,0,1-110-12.73,47.73,47.73,0,0,1-62.27-60.46,47.73,47.73,0,0,1-14.54-12.73Z" transform="translate(111 61.46)"/></g></g></g></g></svg>
						</div>
					<?php } ?>
				</a>
				</div>
				

			</div>
		<?php $count++; if($count == 3){ $count = 1; } ?>
		<?php endwhile; ?>

		</div>

	<?php endif; ?>



	<?php if( have_rows('image_overlay_blocks') ): ?>

		<div class="hp-blocks-row-container">
		<div class="hp-blocks-row scrolldiv column3">
		<?php while( have_rows('image_overlay_blocks') ): the_row(); 

			$image = get_sub_field('image');
			$text = get_sub_field('text');

			?>


				<div class="imagebox overlay" style="background-image: url(<?php echo $image['url']; ?>)">
					<div class="overlay-text"><span><?php echo $text; ?></span></div>
				</div>


		<?php endwhile; ?>

		</div>

	<?php endif; ?>








    <?php endwhile; ?>

<?php endif; ?>      





<?php get_footer(); ?>