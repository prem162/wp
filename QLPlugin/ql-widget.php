<?php
/*
Plugin Name: test widget
Plugin URI: 
Description: This plugin adds a custom widget.
Version: 1.0
Author: 
Author URI: 
License: GPL2
*/

// The widget class

class My_Custom_Widget extends WP_Widget {

	// Main constructor
	public function __construct() {
		parent::__construct(
			'my_custom_widget',
			__( 'Ql Event Widget', 'text_domain' ),
			array( 'description' => esc_html__( 'A Qurai lab event  widget', 'text_domain' ), )
		);
	}

	// The widget form (for the backend )
	public function form( $instance ) {

		// Set widget defaults
		$defaults = array(
			'title'    => '',
			'userId' => '1',
			'eventId'=>'1',
			'order'=>'id',
			'asc'=>'1',
			'page'=>'1'


		
		);
		
		// Parse current settings with defaults
		extract( wp_parse_args( ( array ) $instance, $defaults ) ); ?>

		<?php // Widget Title ?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Widget Title', 'text_domain' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<?php // Widget userid ?>
        <p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'userid' ) ); ?>"><?php _e( 'User Id:', 'text_domain' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'userid' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'userid' ) ); ?>" type="text" value="<?php echo esc_attr( $userId ); ?>" />
		</p>
		<?php // Widget eventid ?>
        <p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'eventid' ) ); ?>"><?php _e( 'Event Id:', 'text_domain' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'eventid' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'eventid' ) ); ?>" type="text" value="<?php echo esc_attr( $eventId ); ?>" />
		</p>
		<?php // Widget sort ?>
        <p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'asc' ) ); ?>"><?php _e( 'Sort:', 'text_domain' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'asc' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'asc' ) ); ?>" type="checkbox" value="<?php echo esc_attr( $asc ); ?>" />
		</p>
		<?php // Widget sort order ?>
        <p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'order' ) ); ?>"><?php _e( 'Sort Based on:', 'text_domain' ); ?></label>
			<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'order' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'order' ) ); ?>"> 
				<option value="id">Id</option>
				<option value="views">Views</option>
				<option value="score">Score</option>	
		</select>
		</p>
		
		<?php // Widget pageno ?>
        <p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'page' ) ); ?>"><?php _e( 'Page No:', 'text_domain' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'page' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'page' ) ); ?>" type="number" value="<?php echo esc_attr( $page ); ?>" />
		</p>

		

	<?php }

	// Update widget settings
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title']    = isset( $new_instance['title'] ) ? wp_strip_all_tags( $new_instance['title'] ) : '';
		$instance['userid']=isset($new_instance['userid'])?strip_tags( $new_instance['userid'] ) : '';
		$instance['eventid']=isset($new_instance['eventid'])?strip_tags( $new_instance['eventid'] ) : '';
		$instance['asc']=isset($new_instance['asc'])?strip_tags( $new_instance['asc'] ) : 0;
		$instance['order']=isset($new_instance['order'])?strip_tags( $new_instance['order'] ) : '';
		$instance['page']=isset($new_instance['page'])?strip_tags( $new_instance['page'] ) : '';
		return $instance;
	}

	// Display the widget
	public function widget( $args, $instance ) {

		extract( $args );

		// Check the widget options
		$title    = isset( $instance['title'] ) ? apply_filters( 'widget_title', $instance['title'] ) : '';
        
		
		// WordPress core before_widget hook (always include )
		//echo $before_widget;

		// Display the widget
		echo '<div class="widget-text wp_widget_plugin_box">';

			// Display widget title if defined
			if ( $title ) {
				echo $before_title . $title . $after_title;
			}
			echo $instance['asc'];
			echo '<var id="uid" value="'.$instance['userid'].'"></var>';
			echo '<var id="eid" value="'.$instance['eventid'].'"></var><var id="asc" value="'.$instance['asc'].'"></var>';
			echo '<var id="order" value="'.$instance['order'].'"></var><var id="page" value="'.$instance['page'].'"></var>';
			echo '<p id="test"></p>';
		echo '</div><script>myFunction();</script>';

		// WordPress core after_widget hook (always include )
		echo $after_widget;

	}

}

// Register the widget
function my_register_custom_widget() {
	register_widget( 'My_Custom_Widget' );
}
add_action( 'widgets_init', 'my_register_custom_widget' );
?>