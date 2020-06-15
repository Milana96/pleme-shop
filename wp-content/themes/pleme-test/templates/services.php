<?php

/**
 * Template Name: Services
 */
get_header();
?>
<?php
$classes = '';
$services = get_field('services');
$show_heading_1 = get_field('show_heading_1');
$show_heading_2 = get_field('show_heading_2');
$contact = get_field('contact');

$class_1 .= $show_heading_1 ? '' : 'show_heading';
$class_2 .= $show_heading_2 ? '' : 'show_heading';
?>

<div class="content-area">
    <main class="site-main">
        <div class="contact_style" id="services">
            <div class="services">
                <?php echo '<h1 class="service privacy-extended">' . $services['heading_1'] . '</h1>' ?>
                <?php echo '<p>' . $services['text_1'] . '</p>' ?>
                <?php echo '<h1 class="service extended">' . $services['heading_2'] . '</h1>' ?>
                <?php echo '<p>' . $services['text_2'] . '</p>' ?>
                <h1 class="service extended <?php echo $class_1?>">
                    <?php echo $services['heading_3'] ?>
                </h1>
                <?php echo '<p>' . $services['text_3'] . '</p>' ?>
                <h1 class="service extended <?php echo $class_2?>">
                    <?php  echo $services['heading_4'] ?>
                </h1>
                <?php echo '<p>' . $services['text_4'] . '</p>' ?>
            </div>
            <div class="contact">
                <?php echo '<h3>' . $contact['heading'] . '</h3>' ?>
                <?php echo '<p>' . $contact['address_1'] . '</p>' ?>
                <?php echo '<p>' . $contact['address_2'] . '</p>' ?>
                <?php echo '<p class="service">' . $contact['email_heading'] . '</p>' ?>
                <?php echo '<p>' . $contact['email'] . '</p>' ?>
                <?php echo '<h6 class="service">' . $contact['working_hour'] . '</h6>' ?>
                <?php echo '<p>' . $contact['days'] . '</p>' ?>
                <?php echo '<p>' . $contact['hours'] . '</p>' ?>
            </div>
        </div>
    </main>
</div>
<?php
    get_footer();
?>