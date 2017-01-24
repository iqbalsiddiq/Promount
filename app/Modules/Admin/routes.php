<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::group(array('module'=>'Admin','namespace' => 'App\Modules\Admin\Controllers'), function() {
// default public route
Route::get('/admin/', 'DashboardController@index');

// dashboard route
Route::get('/admin/dashboard/index', 'DashboardController@index');

// frontend route
Route::get('/admin/frontend/index', 'DashboardController@frontend');

// versions route
Route::get('/admin/versions/index', 'DashboardController@version');

// versions route
Route::get('/admin/animate/index', 'DashboardController@animate');

// start blog route
Route::get('/admin/blog/grid', 'BlogController@grid');
Route::get('/admin/blog/list', 'BlogController@getlist');
Route::get('/admin/blog/single', 'BlogController@single');
// end blog route

// start mail route
Route::get('/admin/mail/inbox', 'MailController@inbox');
Route::get('/admin/mail/compose', 'MailController@compose');
Route::get('/admin/mail/view', 'MailController@view');
// end mail route

// start page route
Route::get('/admin/page/gallery', 'PageController@gallery');
Route::get('/admin/page/faq', 'PageController@faq');
Route::get('/admin/page/invoice', 'PageController@invoice');
Route::get('/admin/page/messages', 'PageController@messages');
Route::get('/admin/page/timeline', 'PageController@timeline');
Route::get('/admin/page/profile', 'PageController@profile');
Route::get('/admin/page/search-course', 'PageController@searchCourse');

Route::get('/admin/page/error-403', 'PageController@error403');
Route::get('/admin/page/error-404', 'PageController@error404');
Route::get('/admin/page/error-500', 'PageController@error500');
Route::get('/admin/page/error-403-type-2', 'PageController@error403Type2');
Route::get('/admin/page/error-404-type-2', 'PageController@error404Type2');
Route::get('/admin/page/error-500-type-2', 'PageController@error500Type2');

Route::get('/admin/page/signin', 'PageController@signin');
Route::get('/admin/page/signintype2', 'PageController@signinType2');
Route::get('/admin/page/signup', 'PageController@signup');
Route::get('/admin/page/lost-password', 'PageController@lostPassword');
Route::get('/admin/page/lock-screen', 'PageController@lockScreen');

Route::get('dashboard/signin', 'PageController@signin');
Route::get('dashboard/lock-screen', 'PageController@lockScreen');
// end page route

// start form route
Route::get('/admin/form/element', 'FormController@element');
Route::get('/admin/form/advanced', 'FormController@advanced');
Route::get('/admin/form/layout', 'FormController@layout');
Route::get('/admin/form/validation', 'FormController@validation');
Route::get('/admin/form/wizard', 'FormController@wizard');
Route::get('/admin/form/wysiwyg', 'FormController@wysiwyg');
Route::get('/admin/form/xeditable', 'FormController@xeditable');
// end form route


// start table route
Route::get('/admin/table/default', 'TableController@defaults');
Route::get('/admin/table/color', 'TableController@color');
Route::get('/admin/table/datatable', 'TableController@datatable');
// end table route

// start maps route
Route::get('/admin/map/google', 'MapController@google');
Route::get('/admin/map/vector', 'MapController@vector');
// end maps route

// start chart route
Route::get('/admin/chart/flot', 'ChartController@flot');
Route::get('/admin/chart/morris', 'ChartController@morris');
Route::get('/admin/chart/chartjs', 'ChartController@chartjs');
Route::get('/admin/chart/c3js', 'ChartController@c3js');
// end chart route

// start component route
Route::get('/admin/component/grid-system', 'ComponentController@gridSystem');
Route::get('/admin/component/buttons', 'ComponentController@buttons');
Route::get('/admin/component/typography', 'ComponentController@typography');
Route::get('/admin/component/panel', 'ComponentController@panel');
Route::get('/admin/component/alerts', 'ComponentController@alerts');
Route::get('/admin/component/modals', 'ComponentController@modals');
Route::get('/admin/component/video', 'ComponentController@video');
Route::get('/admin/component/tabsaccordion', 'ComponentController@tabsaccordion');
Route::get('component/sliders', 'ComponentController@sliders');

Route::get('/admin/component/icon/glyphicons', 'ComponentController@glyphicons');
Route::get('/admin/component/icon/glyphicons-pro', 'ComponentController@glyphiconsPro');
Route::get('/admin/component/icon/font-awesome', 'ComponentController@fontAwesome');
Route::get('/admin/component/icon/weather-icons', 'ComponentController@weatherIcons');
Route::get('/admin/component/icon/map-icons', 'ComponentController@mapIcons');
Route::get('/admin/component/icon/simple-line-icons', 'ComponentController@simpleLineIcons');

Route::get('/admin/component/other', 'ComponentController@other');
// end component route

// start layout route
Route::get('/admin/layout/blank', 'LayoutController@blank');
Route::get('/admin/layout/boxed', 'LayoutController@boxed');
Route::get('/admin/layout/header-fixed', 'LayoutController@headerFixed');
Route::get('/admin/layout/sidebar-fixed', 'LayoutController@sidebarFixed');
Route::get('/admin/layout/sidebar-minimize', 'LayoutController@sidebarMinimize');
Route::get('/admin/layout/sidebar-default', 'LayoutController@sidebarDefault');
Route::get('/admin/layout/sidebar-box', 'LayoutController@sidebarBox');
Route::get('/admin/layout/sidebar-rounded', 'LayoutController@sidebarRounded');
Route::get('/admin/layout/sidebar-circle', 'LayoutController@sidebarCircle');
Route::get('/admin/layout/footer-fixed', 'LayoutController@footerFixed');
// end layout route

// start widget route
Route::get('/admin/widget/overview', 'WidgetController@overview');
Route::get('/admin/widget/social', 'WidgetController@social');
Route::get('/admin/widget/blog', 'WidgetController@blog');
Route::get('/admin/widget/weather', 'WidgetController@weather');
Route::get('/admin/widget/misc', 'WidgetController@misc');
// end widget route
});
