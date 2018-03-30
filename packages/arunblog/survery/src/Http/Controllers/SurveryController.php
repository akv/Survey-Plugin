<?php

/* This comtroller will take care all the select and add operation to the table
 * @author: Arun Verma<arun12verma@gmail.com>
 * Dated: 29th-March-2019
 */

namespace Survey\Http\Controllers;

use PHPUnit\Framework\Constraint\Exception;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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


    public function index($data = NULL, Request $request) {
        try {
            $embed = (isset($data['embed']) ? ($data['embed']) : (array()));
            $allReviews = ReviewsModel::with($embed)->get();

            if ($allReviews->count() == 0)
                throw new Exception("No records available", 401);

            $data = [];
            $data['count'] = $allReviews->count();
            $data['reviews'] = $allReviews->toArray();

             //Rating Calculaton 
             $ratings = MySurvey::getRatings($data['reviews']);
            
             //Getting the Avarage User Rating Data
             $avarageUserRating = MySurvey::avarageRating($data['reviews']); 
             $avarageUserRating= number_format((float)$avarageUserRating, 1, '.', '');
             $avarageRating = floor($avarageUserRating);
            
             
            return view('survey::survey-index', ['reviews' => $data, 'ratings'=>$ratings,'avarageRating'=> $avarageRating , 'avg_rating'=> $avarageUserRating]);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function addReview(Request $request) {
        try {
           
            $postData = $request->all();
         
            if(!isset($postData))
                throw new Exception ('Data not posted to the function', 404);
            unset($postData['_token']);            
             try{
			$review = new ReviewsModel();
			foreach($postData as $key => $value){
				$review->{$key} = $value;
			}
			$review->save();
			
                        $success = "Your feedback is submitted successfully, thanks for your review!";
                        return redirect('/audit')->with('success_message', $success);
		}catch (\Exception $e){
			throw new \Symfony\Component\CssSelector\Exception\InternalErrorException("We are facing some issue with our api. Please try after some time.",500);
		}
            
            
        } catch (Exception $ex) {
            throw $ex;
        }
          
    }

}