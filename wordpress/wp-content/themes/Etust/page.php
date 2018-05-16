<?php get_header(); ?>
	<div class="main">
		
		<div class="main-left">
			<?php 
				while(have_posts()):
					the_post();
			 ?>
				<h1 style="text-align:left;"> <?php the_title(); ?> </h1>
				<?php the_content(); ?>
			<?php endwhile; ?>
			<?php if(paginate_links()!=''): ?>
				<div class="pagination">
					<?php gblog_page(); ?>
				</div>

			<?php endif; ?>
		</div><!--main-right-->
		
		<?php include('widget.php'); ?>
	</div><!--main-->
<?php get_footer(); ?>