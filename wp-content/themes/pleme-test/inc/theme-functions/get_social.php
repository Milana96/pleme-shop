<?php

/**************************************************
 * Call social media from customizer
 **************************************************/
function get_theme_social()
{

    $socials =  [
        [
            'label' => 'Facebook',
            'img' => 'theme_fb_media_img',
            'url' => 'theme_fb_media_url',
            'kamaengine_url' => 'https://www.facebook.com/',
            'kamaengine_icon' => '<i class="fab fa-facebook"></i>',
        ],
        [
            'label' => 'Instagram',
            'img' => 'theme_insta_media_img',
            'url' => 'theme_insta_media_url',
            'kamaengine_url' => 'https://www.instagram.com/',
            'kamaengine_icon' => '<i class="fab fa-instagram"></i>',
        ],
        [
            'label' => 'Twitter',
            'img' => 'theme_tw_media_img',
            'url' => 'theme_tw_media_url',
            'kamaengine_url' => 'https://twitter.com/',
            'kamaengine_icon' => '<i class="fab fa-twitter"></i>',
        ],
        [
            'label' => 'LinkedIn',
            'img' => 'theme_in_media_img',
            'url' => 'theme_in_media_url',
            'kamaengine_url' => 'https://www.linkedin.com/',
            'kamaengine_icon' => '<i class="fab fa-linkedin-in"></i>',
        ],
        [
            'label' => 'YouTube',
            'img' => 'theme_yt_media_img',
            'url' => 'theme_yt_media_url',
            'kamaengine_url' => 'https://www.youtube.com/',
            'kamaengine_icon' => '<i class="fab fa-youtube"></i>',
        ],
        [
            'label' => 'Google',
            'img' => 'theme_g_media_img',
            'url' => 'theme_g_media_url',
            'kamaengine_url' => 'https://www.google.com/',
            'kamaengine_icon' => '<i class="fab fa-google"></i>',
        ],
        [
            'label' => 'Snapchat',
            'img' => 'theme_snap_media_img',
            'url' => 'theme_snap_media_url',
            'kamaengine_url' => 'https://www.snapchat.com/',
            'kamaengine_icon' => '<i class="fab fa-snapchat-ghost"></i>',
        ],
        [
            'label' => 'Tumblr',
            'img' => 'theme_tumblr_media_img',
            'url' => 'theme_tumblr_media_url',
            'kamaengine_url' => 'https://www.tumblr.com/',
            'kamaengine_icon' => '<i class="fab fa-tumblr"></i>',
        ],
        [
            'label' => 'Pinterest',
            'img' => 'theme_pinterest_media_img',
            'url' => 'theme_pinterest_media_url',
            'kamaengine_url' => 'https://www.pinterest.com/',
            'kamaengine_icon' => '<i class="fab fa-pinterest"></i>',
        ],
        [
            'label' => 'Reddit',
            'img' => 'theme_reddit_media_img',
            'url' => 'theme_reddit_media_url',
            'kamaengine_url' => 'https://www.reddit.com/',
            'kamaengine_icon' => '<i class="fab fa-reddit-alien"></i>',
        ],
        [
            'label' => 'Flickr',
            'img' => 'theme_flickr_media_img',
            'url' => 'theme_flickr_media_url',
            'kamaengine_url' => 'https://www.flickr.com/',
            'kamaengine_icon' => '<i class="fab fa-flickr"></i>',
        ],
        [
            'label' => 'Behance',
            'img' => 'theme_behance_media_img',
            'url' => 'theme_behance_media_url',
            'kamaengine_url' => 'https://www.behance.net/',
            'kamaengine_icon' => '<i class="fab fa-behance"></i>',
        ],
    ];

    $string = '';
    $string .= '<div class="social-wrapper">';
    $string .= '<h4>Zaprati nas</h4>';
    $string .= '<ul class="social-list">';

    foreach ($socials as $key => $social) {
        if (get_theme_mod($social['url'])) {
            $url = get_theme_mod($social['url']);
            $kamaengine_url = $social['kamaengine_url'];

            if ($url != $kamaengine_url and $url != '') {
                $img = get_theme_mod($social['img']);
                $default_icon = $social['kamaengine_icon'];
                $label = $social['label'];

                $icon =  $img and $img != '' and $img != null ? '<img src="' . $img . '" alt="' . $label . '" />' : $default_icon;

                $string .= '<li class="social-item social-item-' . strtolower($social['label']) . '">';
                $string .= '<a class="social-link" href="' . $url . '">';
                $string .= '<span class="social-icon">';
                if ($img) {
                    $string .= '<img class="convert-svg" src="' . $img . '" alt="' . $label . '" />';
                } else {
                    $string .= $default_icon;
                }
                $string .= '</span>';
                $string .= '</a>'; 
                $string .= '<p>' . $label . '</p>';
                $string .= '</li>';
              
            }
        }
    }
    $string .= '</ul>';
    $string .= '</div>';
    return $string;
}
function the_theme_social()
{
    echo get_theme_social();
}
