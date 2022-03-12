<?php
if ( !empty(news10_theme_options('sidebar')) ) {
	echo '<div class="news10-tech-widgets-area">';
	do_action('news10_sidebar');
	echo '</div>';
} else {
		echo '<div class="news10-tech-widgets-area">';

	if ( is_active_sidebar('sidebar-1')){
		dynamic_sidebar('sidebar-1');
		echo '</div>';
	
	}
}
