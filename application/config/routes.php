<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//Frontend

$route['default_controller'] = 'mainframe_front/index';

$route['category/(.+)'] = 'mainframe_front/category/$1';

$route['archive/(.+)'] = 'mainframe_front/archive/$1';

$route['news-view/(.+)'] = 'mainframe_front/news_view/$1';

$route['front-video'] = 'mainframe_front/video';

$route['chobighor'] = 'mainframe_front/gallary';

$route['search-news'] = 'mainframe_front/search_news';

$route['pages/(.+)'] = 'mainframe_front/page/$1';

$route['get-visitor'] = 'mainframe_front/get_visitor';

$route['save-subscribe'] = 'mainframe_front/save_subscribe';

$route['click-ad-statistics'] = 'mainframe_front/ad_statistics';





$route['contact'] = 'mainframe_front/contact';

$route['contact-send'] = 'mainframe_front/contact_send';






//backend

$route['xyz'] = 'login_controller';

$route['user-login'] = 'login_controller/check_login';

$route['dashboard'] = 'mainframe_back';

$route['about'] = 'mainframe_back/about';

$route['logout'] = 'logout_controller';



//Admin Users 

$route['users'] = 'user_controller';

$route['save-user'] = 'user_controller/save_user';

$route['update-user'] = 'user_controller/update_user';

//role-settings 

$route['role-settings'] = 'user_controller/role_settings';

$route['update-role'] = 'user_controller/update_role';





//visitors

$route['visitor-statistics'] = 'statistics_controller/visitor_statistics';

$route['search-site-stat'] = 'statistics_controller/search_site_statistics';

$route['search-site-total'] = 'statistics_controller/search_site_total';



//add

$route['ad-statistics'] = 'statistics_controller/ad_statistics';

$route['search-ad-stat'] = 'statistics_controller/search_ad_statistics';

$route['search-site-total'] = 'statistics_controller/search_site_total';




//block-settings 

$route['block-settings'] = 'category_controller/block_settings';

$route['update-block'] = 'category_controller/update_block';

//catgory

$route['category'] = 'category_controller';

$route['save-category'] = 'category_controller/save_category';

$route['update-category'] = 'category_controller/update_category';



//reporters

$route['reporters'] = 'reporters_controller';

$route['save-reporter'] = 'reporters_controller/save_reporter';

$route['update-reporter'] = 'reporters_controller/update_reporter';







//Menu

$route['menu'] = 'menu_controller';


$route['update-menu'] = 'menu_controller/update_menu';

$route['get-sub-cats'] = 'menu_controller/get_sub_cats';


//post


$route['new-post'] = 'Post_controller';

$route['all-post'] = 'post_controller/all_post_list';

$route['save-post'] = 'post_controller/save_post';

$route['search-post'] = 'post_controller/search_post';

$route['update-post'] = 'post_controller/update_post';

$route['delete-post/(.+)'] = 'post_controller/delete_post/$1';

$route['get-post-des'] = 'post_controller/get_post_des';

$route['get-post-cats'] = 'post_controller/get_post_cats';




//page

$route['new-page'] = 'page_controller';

$route['save-page'] = 'page_controller/save_page';

$route['all-page'] = 'page_controller/all_page_list';

$route['update-page'] = 'page_controller/update_page';

$route['delete-page/(.+)'] = 'page_controller/delete_page/$1';

$route['search-page'] = 'page_controller/search_page';

$route['get-page-des'] = 'page_controller/get_page_des';





//image

$route['gallary'] = 'gallary_controller';

$route['save-image'] = 'gallary_controller/save_image';

$route['update-image'] = 'gallary_controller/update_image';

$route['delete-image/(.+)'] = 'gallary_controller/delete_image/$1';



//media

$route['media'] = 'media_controller';

$route['save-media'] = 'media_controller/save_media';

$route['search-media'] = 'media_controller/search_media';

$route['delete-media/(.+)'] = 'media_controller/delete_media/$1';


//media archive

$route['save-archive-media'] = 'archive_controller/save_media';

$route['search-archive-media'] = 'archive_controller/search_media'; 

$route['get-media'] = 'archive_controller/get_media';

//advertisement

$route['advertisement'] = 'advertisement_controller';

$route['save-advertisement'] = 'advertisement_controller/save_advertisement';

$route['update-advertisement'] = 'advertisement_controller/update_advertisement';

$route['delete-advertisement/(.+)'] = 'advertisement_controller/delete_advertisement/$1';



//video

$route['video'] = 'video_controller';

$route['save-video'] = 'video_controller/save_video';

$route['update-video'] = 'video_controller/update_video';

$route['delete-video/(.+)'] = 'video_controller/delete_video/$1';


//Videos

$route['subscribers'] = 'subscribers_controller';

$route['send-newsletters'] = 'subscribers_controller/send_newsletters';



//Meta

$route['meta'] = 'meta_controller';

$route['save-meta'] = 'meta_controller/save_meta';



// Settings

$route['settings'] = 'settings_controller';

$route['save-settings'] = 'settings_controller/save_settings';




//overrides

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
