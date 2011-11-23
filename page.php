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

				<?php the_post(); ?>
				
				<?php get_template_part( 'content', 'page' ); ?>
				
				<!-- # page子目录 -->
				<ul>
				<?php
					$pages = get_pages('child_of='.$post->ID.'&sort_column=post_title');
					foreach($pages as $page)
					{ ?>
						<li><a href="<?php echo get_page_link($page->ID) ?>"><?php echo $page->post_title ?></a></li>
						
						<!-- #page_content -->
						<?php
							$page_data = get_page( $page->ID ); 
							$content = apply_filters('the_content', $page_data->post_content);
							echo "*".$content."*";
						?>
						
					<?php
					}
				?>
				</ul>


			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_footer(); ?>