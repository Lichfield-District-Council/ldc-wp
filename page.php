<?php get_header(); ?>  
<div id="content">

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
	<h1><?php the_title(); ?></h1>
	
	<div class="item">
		<?php the_content(); ?>
	</div>

	<?php endwhile; else: ?>

	<h2>Whoops...</h2>

	<p>Sorry, no posts we're found.</p>

	<?php endif; ?>

	<p align="center"><?php posts_nav_link(); ?></p>

</div>
<?php get_footer(); ?>  