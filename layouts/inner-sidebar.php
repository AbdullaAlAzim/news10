<?php
if ( !empty(news10_theme_options('inner_sidebar')) ) {
	echo '<div class="news10-tech-widgets-area">';
	do_action('news10_sidebar_inner');
	echo '</div>';
} else {
		echo '<div class="news10-tech-widgets-area">';

	if ( is_active_sidebar('sidebar-2')){
		dynamic_sidebar('sidebar-2');
		echo '</div>';
	
	}
}
?>
