<?php
/*
Template Name: Data
*/
get_header();
?>
<div id="content">
<?php the_post() ?>
<?php if ( function_exists('yoast_breadcrumb') ) {
	$breadcrumbs = yoast_breadcrumb("","",false);
	$breadcrumbs = explode(",", $breadcrumbs);
	array_shift($breadcrumbs);
	array_shift($breadcrumbs);
} ?>
<ul id="breadcrumb">
<li><a href="http://www2.lichfielddc.gov.uk/data">Open Data</a></li>
<li><?php echo $breadcrumbs[0]; ?></li>
<li><?php echo $breadcrumbs[1]; ?></li>
<li class="bc_end"><?php echo $breadcrumbs[2]; ?></li>
</ul>
<h1><?php the_title() ?></h1>
<?php the_content(); ?>
<h2>Resources</h2>
<ul>
<?php
$total = getGroupDuplicates('URL');
for($i = 1; $i < $total+1; $i++) {
?>
<li><a href="<?php echo get('URL', $i); ?>"><?php echo get('Resource name', $i); ?></a> <span class="format"><?php echo get('Format', $i); ?></span></li>
<?php } ?>
</ul>
<h2>Details</h2>
<table>
<tr>
<th scope="row">Licence</th>
<td><? echo get('Licence'); ?></td>
</tr>
<tr>
<th scope="row">Version</th>
<td><? echo get('Version'); ?></td>
</tr>
<tr>
<th scope="row">Geographic Coverage</th>
<td><? echo get('Geographic'); ?></td>
</tr>
<tr>
<th scope="row">Geographical Granularity</th>
<td><? echo get('Geographical'); ?></td>
</tr>
</table>
<h2>Overview</h2>
<table>
<tr>
<th scope="row">Released</th>
<td><? echo get('Released'); ?></td>
</tr>
<tr>
<th scope="row">Last Updated</th>
<td><? echo get('Last updated'); ?></td>
</tr>
<tr>
<th scope="row">Update frequency</th>
<td><? echo get('Update frequency'); ?></td>
</tr>
</table>
</div>
<?php $commenttitle = "Comment on this dataset"; ?>
<?php comments_template(); ?>
<?php get_footer(); ?>  

