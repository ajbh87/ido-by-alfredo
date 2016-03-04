<?php get_header(); ?>
<div id="content">
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>

			<article>
       		<div class="post-meta">
             	<h1><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
             <h3 id="post-author"><?php _e('Escrito por '); the_author_posts_link() ?></h3>
        <!--<div id="post-author">
<p class="gravatar"><?php //if(function_exists('get_avatar')) { echo get_avatar( get_the_author_meta('email'), '80' ); /* This avatar is the user's gravatar (http://gravatar.com) based on their administrative email address */  } ?></p>
            <div id="authorDescription">
             <?php //the_author_meta('description') ?> 
             <div id="author-link">
              <p><?php // _e('View all posts by: '); the_author_posts_link() ?></p>
             </div>
            </div>
           </div> #post-author -->
             <p><?php the_time('j'); _e(' de '); the_time('F'); _e(' de '); the_time('Y'); _e(' - '); the_time() ?></p>
       </div><!--#post-meta-->
				<?php edit_post_link('<small>Edit this entry</small>','',''); ?>
				<div class="post-content">
        	<?php if ( has_post_thumbnail() ) { /* loades the post's featured thumbnail, requires Wordpress 3.0+ */ echo '<div class="featured-thumbnail">'; the_post_thumbnail(); echo '</div>'; } ?>
					<?php the_content(); ?>
					<?php wp_link_pages('before=<div class="pagination">&after=</div>'); ?>
				</div><!--.post-content-->
			</article>
    <div class="post-meta-2">
        <p><?php _e('Categorias: '); the_category(', ') ?></p>
        <p><?php the_tags('Etiquetas: ', ', ', ' '); ?></p>
    </div><!--#post-meta-->
			<?php /* If a user fills out their bio info, it's included here */ ?>

		</div><!-- #post-## -->

		<div class="newer-older">
			<p class="older"><?php previous_post_link('%link', '&laquo; Entrada anterior') ?>
			<p class="newer"><?php next_post_link('%link', 'Próxima entrada &raquo;') ?></p>
		</div><!--.newer-older-->

	<?php endwhile; /* end loop */ ?>
</div><!--#content-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>