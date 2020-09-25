<?php


// Adds widget: Alarme
class Alarme_Widget extends WP_Widget {

    function __construct() {
        parent::__construct(
            'alarme_widget',
            esc_html__( 'Alarme', 'chamberonne' )
        );
    }

    private $widget_fields = array(
        array(
            'label' => 'Title for day number',
            'id' => 'titlefordaynumb_text',
            'placeholder' => 'Nombre de jours',
            'type' => 'text',
        ),
        array(
            'label' => 'Title for number of posts',
            'id' => 'titlefornumbero_text',
            'placeholder' => 'Moyenne annuelle',
            'type' => 'text',
        ),
        array(
            'label' => 'Title for frequency of events',
            'id' => 'titleforfrequen_text',
            'placeholder' => 'Une alarme tous les %s jours',
            'type' => 'text',
        ),
    );

    public function widget( $args, $instance ) {
        echo $args['before_widget'];
        $widget_title = '';
        if ( ! empty( $instance['title'] ) ) {
            $widget_title = $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }
        $current_year = date('Y');
        $day_number = round((time() - strtotime(date('Y')."-01-01")) / (60 * 60 * 24));

        $number_of_posts = wp_count_posts('alarm')->publish;
        $frequency_of_events = round($day_number / $number_of_posts);
        $frequency_of_events_title = sprintf($instance['titleforfrequen_text'], $frequency_of_events);
        echo <<<HTML
        <div class="cont">
        <div class="info">
            <div class="title">
                <h4>$widget_title $current_year</h4>
            </div>
            <div class="info-alarms">
                <div class="atten-info">
                    <p>{$instance['titlefordaynumb_text']} $day_number</p>
                    <p>{$instance['titlefornumbero_text']} $number_of_posts</p>
                    <p>$frequency_of_events_title</p>
                </div>
HTML;
        echo wp_list_categories( array(
            'orderby'     => 'name',
            'show_count'  => true,
            'echo'        => 1,
            'taxonomy'    => 'types',
            'hide_empty' => false,
            'title_li'   => '',
            'style'      => 'none',
        ) );
        echo <<<HTML
            </div>
        </div>
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
            $widget_value = ! empty( $instance[$widget_field['id']] ) ? $instance[$widget_field['id']] : esc_html__( $default, 'chamberonne' );
            $placeholder = ! empty( $widget_field['placeholder'] ) ? ' placeholder="' . $widget_field['placeholder'] . '"' : '';
            switch ( $widget_field['type'] ) {
                default:
                    $output .= '<p>';
                    $output .= '<label for="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'">'.esc_attr( $widget_field['label'], 'chamberonne' ).':</label> ';
                    $output .= '<input class="widefat" id="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'" name="'.esc_attr( $this->get_field_name( $widget_field['id'] ) ).'" type="'.$widget_field['type'].'" value="'.esc_attr( $widget_value ).'"'.$placeholder.'>';
                    $output .= '</p>';
            }
        }
        echo $output;
    }

    public function form( $instance ) {
        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'chamberonne' );
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'chamberonne' ); ?></label>
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

function register_alarme_widget() {
    register_widget( 'Alarme_Widget' );
}
add_action( 'widgets_init', 'register_alarme_widget' );