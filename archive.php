<?php 
get_header(); 
?>  
<div id="content">
 	  <?php /* If this is a category archive */ if (is_category()) { ?>
 	  <ul id="breadcrumb">
<li><a href="http://www2.lichfielddc.gov.uk/opendata">Open Data</a></li><li class="bc_end"><?php single_cat_title(); ?></li></ul>
		<h1><?php single_cat_title(); ?></h1>
	  <?php } ?>
	  
	<?php 
	$category = get_the_category();
	if ($category[0]->cat_ID == 47 || $category[0]->cat_ID == 15) {
	if ($category[0]->cat_ID == 47) {
	?>
	<div class="item">
	<?php echo category_description(); ?> 
	</div>
	<?php
	}
	while ( have_posts() ) : the_post(); 
	?>
	<div class="item">
	<?php if ($category[0]->cat_ID == 47) { ?>
	<h2><?php the_title(); ?></h2>
	<?php the_content(); ?>
	<?php } else { ?>
	<h2><?php the_title(); ?></h2>
	<?php 
	$post_content = explode('.', get_the_content()); 
	?>
	<p class="summary"><?php echo strip_tags($post_content[0]); ?>...</p>
	<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">Read more...</a>
	<?php } ?>
	</div>
	<?php 
	endwhile;
	} else { 
	?>

	<?php if ( have_posts() ) : ?>
	<ul>
	<?php 
	$posts = query_posts($query_string . '&orderby=title&order=asc');
	while ( have_posts() ) : the_post(); 
	$post_content = explode('.', get_the_content()); 
	
	$formats = array();
	$total = getGroupDuplicates('URL');
	for($i = 1; $i < $total+1; $i++) {
	$formats[] = "<span class=\"format\">". get('Format', $i) ."</span>";
	}
	$formats = implode(" ", array_unique($formats));
	?>

	<li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a> <?php echo $formats; ?>
	<p class="summary"><?php echo strip_tags($post_content[0]); ?></p>
	</li>

	<?php endwhile; ?>
	</ul>
	<?php else: ?>

	<h2>Whoops...</h2>

	<p>Sorry, no posts were found.</p>

	<?php endif; ?>

	<?php
//include(ABSPATH . 'wp-content/plugins/wp-pagenavi/wp-pagenavi.php');
 wp_pagenavi();
?>

	
	<?php } ?>

</div>
<?php get_footer(); ?>  