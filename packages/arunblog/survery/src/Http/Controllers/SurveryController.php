<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Survey\Http\Controllers;

use PHPUnit\Framework\Constraint\Exception;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use Survey\Models\ReviewsModel;
use Survey\Facades\SurveyFacade;
use MySurvey;

class SurveryController extends Controller
{
    private $model = NULL;
    private $_facade = NULL;
    
    public function __construct(ReviewsModel $survey)
    {
        $this->model = $survey;
     
    }


    public function index( $data = NULL,  Request $request)
    {
        $embed = (isset($data['embed'])?($data['embed']):(array()));
        $allReviews  = ReviewsModel::with($embed)->get();
         
        if($allReviews->count() == 0)
            throw new Exception("No records available", 401);
        
        $data = [];
        $data['count']= $allReviews->count();
        $data['reviews'] = $allReviews->toArray();

        //Rating Calculaton 
        $ratings = MySurvey::getRatings();
        
        return view('survey::survey-index',['reviews'=> $data]);
    
    }
    
    
}