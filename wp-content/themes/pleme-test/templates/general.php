<?php

/**
 * Template Name: About
 */

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <?php while (have_posts()) : the_post();
            get_template_part('template-parts/about/content', 'about');
        ?>
            <div class="about">
                <?php
                get_template_part('template-parts/about/content', 'intro');
                get_template_part('template-parts/about/content', 'story');
                get_template_part('template-parts/about/content', 'behind');
                get_template_part('template-parts/about/content', 'commitment');
                ?>
            </div> 
        <?php
        endwhile; ?>
    </main><!-- #main -->
</div>
<!--

<?php
get_footer();
?>