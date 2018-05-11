<?php get_header(); ?>
	<div class="main">
		<div class="main-left">
			<?php 
				if(have_posts()){
					while(have_posts()):
						the_post();
			 ?>
				<div class="main-content">
					<div class="main-images">
						<?php echo get_the_post_thumbnail(get_the_id(),'thumbnails',array('class'=>'thumbnails')); ?>
					</div><!--main-images-->
					<div class="main-excerpt">
						<div class="main-title"><a href="<?php echo the_permalink(); ?>"><?php echo the_title(); ?></a></div>
						<div class="main-ex">
							<p><i class="fa fa-clock-o"></i> <?php  echo uneti_post_time(); ?></p>
								<?php echo uneti_post_content(25); ?>

						</div><!--main-ex-->
					</div>
	
				</div>
			 <?php 
			 	endwhile; }else{
			 		echo "Bài viết bạn tìm không có !!!";
			 	}
			  ?>
		</div><!--main-left-->
		<?php include('widget.php'); ?>
	</div>

<?php get_footer(); ?>