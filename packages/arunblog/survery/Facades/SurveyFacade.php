<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Survey\Facades;

use Illuminate\Support\Facades\Facade;
use SebastianBergmann\GlobalState\RuntimeException;

class SurveyFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */

    protected static function getFacadeAccessor()
    {
        return 'surveyfacade';
    }
    
}
