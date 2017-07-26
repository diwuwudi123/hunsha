<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->request = new Request;
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
        $img = $this->request->input('img');
        $info= $this->request->input('info');
        $arr = [$img, $info];
        $this->response_json($arr);
    }
}
