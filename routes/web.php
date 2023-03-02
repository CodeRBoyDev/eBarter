<?php

use Illuminate\Support\Facades\Route;
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
 
Route::get('myverify', function () {
  return view('auth.verify');
});

// USER Route tentative add middleware later

Route::get('signup',
['uses' => 'UserController@register',
'as' => 'user.signup'
]);

Route::get('signin',
['uses' => 'UserController@signin',
'as' => 'user.signin'
]);

Route::post('signin', ['uses' => 'LoginController@postSignin',
'as' => 'user.signin',
]);


Route::post('signup', ['uses' => 'RegisterController@postSignup',
'as' => 'user.postSignup',
]);

// PROFILE Route tentative add middleware later

Route::group(['middleware' => 'role:customer,admin'], function() {
    Route::get('profile', ['uses' => 'UserController@getProfile','as' => 'user.profile',
    ]);
    Route::get('profile/edit/{id}', ['uses' => 'UserController@profileEdit','as' => 'user.edit',
    ]);
    Route::patch('profile/edit/{id}', ['uses' => 'UserController@profilePostEdit','as' => 'user.postedit',
    ]);

    Route::post('request/barter', ['uses' => 'TransactionController@barterRequest','as' => 'barter.request',
  ]);

  Route::patch('request/barter/{id}', ['uses' => 'TransactionController@postRequest','as' => 'barter.update',
]);
Route::get('barterlist', ['uses' => 'TransactionController@barterlist','as' => 'barterlist',
]);
});

Route::get('logout', ['uses' => 'userController@getLogout','as' => 'user.logout',
]);

Route::post('report', ['uses' => 'ReportController@report','as' => 'user.report',
]);

Route::post('cancel',
['uses' => 'TransactionController@cancel',
'as' => 'cancel'
]);


// Home Route tentative add middleware later

Route::get('home',
['uses' => 'HomeController@index',
'as' => 'home'
]);

// Admin Route tentative add middleware later

Route::group(['middleware' => 'role:admin'], function() {
  
  Route::resource('admin','AdminController');

});
 

Route::resource('item','ItemController');


Route::post('follow',
['uses' => 'FollowController@follow',
'as' => 'user.follow'
]);

Route::post('unfollow',
['uses' => 'FollowController@unfollow',
'as' => 'user.unfollow'
]);

Route::get('/chat', 'ChatController@index')->name('chat');
//Search
Route::get('search',['uses' => 'SearchController@search','as' => 'item.search']);

Auth::routes(['verify' => true]);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::fallback(function () {

  return view("404");

});