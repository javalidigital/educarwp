<?php
add_action( 'admin_menu', 'my_remove_menu_pages' );
function my_remove_menu_pages() {
	remove_menu_page('edit.php');
	remove_menu_page('edit.php?post_type=testimonials');
	remove_menu_page('edit.php?post_type=works');
	remove_menu_page('edit.php?post_type=team_members');
	remove_menu_page('edit-comments.php');
}
?>
