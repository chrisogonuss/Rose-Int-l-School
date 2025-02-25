<?php 
/**
 * Template part for displaying Featured Classes Section
 *
 *@package Galaxy Preschool
 */
    $featured_classes_section_title           = galaxy_preschool_get_option( 'featured_classes_section_title' );
    $featured_classes_column                  = galaxy_preschool_get_option( 'featured_classes_column' );
    $featured_classes_content_type            = galaxy_preschool_get_option( 'featured_classes_content_type' );
    $number_of_featured_classes_items         = galaxy_preschool_get_option( 'number_of_featured_classes_items' );

    if( $featured_classes_content_type == 'featured_classes_page' ) :
        for( $i=1; $i<=$number_of_featured_classes_items; $i++ ) :
            $featured_classes_posts[] = absint( galaxy_preschool_get_option( 'featured_classes_page_'.$i ) );
        endfor;  
    elseif( $featured_classes_content_type == 'featured_classes_post' ) :
        for( $i=1; $i<=$number_of_featured_classes_items; $i++ ) :
            $featured_classes_posts[] = absint( galaxy_preschool_get_option( 'featured_classes_post_'.$i ) );
        endfor;
    endif;
    ?>

    <?php if( !empty($featured_classes_section_title) ):?>
        <div class="section-header">
            <h2 class="section-title"><?php echo esc_html($featured_classes_section_title);?></h2>
        </div><!-- .section-header -->
    <?php endif;?>

    <?php if( $featured_classes_content_type == 'featured_classes_page' ) : ?>
        <div class="section-content <?php echo esc_attr($featured_classes_column); ?> clear">
            <?php $args = array (
                'post_type'     => 'page',
                'posts_per_page' => absint( $number_of_featured_classes_items ),
                'post__in'      => $featured_classes_posts,
                'orderby'       =>'post__in',
            );        
            $loop = new WP_Query($args);                        
            if ( $loop->have_posts() ) :
            $i=-1; $j=0; 
                while ($loop->have_posts()) : $loop->the_post(); $i++; $j++; ?>             
                
                <article class="<?php echo has_post_thumbnail() ? 'has-post-thumbnail' : 'no-post-thumbnail'; ?>">
                    <div class="featured-classes-item">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="featured-image">
                                <a href="<?php the_permalink();?>"><?php the_post_thumbnail(); ?></a>
                            </div><!-- .featured-image -->
                        <?php endif; ?>

                        <div class="entry-container">
                            <header class="entry-header">
                                <h2 class="entry-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                            </header>

                            <div class="entry-content">
                                <?php
                                    $excerpt = galaxy_preschool_the_excerpt( 20 );
                                    echo wp_kses_post( wpautop( $excerpt ) );
                                ?>
                            </div><!-- .entry-content -->
                        </div><!-- .entry-container -->
                    </div><!-- .featured-classes-item -->
                </article>

                <?php endwhile; ?>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
        </div><!-- .section-content -->
    
    <?php else: ?>
        <div class="section-content <?php echo esc_attr($featured_classes_column); ?> clear">
            <?php $args = array (
                'post_type'     => 'post',
                'posts_per_page' => absint( $number_of_featured_classes_items ),
                'post__in'      => $featured_classes_posts,
                'orderby'       =>'post__in',
                'ignore_sticky_posts' => true,
            );        
            $loop = new WP_Query($args);                        
            if ( $loop->have_posts() ) :
            $i=-1; $j=0; 
                while ($loop->have_posts()) : $loop->the_post(); $i++; $j++; ?>                
                
                <article class="<?php echo has_post_thumbnail() ? 'has-post-thumbnail' : 'no-post-thumbnail'; ?>">
                    <div class="featured-classes-item">
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
                                <h2 class="entry-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                            </header>

                            <div class="entry-content">
                                <?php
                                    $excerpt = galaxy_preschool_the_excerpt( 20 );
                                    echo wp_kses_post( wpautop( $excerpt ) );
                                ?>
                            </div><!-- .entry-content -->
                        </div><!-- .entry-container -->
                    </div><!-- .featured-classes-item -->
                </article>

                <?php endwhile; ?>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
        </div><!-- .section-content -->
    <?php endif;