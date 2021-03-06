<?php
add_filter('single_template', create_function('$t', 'foreach( (array) get_the_category() as $cat ) { if ( file_exists(TEMPLATEPATH . "/single-{$cat->term_id}.php") ) return TEMPLATEPATH . "/single-{$cat->term_id}.php"; } return $t;' ));

function mytheme_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
     <div id="comment-<?php comment_ID(); ?>">
      <div class="comment-author vcard">
         <?php echo get_avatar($comment,$size='48',$default='<path_to_url>' ); ?>

         <?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
      </div>
      <?php if ($comment->comment_approved == '0') : ?>
         <em><?php _e('Your comment is awaiting moderation.') ?></em>
         <br />
      <?php endif; ?>

      <div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','') ?></div>

      <?php comment_text() ?>

      <div class="reply">
         <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
      </div>
     </div>
<?php
        }

if ( function_exists ('register_sidebar')) { 
    register_sidebar (array(
    	'before_widget' => '<li class="column_widget">',
    	'after_widget' => '</li>',
    	'before_title' => '<h2>',
    	'after_title' => '</h2>'
    )); 
} 


/**
 * Register the main navigation menu for use in the dashboard
 */
function ldc_primary_nav() {
	register_nav_menu('primary-menu',__( 'Primary Menu' ));
}
add_action( 'init', 'ldc_primary_nav' );

/**
 * Fallback function for the main nav menu
 * @param array $args The arguments that were passed to wp_nav_menu
 */
function ldc_fallback_cb($args){
	?><ul>
	<li><a href="<?php echo site_url(); ?>">Home</a></li>
	<?php wp_list_pages(array(
		'sort_column' => 'menu_order',
		'title_li' => '',
		'exclude' => 121,
		'depth' => 1
	)); ?>
	</ul><?php
}

function ldc_enqueue_styles() {
	wp_enqueue_style( 'ldc-events-manager', get_template_directory_uri().'/events-manager.css' );
}
add_action( 'wp_enqueue_scripts', 'ldc_enqueue_styles' );

?>