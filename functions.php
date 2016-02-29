<?php

// Register custom navigation walker
    require_once('wp_bootstrap_navwalker.php');


/**
 * Register widgetized area and update sidebar with default widgets.
 */

function ipacs_widgets_init() {    

    register_sidebar(array(
        'name' => __('Content blocks', 'ipacs-lite'),
        'id' => 'ipacs-content-blocks',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => __('Sidebar', 'zerif-lite'),
        'id' => 'sidebar-1',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => __('About us section', 'zerif-lite'),
        'id' => 'sidebar-aboutus',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h1 class="widget-title">',
        'after_title' => '</h1>',
    ));

    register_sidebars( 
        3, 
        array(
            'name'          => __('Footer area %d','zerif-lite'),
            'id'            => 'zerif-sidebar-footer',
            'before_widget' => '<aside id="%1$s" class="widget footer-widget-footer %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h1 class="widget-title">',
            'after_title'   => '</h1>'
        ) 
    );
    
}

add_action('widgets_init', 'ipacs_widgets_init');


/*****************************************/
/******          WIDGETS     *************/
/*****************************************/
add_action('widgets_init', 'ipacs_register_widgets');

function ipacs_register_widgets() {    
    register_widget('ipacs_jumbotron_1');
/*
        register_sidebar(
            array (
                'name'          => 'ipacs_jumbotron_1',
                'id'            => 'ipacs_jumbotron_1',
                'before_widget' => '',
                'after_widget'  => ''
            )
        );
*/
}

/**************************/
/****** jumbotron_1 widget */
/************************/

add_action('admin_enqueue_scripts', 'ipacs_jumbotron_1_widget_scripts');

function ipacs_jumbotron_1_widget_scripts() {    
//	wp_enqueue_media();
//	wp_enqueue_script('zerif_our_focus_widget_script', get_template_directory_uri() . '/js/widget.js', false, '1.0', true);
}

class ipacs_jumbotron_1 extends WP_Widget {
	
	public function __construct() {
		parent::__construct(
			'ctUp-ads-widget',
			__( 'IPACS Jumbotron_1 widget', 'ipacs-lite' )
		);
	}

    function widget($args, $instance) {
        extract($args);
        echo $before_widget;
        ?>

<div cclass="container">
  <div class="jumbotron jumbotron_1">
      <h4>
			<?php 
				if( !empty($instance['subtitle']) ):
					echo htmlspecialchars_decode(apply_filters('widget_title', $instance['subtitle']));
				endif;
			?> 
      </h4>
      <h1>
			<?php 
				if( !empty($instance['title']) ):
					echo htmlspecialchars_decode(apply_filters('widget_title', $instance['title']));
				endif;
			?> 
      </h1>
      <p>
			<?php 
				if( !empty($instance['text']) ):
					echo htmlspecialchars_decode(apply_filters('widget_title', $instance['text']));
				endif;
			?> 
      </p>
  </div>
</div>
        <?php
        echo $after_widget;
    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['text'] = stripslashes(wp_filter_post_kses($new_instance['text']));
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['subtitle'] = strip_tags($new_instance['subtitle']);
//		$instance['link'] = strip_tags( $new_instance['link'] );
//        $instance['image_uri'] = strip_tags($new_instance['image_uri']);
        return $instance;
    }

    function form($instance) {
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'ipacs-lite'); ?></label><br/>
            <input type="text" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" value="<?php if( !empty($instance['title']) ): echo $instance['title']; endif; ?>" class="widefat">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('subtitle'); ?>"><?php _e('Subtitle', 'ipacs-lite'); ?></label><br/>
            <input type="text" name="<?php echo $this->get_field_name('subtitle'); ?>" id="<?php echo $this->get_field_id('subtitle'); ?>" value="<?php if( !empty($instance['subtitle']) ): echo $instance['subtitle']; endif; ?>" class="widefat">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('text'); ?>"><?php _e('Text', 'ipacs-lite'); ?></label><br/>
            <textarea class="widefat" rows="8" cols="20" name="<?php echo $this->get_field_name('text'); ?>" id="<?php echo $this->get_field_id('text'); ?>"><?php if( !empty($instance['text']) ): echo htmlspecialchars_decode($instance['text']); endif; ?></textarea>
        </p>
    <?php
    }
}

?>
