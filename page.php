<?php

// =============================================================================
// PAGE.PHP
// -----------------------------------------------------------------------------
// Plantilla base para las páginas
// =============================================================================

?>

<?php get_header(); ?>
	
<article <?php post_class(); ?>>
	<?php if (have_posts()): while (have_posts()): the_post(); ?>
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h1>
						<?php the_title(); ?>
					</h1>
				</div>
				<div class="col-12">
					<?php the_content(); ?>
				</div>
			</div>
		</div>
	<?php endwhile; endif ?>
</article>

<?php get_footer(); ?>