<?php get_header(); ?>
	<div id="content">
		<?php if ( ! dynamic_sidebar( 'Alert' ) ) : ?>
			<!--Wigitized 'Alert' for the home page -->
		<?php endif ?>
		<div id="noticias"><h3>Noticias Recientes</h3></div>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="post-single">
				<div class="post-meta">
					<h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
					<p><?php the_time('F j, Y'); _e(' at '); the_time(); ?></p>
					<?php if ( has_post_thumbnail() ) { 
						echo '<div class="featured-thumbnail">'; the_post_thumbnail("thumbnail"); echo '</div>'; 
					} ?>
				</div><!--.postMeta-->
				<div class="post-content">
					
					<?php the_content(__('Continuar leyendo'));?>
				</div>
			</div><!--.post-single-->
		<?php endwhile; else: ?>
			<div class="no-results">
				<p><strong><?php _e('There has been an error.'); ?></strong></p>
				<p><?php _e('We apologize for any inconvenience, please hit back on your browser or use the search form below.'); ?></p>
				<?php get_search_form(); /* outputs the default Wordpress search form */ ?>
			</div><!--noResults-->
		<?php endif; ?>

    <div class="oldernewer">
        <p class="older"><?php next_posts_link('&laquo; Entradas viejas') ?></p>
        <p class="newer"><?php previous_posts_link('Entradas Nuevas &raquo;') ?></p>
    </div><!--.oldernewer-->

	</div><!--#content-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
