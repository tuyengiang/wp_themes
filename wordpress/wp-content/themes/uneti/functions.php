<?php  
	
	define("THEME_URL",get_stylesheet_directory_uri());
	define('CORE',THEME_URL."/core");

	// add css vao
	
	add_action('wp_enqueue_scripts',function(){
		wp_enqueue_style('uneti-main-css',THEME_URL.'/style.css');
		wp_enqueue_style('uneti-awesome-css',THEME_URL.'/asset/css/awesome/css/font-awesome.min.css');
		wp_enqueue_script('uneti-main-js',THEME_URL.'/asset/js/main.js');
	});



	// cua hinh chuc nang theme
	if(!function_exists("uneti_theme_setup")){
		function uneti_theme_setup(){
			// thiet lap domain
			$language_folder=THEME_URL.'/language';
			load_theme_textdomain('uneti',$language_folder);

			/** tu dong them link rss len the head */
			add_theme_support('automatic-feed-link');

			/** hinh anh dai dien cho post */
			add_theme_support('post-thumbnails');
			/** post format */
			add_theme_support('post-formats',array('images','video','gallery','link'));

			/** them titl-tag */
			add_theme_support('title-tag');
			/** custums background */
			$default_background=array(
				'default-color'=>'#f7f7f7'
			);
			add_theme_support('custom-background',$default_background);
			/**
			 * add menu
			 */
			register_nav_menu('primary-menu',__('Primary Menu','uneti'));

			/** add_sibar */
			$sidebar=array(
				'name'=>__('Main Sidebar' ,'uneti'),
				'id'=>'main-sidebar',
				'decription'=>__('Defalut sidebar'),
				'class'=>'main-sidebar',
				'before_title'=>'<div class="title"><div class="title-td"><i class="fa fa-list-ul"></i> ', 
				'after_title'=>'</div></div>',
				'before_widget' => '<div>',
				'after_widget'  => '</div>'
			);
			register_sidebar($sidebar);
		}
		add_action('init','uneti_theme_setup');
	}

	/** thiet lap menu */
	if(!function_exists('uneti_menu')){
		function uneti_menu($menu){
			$menu=array(
				/** hien thi menu */
				'theme_location'=>$menu,
			);
			wp_nav_menu($menu);
		}
	}	

	/** hien thi category */
	if(!function_exists('uneti_category')){
		function uneti_category(){
			
			$arg=array(
				'type'=>'post',
				'child'=>'0',
				'parent'=>'',
				'orderby'=>'id',
				'hide_empty'=>'0',
			);
			$categories=get_categories($arg);
			foreach($categories as $category){
		
				echo "<ul>";
					echo '<li><a href="'.get_term_link($category->slug,"category").'"><i class="fa fa-angle-right"></i> '.$category->name .' ( '.$category->count .')</a></li>';

				echo "</ul>";
			}
		}
		
	}

	/** gioi han noi dung hien thi bai viet */
	if(!function_exists('uneti_post_content')){
		function uneti_post_content($limit){
			$content=explode(' ',get_the_content(),$limit);
			if(count($content)>=$limit){
				array_pop($content);
				$content=implode(" ",$content).".....";
			}else{
				$content=implode(" ",$content);
			}
			$content=preg_replace('/[.+]/','',$content);
			$content=apply_filters('the_content',$content);
			$content=str_replace(']]>',']]>',$content);
			return $content;
		}
	}


	/** phan trang */


	if(!function_exists('uneti_post_page')){
		function uneti_post_page(){
			global $wp_query;
			$max_big=999999999999;
			echo paginate_links(array(
				'base'=>str_replace($max_big,'%#%',esc_url(get_pagenum_link($max_big))),
				'format'=>'?paged=%#%',
				'prev_text'=>__('«'),
				'next_text'=>__('»'),
				'current'=>max(1,get_query_var('paged')),
				'total'=>$wp_query->max_num_pages,
			));
		}
	}

	/** hien thi thoi gian */
	if(!function_exists('uneti_post_time')){
		function uneti_post_time(){
			$time_since=human_time_diff(get_the_time('U'),current_time('timestamp')).' ago';
			return $time_since;
		}
	}


	/** post format */
	if(!function_exists('uneti_format')){
		function uneti_format(){
			register_post_type('images',array(
				'labels'=>array(
					'name'=>__('Images'),
					'singular_name'=>__('Images'),

				),
				'public'=>true,
				'has_archive'=>true,
				'rewrite'=>array('slug'=>'images'),

			));
		}
		add_action('init','uneti_format');
	}	

	if(!function_exists('custom_post_type')){

		function custom_post_type(){
			$labels=array(
				'name'=>_('Images','Post type name'),
				'singular_name'=>_('Image','Post singular name'),
				'menu_name'=>_('Images',''),
				'parent_item_colon'=>_('Parent Image',''),
				'all_items'=>_('All Images',''),
				'view_item'=>_('View Image',''),
				'add_view_item'=>_('Add New Image',''),
				'add_new'=>_('Add New',''),
				'edit_item'=>_('Edit Image',''),
				'update_item'=>_('Update Image',''),
				'search_items'=>_('Search Image'),
				'not_found'=>_('Not Found',''),
				'not_found_in_trash'=>_('Not Found In Trash','')

			);
			$arg=array(
				'lable'=>_('images',''),
				'decription'=>_('Image news and reviews',''),
				'label'=>$labels,
				'supports'=>array('title','editor','excerpt','author','thumbnail','comments','revisions','custom-feilds'),
				'taxonomies'=>array('genres'),
				'hierarchical'=>false,
				'public'=>true,
				'show_ui'=>true,
				'show_in_menu'=>true,
				'show_in_nav_menus'=>true,
				'show_in_admin_bar'=>true,
				'menu_position'=>5,
				'can_export'=>true,
				'has_archive'=>true,

			);
		}
	}