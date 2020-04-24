<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Brand;
use App\Http\Requests\StoreBlogPost;
class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *列表展示
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $name=request()->name;
        // dd($name);
        $where=[];
        if($name){
            $where[]=['brand_name','like',"%$name%"];
        }
        $pageSize=config('app.pageSize');
        $data = Brand::where($where)->paginate($pageSize);
        dump(request()->ajax());
        if(request()->ajax()){
            return view('/admin/brand/indexshow',['data'=>$data,'name'=>$name]);
        }
        // dd($data);
        return view('/admin/brand/show',['data'=>$data,'name'=>$name]);
        //
    }

    /**
     * Show the form for creating a new resource.
     *添加
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     *执行添加方法
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogPost $request)
    // public function store(Request $request,$id)
    {
        $data=$request->except('_token');
        // $request->validate([ 
        //     'brand_name' => 'required|unique:brand|max:20',
        //     'brand_url' => 'required',
        // ],[
        //     'brand_name.required'=>'品牌名称必填',
        //     'brand_name.unique'=>'品牌名称已存在',
        //     'brand_name.max'=>'品牌名称不得超过20位',
        //     'brand_url.required'=>'品牌网址必填',
        // ]);
        // $validator = Validator::make($data->all(), [
        //     'brand_name' => ['required',Rule::unique('brand')->ignore($id,'brand_id'),'max:20'],
        //     'brand_url' => 'required',
        // ]);
        // if ($validator->fails()) {
        //     return redirect('brand/create') 
        //            ->withErrors($validator) 
        //            ->withInput(); 
        // }
        
        // dd($data);
        // 检查文件是否上传
        if ($request->hasFile('brand_img')) { //
            $data['brand_img']=$this->upload('brand_img');
        }
        $res=Brand::insert($data);
        if($res){
            return redirect('/brand');
        }
    }
     // 图片上传
     public function upload($filename){
        // 判断文件在上传过程中是否出错
        if (request()->file($filename)->isValid()){
            //获取上传的文件
            $file = request()->file($filename);
            // 设置路径
            $path = $file->store('uploads');
            return $path;
        }
        die('上传文件出错');
    }

    /**
     * Display the specified resource.
     *预览详情
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *编辑展示
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Brand::where('brand_id', $id) ->first();
        return view('admin.brand.edit',['data'=>$data]);
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
        $data=$request->except('_token');
        // 检查文件是否上传
        if ($request->hasFile('brand_img')) { //
            $data['brand_img']=$this->upload('brand_img');
        }
        $res=Brand::where('brand_id', $id) ->update($data);
        if($res!==false){
            return redirect('/brand');
        }
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
        $file=DB::table('brand')->where('brand_id',$id)->value('brand_img');
        if($file){
            unlink(storage_path('app/'.$file));
        }
        $res=Brand::where('brand_id', $id)->delete ();
        if($res){
            return redirect('/brand');
        }
        //
    }
   



}
