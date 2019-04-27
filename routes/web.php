<?php



Route::get('/','HomeController@index');

Route::get('/post/{post}','AdminPostsController@post');

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/logout', 'Auth\LoginController@logout');

Route::group(['middleware'=>'admin'],function(){

  Route::get('/admin','AdminController@index');


  Route::resource('admin/users','AdminUsersController');
  Route::resource('admin/posts','AdminPostsController');
  Route::resource('admin/categories','AdminCategoriesController');
  Route::resource('admin/medias','AdminMediasController');
  Route::resource('admin/comments','PostsCommentsContoller');
  Route::resource('comment/replies','CommentsRepliesController');

});

Route::delete('delete/media','AdminMediasController@deleteMedia');


Route::group(['middleware'=>'auth'],function(){

  Route::post('comment/reply','CommentsRepliesController@createReply');

});
