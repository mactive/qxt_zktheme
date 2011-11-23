<!-- # page子目录 -->
<?php
$output = wp_list_pages('echo=0&depth=1&title_li=<h2>Top Level Pages </h2>' );
if (is_page( )) {
  $page = $post->ID;
  if ($post->post_parent) {
    $page = $post->post_parent;
  }
  $children=wp_list_pages( 'echo=0&child_of=' . $page . '&title_li=' );
  if ($children) {
    $output = wp_list_pages ('echo=0&child_of=' . $page . '&title_li=<h2>Child Pages</h2>');
  }
}
echo $output;
?>


<h1><?php //print_r($post); ?></h1>
<?php 
	$page = $post->ID;
	if ($post->post_parent) {
    	$page = $post->post_parent;
  	}
	$output = wp_list_pages('echo=0&child_of='.$page.'&depth=1&title_li=<h2>Top Level Pages </h2>' );
	echo $output;
 ?>
