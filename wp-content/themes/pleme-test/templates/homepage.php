<?php
/**
 * Template Name: Homepage
 */

get_header(); ?>
  <?php 
    // home page section 1 acf
    $gold_clip_section = get_field('gold_clip_section');
    $drop_earring_section = get_field('drop_earring_section');
    $top_section_text = get_field('top-section-text');
    $full_image_section = get_field('full_image_section');
    $top_section_text_2 = get_field('top_section_text_2');
    $top_section_text = get_field('top-section-text');
  // discover acf
    $slider_1 = get_field('slider_1');
    $slider_2 = get_field('slider_2');
    $slider_3 = get_field('slider_3');
    $discover_heading = get_field('discover_heading');
    $discover_link = get_field('discover_link');
    $discover_animation = get_field('discover_animation');
  // offers acf
    $quality = get_field('quality');
    $safe = get_field('safe');
    $delivery = get_field('delivery');
    $shipping = get_field('shipping');
  ?>
  <div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

      <?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/homepage/content', 'page' ); ?>
        <section class="top-section"> 
          <div class="gold-clip-section fadeIn">
            <img src="<?php echo esc_url($gold_clip_section['url']); ?>" alt="<?php echo esc_attr($gold_clip_section['alt']); ?>" />
          </div>
          <div class="drop-earring-section fadeIn">
            <img src="<?php echo esc_url($drop_earring_section['url']); ?>" alt="<?php echo esc_attr($drop_earring_section['alt']); ?>" />
          </div>
          <div class="top-section-text">
            <?php echo '<h1>' . $top_section_text . '</h1>' ?>
            <?php echo '<h4>' . $top_section_text_2 . '</h4>' ?>
          </div>
          <div class="full-image-section fade-out">
            <img src="<?php echo esc_url($full_image_section['url']); ?>" alt="<?php echo esc_attr($full_image_section['alt']); ?>" />
          </div>
        </section>

        <section class="discover">
          <div class="slider fade-out">
            <?php echo do_shortcode('[sp_wpcarousel id="171"]'); ?>
          </div>
          <div class="slider-right">
            <img src="<?php echo esc_url($discover_heading['url']); ?>" alt="<?php echo esc_attr($discover_heading['alt']); ?>" />
            <div class="slider-text">
              <h1>PROLJEĆNJI DUH</h1>
              <div class="discover-collection">
               <a class="discover-link" href="<?php echo esc_url( $discover_link_url['url'] ); ?>" >Kupuj iz udobnosti svog doma</a>
              </div>
            </div>
          </div>
        </section>

        <section class="offers">
          <div class="quality">
            <?php echo '<p>' . $quality . '</p>' ?>
          </div>
          <div class="safe">
            <?php echo '<p>' . $safe . '</p>' ?>
          </div>
          <div class="delivery">
            <?php echo '<p>' . $delivery . '</p>' ?>
          </div>
          <div class="shipping">
            <?php echo '<p>' . $shipping . '</p>' ?>
          </div>
        </section>
        <div class="heading">
          <h4>Najtraženiji proizvodi</h4>
        </div>
        <div class="most-wanted">
          <?php the_content();?>
        </div>
        
			<?php endwhile; // End of the loop. ?>

    </main><!-- #main -->
    
  </div><!-- #primary -->

<?php
  get_footer(); 
?>
