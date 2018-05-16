<?php get_header(); ?>
	<div class="main">
		
		<div class="main-left">
			
			<div class="main-nd">
				<?php 
					while(have_posts()):
						the_post();
				?>

				<h1 style="text-align:left;"> <?php the_title(); ?> </h1>
				<p><i class="fa fa-clock-o"></i> <?php echo gblog_post_times(); ?></p>
				<?php the_content(); ?>
			<?php endwhile; ?>
				
			</div>
		</div><!--main-left-->
		<?php include('widget.php'); ?>
	</div><!--main-->
<?php get_footer(); ?>