<div class="image-story-section">
    <?php
    if (have_rows('gallery')) :
        while (have_rows('gallery')) : the_row();
            // Case: general layout.
            if (get_row_layout() == 'gallery_images') :
                $url = get_sub_field('image_1');
    ?>
                <div class="image-story-1">
                    <img src='<?php echo $url["url"] ?>' alt='<?php echo $url["alt"] ?>' />
                </div>
            <?php
            endif;
            // Case: general layout.
            if (get_row_layout() == 'gallery_images') :
                $url = get_sub_field('image_2');
            ?>
                <div class="image-story-1 black-image">
                    <img src='<?php echo $url["url"] ?>' alt='<?php echo $url["alt"] ?>' />
                </div>
            <?php
            endif;
            // Case: general layout.;
            if (get_row_layout() == 'gallery_images') :
                $url = get_sub_field('image_3');
            ?>
                <div class="image-story-2">
                    <img src='<?php echo $url["url"] ?>' alt='<?php echo $url["alt"] ?>' />
                </div>
    <?php
            endif;
        endwhile;
    endif;

    ?>

</div>
<div class="intro story">
    <?php
    if (have_rows('block_content')) :
        while (have_rows('block_content')) : the_row();
            // Case: general layout.
            if (get_row_layout() == 'main') :
                $story = get_sub_field('main_section');
    ?>
                <p><?php echo esc_html($story); ?></p>
    <?php
            endif;
        endwhile;
    endif;
    ?>
</div>