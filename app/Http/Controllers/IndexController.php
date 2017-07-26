<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
            $images[] = "1 ({$i})".'.jpg';
        }
        return view('welcome', ['images' => $images]);
    }
    public function wel()
    {
        for ($i=1; $i < 15; $i++) { 
            $images[] = "1 ({$i})".'.jpg';
        }
        return view('welcome', ['images' => $images]);
    }

    public function push_comment()
    {
    }
}
