<?php get_header(); ?>  
<div id="content">

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
	<h1><?php the_title(); ?></h1>
	
	<div class="item">
	<?php the_content(); ?>
	
	<?php
	if (is_front_page()) {
	?>
			<h2>Categories</h2>
			<ul id="nav">  
			<?php wp_list_categories('sort_column=menu_order&title_li=&child_of=46'); ?>  
			</ul>  
	<?php } ?>
	</div>

	<?php endwhile; else: ?>

	<h2>Whoops...</h2>

	<p>Sorry, no posts we're found.</p>

	<?php endif; ?>

	<p align="center"><?php posts_nav_link(); ?></p>

</div>
<?php get_footer(); ?>  