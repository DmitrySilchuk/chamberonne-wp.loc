<?php


// Adds widget: PROCHAINES ACTIVITÉS
class Prochainesactivits_Widget extends WP_Widget
{

    function __construct()
    {
        parent::__construct(
            'prochainesactivits_widget',
            esc_html__('PROCHAINES ACTIVITÉS', 'chamberonne')
        );
    }

    private $widget_fields = array(
        array(
            'label' => 'Link to archive url',
            'id' => 'linktoarchiveur_text',
            'type' => 'text',
        ),
        array(
            'label' => 'Link to archive title',
            'id' => 'linktoarchiveti_text',
            'type' => 'text',
        ),
    );

    public function widget($args, $instance)
    {
        echo $args['before_widget'];
        $widget_title = '';
        if (!empty($instance['title'])) {
            $widget_title = $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
        }

        $posts = get_posts(array(
            'post_type' => 'activity',
            'posts_per_page' => 5,
            'meta_key' => 'activity_diver_date',
            'meta_query' => array(
                array(
                    'key' => 'activity_diver_date',
                    'value' => date('Y-m-d H:i:s'),
                    'compare' => '>='
                )
            ),
            'orderby' => 'meta_value',
            'order' => 'DESC'
        ));

        if (!empty($posts)) {
            echo <<<HTML
<div class="cont">
    <div class="info">
        <div class="title">
            <h4>$widget_title</h4>
        </div>
        <div class="list-alarms">
HTML;
            foreach ($posts as $post) {
                $type_list = wp_get_post_terms($post->ID, 'types', array('fields' => 'all'));
                $types = array_column($type_list, 'name');
                $type = implode(', ', $types);

                $alarm_date = get_field('activity_diver_date', $post->ID );
                $alarm_date = date_create($alarm_date);
                $alarm_date = date_format($alarm_date, 'd.m.y');

                $number = get_field('activity_diver_number_alarm', $post->ID );
                $has_picture_icon = '';
                if (has_post_thumbnail( $post )) {
                    $has_picture_icon = '<i class="icon icon-picture"></i>';
                }
                echo <<<HTML
                <div class="row">
                    $has_picture_icon
                    <span class="date">$alarm_date</span>
                    <span class="text">$type $number</span>
                </div>
HTML;
            }
            $home_url = home_url() . '/';
        echo <<<HTML
        </div>
        <div class="block-btn">
            <a href="$home_url{$instance['linktoarchiveur_text']}" class="btn">{$instance['linktoarchiveti_text']}</a>
        </div>
    </div>
</div>
HTML;
}
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
            switch ( $widget_field['type'] ) {
                default:
                    $output .= '<p>';
                    $output .= '<label for="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'">'.esc_attr( $widget_field['label'], 'chamberonne' ).':</label> ';
                    $output .= '<input class="widefat" id="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'" name="'.esc_attr( $this->get_field_name( $widget_field['id'] ) ).'" type="'.$widget_field['type'].'" value="'.esc_attr( $widget_value ).'">';
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

function register_prochainesactivits_widget() {
    register_widget( 'Prochainesactivits_Widget' );
}
add_action( 'widgets_init', 'register_prochainesactivits_widget' );