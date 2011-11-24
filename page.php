<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>

		<div id="primary">
			<div id="content" role="main">

				<!-- # page子目录 -->
				<ul class="tabs">
				<?php
					$page_id = $post->ID;
					if ($post->post_parent) {
				    	$page_id = $post->post_parent;
				  	}
				
					$pages = get_pages('child_of='.$page_id.'&sort_column=post_title');
					foreach($pages as $page)
					{ ?>
						<li><a href="<?php echo get_page_link($page->ID) ?>"><?php echo $page->post_title ?></a></li>						
					<?php
					}
				?>
				</ul>
				
				<!-- tab "panes" --><!-- #page_content -->
				<div class="panes">
					<?php
						$page_id = $post->ID;
						if ($post->post_parent) {
					    	$page_id = $post->post_parent;
					  	}

						$pages = get_pages('child_of='.$page_id.'&sort_column=post_title');
						foreach($pages as $page)
						{ 
							$page_data = get_page( $page->ID ); 
							$content = apply_filters('the_content', $page_data->post_content);
							echo "<div>".$content."</div>";
						}
					?>
				</div>
				
				<script>

				// perform JavaScript after the document is scriptable.
				$(function() {
					// setup ul.tabs to work as tabs for each div directly under div.panes
					$("ul.tabs").tabs("div.panes > div");
				});
				</script>
						


			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_footer(); ?>