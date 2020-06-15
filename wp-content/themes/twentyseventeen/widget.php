<?php 
    // Prevent direct file access
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class My_Widget extends WP_Widget {
    /**
    * 1. Definise se ime slug-a widget-a
    */
    protected $widget_slug = 'my_widget';

    /**
    * 2. Vraca definisani widget slug za koriscenje unutar nase custom klase
    *
    * @return string - ime widget slug-a koji smo mi prethodno definisali
    */
    public function get_widget_slug() {
       return $this->widget_slug;
    }

    /** 3. Konstruktorska funkcija */
    public function __construct() {
        /** 3.1. Kaci na udicu funkciju "widget_textdomain" koja ucitava textdomain  */
        add_action( 'init', array( $this, 'widget_textdomain' ) );

        /** 3.2 Pridruzuje vrednosti koje mi zelimo promenjivama Superklase "WP_Widget" */
        parent::__construct(
           $this->get_widget_slug(),                                 // $id_base - iz superklase
           __( 'My Widget', $this->get_widget_slug() ),  // $name - iz superklase
           array(                                                    // $widget_options - iz superklase
             'classname'   => $this->get_widget_slug() . 'my-widget',  //  naziv CSS klase
             'description' => __( 'Kratak opis widget-a.', $this->get_widget_slug() ) //Opis widget-a
           )
        );

        /** 3.3 Kači na različite udice funkciju  "flush_widget_cache()" */
        add_action( 'save_post',    array( $this, 'flush_widget_cache' ) );
        add_action( 'deleted_post', array( $this, 'flush_widget_cache' ) );
        add_action( 'switch_theme', array( $this, 'flush_widget_cache' ) );
    } // end 1. Constructor

    /**
    * 4. Funkcija "form" - u okviru Admin stranice stampa izgled widget forme kada se widget prevuce u widget oblast
    *
    * @param array $instance The array of keys and values for the widget.
    */
    public function form( $instance ) {
       // TODO: dodati_kod koji definise niz "$defaults" sa defaultnim vrednostima widgeta
       $defaults = array(
         'title' => 'My widget',
         'first_name' => 'Milana',
         'last_name' => 'Maksimovic'
       );

       // Konvertovanje (eng.casting)  $instance  u niz i spajanje sa nizom $defaults
       $instance = wp_parse_args(
                                  (array) $instance,
                                  $defaults
       ); 

        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( $defaults['title'], 'text_domain' ); 
        $first_name = ! empty( $instance['first_name'] ) ? $instance['first_name'] : esc_html__( $defaults['first_name'], 'text_domain' ); 
        $last_name = ! empty( $instance['last_name'] ) ? $instance['last_name'] : esc_html__(  $defaults['last_name'], 'text_domain' ); ?>
    
       <!-- // TODO: dodati_kod koji pravi formu -->
        <p>
        <label for="<?php echo esc_attr($this->get_field_id( "title" )); ?>"><?php _e( "Title:","wpp" ); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id( "title" )); ?>" name="<?php echo esc_attr($this->get_field_name( "title" )); ?>" type="text" value="<?php echo esc_attr( $title); ?>" />
        </p>
        <p>
        <label for="<?php echo esc_attr($this->get_field_id( "first_name" )); ?>"><?php _e( "First name:","wpp" ); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id( "first_name" )); ?>" name="<?php echo esc_attr($this->get_field_name( "first_name" )); ?>" type="text" value="<?php echo esc_attr( $first_name); ?>" />
        </p>
        <p>
        <label for="<?php echo esc_attr($this->get_field_id( "last_name" )); ?>"><?php _e( "Last name:","wpp" ); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id( "last_name" )); ?>" name="<?php echo esc_attr($this->get_field_name( "last_name" )); ?>" type="text" value="<?php echo esc_attr($last_name); ?>" />
        </p>

       <?php
  
    } // end Function form 

    
    /**
    * 5. Funkcija  "upadate" se aktivira svaki put kad stisnemo "save" widget u back-endu.
    *    Ostavlje vidljivu vrednost nekog polja ako je uneta i nakon "save"
    *    Sadrzi procese koji prethode cuvanju widget-a kao sto je validacija...
    *
    * @param array $new_instance - nova vrednost instance generisana via the update.
    * @param array $old_instance - prethodna vrednost instance  pre update.
    *
    * @return array $instance - update-ovanu  i validiranu instancu
    */
    public function update( $new_instance, $old_instance ) {

       // TODO: dodati_kod koji obicno radi validaciju vrednosti  unetih preko forme ($new_instance)
       $instance = array();
       $instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
       $instance['first_name'] = ( !empty( $new_instance['first_name'] ) ) ? strip_tags( $new_instance['first_name'] ) : '';
       $instance['last_name'] = ( !empty( $new_instance['last_name'] ) ) ? strip_tags( $new_instance['last_name'] ) : '';

       return $instance;
    } // end Function widget

    /**
    * 6. Funkcija "widget" stampa sadrzaj widgeta na stranici korisnika
    *
    * @param array $args     - niz elemenata forme
    * @param array $instance - trenutna instanca widgeta
    *
    * @return int
    */
 
    public function widget( $args, $instance ) {

        $args = array(
            'before_title' => '<h4>',
            'after_title' => '</h4>',
            'before_name' => '<label>',
            'after_name' => '</label>',
            'before_widget' => '<form>' ,
            'after_widget' => '</form>'
        );


        // 6.1  Deo vezan za Keširanje - Check if there is a cached output
        $cache = wp_cache_get( $this->get_widget_slug(), 'widget' );

        if ( !is_array( $cache ) )
         $cache = array();
        if ( ! isset ( $args['widget_id'] ) )

        if ( isset ( $cache[ $args['widget_id'] ] ) )
         return print $cache[ $args['widget_id'] ];

       /** 6.2 Pravi promenjive od niza unetih podataka (elemenata forme) preko parametra funkcije $args
       *      (Pravi $before_widget, $after_widget, $before_title, $after_title  (defined by themes).
       */
       extract( $args, EXTR_SKIP );

       /**
        * 6.3 stampanje izgleda widgeta
        */
        echo $args['before_widget'];

         //$widget_string = $before_widget;
         if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }
        if ( ! empty( $instance['first_name'] ) ) {
            echo $args['before_name'] . apply_filters( 'widget_title', $instance['first_name'] ) . $args['after_name'];
        }
        if ( ! empty( $instance['last_name'] ) ) {
            echo $args['before_name'] . apply_filters( 'widget_title', $instance['last_name'] ) . $args['after_name'];
        }
       
        
        echo $args['after_widget'];


         ob_start();
         // TODO: dodati_kod - deo vezan za stampanje widgeta na javnoj korisinčkoj strani
         // NAPOMENA: ovde moze da se uradi jednostavna konkatenacija stringa umesto funkcija "ob_start() i ob_get-clean()"
         $widget_string .= ob_get_clean();

         $widget_string .= $after_widget;

         print $widget_string;

         // drugi deo dela vezanog za kesiranje
         $cache[ $args['widget_id'] ] = $widget_string;
         wp_cache_set( $this->get_widget_slug(), $cache, 'widget' );

    } // end Function "widget"

    // 7. funkcija za brisanje keširanja
    public function flush_widget_cache()
    {
        wp_cache_delete( $this->get_widget_slug(), 'widget' );
    } //end Function "flush_widget_cashe"

    /**
    * 8. Funkcija "widget_textdomain" - ucitava Widget's text domain za prevodjenje iz foldera "lang"
    */
    public function widget_textdomain() {

	    // TODO be sure to change 'widget-name' to the name of *your* plugin
	    load_plugin_textdomain( $this->get_widget_slug(), false, plugin_dir_path( __FILE__ ) . 'lang/' );

    } // end Function "widget_textdomain"

} // end class

add_action( 'widgets_init', create_function( '', 'register_widget("My_Widget");' ) ); 

?>