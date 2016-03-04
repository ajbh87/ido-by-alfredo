<?php 

/**
 * Template Name: Kamra Sub-Theme
 *
 * @package WordPress
 * @subpackage IDO by Alfredo
 */

    get_header(); 
?>
<div id="kamra-menu">
    <?php wp_nav_menu( array( 'theme_location' => 'kamra-menu' ) ); ?>
</div>

<div id="content" class="kamra-sub">
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class('page'); ?>>
			<article>
       <?php edit_post_link('<small>Edit this entry</small>','',''); ?>
       <div id="page-meta">
           <h1><?php the_title(); ?></h1>
           <?php
                $myMenu;
                if ( is_user_logged_in() ) {
                    $myMenu = 'logged-in-menu';
                }
                else {
                    $myMenu = 'header-menu';
                }
                wp_nav_menu( array( 
                    'container' => 'none', 
                    'theme_location' => $myMenu,
                    'walker'=> new SH_BreadCrumbWalker, 
                    'items_wrap' => '<div id="breadcrumb-%1$s" class="%2$s bread">%3$s</div>'
                ) ); 
            ?>
       </div><!--#pageMeta-->
				<div class="post-content page-content">
        <?php if ( has_post_thumbnail() ) { /* loades the post's featured thumbnail, requires Wordpress 3.0+ */ echo '<div class="featured-thumbnail">'; the_post_thumbnail('custom'); echo '</div>'; } ?>
				    <?php the_content(); ?>
				    <?php wp_link_pages('before=<div class="pagination">&after=</div>'); ?>
				</div><!--.post-content .page-content -->
			</article>

		</div><!--#post-# .post-->

	<?php endwhile; ?>
</div><!--#content-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
