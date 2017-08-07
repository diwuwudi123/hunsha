<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;
use App\Comment;

class IndexController extends Controller
{
    
    private $data = ['message' => 'success','code'=> 0, 'data' => ''];

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
        return view('index', ['images' => $images]);
    }
    public function wel()
    {
        for ($i=1; $i < 15; $i++) { 
            $images[] = "1 ({$i})".'.jpg';
        }
        return view('welcome', ['images' => $images]);
    }
    public function get_comment()
    {
        $comments = \App\Comment::where('time', '>', Input::get('time'))
                    ->where('time', '<=', Input::get('time') + 30)
                    ->orderBy('time', 'asc')
                    ->get();
        $this->data['data'] = $comments;
        return $this->data;
    }
    
    public function push_comment(Request $request)
    {
        $this->validate($request, [
            'img'  => 'required|max:255',
            'info' => 'required|min:1|max:255',
            'time' => 'required',
        ]);  
        $comment = new Comment;
        $comment->img       = Input::get('img');
        $comment->comment   = Input::get('info');
        $comment->time      = Input::get('time');
        $comment->save();
        return $this->data;
    }
}
