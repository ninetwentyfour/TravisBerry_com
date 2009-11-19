<?php get_header(); ?>
<div id="sidestripe">

</div>
<div id="contentbox">
	<div id="content">
    <home>Oh No! 404 - Page Not Found</home><p>Instead, why not read one of these posts?
<?php 
global $post;
$postid = $post->ID;
$args = array(
'orderby' => 'rand',
'showposts'=>4,
'post__not_in'=>array($postid)
);
query_posts($args);
echo '<ul>';
while (have_posts()) : the_post();
echo '<li><a href="'.get_permalink().'" title="'.the_title('','',false).'">'.the_title('','',false).'</a></li>';
endwhile;
echo '</ul>';
?>
<p>Or search for something else here
<?php $search_text = "Type and hit enter"; ?> 
<form method="get" id="searchform"  
action="<?php bloginfo('home'); ?>/"> 
<input type="text" value="<?php echo $search_text; ?>"  
name="s" id="s"  
onblur="if (this.value == '')  
{this.value = '<?php echo $search_text; ?>';}"  
onfocus="if (this.value == '<?php echo $search_text; ?>')  
{this.value = '';}" /> 
<input type="hidden" id="searchsubmit" /> 
</form>
	</div>

</div>
<?php get_footer(); ?>