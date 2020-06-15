<?php
if (have_rows('heading_text_section_2')) :
    while (have_rows('heading_text_section_2')) : the_row();
        // Case: general layout.
        if (get_row_layout() == 'general') :
            $heading2 = get_sub_field('heading');
?>
            <h1 class="heading-about"><?php echo esc_html($heading2); ?></h1>
        <?php
        endif;
        // Case: general layout.
        if (get_row_layout() == 'general') :
            $story2 = get_sub_field('text');
        ?>
            <div class="intro story">
                <p><?php echo esc_html($story2); ?></p>
            </div>
<?php
        endif;
    endwhile;
endif;
?>