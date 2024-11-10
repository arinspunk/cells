<?php

// ======================================
// HOME.PHP
// --------------------------------------
// Plantilla base para el inicio del blog
// ======================================

?>

<?php
    /**
     * The main template file
     *
     * This is the most generic template file in a WordPress theme and one of the two
     * required files for a theme (the other being style.css). It is used to display a
     * page when nothing more specific matches a query.
     *
     * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
     *
     * @package cells
     */
?>

<?php get_header(); ?>

<div class="main">
	<?php if (have_posts()): ?>
		<ul>
			<?php while (have_posts()): the_post(); ?>
				<li>
					<?php the_post_thumbnail(array(300, 300)); ?>
					<h2>
						<?php the_title(); ?>
					</h2>
					<p>
						<?php the_category(', '); ?>
					</p>
					<?php the_excerpt(); ?> 
					<?php the_tags('<ul><li>','</li><li>','</li></ul>'); ?>
					<a href="<?php the_permalink(); ?>">
						<?php esc_html_e('leer más','test'); ?>
					</a>
				</li>
			<?php endwhile; ?>
		</ul>
	<?php else: ?>
		<p><?php esc_html_e('nada, chique', 'test'); ?></p>
		<?php get_search_form(); ?>
	<?php endif; ?>

	<?php the_posts_pagination( array( 'mid_size' => 2 ) ); ?>

	<?php
		//the_content();
		//comment_form();
	?>
</div>

<?php //get_sidebar(); ?>

<?php get_footer(); ?>