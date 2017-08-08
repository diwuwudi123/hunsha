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
        for ($i=0; $i < 22; $i++) { 
            $images[] = "{$i}".'.jpg?x-oss-process=style/mobile_photo';
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

    public function push_status(Request $request)
    {
        $this->validate($request, [
            'name'  => 'required|max:20',
            'mobile'    => 'required|max:20',
            'status'    => 'required|in:0,1',
        ]);

        $status = new Status;
        $status->name   = Input::get('name');
        $status->mobile = Input::get('mobile');
        $status->status = Input::get('status');

        $comment->save();
        return $this->data;
    }

    public function get_status()
    {
        $status = new Status;

        $status = \App\Status::orderBy('id','desc')->get();
        $this->data['data'] = $status;
        return $this->data;
    }

    public function get_hello()
    {
        return ['message' => 'helloword'];
    }

}
