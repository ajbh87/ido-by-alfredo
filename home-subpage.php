<?php 

/**
 * Template Name: Home Sub-Theme
 *
 * @package WordPress
 * @subpackage IDO by Alfredo
 */

    get_header(); 
?>

<div id="content" class="home">
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class('page'); ?>>
			<article>
       <?php edit_post_link('<small>Edit this entry</small>','',''); ?>       
				<div class="post-content page-content">
				    <?php the_content(); ?>
				</div><!--.post-content .page-content -->
			</article>

		</div><!--#post-# .post-->

	<?php endwhile; ?>
</div><!--#content-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>

