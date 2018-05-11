<?php get_header(); ?>
   

<div class="main">
	<div class="main-left">
		
			<?php 
				while(have_posts()):
					the_post();
			?>
				<h1 style="text-align:left;"> <?php the_title(); ?> </h1>
				<p><?php the_content(); ?></p>
			<?php endwhile; ?>
			
	</div><!--main-left-->
	<?php include('widget.php'); ?>
</div><!--main-->
		
	
<?php  get_footer(); 


