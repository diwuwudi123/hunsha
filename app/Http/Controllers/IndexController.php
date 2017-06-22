<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    public function index()
    {
        $route = Route::current();

$name = Route::currentRouteName();

$action = Route::currentRouteAction();
    var_dump($route);
    var_dump($name);
    var_dump($action);die;
        for ($i=1; $i < 42; $i++) { 
            $images[] = "1 ({$i})" .'.jpg';
        }
        return view('welcome', ['images' => $images]);
    }
    public function error()
    {
        echo '123';
    }
}
