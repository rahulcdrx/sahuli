<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//outsite Auth
Route::redirect('/', '/home');
    
Route::resource('requestform', 'RegisterController');
Auth::routes(['register' => false]);

Route::resource('contact', 'ContactController');


//prevent back button
Route::group(['middleware'=>'disable_back_btn'], function(){

        Route::get('/home', function () {
            if (session('status')) {
                return redirect()->route('admin.home')->with('status', session('status'));
        }
        return redirect()->route('admin.home');
        });


//for user url
        Route::get('/', 'HomeController@index')->name('home');
        Route::get('search', 'HomeController@search')->name('search');
        Route::resource('jobs', 'JobController')->only(['index', 'show']);
        Route::get('category/{category}', 'CategoryController@show')->name('categories.show');
        Route::get('location/{location}', 'LocationController@show')->name('locations.show');
        Route::get('district/{district}', 'DistrictController@show')->name('districts.show');
        Route::get('state/{state}', 'StateController@show')->name('states.show');

        //dropdown location
        Route::get('getstate/{id}', 'HomeController@getState')->name('jobs.getstate');
        Route::get('getdistrict/{id}', 'HomeController@getDistrict')->name('jobs.getdistrict');

        //all job search
        //Route::get('getsearch/{state_id}/{district}/{location}', 'HomeController@getsearch')->name('home.getsearch');

        //frontend
        Route::get('/', 'HomeController@index')->name('home');
        // Route::get('/govtlist', 'HomeController@govjob')->name('govtlist');
        // Route::get('/govtsche', 'HomeController@govtsche')->name('govtsche');
        // Route::get('/page', 'HomeController@page')->name('page');
        Route::get('/about', 'HomeController@about')->name('about');
        Route::get('/faq', 'HomeController@faq')->name('faq');
        // Route::get('/term', 'HomeController@term')->name('term');

        Route::get('/policy', 'HomeController@policy')->name('policy');
        Route::get('/term', 'HomeController@term')->name('term');
        // Route::get('/myprofile', 'HomeController@myprofile')->name('myprofile');
        // Route::get('/hallticket', 'HomeController@hallticket')->name('hallticket');
        // Route::get('/hallticketgovt', 'HomeController@hallticketgovt')->name('hallticketgovt');
        // Route::get('/resultgovt', 'HomeController@resultgovt')->name('resultgovt');
        // Route::get('/result', 'HomeController@result')->name('result');
        // Route::get('/pvtlist', 'HomeController@pvtjob')->name('pvtlist');
        // Route::get('/stdlist', 'HomeController@stdjob')->name('stdlist');
        //Route::get('/recommendation', 'HomeController@recommendation')->name('recommendation');
        //Route::get('/myprofile', 'ProfileController@myprofile')->name('myprofile');

        // Route::get('getstate/{id}', 'HomeController@getState')->name('home.getstate');
        // Route::get('getdistrict/{id}', 'HomeController@getDistrict')->name('home.getdistrict');
        //Route::get('/pvt','HomeController@index2');
        //Route::get('/pvtlist/advance','HomeController@advance')->name('advance_search');
        //
        //Route::get('/jobpage/{id}', 'HomeController@pagedatashow')->name('jobpage');
        //Route::get('/', 'HomeController@homepagejobshow');
        //

        //pvtlist job
        //Route::get('joblist', 'JobListController');
        //Route::get('/people','JobListController');
        //Route::get('/joblist/simple','JobListController@')->name('simple_search');
        //Route::get('/joblist/advance','JobListController@advance')->name('advance_search');


        //search list
        /*
        Route::get('/search', 'SearchController@index');
        //Route::get('/search/simple','SearchController@simple')->name('simple_search');
        Route::get('/search/advance','SearchController@advance')->name('advance_search');
        Route::get('getstate/{id}', 'SearchController@getState')->name('jobs.getstate');
        Route::get('getdistrict/{id}', 'SearchController@getDistrict')->name('jobs.getdistrict');*/
        //Route::get('/pvtlist', 'HomeController@pvtjob')->name('pvtlist');


        //for direct login
        //Route::redirect('/', '/login');
        // Route::get('/home', function () {
        //     if (session('status')) {
        //         return redirect()->route('admin.home')->with('status', session('status'));
        //     }
        //     return redirect()->route('admin.home');
        // });


        //user
        Route::group(['prefix' => 'user', 'as' => 'user.', 'namespace' => 'User', 'middleware' => ['auth']], function () {

            Route::get('/', 'HomeController@index')->name('home');

            Route::get('/govtlist', 'HomeController@govjob')->name('govtlist');

            Route::get('/govtsche', 'HomeController@govtsche')->name('govtsche');

            Route::get('/page', 'HomeController@page')->name('page');

            Route::get('/term', 'HomeController@term')->name('term');

            Route::get('/myprofile', 'HomeController@myprofile')->name('myprofile');

            Route::get('/hallticket', 'HomeController@hallticket')->name('hallticket');

            Route::get('/hallticketgovt', 'HomeController@hallticketgovt')->name('hallticketgovt');

            Route::get('/resultgovt', 'HomeController@resultgovt')->name('resultgovt');

            Route::get('/result', 'HomeController@result')->name('result');

            Route::get('/pvtlist', 'HomeController@pvtjob')->name('pvtlist');

            Route::get('/stdlist', 'HomeController@stdjob')->name('stdlist');

            //Route::get('/recommendation', 'RecommendationController')->name('recommendation');
            Route::resource('/recommendation','RecommendationController');


            Route::get('getstate/{id}', 'HomeController@getState')->name('home.getstate');

            Route::get('getdistrict/{id}', 'HomeController@getDistrict')->name('home.getdistrict');

            Route::get('getsearch/{state_id}/{district}/{location}', 'HomeController@getsearch')->name('home.getsearch');

            Route::get('/jobpage/{id}', 'HomeController@pagedatashow')->name('jobpage');


        });



        Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth','admin']], function () {
            Route::get('/', 'HomeController@index')->name('home');
            // Permissions
            Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
            Route::resource('permissions', 'PermissionsController');

            // Roles
            Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
            Route::resource('roles', 'RolesController');

            // Users
            Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
            Route::resource('users', 'UsersController');

            // Categories
            Route::delete('categories/destroy', 'CategoriesController@massDestroy')->name('categories.massDestroy');
            Route::resource('categories', 'CategoriesController');

            // Locations
            Route::delete('locations/destroy', 'LocationsController@massDestroy')->name('locations.massDestroy');
            Route::resource('locations', 'LocationsController');

            // Companies
            Route::delete('companies/destroy', 'CompaniesController@massDestroy')->name('companies.massDestroy');
            Route::post('companies/media', 'CompaniesController@storeMedia')->name('companies.storeMedia');
            Route::resource('companies', 'CompaniesController');

            // Jobs
            Route::delete('jobs/destroy', 'JobsController@massDestroy')->name('jobs.massDestroy');
            Route::resource('jobs', 'JobsController');

            //payment
            Route::resource('payment','PaymentController');

            //subscription
            Route::resource('subscription', 'SubscriptionController');

            //banner
            Route::resource('banner','BannerController');

            //advertisement
            Route::resource('advertisement','AdvertisementController');

            //dropdown
        // Route::get('myform/{id}','StatedistrictController@myformAjax');

            Route::get('locations/getstate/{id}', 'LocationsController@getstate')->name('locations.getstate');

            //dropdown for jobs
            Route::get('jobs/getstate/{id}', 'JobsController@getState')->name('jobs.getstate');
            Route::get('jobs/getdistrict/{id}', 'JobsController@getDistrict')->name('jobs.getdistrict');
            Route::get('jobs/getsubcat/{id}', 'JobsController@getsubcat')->name('jobs.getsubcat');


            //request
            //request
            Route::resource('request','RequestController');
            //

            //setting
            Route::resource('setting','SettingController');
            //news
            Route::resource('news','NewsController');
            Route::resource('recommendation','RecommendationController');
            Route::resource('hallticket','HallticketController');
            Route::resource('result','ResultController');
            Route::resource('contactus','ContactUsController');
            Route::resource('schemecat', 'SchemecatController');
            Route::resource('scheme', 'SchemeController');

            });
});


