<?php 
/**
 * Template part for displaying Blog Section
 *
 *@package Galaxy Preschool
 */
?>
<?php 
    $featured_posts_section_title      = galaxy_preschool_get_option( 'featured_posts_section_title' );
	$featured_posts_category 		   = galaxy_preschool_get_option( 'featured_posts_category' );
	$featured_posts_number		       = galaxy_preschool_get_option( 'featured_posts_number' );
    $featured_posts_column             = galaxy_preschool_get_option( 'featured_posts_column' );
?> 
    <?php if( !empty($featured_posts_section_title) ):?>
        <div class="section-header">
            <h2 class="section-title"><?php echo esc_html($featured_posts_section_title);?></h2>
        </div><!-- .section-header -->
    <?php endif;?>

  	<div class="section-content <?php echo esc_attr($featured_posts_column); ?> clear">
	  	<?php
			$featured_posts_args = array(
				'posts_per_page' =>absint( $featured_posts_number ),				
				'post_type' => 'post',
	            'post_status' => 'publish',
	            'paged' => 1,
				);

				if ( absint( $featured_posts_category ) > 0 ) {
					$featured_posts_args['cat'] = absint( $featured_posts_category );
				}
			
			$loop = new WP_Query( $featured_posts_args );
			
			if ( $loop->have_posts() ) : 
			$i=-1; $j=0;	
				while ( $loop->have_posts() ) : $loop->the_post(); $i++; $j++; ?>    

			    <article class="<?php echo has_post_thumbnail() ? 'has-post-thumbnail' : 'no-post-thumbnail'; ?>">
			    	<div class="post-item">
				      	<?php if ( has_post_thumbnail() ) : ?>
                            <div class="featured-image">
                                <a href="<?php the_permalink();?>"><?php the_post_thumbnail(); ?></a>
                            </div><!-- .featured-image -->
                        <?php endif; ?>

				    	<div class="entry-container">
				    		<div class="entry-meta">
                                <?php galaxy_preschool_entry_meta(); ?>
                            </div><!-- .entry-meta -->
					        
					        <header class="entry-header">
								<h2 class="entry-title">
									<a href="<?php the_permalink();?>"><?php the_title();?></a>
								</h2>
					        </header>

					        <div class="entry-content">
			 				    <?php
									$excerpt = galaxy_preschool_the_excerpt( 15 );
									echo wp_kses_post( wpautop( $excerpt ) );
								?>
					        </div><!-- .entry-content -->

					        <?php $readmore_text = galaxy_preschool_get_option( 'readmore_text' );?>
                            <?php if (!empty($readmore_text) ) :?>
                                <div class="read-more">
                                    <a href="<?php the_permalink();?>" class="btn"><?php echo esc_html($readmore_text);?></a>
                                </div><!-- .read-more -->
                            <?php endif; ?>
				        </div><!-- .entry-container -->
				    </div><!-- .post-item -->
			    </article>
		    	<?php endwhile;?>
	    	<?php endif; ?>
		<?php wp_reset_postdata(); ?>
  	</div><!-- .section-content -->