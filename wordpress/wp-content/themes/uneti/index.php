<?php get_header(); ?>
<div class="main">
	<div class="main-left">
		<?php 
			while(have_posts()):
				the_post();
		?>
		<div class="main-content">
			<div class="main-images">
				<?php 
					echo get_the_post_thumbnail(get_the_id(),'thumbnail',array('class'=>'thumbnail'));
				?>
			</div><!--main-images-->
			<div class="main-excerpt">
				<div class="main-title">
					<a href="<?php the_permalink();?>"><?php echo get_the_title(); ?></a>
				</div><!--main-title-->

				
				<div class="main-ex">
					<p><i class="fa fa-clock-o"></i> <?php  echo uneti_post_time(); ?></p>
					<?php echo uneti_post_content(25); ?>
				</div><!--main-ex-->
			</div><!--main-excerpt-->
		</div><!--main-content-->
		<?php endwhile; ?>

		<?php if(paginate_links()!=''): ?>
			<div class="pagination">
				<?php uneti_post_page(); ?>
			</div>

		<?php endif; ?>
	</div><!--main-left-->

	<?php include('widget.php'); ?>
</div><!--main-->
		
	
<?php  get_footer(); 

	

