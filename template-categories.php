<?php

/**
 * Template Name: Categories
 *
 * @author RAMSTHEMES
 */
get_header(); 

?>	

<div class="wrapper">

	<!-- Sidenav -->   
	
	<?php if ( 1 == get_field('display_sidenav', 'option') ) :
	
		zettaiwp_sidenav();
		
	endif; ?>	

	<!-- Content -->   

	<div id="page-content-wrapper">
		
		<div class="col">		
			<h3 class="my-3"><?php the_title(); ?></h3>
			<div class="line my-3"></div>
		</div>
		
		<div class="col">
		
			<?php $terms = get_categories(); ?>	

			<div class="row">					
										
				<?php foreach( $terms as $term ): ?>
				
				<div class="col-6 col-md-4 col-xl-2 p-3 post">
					<div class="img__wrap mb-3">							
						<a href="<?php echo get_term_link( $term ); ?>">						
							
							<?php 
								$thumb_id = get_term_meta ( $term->term_id, 'thumbnail_staff', true ); 
								$taximg = wp_get_attachment_image($thumb_id, 'thumbnail',  "", array('class' => 'img-fluid shadow-sm'));								 
								if ( $taximg != '' ) {
									echo $taximg;
								} else { 
									zettaiwp_default_img_placeholder();
								}; 
							?>
							
						</a>
					</div>
					<div class="p-2 text-center">
						<h6><a href="<?php echo get_term_link( $term ); ?>"><?php echo esc_attr ($term->name); ?></a></h6>		
					</div>
				</div>

				<?php endforeach; ?>

			</div>   
		
		</div>

	</div>

</div>

<?php get_footer(); 