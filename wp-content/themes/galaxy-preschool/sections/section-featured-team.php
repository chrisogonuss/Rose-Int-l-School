<?php 
/**
 * Template part for displaying Featured Team Section
 *
 *@package Galaxy Preschool
 */
    $featured_team_section_title           = galaxy_preschool_get_option( 'featured_team_section_title' );
    $featured_team_content_type            = galaxy_preschool_get_option( 'featured_team_content_type' );
    $number_of_featured_team_items         = galaxy_preschool_get_option( 'number_of_featured_team_items' );
    $featured_team_column                  = galaxy_preschool_get_option( 'featured_team_column' );

    if( $featured_team_content_type == 'featured_team_page' ) :
        for( $i=1; $i<=$number_of_featured_team_items; $i++ ) :
            $featured_team_posts[] = absint( galaxy_preschool_get_option( 'featured_team_page_'.$i ) );
        endfor;  
    elseif( $featured_team_content_type == 'featured_team_post' ) :
        for( $i=1; $i<=$number_of_featured_team_items; $i++ ) :
            $featured_team_posts[] = absint( galaxy_preschool_get_option( 'featured_team_post_'.$i ) );
        endfor;
    endif;
    ?>

    <?php if( !empty($featured_team_section_title) ):?>
        <div class="section-header">
            <h2 class="section-title"><?php echo esc_html($featured_team_section_title);?></h2>
        </div><!-- .section-header -->
    <?php endif;?>

    <?php if( $featured_team_content_type == 'featured_team_page' ) : ?>
        <div class="section-content" data-slick='{"slidesToShow": <?php echo esc_attr($featured_team_column); ?>, "slidesToScroll": 1, "infinite": false, "speed": 1000, "dots": true, "arrows": false, "autoplay": false, "fade": false }'>
            <?php $args = array (
                'post_type'     => 'page',
                'posts_per_page' => absint( $number_of_featured_team_items ),
                'post__in'      => $featured_team_posts,
                'orderby'       =>'post__in',
            );        
            $loop = new WP_Query($args);                        
            if ( $loop->have_posts() ) :
            $i=-1; $j=0; 
                while ($loop->have_posts()) : $loop->the_post(); $i++; $j++;
                $featured_team_position[$j] = galaxy_preschool_get_option( 'featured_team_position_'.$j ); ?>            
                
                <article class="<?php echo has_post_thumbnail() ? 'has-post-thumbnail' : 'no-post-thumbnail'; ?>">
                    <div class="featured-team-item">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="featured-image">
                                <a href="<?php the_permalink();?>"><?php the_post_thumbnail(); ?></a>
                            </div><!-- .featured-image -->
                        <?php endif; ?>

                        <div class="entry-container">
                            <?php if( !empty($featured_team_position[$j]) ):?>
                                <span class="team-position"><?php echo esc_html($featured_team_position[$j]);?></span>
                            <?php endif;?>

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
                    </div><!-- .featured-team-item -->
                </article>

                <?php endwhile; ?>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
        </div><!-- .section-content -->
    
    <?php else: ?>
        <div class="section-content" data-slick='{"slidesToShow": <?php echo esc_attr($featured_team_column); ?>, "slidesToScroll": 1, "infinite": false, "speed": 1000, "dots": true, "arrows": false, "autoplay": false, "fade": false }'>
            <?php $args = array (
                'post_type'     => 'post',
                'posts_per_page' => absint( $number_of_featured_team_items ),
                'post__in'      => $featured_team_posts,
                'orderby'       =>'post__in',
                'ignore_sticky_posts' => true,
            );        
            $loop = new WP_Query($args);                        
            if ( $loop->have_posts() ) :
            $i=-1; $j=0; 
                while ($loop->have_posts()) : $loop->the_post(); $i++; $j++;
                $featured_team_position[$j] = galaxy_preschool_get_option( 'featured_team_position_'.$j ); ?>               
                
                <article class="<?php echo has_post_thumbnail() ? 'has-post-thumbnail' : 'no-post-thumbnail'; ?>">
                    <div class="featured-team-item">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="featured-image">
                                <a href="<?php the_permalink();?>"><?php the_post_thumbnail(); ?></a>
                            </div><!-- .featured-image -->
                        <?php endif; ?>

                        <div class="entry-container">
                            <?php if( !empty($featured_team_position[$j]) ):?>
                                <span class="team-position"><?php echo esc_html($featured_team_position[$j]);?></span>
                            <?php endif;?>

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
                    </div><!-- .featured-team-item -->
                </article>

                <?php endwhile; ?>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
        </div><!-- .section-content -->
    <?php endif;