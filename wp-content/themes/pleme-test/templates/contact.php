<?php

/**
 * Template Name: Contact
 */
get_header();
?>
<?php
$help = get_field('help');
$contact = get_field('contact');
$find_out = get_field('find_out');
// $sign_in = get_field('sign_in');
$video = get_field('video');
?>

<div class="content-area">
    <main class="site-main">
        <div class="contact_style" id="contact">
            <div class="contact-form">
                <div class="help">
                    <?php echo '<h1>' . $help['heading'] . '</h1>' ?>
                    <?php echo '<p>' . $help['text'] . '</p>' ?>
                    <?php echo '<p>' . $help['contact_mail'] . '</p>' ?>
                </div>
                <div class="help list">
                    <?php echo do_shortcode('[mc4wp_form id="961"]'); ?>
                </div>
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
        <div class="video">
            <?php
            echo $video;
            ?>
        </div>
    </main>
</div>
<?php
get_footer();
?>