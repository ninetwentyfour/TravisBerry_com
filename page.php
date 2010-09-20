<?php get_header(); ?>
    <aside id="sidestripe"></aside>
    <section id="content">
        <?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
            <section>
                <header>
                    <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                </header>
                <article class="post" id="post-<?php the_ID(); ?>">
                    <?php the_content('Read more...'); ?>
                </article>
                <?php endwhile; ?>
                <br /><br />
                <div id="next"><?php next_posts_link('Older posts') ?></div><div id="previous"><?php previous_posts_link('Newer posts') ?></div>
            
            </section>
        <?php endif; ?>
    </section><!--end content-->
<?php get_footer(); ?>