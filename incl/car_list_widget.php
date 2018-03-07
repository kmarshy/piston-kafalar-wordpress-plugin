<?php

class piston_car_model_list_widget extends WP_Widget {


    //Initialize Piston Car List Widget
    public function __construct() {

        $widget_options = array(
            'classname' => 'list_cars_widget',
            'description' => 'This widget list all cars under a model',
        );

        parent::__construct('list_cars_widget', 'Piston Kafalar Sidebar Cars', $widget_options);
    }


    //Widget Layout In the FrontEnd
    public function widget($args, $instance) {
        $title = apply_filters('widget_title', $instance['title']);
        $blog_title = get_bloginfo('name');
        $tagline = get_bloginfo('description');

        echo $args['before_widget'] . $args['before_title'] . $title . $args['after_title']; ?>

        <?php $this->getCarListings(); ?>

        <!-- <p><strong><?php _e('Site Name', 'piston_plugins'); ?></strong> <?php $blog_title ?></p>
        <p><strong><?php _e('Tagline', 'piston_plugins'); ?></strong> <?php $tagline ?></p> -->


    <?php
     
     echo $args['after_widget'];

    }

    public function form($instance) {
        
        $title =! empty($instance['title'])? $instance['title']:''; ?>

        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title','piston_plugins'); ?></label>
            <input type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php esc_attr($title); ?>"/>

        
        </p>

        <?php
    }

    public function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);

        return $instance;
    }

    function getCarListings() {

        function is_in_Array( $mainArray, $find_ID) {

            return true;
       }
        
        global $post;
        //$post_id = $post->id;
        setup_postdata( $post );
        $post_id = get_the_ID();
        echo '<h2>' . $post_id  . '</h2>';

        $makeArray = get_the_terms($post_id, 'make'); //make taxonomy for current post
        //print_r($makeArray);
        $makeTag = $makeArray[0]->name;
        $makeslug = $makeArray[0]->slug;
        //print_r($makeTag );

        $modelArray = get_the_terms($post_id, 'model'); //model taxonomy for current post
        $modelTag = $modelArray[0]->name;
        $modelslug = $modelArray[0]->slug;
        //print_r($modelTag ); 

        //$seriesTag = get_the_terms($post_id, 'Car_Series'); //series taxonomy for current post
        //print_r($seriesTag); 
       
         $mytaxomomies= array(
            // 'relation' => 'AND',
            array(
                'taxonomy' => 'make',
                'terms' => array( $makeTag ),
                'field'    => 'slug',
                'operator'=> 'AND',
            ),
            array(
                'taxonomy' => 'model',
                'terms' =>  array( $modelTag ),
                'field'    => 'slug',
                'operator'=> 'AND',
            )
        );

        $args = array(
            'post_type'=>'listings',
            'tax_query'=> $mytaxomomies,
        );

        $listings = new WP_Query($args);
        $term_array = [];
		if($listings->found_posts > 0) {
			
				while ($listings->have_posts()) {
                    $listings->the_post();
                    $post_get = get_the_ID();
                    $term_get = get_the_terms($post_get, 'Car_Series');
                   //print_r($term_get);
                  $termid = $term_get[0]->term_id;
                  $boolResult = is_in_Array( $term_get, $termid);
                 
                if($boolResult)  {
                    array_push( $term_array, $term_get);
                 } 
                  

					
				
			}
            
         
			wp_reset_postdata(); 
		}else{
			echo '<p style="padding:25px;">No listing found</p>';
        }
      
       echo '<ul class="realty_widget">';
       foreach( $term_array as $term_obj ) {

           $seriesname = $term_obj[0]->name;
           $seriesslug = $term_obj[0]->slug;
           $count = $term_obj[0]->count;
           $url = get_site_url().'/?ct_make='.$makeslug.'&ct_model='.$modelslug.'&Car_Series='.$seriesslug.'&search-listings=true';
                    
           $list = '<li>';
           $list .= '<a href="'. $url .'">';
           $list .= $seriesname .'<span class="small">('.$count.')</span>';
           $list .= '</a></li>';
           echo $list;
           // print_r($term_obj);
       
          
        }
        echo '</ul>';
       
      

    }

   



    
}

function piston_car_register_makeList_widget() {
    register_widget('piston_car_model_list_widget');
}

add_action('widgets_init', 'piston_car_register_makeList_widget');