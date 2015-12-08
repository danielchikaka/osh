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


Route::get('/', 'HomeController@index');
Route::get('dash', 'HomeController@admin');
Route::get('home', 'HomeController@admin');
Route::get('auth/changepassword', 'UsersController@changePasswordForm');
Route::post('auth/changepassword', 'UsersController@changePassword');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

	Route::resource('publications','PublicationsController');
	Route::get('admin-publications',['as'=>'publications.admin','uses'=>'PublicationsController@admin']);
	Route::get('publications-publish/{slug}',['as'=>'publications.publish','uses'=>'PublicationsController@publish']);
		
	Route::resource('tenders','TendersController');
	Route::get('admin-tenders',['as'=>'tenders.admin','uses'=>'TendersController@admin']);
	Route::get('tenders-publish/{slug}',['as'=>'tenders.publish','uses'=>'TendersController@publish']);
	

	Route::resource('publications-categories','PublicationsCategoriesController',['except'=>['index']]);
	Route::get('publications-categories/{categorySlug}',['as'=>'publications-categories.index','uses'=>'PublicationsCategoriesController@index']);
	Route::get('admin-publications-categories',['as'=>'publications-categories.admin','uses'=>'PublicationsCategoriesController@admin']);
	Route::get('publications-categories-publish/{slug}',['as'=>'publications-categories.publish','uses'=>'PublicationsCategoriesController@publish']);

	Route::resource('news','NewsController');
	Route::get('admin-news',['as'=>'news.admin','uses'=>'NewsController@admin']);
	Route::get('news/publish/{slug}',['as'=>'news.publish','uses'=>'NewsController@publish']);


	Route::resource('trainings','TrainingsController');
	Route::get('admin-trainings',['as'=>'trainings.admin','uses'=>'TrainingsController@admin']);
	Route::get('trainings/publish/{slug}',['as'=>'trainings.publish','uses'=>'TrainingsController@publish']);	

	Route::resource('socials','SocialsController');
	Route::get('admin-socials',['as'=>'socials.admin','uses'=>'SocialsController@admin']);
	Route::get('socials/publish/{slug}',['as'=>'socials.publish','uses'=>'SocialsController@publish']);	


	Route::resource('vacancies','VacanciesController');
	Route::get('admin-vacancies',['as'=>'vacancies.admin','uses'=>'VacanciesController@admin']);
	Route::get('vacancies/publish/{slug}',['as'=>'vacancies.publish','uses'=>'VacanciesController@publish']);
	
	Route::resource('pressreleases','PressReleasesController');
	Route::get('admin-pressreleases',['as'=>'pressreleases.admin','uses'=>'PressReleasesController@admin']);
	Route::get('pressreleases/publish/{slug}',['as'=>'pressreleases.publish','uses'=>'PressReleasesController@publish']);
	

	Route::resource('workplaces','WorkplacesController');
	Route::get('admin-workplaces',['as'=>'workplaces.admin','uses'=>'WorkplacesController@admin']);
	Route::get('workplaces/publish/{slug}',['as'=>'workplaces.publish','uses'=>'WorkplacesController@publish']);


	Route::resource('privaces','PrivaciesController');
	Route::get('admin-privaces',['as'=>'privacies.admin','uses'=>'PrivaciesController@admin']);
	Route::get('privaces/publish/{slug}',['as'=>'privaces.publish','uses'=>'PrivaciesController@publish']);


	Route::resource('disclamers','DisclamersController');
	Route::get('admin-disclamers',['as'=>'disclamers.admin','uses'=>'DisclamersController@admin']);
	Route::get('disclamers/publish/{slug}',['as'=>'disclamers.publish','uses'=>'DisclamersController@publish']);


		Route::resource('complaints','ComplaintsController');
	Route::get('admin-complaints',['as'=>'complaints.admin','uses'=>'ComplaintsController@admin']);
	Route::get('complaints/publish/{slug}',['as'=>'complaints.publish','uses'=>'ComplaintsController@publish']);


	Route::resource('faqs','FaqController');
	Route::get('admin-faqs',['as'=>'faqs.admin','uses'=>'FaqController@admin']);
	Route::get('faqs/publish/{slug}',['as'=>'faqs.publish','uses'=>'FaqController@publish']);


	Route::resource('quicklinks','QuickLinksController');
	Route::get('admin-quicklinks',['as'=>'quicklinks.admin','uses'=>'QuickLinksController@admin']);
	Route::get('quicklinks/publish/{slug}',['as'=>'quicklinks.publish','uses'=>'QuickLinksController@publish']);

	Route::resource('relatedlinks','RelatedLinksController');
	Route::get('admin-relatedlinks',['as'=>'relatedlinks.admin','uses'=>'RelatedLinksController@admin']);
	Route::get('relatedlinks/publish/{slug}',['as'=>'relatedlinks.publish','uses'=>'RelatedLinksController@publish']);


	Route::resource('galleries','GalleriesController');
	Route::get('admin-galleries',['as'=>'galleries.admin','uses'=>'GalleriesController@admin']);
	Route::get('galleries/publish/{slug}',['as'=>'galleries.publish','uses'=>'GalleriesController@publish']);	

	Route::resource('videos','VideosController');
	Route::get('admin-videos',['as'=>'videos.admin','uses'=>'VideosController@admin']);
	Route::get('videos/publish/{slug}',['as'=>'videos.publish','uses'=>'VideosController@publish']);	

	Route::resource('media','MediaController');
	Route::get('admin-media',['as'=>'media.admin','uses'=>'MediaController@admin']);
	Route::get('media/publish/{slug}',['as'=>'media.publish','uses'=>'MediaController@publish']);	


	Route::resource('menuitems','MenuItemsController');
	Route::get('admin-menuitems',['as'=>'menuitems.admin','uses'=>'MenuItemsController@admin']);
	Route::get('menuitems/publish/{slug}',['as'=>'menuitems.publish','uses'=>'MenuItemsController@publish']);
	Route::post('ajax-update',['as'=>'menuitems.ajaxupdate','uses'=>'MenuItemsController@menu_update']);
	Route::get('menuitems-links',['as'=>'menuitems.items','uses'=>'MenuItemsController@items']);
	// Route::get('menuitems-links',['as'=>'menuitems.items','uses'=>'MenuItemsController@items']);




	Route::resource('contact','ContactController');
	Route::get('contact-us',['as'=>'contact.contact-us','uses'=>'ContactController@contactUs']);
	Route::post('contact-us',['as'=>'contact.send-mail','uses'=>'ContactController@sendMail']);





	Route::resource('biographies','BiographiesController');
	Route::post('biographies/${id}/photo',['as'=>'biographies.img-edit','uses'=>'BiographiesController@editPhoto']);
	Route::get('admin-biography',['as'=>'biographies.admin','uses'=>'BiographiesController@admin']);

	Route::resource('pages','PagesController');
	Route::get('admin-pages',['as'=>'admin.pages','uses'=>'PagesController@admin']);
	Route::get('pages-publish/{slug}',['as'=>'pages.publish','uses'=>'PagesController@publish']);
	
	Route::resource('categories','CategoriesController');
	Route::get('admin-categories',['as'=>'categories.admin','uses'=>'CategoriesController@admin']);
	Route::get('categories/publish/{slug}',['as'=>'categories.publish','uses'=>'CategoriesController@publish']);

	Route::get('langtrans',['as'=>'change-language','uses'=>'TranslationController@langChange']);

	Route::get('search',['as'=>'search.search','uses'=>'SearchController@searchResults']);

