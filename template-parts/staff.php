<div class="mb-5">

	<h5><?php esc_html_e( 'Staff', 'zettaiwp' ); ?></h5>

	<div class="line my-3"></div>

	<?php 
	  // loop through the repeater
	  if (have_rows('staff_select')) {
		while (have_rows('staff_select')) {
		  the_row();
		  $term = get_sub_field('select_staff');
		  // I'm assuming that the taxonomy exists
		  // change next line if that's wrong
		  $taxonomy = 'staff';
		  $termbyid = get_term_by('id', get_sub_field('select_staff'), $taxonomy);
		  $term_link = get_term_link($term, $taxonomy);
		  // assuming you're returning image array
		  $thumb_id = get_term_meta ( $termbyid->term_id, 'thumbnail_staff', true ); 
		  $taximg = wp_get_attachment_image($thumb_id, 'thumbnail',  "", array('class' => 'img-fluid rounded-circle shadow-sm')); 
		  $image = get_template_directory_uri() .'/assets/img/placeholder.jpg';
		  ?>
			
			<div class="staff-row">
			
				<div class="staff-left">
					<a href="<?php echo get_term_link( $term ); ?>">					

						<?php if ( $taximg != '' ) {
							echo $taximg;
						} else { ?>
							<?php echo '<img src="'.$image.'" class="img-fluid rounded-circle shadow-sm" />'; ?>
						<?php } ?>
					
					</a>
				</div>
				
				<div class="staff-right">		
					<a href="<?php echo $term_link; ?>"><?php echo $termbyid->name; ?></a>
					<div class="character"><?php echo the_sub_field ('position'); ?></div>		
				</div>
			
			</div>
			
		  <?php
		} // end while have rows
	  } // end have rows

	?>

</div>	