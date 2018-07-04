<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('login/facebook', 'Auth\LoginController@redirectToProvider')->name('facebook.login');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => '/admin'], function () {
	/**
	 * Starting Routes for CompanyTypeController
	 */
	Route::group(['middleware' => ['permission:View_Company_Type']], function () {
		Route::get('company_types', 'CompanyTypeController@index')->name('company_type.index');
	});

	Route::group(['middleware' => ['permission:Add_Company_Type']], function () {
		Route::get('company_types/create', 'CompanyTypeController@create')->name('company_type.create');
		Route::post('company_types', 'CompanyTypeController@store')->name('company_type.store');
	});

	Route::group(['middleware' => ['permission:Edit_Company_Type']], function () {
		Route::get('company_types/{id}/edit', 'CompanyTypeController@edit')->name('company_type.edit');
		Route::patch('company_types/{id}', 'CompanyTypeController@update')->name('company_type.update');
	});

	Route::group(['middleware' => ['permission:Delete_Company_Type']], function () {
		Route::delete('company_types/{id}', 'CompanyTypeController@destroy')->name('company_type.destroy');
	});
	/**
	 * Ending Routes For CompanyTypeController
	 */
	
	/**
	 * Starting Routes For CompanyController
	 */
	Route::group(['middleware' => ['permission:View_Company']], function () {
		Route::get('companies', 'CompanyController@index')->name('company.index');
	});
	Route::group(['middleware' => ['permission:Add_Company']], function () {
		Route::get('companies/create', 'CompanyController@create')->name('company.create');
		Route::post('companies/store', 'CompanyController@store')->name('company.store');
	});
	Route::group(['middleware' => ['permission:Edit_Company']], function () {
		Route::get('companies/{id}/edit', 'CompanyController@edit')->name('company.edit');
		Route::patch('companies/{id}', 'CompanyController@update')->name('company.update');
	});
	Route::group(['middleware' => ['permission:Delete_Company']], function () {
		Route::delete('companies/{id}', 'CompanyController@destroy')->name('company.destroy');
	});
	/**
	 * Ending Routes For CompanyController
	 */
	
	/**
	 * Starting Routes For EventController
	 */
	Route::group(['middleware' => ['permission:View_Event']], function () {
		Route::get('events', 'EventController@index')->name('event.index');
	});
	Route::group(['middleware' => ['permission:Add_Event']], function () {
		Route::get('events/create', 'EventController@create')->name('event.create');
		Route::post('events/store', 'EventController@store')->name('event.store');
	});
	Route::group(['middleware' => ['permission:Edit_Event']], function () {
		Route::get('events/{id}/edit', 'EventController@edit')->name('event.edit');
		Route::patch('events/{id}', 'EventController@update')->name('event.update');
	});
	Route::group(['middleware' => ['permission:Delete_Event']], function () {
		Route::delete('events/{id}', 'EventController@destroy')->name('event.destroy');
	});
	/**
	 * Ending Routes For EventController
	 */
	
	/**
	 * Starting Routes For EventPlaceController
	 */
	Route::group(['middleware' => ['permission:View_Event_Place']], function () {
		Route::get('event_places', 'EventPlaceController@index')->name('event_place.index');
	});
	Route::group(['middleware' => ['permission:Add_Event_Place']], function () {
		Route::get('event_places/create', 'EventPlaceController@create')->name('event_place.create');
		Route::post('event_places/store', 'EventPlaceController@store')->name('event_place.store');
	});
	Route::group(['middleware' => ['permission:Edit_Event_Place']], function () {
		Route::get('event_places/{id}/edit', 'EventPlaceController@edit')->name('event_place.edit');
		Route::patch('event_places/{id}', 'EventPlaceController@update')->name('event_place.update');
	});
	Route::group(['middleware' => ['permission:Delete_Event_Place']], function () {
		Route::delete('event_places/{id}', 'EventPlaceController@destroy')->name('event_place.destroy');
	});
	/**
	 * Ending Routes For EventPlaceController
	 */
	
	/**
	 * Starting Routes For ProjectController
	 */
	// Route::group(['middleware' => ['permission:View_Project']], function () {
		Route::get('projects', 'ProjectController@index')->name('project.index');
	// });
	Route::group(['middleware' => ['permission:Add_Project']], function () {
		Route::get('projects/create', 'ProjectController@create')->name('project.create');
		Route::post('projects/store', 'ProjectController@store')->name('project.store');
	});
	Route::group(['middleware' => ['permission:Edit_Project']], function () {
		Route::get('projects/{id}/edit', 'ProjectController@edit')->name('project.edit');
		Route::patch('projects/{id}', 'ProjectController@update')->name('project.update');
	});
	Route::group(['middleware' => ['permission:Delete_Project']], function () {
		Route::delete('projects/{id}', 'ProjectController@destroy')->name('project.destroy');
	});
	/**
	 * Ending Routes For ProjectController
	 */
	
	/**
	 * Starting Routes For ProjectUnitController
	 */
	Route::group(['middleware' => ['permission:View_Project_Unit']], function () {
		Route::get('project_units', 'ProjectUnitController@index')->name('project_unit.index');
	});
	Route::group(['middleware' => ['permission:Add_Project_Unit']], function () {
		Route::get('project_units/create', 'ProjectUnitController@create')->name('project_unit.create');
		Route::post('project_units/store', 'ProjectUnitController@store')->name('project_unit.store');
	});
	Route::group(['middleware' => ['permission:Get_Project_Unit']], function () {
		Route::get('project_units/show/{id}', 'ProjectUnitController@show')->name('project_unit.show');
	});
	Route::group(['middleware' => ['permission:Edit_Project_Unit']], function () {
		Route::get('project_units/{id}/edit', 'ProjectUnitController@edit')->name('project_unit.edit');
		Route::patch('project_units/{id}', 'ProjectUnitController@update')->name('project_unit.update');
	});
	Route::group(['middleware' => ['permission:Delete_Project_Unit']], function () {
		Route::delete('project_units/{id}', 'ProjectUnitController@destroy')->name('project_unit.destroy');
	});
	/**
	 * Ending Routes For ProjectUnitController
	 */
	
	/**
	 * Starting Routes For NewsController
	 */
	Route::group(['middleware' => ['permission:View_News']], function () {
		Route::get('news', 'NewsController@index')->name('news.index');
	});
	Route::group(['middleware' => ['permission:Add_News']], function () {
		Route::get('news/create', 'NewsController@create')->name('news.create');
		Route::post('news', 'NewsController@store')->name('news.store');
	});
	Route::group(['middleware' => ['permission:Edit_News']], function () {
		Route::get('news/{id}/edit', 'NewsController@edit')->name('news.edit');
		Route::patch('news/{id}', 'NewsController@update')->name('news.update');
	});
	Route::group(['middleware' => ['permission:Delete_News']], function () {
		Route::delete('news/{id}', 'NewsController@destroy')->name('news.destroy');
	});
	/**
	 * Ending Routes For NewsController
	 */
	
	/**
	 * Starting Routes For PermissionController
	 */
	Route::group(['middleware' => ['permission:View_Permission']], function () {
		Route::get('permissions', 'PermissionController@index')->name('permission.index');
	});
	Route::group(['middleware' => ['permission:Add_Permission']], function () {
		Route::get('permissions/create', 'PermissionController@create')->name('permission.create');
		Route::post('permissions/store', 'PermissionController@store')->name('permission.store');
	});
	Route::group(['middleware' => ['permission:Edit_Permission']], function () {
		Route::get('permissions/{id}/edit', 'PermissionController@edit')->name('permission.edit');
		Route::patch('permissions/{id}', 'PermissionController@update')->name('permission.update');
	});
	Route::group(['middleware' => ['permission:Delete_Permission']], function () {
		Route::delete('permissions/{id}', 'PermissionController@destroy')->name('permission.destroy');
	});
	/**
	 * Ending Routes For PermissionController
	 */
	
	/**
	 * Starting Routes For RoleController
	 */
	Route::group(['middleware' => ['permission:View_Role']], function () {
		Route::get('roles', 'RoleController@index')->name('role.index');
	});
	Route::group(['middleware' => ['permission:Add_Role']], function () {
		Route::get('roles/create', 'RoleController@create')->name('role.create');
		Route::post('roles/store', 'RoleController@store')->name('role.store');
	});
	Route::group(['middleware' => ['permission:Edit_Role']], function () {
		Route::get('roles/{id}/edit', 'RoleController@edit')->name('role.edit');
		Route::patch('roles/{id}', 'RoleController@update')->name('role.update');
	});
	Route::group(['middleware' => ['permission:Delete_Role']], function () {
		Route::delete('roles/{id}', 'RoleController@destroy')->name('role.destroy');
	});
	/**
	 * Ending Routes For RoleController
	 */
	
	/**
	 * Starting Routes For CityController
	 */
	Route::group(['middleware' => ['permission:View_City']], function () {
		Route::get('cities', 'CityController@index')->name('city.index');
	});
	Route::group(['middleware' => ['permission:Add_City']], function () {
		Route::get('cities/create', 'CityController@create')->name('city.create');
		Route::post('cities', 'CityController@store')->name('city.store');
	});
	Route::group(['middleware' => ['permission:Edit_City']], function () {
		Route::get('cities/{id}/edit', 'CityController@edit')->name('city.edit');
		Route::patch('cities/{id}', 'CityController@update')->name('city.update');
	});
	Route::group(['middleware' => ['permission:Delete_City']], function () {
		Route::delete('cities/{id}', 'CityController@destroy')->name('city.destroy');
	});
	/**
	 * Ending Routes For CityController
	 */
	
	/**
	 * Starting Routes For ProjectTypeController
	 */
	Route::group(['middleware' => ['permission:View_Project_Type']], function () {
		Route::get('project_types', 'ProjectTypeController@index')->name('project_type.index');
	});
	Route::group(['middleware' => ['permission:Add_Project_Type']], function () {
		Route::get('project_types/create', 'ProjectTypeController@create')->name('project_type.create');
		Route::post('project_types', 'ProjectTypeController@store')->name('project_type.store');
	});
	Route::group(['middleware' => ['permission:Edit_Project_Type']], function () {
		Route::get('project_types/{id}/edit', 'ProjectTypeController@edit')->name('project_type.edit');
		Route::patch('project_types/{id}', 'ProjectTypeController@update')->name('project_type.update');
	});
	Route::group(['middleware' => ['permission:Delete_Project_Type']], function () {
		Route::delete('project_types/{id}', 'ProjectTypeController@destroy')->name('project_type.destroy');
	});

	Route::group(['middleware' => ['permission:View_Calender']], function () {
		Route::get('calender', 'CalenderController@index')->name('calender.index');
	});
	/**
	 * Ending Routes For PojectypeContoller
	 */
	
	/**
	 * Starting Routes For UserTypeController
	 */
	// Route::group(['middleware' => ['permission:View_User_Type']], function () {
	// 	Route::get('users', 'UserTypeController@index')->name('user.index');
	// });
	// Route::group(['middleware' => ['permission:Add_User_Type']], function () {
	// 	Route::get('users/create', 'UserTypeController@create')->name('user.create');
	// 	Route::post('users/store', 'UserTypeController@store')->name('user.store');
	// });
	// Route::group(['middleware' => ['permission:Edit_User_Type']], function () {
	// 	Route::get('users/{id}/edit', 'UserTypeController@edit')->name('user.edit');
	// 	Route::patch('users/{id}', 'UserTypeController@update')->name('user.update');
	// });
	// Route::group(['middleware' => ['permission:Delete_User_Type']], function () {
	// 	Route::delete('users/{id}', 'UserTypeController@destroy')->name('user.destroy');
	// });
	/**
	 * Ending Routes For UserTypeController
	 */
});
