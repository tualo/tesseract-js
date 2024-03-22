<?php

namespace Tualo\Office\TesseractJs\Middlewares;
use Tualo\Office\Basic\TualoApplication as App;
use Tualo\Office\Basic\IMiddleware;

class Middleware implements IMiddleware{
    public static function register(){
        App::use('tesseractjx',function(){
            try{
                App::javascript('tesseractjx', './tesseractjs/lib/tesseract.min.js',[],-80000);
            }catch(\Exception $e){
                App::set('maintanceMode','on');
                App::addError($e->getMessage());
            }
        },-100); // should be one of the last
    }
}