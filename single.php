<?php get_header(); ?>
<div id="sidestripe">

</div>

<div id="contentbox">
	<div id="content"><div id="blogtop"><a href="http://www.travisberry.com/feed/" target="blank">Subscribe via RSS</a> or <a href="http://feedburner.google.com/fb/a/mailverify?uri=TravisBerry&amp;loc=en_US" target="blank">Subscribe via Email</a> <div id="search"><?php $search_text = " Search Blog"; ?> 
<form method="get" id="searchform"  
action="<?php bloginfo('home'); ?>/"> 
<input type="text" value="<?php echo $search_text; ?>"  
name="s" id="s"  
onblur="if (this.value == '')  
{this.value = '<?php echo $search_text; ?>';}"  
onfocus="if (this.value == '<?php echo $search_text; ?>')  
{this.value = '';}" /> 
<input type="hidden" id="searchsubmit" /> 
</form></div></div>

<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
<div id="date"><h2><em><?php the_date('m-d-Y'); ?></em> written by <em><?php the_author(); ?></em></h2></div>
<div class="post" id="post-<?php the_ID(); ?>">
			
					<div class="entry">
						<?php the_content('Read more...'); ?></div></div>

	
	
	<?php comments_template(); ?>
<script>utmx_section("relatedposts")</script><div id="moreposts1">
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
<p><br /><a href="http://www.travisberry.com/blog/">back to blog</a></p>
	</div>

</div>
<?php get_footer(); ?>
