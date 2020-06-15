<div class="top-section category-page">
    <?php
    if (have_rows('shop')) :
        // Loop through rows.
        while (have_rows('shop')) : the_row();
            // Case: row section layout.
            if (get_row_layout() == 'general') :
                $half_section = get_sub_field('half_section');
    ?>

                <div class="gold-clip-section">
                    <img src='<?php echo esc_url($half_section['column_1']['url']) ?>' alt='<?php echo esc_attr($half_section['column_1']['alt']) ?>' />
                </div>
                <div class="drop-earring-section">
                    <img src='<?php echo esc_url($half_section['column_2']['url']) ?>' alt='<?php echo esc_attr($half_section['column_2']['alt']) ?>' />
                </div>
                <div class="top-section-text">
                    <h1><?php echo esc_html($half_section['top_section_text']['heading_1']); ?></h1>
                    <h4><?php echo esc_html($half_section['top_section_text']['heading_2']); ?></h4>
                </div>


    <?php
            endif;
        endwhile;
    endif;
    ?>
</div>