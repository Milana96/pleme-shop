<div class="image-story-section">
    <?php
    if (have_rows('flexible_2')) :
        while (have_rows('flexible_2')) : the_row();
            // Case: row section layout.
            if (get_row_layout() == 'row_section') :
                $url2 = get_sub_field('left_column');
    ?>
                <div class="image-story-1">
                    <img src='<?php echo $url2["url"] ?>' alt='<?php echo $url2["alt"] ?>' />
                </div>
            <?php
            endif;
            // Case: row section layout.
            if (get_row_layout() == 'row_section') :
                $commitment = get_sub_field('right_column');
            ?>
                <div class="commitment">
                    <p><?php echo esc_html($commitment); ?></p>
                </div>
    <?php
            endif;
        endwhile;
    endif;
    ?>
</div>