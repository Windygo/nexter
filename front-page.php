<?php
get_header();
?>

        <div class="sidebar">
            <button class="nav-btn"></button>
        </div>

        <header class="header">
            <img src="<?php the_field('top_logo', 'option')?>" alt="Nexter logo" class="header__logo">
            <h3 class="heading-3"><?php bloginfo('name');?></h3>
            <h1 class="heading-1"><?php bloginfo('description');?></h1>
            <button class="btn header__btn">View our properties</button>
            <div class="header__seenon-text">Seen on</div>
            <div class="header__seenon-logos">
                <img src="<?php the_field('seen_on_logo_1', 'option')?>" alt="Seen on logo 1">
                <img src="<?php the_field('seen_on_logo_2', 'option')?>" alt="Seen on logo 2">
                <img src="<?php the_field('seen_on_logo_3', 'option')?>" alt="Seen on logo 3">
                <img src="<?php the_field('seen_on_logo_4', 'option')?>" alt="Seen on logo 4">
           
            </div>
        </header>

        <div class="realtors">
            <div class="realtors__list">
                <?php
                // WP_Query arguments
                $args = array (
                    'post_type'         => 'realtors',
                    'posts_per_page'	=>  3,
                    'post_status'       => 'publish',                  
                    'meta_key'          => 'house_sold',                    
                    'orderby'           => 'meta_value_num',
                    'order'             => 'DESC',  
                    'meta_query' => array(
                        array(                        
                            'key' => 'show_realtor',
                            'value' => '1',
                            'compare' => '=='
                        )
                    ) 
                );
                
                // The Query
                $the_query = new WP_Query( $args ); ?>
                <div class="realtors__count">
                    <?php
                    $count = $the_query->post_count; 
                    echo '<h3 class="heading-3">Top ' . $count . ' realtors</h3>';
                    ?>
                </div>
                
                <?php
                // The Loop 
                if ( $the_query->have_posts() ) {
                    
                    while ( $the_query->have_posts() ) {
                        $the_query->the_post(); 
                        $post_id = get_the_ID(); ?>
                        
                        <img src="<?php the_post_thumbnail( array( 100, 100), ['class' => 'realtors__img'])?>
                        <div class="realtors__details">
                        <h4 class="heading-4 heading-4--light"> <?php the_title(); ?> </h4>
                        <?php 
                        $houses_sold = get_post_meta($post_id, 'house_sold', true);                   
                        echo $show_realtor;                     
                        ?>
                        <p class="realtors__sold"> <?php echo $houses_sold; ?> houses sold</p>
                        </div>
                        <?php
                    }
                 
                } else {
                    echo 'No realtors found...';
                }

                // Restore original Post Data
                wp_reset_postdata();
                wp_reset_query()
                ?>
            </div>
        </div>
        <section class="features">
        <?php
                // WP_Query arguments
                $args = array (
                    'post_type'         => 'features',
                    'posts_per_page'	=>  9,
                    'post_status'       => 'publish',  
                    'orderby'           => 'date',
                    'order'             => 'ASC',  
                    'meta_query' => array(
                        array(                        
                            'key' => 'show_feature',
                            'value' => '1',
                            'compare' => '=='
                        )
                    ) 
                );
                
                // The Query
                $the_query = new WP_Query( $args ); 
                // The Loop 
                if ( $the_query->have_posts() ) {
                    
                    while ( $the_query->have_posts() ) {
                        $the_query->the_post(); 
                        $post_id = get_the_ID();  
                        $fa_icon = get_post_meta($post_id, 'fa_icon', true);                                           
                        ?>                  
                        
                        <div class="feature">
                            <div class="feature__icon">
                                <a href=<?php the_permalink(); ?>> <?php echo $fa_icon; ?></a>
                            </div>
                        <h4 class="heading-4 heading--4--dark"><a class="feature__title" href=<?php the_permalink(); ?>><?php the_title(); ?></a></h4>
                        <p class="feature__text"> <?php the_content(); ?> </p>
                        </div> <?php
                    }
                 
                } else {
                    echo 'No features found...';
                }

                // Restore original Post Data
                wp_reset_postdata();
                wp_reset_query();
                ?>
        </section>
        
       
        <div class="story__pictures">
        <!-- This style section is to allow overriding the story background image -->
        <style>
            .story__pictures { background-image: linear-gradient(rgba(198, 153, 99,.5), rgba(198, 153, 99, .5)), url(<?php the_field('bg_image','option') ?>); }
        </style>
            <img src="<?php the_field('ol_image','option') ?>" alt="Couple with new house" class="story__img--1">
            <img src="<?php the_field('os_image','option') ?>" alt="New house" class="story__img--2">          
        </div>

        <div class="story__content">
            <h3 class="heading-3 mb-sm"><?php the_field('story_opener','option')?></h3>
            <h2 class="heading-2 heading-2--dark mb-md"><?php the_field('story_title','option')?></h2>
            <p class="story__text"><?php the_field('story_text','option')?></p>
            <button class="btn"><?php the_field('story_button_label','option')?></button>
        </div>
        
        <section class="homes">
        <?php
                // WP_Query arguments
                $args = array (
                    'post_type'         => 'properties',
                    'posts_per_page'	=>  6,
                    'post_status'       => 'publish',  
                    'orderby'           => 'date',
                    'order'             => 'ASC',  
                    'meta_query' => array(
                        array(                        
                            'key' => 'show_property',
                            'value' => '1',
                            'compare' => '=='
                        )
                    ) 
                );
                
                // The Query
                $the_query = new WP_Query( $args ); 
                // The Loop 
                if ( $the_query->have_posts() ) {
                    
                    while ( $the_query->have_posts() ) {
                        $the_query->the_post(); 
                        $post_id = get_the_ID(); 
                        $country = get_post_meta($post_id, 'country', true);   
                        $rooms   = get_post_meta($post_id, 'rooms', true);   
                        $floor_area = get_post_meta($post_id, 'floor_area', true); 
                        $price = get_post_meta($post_id, 'price', true); 
                        $contact_label = get_post_meta($post_id, 'contact_label', true);  
                        $image_url = get_the_post_thumbnail_url();                      
                        ?>     
                        
                        <div class="home">
                        <img src="<?php echo $image_url; ?>" alt="House 1" class="home__img">
                        <svg class="home__like">
                            <use xlink:href="<?php echo get_template_directory_uri();?>/img/sprite.svg#icon-heart"></use>
                        </svg>
                        <h5 class="home__name"><a class="home__title" href=<?php the_permalink(); ?>><?php the_title(); ?></a></h5>
                        <div class="home__location">
                            <svg>
                                <use xlink:href="<?php echo get_template_directory_uri();?>/img/sprite.svg#icon-map-pin"></use>
                            </svg>
                            <p><?php echo $country; ?></p>
                        </div>
                        <div class="home__room">
                            <svg>
                                <use xlink:href="<?php echo get_template_directory_uri();?>/img/sprite.svg#icon-profile-male"></use>
                            </svg>
                            <p><?php echo $rooms; ?> rooms</p>
                        </div>
                        <div class="home__area">
                            <svg>
                                <use xlink:href="<?php echo get_template_directory_uri();?>/img/sprite.svg#icon-expand"></use>
                            </svg>
                            <p><?php echo $floor_area; ?> m<sup>2</sup></p>
                        </div>
                        <div class="home__price">
                            <svg>
                                <use xlink:href="<?php echo get_template_directory_uri();?>/img/sprite.svg#icon-key"></use>
                            </svg>
                            <p>$<?php echo $price; ?></p>
                        </div>
                        <button class="btn home__btn"><?php echo $contact_label; ?></button>
                    </div>                         
                    <?php 
                    }
                 
                } else {
                    echo 'No features found...';
                }

                // Restore original Post Data
                wp_reset_postdata();
                wp_reset_query();
                ?>
           
           </section>        
              
        <section class="slider">
            <h2 class="heading-2"><?php the_field('slider_title','option')?></h2>       
            <div class="slider">
                <img  src="<?php echo get_first_slide();?>" name="slide" alt="" id="canvas" class="slider__img">
                <button onclick="changeSlide(-1)" class="prev">&#10094</button>
                <button onclick="changeSlide( 1)" class="next">&#10095</button>
            </div>                 
        </section>
       
        <!-- Passing ACF Gallery slides array variable to JS  -->   
        <?php $slides = get_field('slider_gallery', 'option'); ?>            
        <script type="text/javascript">
        const canvas = <?php echo json_encode($slides); ?>; 
        </script>     
       
        <?php
// get_sidebar();
get_footer();