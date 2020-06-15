<?php
    get_header();
?>    
    <div id="primary" class="content-area">
		<main id="main" class="site-main">

        <section class="about-image-section">
            <div class="about-1">
                <img src="<?php echo get_template_directory_uri() . '/assets/images/about-2.jpg'?>;" alt="">
            </div>
            <div class="about-1 top-margin">
                <img src='<?php echo get_template_directory_uri() . '/assets/images/about-1.jpg'?>;' alt="">
            </div>
        </section>
		<section class="about">
            <h1>About us</h1>
            <div class="intro">        
                <p>P.L.E.M.E was born in 2018 in Bosnia & Herzegovina with the enthusiasm of designing a simple, day to day, feminine jewelry. We bet on a minimalistic approach with a touch of boldness. Following trends, we establish our own with geometric designs and collections in constant growth. The goal of P.L.E.M.E is to design small treasures for all women providing a daily dose of luxury.</p>
            </div>
            <h1>The story</h1>
            <div class="image-story-section">
                <div class="image-story-1">
                    <img src='<?php echo get_template_directory_uri() . '/assets/images/story.jpg'?>;' alt="">
                </div>
                <div class="image-story-1 black-image">
                    <img src='<?php echo get_template_directory_uri() . '/assets/images/story-girl.jpg'?>;' alt="">
                </div>
                <div class="image-story-2">
                    <img src='<?php echo get_template_directory_uri() . '/assets/images/story-girl.jpg'?>;' alt="">
                </div>
            </div>
            <div class="intro story">
                <p>
                P.L.E.M.E embraces a kind of femininity that escapes from conventions: built upon a set of powerful beliefs, we seek to redefine what it means to be a woman: a duality of forces that, far from being antagonistic, coexist in balance. We believe in women’s self-expression making us strive to exceed expectations by creating unique trend-setting jewels, along with a remarkable design. Every collection manifests the creation of a new world, designed for today’s women: elegant, simple and independent.
                </p>
            </div>
        </section>

		</main><!-- #main -->
    </div><!-- #primary -->
    <aside id="secondary">
        <?php dynamic_sidebar('sidebar'); ?>
    </aside>
    
<?php  
    get_footer();
?>