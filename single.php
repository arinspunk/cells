<?php

// =============================================================================
// SINGLE.PHP
// -----------------------------------------------------------------------------
// Plantilla base para los post
// =============================================================================

?>

<?php get_header(); ?>

<article <?php post_class(); ?>>
	<!-- post -->
	<?php if (have_posts()): while (have_posts()): the_post(); ?>
		<h1>
			<?php the_title(); ?>
		</h1>
		<?php the_post_thumbnail('full'); ?>
		<?php the_content(); ?>
		<footer>
			<ul>
				<li>
					<?php
						$author_id = get_the_author_meta('ID');      
					?>
					<a href="<?php echo esc_url(get_author_posts_url($author_id)); ?>">
						<?php the_author(); ?>
					</a>
				</li>
				<li>
					<?php the_category(', '); ?>
				</li>
				<?php the_tags('<ul><li>','</li><li>','</li></ul>'); ?>
				<li>
					<?php the_date('y/m/d'); ?>
				</li>
			</ul>
			<?php previous_post_link(); ?>
			<?php next_post_link(); ?>
		</footer>
	<?php endwhile; endif ?>
	<?php get_template_part( 'templates/related', 'posts' ) ?>
	<!-- Comments -->
	<?php //comments_template(); // I'm not sure that this is working fine… http://wp-test/2012/01/03/template-comments/ ?>
</article>

<?php get_footer(); ?>