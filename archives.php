<?php
/*
Template Name: Archives
*/
?>
<?php get_header(); ?>
<div id="sidestripe">

</div>
<div id="contentbox">
<div id="content">	
	<div class="post">
<h2><?php the_title(); ?></h2><br>
	<?php
        $prev_date = NULL;
        $date = NULL;
    ?>
    <?php query_posts("posts_per_page=-1&order=DESC"); ?>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <?php
        $date  = get_the_time('m.Y');
        $year  = get_the_time('Y');
        $month = get_the_time('m');
        $baseUrl = get_bloginfo('wpurl');

        if($date != $prev_date)
        {
            if ($prev_date) echo "<br></ul>\n";
            $prev_date = $date;
            echo "<h3>";
            echo get_the_time('F Y');
            echo "</h3>";
            echo "<ul>";
        }
    ?>
    <li><?php the_time('M d') ?> &middot; <a href="<?php the_permalink() ?>"><?php the_title() ?></a></li>
    <?php endwhile; endif; ?>

    </ul>

</div>
</div>
</div>
<?php get_footer(); ?>