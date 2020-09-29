<?php


// Adds widget: Alarmes archives
class Alarmesarchives_Widget extends WP_Widget {

    function __construct() {
        parent::__construct(
            'alarmesarchives_widget',
            esc_html__( 'Alarmes archives', 'textdomain' )
        );
    }

    private $widget_fields = array(
        array(
            'label' => 'Link to alarmes page',
            'id' => 'linktoalarmespa_url',
            'type' => 'url',
        ),
    );

    public function widget( $args, $instance ) {
        echo $args['before_widget'];

        if ( ! empty( $instance['title'] ) ) {
            $widget_title = $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }
        $next_year = date('Y');
        $alarms = get_posts(array(
            'post_type' => 'alarm',
            'posts_per_page' => -1,
            'meta_key' => 'alarm_date',
            'orderby' => 'meta_value',
            'order' => 'DESC'
        ));
        $years = [];
        foreach ($alarms as $alarm) {
            $alarm_date = date_create(get_field('alarm_date', $alarm->ID));
            $current_year = date_format($alarm_date, 'Y');
            if ($current_year < $next_year) {
                $next_year = $current_year;
                $years[] = $current_year;
            }
        }

        $archive_year = '';
        $archive_title = __('Alarmes', 'chamberonne');
        foreach ($years as $year) {
            $url =  add_query_arg( array('alarm_year' => $year), $instance['linktoalarmespa_url'] );
            $archive_year .= "<li><a href='$url'>$archive_title $year</a></li>";
        }
        echo <<<HTML
         <div class="block-archives">
        <div class="title">
            <h4>$widget_title</h4>
        </div>
        <ul>
            $archive_year
        </ul>
    </div>
HTML;

        echo $args['after_widget'];
    }

    public function field_generator( $instance ) {
        $output = '';
        foreach ( $this->widget_fields as $widget_field ) {
            $default = '';
            if ( isset($widget_field['default']) ) {
                $default = $widget_field['default'];
            }
            $widget_value = ! empty( $instance[$widget_field['id']] ) ? $instance[$widget_field['id']] : esc_html__( $default, 'textdomain' );
            switch ( $widget_field['type'] ) {
                default:
                    $output .= '<p>';
                    $output .= '<label for="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'">'.esc_attr( $widget_field['label'], 'textdomain' ).':</label> ';
                    $output .= '<input class="widefat" id="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'" name="'.esc_attr( $this->get_field_name( $widget_field['id'] ) ).'" type="'.$widget_field['type'].'" value="'.esc_attr( $widget_value ).'">';
                    $output .= '</p>';
            }
        }
        echo $output;
    }

    public function form( $instance ) {
        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'textdomain' );
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'textdomain' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <?php
        $this->field_generator( $instance );
    }

    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        foreach ( $this->widget_fields as $widget_field ) {
            switch ( $widget_field['type'] ) {
                default:
                    $instance[$widget_field['id']] = ( ! empty( $new_instance[$widget_field['id']] ) ) ? strip_tags( $new_instance[$widget_field['id']] ) : '';
            }
        }
        return $instance;
    }
}

function register_alarmesarchives_widget() {
    register_widget( 'Alarmesarchives_Widget' );
}
add_action( 'widgets_init', 'register_alarmesarchives_widget' );
