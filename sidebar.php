<?php
if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div><!-- #secondary -->


<ul>
<?php
$sql = "SELECT * FROM $wpdb->posts
	WHERE post_type = 'post' AND post_status = 'publish'
	ORDER BY post_date DESC LIMIT 3";
$rows = $wpdb->get_results($sql);
foreach ($rows as $row) {
	echo "<li>$row->post_title</li>";
}
?>
</ul>
