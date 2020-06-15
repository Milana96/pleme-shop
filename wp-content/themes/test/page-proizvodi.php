<?php
/**
 * Template Name: Proizvodi
 */

get_header(); ?>

<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
    <?php
        $args = array(
            'post_type' => 'proizvodi'    
        );
        $query = new WP_Query( $args );
    ?>

    <?php if ( $query->have_posts() ) : ?>
 
    <!-- the loop -->
    <div class="container">
        <div class="row">
            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                <div class="col-md-4">
                    <?php
                        if(!empty(get_the_post_thumbnail_url(get_the_ID(),'thumbnail'))) 
                            echo '<img src="'. get_the_post_thumbnail_url(get_the_ID(),'thumbnail') .'" alt="">';
                        else
                            echo '<img src="'. get_template_directory_uri() .'/assets/images/No-image-available.jpg" alt="">';
                    ?>
                    <h2 class="open-popup" data-id="#popup-<?= get_the_ID() ?>" 
                        data-toggle="modal" data-target="#myModal"><?php the_title(); ?>
                    </h2>

                    <div id="myModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Modal Header</h4>
                                </div>
                                <div class="modal-body">
                                    <?= get_the_content(get_the_ID()) ?>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
    <!-- end of the loop -->
 
    <!-- pagination here -->
 
    <?php wp_reset_postdata(); ?>
 
    <?php else : ?>
        <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
    <?php endif; ?>

			
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php
get_footer();
