<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Survey\Http\Controllers;

use App\Http\Controllers\Controller;

use Survey\Models\SurveyModel;

class SurveryController extends Controller
{
    
    public function index()
    {
        $model = new SurveyModel();
        //echo $model->index(); exit;
        return view('survey::survey-index',['mydata'=> array('fruit'=>'Apple','fruit2'=> "Mango")]);
    
    }
}