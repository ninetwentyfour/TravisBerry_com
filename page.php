<?php get_header(); ?>
<div id="sidestripe">

</div>
<section><article>
<div id="contentbox">
<div id="content">
<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
<div class="post" id="post-<?php the_ID(); ?>">
			
					<div class="entry">
						<?php the_content('Read more...'); ?></div></div>
<?php endwhile; ?>
<div id="next"><?php next_posts_link('Older posts') ?></div><div id="previous"><?php previous_posts_link('Newer posts') ?></div>
<?php endif; ?>
</div>
</div></article></section>
<?php get_footer(); ?>