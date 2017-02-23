<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Task;

class TaskController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }
    public function show()
    {
        $data = Task::all();
        return view('admin.main')->with('tasks',$data);
    }
    public function store(Request $req)
    {
      $ts = new Task;
      $ts->name = $req->name;
      $ts->progress = $req->progress;
      $ts->type = $req->type;

      try
      {
        $ts->save();
      }
      catch (Exception $e)
      {
          return "fail";
      }
      return Redirect::to('task');

    }
}
