<?php
use Illuminate\Http\Request;
Route::get('/', function () {
    return view('index');
});
Route::get('GetAllUserReview', 'UserReviewController@GetAllUserReview');
Route::get('GetByIdUserReview/{id}', 'UserReviewController@GetByIdUserReview');
Route::post('CreateUserReview', 'UserReviewController@CreateUserReview');
Route::post('UpdateUserReview/{id}', 'UserReviewController@UpdateUserReview');
Route::post('DeleteUserReview/{id}', 'UserReviewController@DeleteUserReview');
