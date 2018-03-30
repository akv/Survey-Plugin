<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$namespace = 'Survey\Http\Controllers';

Route::group([
    'namespace'=> $namespace,
    'prefix'=> 'audit',
], function (){
    
    Route::get('/', 'SurveryController@index');
    Route::post('/review/add', 'SurveryController@addReview');
    
    
});