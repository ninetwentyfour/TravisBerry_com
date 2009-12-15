<?php get_header(); ?>
<div id="sidestripe">

</div>

<div id="contentbox">
	<div id="content">

<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
<div id="date"><h2><em><?php the_date('m-d-Y'); ?></em> written by <em><?php the_author(); ?></em></h2></div>
<div class="post" id="post-<?php the_ID(); ?>">
			
					<div class="entry">
						<?php the_content('Read more...'); ?></div></div>

	
	<?php comments_template(); ?>
<div id="moreposts1">
<?php
$categories = get_the_category($post->ID);
if ($categories) {
	$category_ids = array();
	foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;

	$args=array(
		'category__in' => $category_ids,
		'post__not_in' => array($post->ID),
		'orderby' => 'rand',
		'showposts'=>3, // Number of related posts that will be shown.
		'caller_get_posts'=>1
	);
$my_query = new wp_query($args);
	if( $my_query->have_posts() ) {
		echo '<h3>Read More Posts</h3><ul>';
		while ($my_query->have_posts()) {
			$my_query->the_post();
		?>
			<li><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
		<?php
		}
		echo '</ul>';
	}
}
?>
</div>
	<?php endwhile; else: ?>
			 

<?php endif; ?>
<p><a href="http://www.travisberry.com/blog/">back to blog</a></p>
	</div>

</div>
<?php get_footer(); ?>
