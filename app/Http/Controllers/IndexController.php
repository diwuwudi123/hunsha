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
        for ($i=1; $i < 15; $i++) { 
            $images[] = "1 ({$i})" .'.jpg';
        }
        return view('index', ['images' => $images]);
    }

}
