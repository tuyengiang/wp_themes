<?php get_header(); ?>
<div class="main">
	<div class="main-left">
		<h1> <?php the_title(); ?></h1>
		<p><?php the_content(); ?></p>
	</div><!--main-left-->
	<?php include('widget.php'); ?>

</div>


<?php get_footer(); ?>