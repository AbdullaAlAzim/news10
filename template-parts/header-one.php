<?php 
    $arg = [
        'cat' => '<span class="niotitle">'.esc_html__('Category','news10').'</span>',
        'tag' => '<span  class="niotitle">'.esc_html__('Tag','news10').'</span>',
        'author' => '<span  class="niotitle">'.esc_html__('Author','news10').'</span>',
        'year' => '<span  class="niotitle">'.esc_html__('Year','news10').'</span>',
        'notfound' => '<span  class="niotitle">'.esc_html__('Not found','news10').'</span>',
        'search' => '<span  class="niotitle">'.esc_html__('Search for','news10').'</span>',
        'marchive' => '<span  class="niotitle">'.esc_html__('Monthly archive','news10').'</span>',
        'yarchive' => '<span  class="niotitle">'.esc_html__('Yearly archive','news10').'</span>',
    ];

if (is_home() && get_option('page_for_posts')  ) {
    $title = 'Blog';
} elseif (is_front_page()){
    $title = 'Front Page';
}else {
    $title = get_the_title();
}

?>
  <div id="main-wrapper">
        <div class="news10-overlay"></div>
        <header class="sticky-manu news10-news-header">
         
            <!-- news10 Mid Bar Start -->
            <div class="news10-mid-bar">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-sm-3 col-lg-2">
                            <div class="news10-logo">
                               <?php news10_logo(); ?>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
            <!-- news10 Mid Bar End -->
            <!-- news10 Manu Bar Start -->
            <div class="news10-main-manu-bar">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-5 d-lg-none">
                            <div class="news10-logo">
                                 <?php news10_logo(); ?>
                            </div>
                        </div>
                        <div class="col-7 order-lg-2 col-lg-2">
                            <ul class="news10-right-btns">
                                <li>
                                    <button class="news10-search-btn">
                                        <span class="icon"><svg viewBox="0 0 511.999 511.999"><path d="M508.874,478.708L360.142,329.976c28.21-34.827,45.191-79.103,45.191-127.309c0-111.75-90.917-202.667-202.667-202.667 S0,90.917,0,202.667s90.917,202.667,202.667,202.667c48.206,0,92.482-16.982,127.309-45.191l148.732,148.732 c4.167,4.165,10.919,4.165,15.086,0l15.081-15.082C513.04,489.627,513.04,482.873,508.874,478.708z M202.667,362.667 c-88.229,0-160-71.771-160-160s71.771-160,160-160s160,71.771,160,160S290.896,362.667,202.667,362.667z"></path></svg></span>
                                    </button>
                                </li>
                        
                                <li class="d-lg-none">
                                    <button type="button" class="manu-btn">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </button>
                                </li>
                            </ul>
                        </div>
                        <div class="col-12 order-lg-1 col-lg-10">
                            <nav class="news10-main-manu">
                                <button class="close-btn d-lg-none">
                                    <span></span>
                                    <span></span>
                                </button>
                                <span class="news10-home-icon"><svg viewBox="0 0 512 512"><path d="m498.195312 222.695312c-.011718-.011718-.023437-.023437-.035156-.035156l-208.855468-208.847656c-8.902344-8.90625-20.738282-13.8125-33.328126-13.8125-12.589843 0-24.425781 4.902344-33.332031 13.808594l-208.746093 208.742187c-.070313.070313-.140626.144531-.210938.214844-18.28125 18.386719-18.25 48.21875.089844 66.558594 8.378906 8.382812 19.445312 13.238281 31.277344 13.746093.480468.046876.964843.070313 1.453124.070313h8.324219v153.699219c0 30.414062 24.746094 55.160156 55.167969 55.160156h81.710938c8.28125 0 15-6.714844 15-15v-120.5c0-13.878906 11.289062-25.167969 25.167968-25.167969h48.195313c13.878906 0 25.167969 11.289063 25.167969 25.167969v120.5c0 8.285156 6.714843 15 15 15h81.710937c30.421875 0 55.167969-24.746094 55.167969-55.160156v-153.699219h7.71875c12.585937 0 24.421875-4.902344 33.332031-13.808594 18.359375-18.371093 18.367187-48.253906.023437-66.636719zm0 0"></path></svg></span>
                          

                            <?php
                            echo str_replace(['menu-item-has-children', 'sub-menu'], ['dropdown', 'dropdown-menu'],
                                wp_nav_menu( array(
                                        'container' => false,
                                        'echo' => false,
                                        'menu_id' => 'm-main-menu',
                                        'theme_location' => 'primary',
                                        'fallback_cb'=> 'moda_no_main_nav',
                                        'items_wrap' => '<ul>%3$s</ul>',
                                    )
                                ));
                            ?>
                                <span class="news10-more-icon"><a href="#"><svg viewBox="0 0 426.667 426.667"><circle cx="42.667" cy="213.333" r="42.667"></circle><circle cx="213.333" cy="213.333" r="42.667"></circle><circle cx="384" cy="213.333" r="42.667"></circle></svg></a></span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- news10 Manu Bar End -->
        </header>

        <!-- mobile manu  -->
        <div class="news10-main-menu mobile-menu">
            <div class="nav-close">
                <i class="fa fa-times"></i>
            </div>
        

            <?php
        echo str_replace(['menu-item-has-children', 'sub-menu'], ['dropdown', 'dropdown-menu'],
            wp_nav_menu( array(
                    'container' => false,
                    'echo' => false,
                    'menu_id' => 'm-main-menu',
                    'theme_location' => 'primary',
                    'fallback_cb'=> 'moda_no_main_nav',
                    'items_wrap' => '<ul>%3$s</ul>',
                )
            ));
        ?>
        </div>

        <!-- search news10l start  -->
        <div class="news10-search-news10l">
            <div class="container">
                <form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="GET" class="news10-search-form">
                    <input type="search" class="form-control" placeholder="Search..." autocomplete="off" value="<?php echo get_search_query(); ?>" name="s">
                    <button class="theme-btn blue-btn">Search</button>
                </form>
            </div>
        </div>
        <!-- search news10l end  -->

        
            <!-- news10 Breadcrumb End -->

              <!-- news10 Breadcrumb Start -->
            <nav aria-label="breadcrumb" class="news10-breadcrumb">
                <div class="container">
                     <h2 class="text-center"><?php echo wp_kses_post($title); ?></h2>
                        <?php news10_unit_breadcumb(); ?>
                </div>
            </nav>
            <!-- news10 Breadcrumb End -->