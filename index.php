<?php get_header(); ?>
    <aside id="sidestripe"></aside>
    <section id="content">
        <header id="blogtop">
            <a href="http://www.travisberry.com/feed/" target="blank">Subscribe via RSS</a> or <a href="http://feedburner.google.com/fb/a/mailverify?uri=TravisBerry&amp;loc=en_US" target="blank">Subscribe via Email</a> <div id="search"><?php $search_text = " Search Blog"; ?> 
                <form method="get" id="searchform" action="<?php bloginfo('home'); ?>/"> 
                    <input type="text" value="<?php echo $search_text; ?>" name="s" id="s" onblur="if (this.value == '') {this.value = '<?php echo $search_text; ?>';}" onfocus="if (this.value == '<?php echo $search_text; ?>') {this.value = '';}" /> 
                    <input type="hidden" id="searchsubmit" /> 
                </form>
            </div>
        </header>
	<section>
        <?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
                <article class="post" id="post-<?php the_ID(); ?>">
		<header>
                    <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                </header>
                    <?php the_content('Read more...'); ?>
                </article>
                <?php endwhile; ?>
                <br /><br />
                <div id="next"><?php next_posts_link('Older posts') ?></div><div id="previous"><?php previous_posts_link('Newer posts') ?></div>
                <?php endif; ?>            
            </section>
    </section><!--end content-->
<?php get_footer(); ?>