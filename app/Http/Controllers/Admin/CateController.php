<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cate;
class CateController extends Controller
{
    /**
     * Display a listing of the resource.
     *列表展示
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cateinfo=Cate::all();
        $data=$this->getCateInfo($cateinfo);
        // dd($data);
        return view('admin.cate.index',['data'=>$data]);
        
    }
    // 无限极分类
    public function getCateInfo($data,$pid=0,$level=0){
        if(!$data){
            return;
        }
        // 定义一个静态变量
        static $info=[];
        foreach($data as $v){
            if($v->p_id==$pid){
                $v->level=$level;
                $info[]=$v;
                $this->getCateInfo($data,$v->cate_id,$v->level+1);
            }
        }
        
        return $info;
    }
    

    /**
     * Show the form for creating a new resource.
     *添加
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cateinfo=Cate::all();
        $data=$this->getCateInfo($cateinfo);
        // dd($data);
        return view('admin.cate.create',['data'=>$data]);
        //
    }

    /**
     * Store a newly created resource in storage.
     *添加执行
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'cate_name' => 'required|unique:shop_cate|max:20', 
            'cate_url' => 'required',
            'author.description' => 'required',
        ]);
        $data=$request->except('_token');
        // dd($data);
        $res=Cate::insert($data);
        if($res){
            return redirect('/cate');
        }
    }

    /**
     * Display the specified resource.
     *详情
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *更新
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *执行更新
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *删除
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
