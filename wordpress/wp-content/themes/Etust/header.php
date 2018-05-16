<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=width-device,initial-scale=1"/>
	<?php wp_head(); ?>
</head>
<body>
	<div class="header">
		<div class="header-content">
			<div class="header-logo">
				<a href="http://etusst.tk/"><p>E</p>Tusst</a>
			</div>
			<div class="menu-fixed">
				<div class="primary-menu">
					<ul>
						<li style="margin-left:5px;"><?php echo gblog_menu('primary-menu'); ?></li>
					</ul>
				</div><!--menu-->
				<div class="header-search">
					<form method="post" method="get" action="http://etusst.tk/">
						<input type="search" name="s" placeholder="Bạn tìm gì nào ...">
						<button type="submit" class="btn-search"><i class="fa fa-search"></i></button>
					</form>
				</div>
				<button class="btn-exit"><i class="fa fa-times"></i></button>
			</div><!--menu-fixed-->
			<div class="header-bars">
				<button class="btn-bars"><i class="fa fa-bars"></i></button>
			</div><!--menu-->
		</div><!--header-content-->
	</div><!--header-->
	<div class="website">
	