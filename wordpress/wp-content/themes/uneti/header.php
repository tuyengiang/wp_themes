<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	
	<?php 
		wp_head();
		// chi ro cho wwp biet noi ma n se chen cac files css,js....
	 ?>

</head>
<body>
<div class="website">
	<div class="header">
		<div class="header-left">
			<a href="/wordpress">Uneti Blog</a>
			<p>Nguyễn Tuyển Giảng</p>
		</div><!--header-left-->
		<div class="header-right">
				<ul>
					<li><a href="">Đăng nhập</a></li>
					<li><a href="">Đăng ký</a></li>
				</ul>
		</div><!--header-right-->
		<div style="clear:left;"></div>
	</div><!--header-->
	<div style="clear:left;"></div>
	<div class="primary-menu">
		<ul>
			<li style="width:5%;"><a class="active" href="/wordpress"><i class="fa fa-home"></i></a></li>
			<li><a href=""><?php uneti_menu('primary-menu'); ?></a></li>
			
		</ul>
	</div><!--menu-->
	<div style="clear:left;"></div>


