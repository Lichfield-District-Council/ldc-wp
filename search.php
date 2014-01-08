<?php get_header(); ?>  
<div id="content">
	
	<h1>Search Results for <em>'<?php the_search_query(); ?>'</em></h1>

	<?php if ( have_posts() ) : ?>
	<ul>
	<?php while ( have_posts() ) : the_post(); 
	$post_content = explode('.', get_the_content()); 
	?>

	<li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
	<p class="summary"><?php echo strip_tags($post_content[0]); ?></p>
	</li>

	<?php endwhile; ?>
	</ul>
	<?php else: ?>

	<h2>Whoops...</h2>

	<p>Sorry, no posts we're found.</p>

	<?php endif; ?>

	<p align="center"><?php posts_nav_link(); ?></p>

</div>
<?php get_footer(); ?>  