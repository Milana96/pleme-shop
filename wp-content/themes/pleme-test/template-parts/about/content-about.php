<div class="about-image-section" id="about">';
    <?php
    if (have_rows('flexible')) :
        // Loop through rows.
        while (have_rows('flexible')) : the_row();
            // Case: row section layout.
            if (get_row_layout() == 'row_section') :
                $url = get_sub_field('left_column');
    ?>
                <div class="about-1">
                    <img src='<?php echo esc_url($url["url"]) ?>' alt='<?php echo esc_attr($url["alt"]) ?>' />
                </div>
            <?php
            endif;
            // Case: row section layout.
            if (get_row_layout() == 'row_section') :
                $url = get_sub_field('right_column');
            ?>
                <div class="about-1 top-margin">
                    <img src='<?php echo $url["url"] ?>' alt='<?php echo $url["alt"] ?>' />
                </div>
    <?php
            endif;
        endwhile;
    endif;
    ?>
</div>