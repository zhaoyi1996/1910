<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    public function index(){
        return view('index',['name'=>'赵毅']);
    }
    public function Doadd(){
        $post=request()->all();
        dd($post);
    }
    public function goods($id){
        echo $id;
    }
    public function good($id=0,$name=''){
        echo $id;
        dd($name);
    }
    public function hun($id,$name=''){
        echo $id;
        dd($name);
    }
}
