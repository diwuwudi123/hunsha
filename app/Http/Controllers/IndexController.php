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
