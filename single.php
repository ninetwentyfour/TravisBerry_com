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

	<?php endwhile; else: ?>
			  <div id="next"><?php next_posts_link('Older posts') ?></div><div id="previous"><?php previous_posts_link('Newer posts') ?></div>
		<p>Sorry, no posts matched your criteria.</p>

<?php endif; ?>
<a href="http://www.travisberry.com/blog/">back to blog</a>
	</div>

</div>
<?php get_footer(); ?>
