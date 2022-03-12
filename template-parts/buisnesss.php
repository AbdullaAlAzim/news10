<li id="post-<?php the_ID(); ?>"<?php post_class('news10'); ?>>   
<div class="news10-news-post">
    <div class="news10-slide">
        <div class="card news10-default-post">
            <div class="news10-post-img">
                 <?php if ( has_post_thumbnail()) : ?>
                 <?php the_post_thumbnail(); ?>
                 <?php endif; ?>
            </div>
            <div class="card-body news10-card-body">
                <div class="news10-text">
                    <ul>
                        <li>
                            <span class="news10-icon"><svg xmlns="http://www.w3.org/2000/svg" width="12.007" height="13.414" viewBox="0 0 12.007 13.414">
                                <g id="user" transform="translate(-24.165)">
                                  <g id="Group_466" data-name="Group 466" transform="translate(26.687)">
                                    <g id="Group_465" data-name="Group 465" transform="translate(0)">
                                      <path id="Path_845" data-name="Path 845" d="M114.274,0a3.483,3.483,0,1,0,3.483,3.483A3.492,3.492,0,0,0,114.274,0Z" transform="translate(-110.791)" fill="#888"/>
                                    </g>
                                  </g>
                                  <g id="Group_468" data-name="Group 468" transform="translate(24.165 7.215)">
                                    <g id="Group_467" data-name="Group 467" transform="translate(0)">
                                      <path id="Path_846" data-name="Path 846" d="M36.147,250.375a3.247,3.247,0,0,0-.35-.639,4.329,4.329,0,0,0-3-1.886.641.641,0,0,0-.441.106,3.712,3.712,0,0,1-4.38,0,.571.571,0,0,0-.441-.106,4.3,4.3,0,0,0-3,1.886,3.743,3.743,0,0,0-.35.639.323.323,0,0,0,.015.289,6.067,6.067,0,0,0,.411.608,5.778,5.778,0,0,0,.7.791,9.112,9.112,0,0,0,.7.608,6.936,6.936,0,0,0,8.274,0,6.685,6.685,0,0,0,.7-.608,7.021,7.021,0,0,0,.7-.791,5.329,5.329,0,0,0,.411-.608A.26.26,0,0,0,36.147,250.375Z" transform="translate(-24.165 -247.841)" fill="#888"/>
                                    </g>
                                  </g>
                                </g>
                              </svg>
                              </span>
                              <span class="news10-item-text"><a href="<?php echo get_author_posts_url(get_the_author_meta('ID'));?>"><?php the_author(); ?></a></span>
                        </li>
                        <li>
                            <span class="news10-icon"><svg viewBox="0 0 512 512"><path d="M347.216,301.211l-71.387-53.54V138.609c0-10.966-8.864-19.83-19.83-19.83c-10.966,0-19.83,8.864-19.83,19.83v118.978 c0,6.246,2.935,12.136,7.932,15.864l79.318,59.489c3.569,2.677,7.734,3.966,11.878,3.966c6.048,0,11.997-2.717,15.884-7.952 C357.766,320.208,355.981,307.775,347.216,301.211z"></path><path d="M256,0C114.833,0,0,114.833,0,256s114.833,256,256,256s256-114.833,256-256S397.167,0,256,0z M256,472.341 c-119.275,0-216.341-97.066-216.341-216.341S136.725,39.659,256,39.659c119.295,0,216.341,97.066,216.341,216.341 S375.275,472.341,256,472.341z"></path></svg></span>
                            <span class="news10-item-text"><?php echo get_the_time('M j, Y');?></span>
                        </li>
                    </ul>
                    <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                </div>
            </div>
        </div>
     
    </div>
 
</div>
    </li>