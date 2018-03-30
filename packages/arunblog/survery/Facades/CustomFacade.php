<?php


/* Custom Facade will evaluate the avarage ratings and Rating Array
 * @return: Array Obj;
 * @author: Arun Verma<arun12verma@gmail.com>
 * Dated: 29th-March-2019
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
        try {
            if (empty($data))
                throw new Exception("No Data found", 404);

            $totalcount = count($data);
            $totalReviews = self::arraySum($data);
            $avarageRating = $totalReviews / $totalcount;

            return $avarageRating;
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    
    
    public static function arraySum($data = []) {
        $sum = 0;
        foreach ($data as $item) {
            $sum += $item['rating_id'];
        }
        return $sum;
    }

}