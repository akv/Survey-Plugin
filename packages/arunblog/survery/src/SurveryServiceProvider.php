<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Survey;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Artisan;

use Illuminate\Support\ServiceProvider;

class SurveryServiceProvider extends ServiceProvider {

    public function boot() 
    {
            $this->loadRoutesFrom(__DIR__.'/routes/web.php');
            $this->loadViewsFrom(__DIR__.'/./../resources/views', 'survey');
            $this->loadMigrationsFrom(__DIR__.'/migrations');
            $this->registerSeedsFrom(__DIR__.'/seeds') ;
          
    }

    public function register() {
         App::bind('surveyfacade', function()
        {
            return new \Survey\Facades\CustomFacade;
        });
    }
   
    /*Function will register the seeds folder with the main seeding command need to execute as there is no inbuild function 
   */
  protected function registerSeedsFrom($path) {
        foreach (glob("$path/*.php") as $filename) {
            include $filename;
            $classes = get_declared_classes();
            $class = end($classes);

            $command = Request::server('argv', null);
            if (is_array($command)) {
                $command = implode(' ', $command);
                if ($command == "artisan db:seed") {
                    Artisan::call('db:seed', ['--class' => $class]);
                }
            }
        }
    }

}
