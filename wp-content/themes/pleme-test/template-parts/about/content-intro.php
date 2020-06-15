<?php
if (have_rows('heading_text_section')) :
    while (have_rows('heading_text_section')) : the_row();
        // Case: general layout.

        if (get_row_layout() == 'general') :
            $heading = get_sub_field('heading');
            ?>
            <h1 class="heading-about"><?php echo esc_html($heading); ?></h1>
        <?php
        endif;
        // Case: general layout.
        if (get_row_layout() == 'general') :
            $intro = get_sub_field('text');
        ?>
            <div class="intro">
                <p><?php echo esc_html($intro); ?></p>
            </div>
        <?php
        endif;
        if (get_row_layout() == 'general') :
            $heading_2 = get_sub_field('heading_2');
        ?>

            <h1 class="heading-about"><?php echo esc_html($heading_2); ?></h1>

<?php
        endif;
    endwhile;
endif;
?>