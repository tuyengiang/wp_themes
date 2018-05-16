<?php 
		define('THEME_URL',get_stylesheet_directory_uri());
		define('CORE',THEME_URL.'/core');

		add_action("wp_enqueue_scripts",function(){
			wp_enqueue_style('gblog-main-style',THEME_URL."/style.css");
			wp_enqueue_style('gblog-main-awesome',THEME_URL.'/asset/css/awesome/css/font-awesome.min.css');
			wp_enqueue_style('gblog-main-reponsive',THEME_URL.'/asset/css/reponsive.css');
			wp_enqueue_script('gblog-main-script',THEME_URL.'/asset/js/jquery.js');
			wp_enqueue_script('gblog-main-j',THEME_URL.'/asset/js/jmain.js');
		});

		if(!function_exists('gblog_theme_setup')){
			function gblog_theme_setup(){
				$language=THEME_URL.'\language';
				load_theme_textdomain('gblog',$language);
				add_theme_support('automatic-feed-link');
				add_theme_support('post-thumbnails');
				add_theme_support('post-formats',array('video','link','images'));
				add_theme_support('title-tag');
				$background=array(
					'default-color'=>'#f7f7f7'
				);
				add_theme_support('custom-background',$background);
				register_nav_menu('primary menu',__('Primary Menu','gblog'));

				$sidebar=array(
					'name'=>__('Main Sidebar','gblog'),
					'id'=>'main-siderbar',
					'decription'=>__('Default Sidebar'),
					'class'=>'main-siderbar',
					'before_title'=>'<div class="title"><i class="fa fa-dot-circle-o"></i> ',
					'after_title'=>'</div><p>',
					'before_widget'=>'<div class="main-right-sidebar">',
					'after_widget'=>'</p></div>'

				);
				register_sidebar($sidebar);
			}
			add_action('init','gblog_theme_setup');
		}
		/** Time post new */
		if(!function_exists('gblog_post_times')){
			function gblog_post_times(){
				$time=human_time_diff(get_the_time('U'),current_time('timestamp'))." trước";
				return $time;
			}
		}

		/** content_post_string */
		if(!function_exists('gblog_post_content')){
			function gblog_post_content($limit){
				$content=explode(' ',get_the_content(),$limit);
				if($content>=$limit){
					array_pop($content);
					$content=implode(" ",$content)."...";
				}else{
					$content=implode(" ",$content);
				}
				$content=preg_replace('/[.+]/','',$content);
				$content=apply_filters('the_content',$content);
				$content=str_replace("]]>","]]>",$content);
				return $content;
			}
		}

		/*** hien thi menu*/
		if(!function_exists('gblog_menu')){
			function gblog_menu($menu){
				$menu=array(
					'theme_location'=>$menu,
					'container'=>'nav',
					'container_class'=>$menu

				);
				wp_nav_menu($menu);
			}
		}

		/**wp cateori**/
		if(!function_exists('gblog-category')){
			function gblog_category(){
				$arg=array(
					'type'=>'post',
					'orderby'=>'id',
					'parent'=>'',
					'child'=>'0',
					'hide_empty'=>'0'
				);
				$categories=get_categories($arg);
				foreach($categories as $category){
					echo "<ul>";
					echo "<li><a href='".get_term_link($category->slug,"category")."'><i class='fa fa-circle'></i> ". $category->name ." ( " .$category->count. " )</a></li>";
					echo "</ul> ";
				}
			}
		}
		

		/** phan trang */
		if(!function_exists("gblog_page")){
			function gblog_page(){
				global $wp_query;
				$big=9999999;
				echo paginate_links(array(
					'base'=>str_replace($big,'%#%',esc_url(get_pagenum_link($big))),
					'format'=>'?paged=%#%',
					'prev_text'=>__('«'),
					'next_text'=>__('»'),
					'current'=>max(1,get_query_var('paged')),
					'total'=>$wp_query->max_num_pages,
				));

			}
		}