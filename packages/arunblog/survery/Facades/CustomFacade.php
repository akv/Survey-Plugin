<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Survey\Facades;

class CustomFacade {
    
    public static function getRatings($data = []) {
        try {
            if (empty($data))
                throw new Exception("No Data found", 404);
            // We will populate the rating array
            $ratingArr = [];

            foreach ($data as $rating) {
                $ratingArr[] = $rating['rating_id'];
            }

            return array_count_values($ratingArr);
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public static function avarageRating($data = []){
        if (empty($data))
                throw new Exception("No Data found", 404);
        
        $totalcount = count($data);  
        $totalReviews = self::arraySum($data); 
        $avarageRating  = $totalReviews/$totalcount;
        
        return $avarageRating;
        
    }
    
    
    public static function arraySum($data = []) {
        $sum = 0;
        foreach ($data as $item) {
            $sum += $item['rating_id'];
        }
        return $sum;
    }

}