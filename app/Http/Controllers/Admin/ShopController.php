<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cate;
use App\Brand;
use App\Shop;
class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *列表展示
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 查询数据
        $pageSize=config('app.pageSize');
        // dd($pageSize);
        // 查询分类数据
        $cateData=Cate::get();
        $CateInfo=getCateInfo($cateData);
        // 查询品牌数据
        $BrandInfo=Brand::get();
        // 接受搜索数据
        $name=request()->name;
        $cate_id=request()->cate_id;
        $brand_id=request()->brand_id;
        $min=request()->min;
        $max=request()->max;
        // 拼接搜索条件
        $where=[];
        if($name){
            $where[]=['goods_name','like',"%$name%"];
        }
        if($cate_id){
            $where[]=['shop.cate_id','=',$cate_id];
        }
        if($brand_id){
            $where[]=['shop.brand_id','=',$brand_id];
        }
        if($min&&$max){
            $where[]=[];
        }
        $data=Shop::leftJoin('shop_cate','shop.cate_id','=','shop_cate.cate_id')
                    ->leftJoin('brand','shop.brand_id','=','brand.brand_id')
                    ->where($where)
                    ->paginate($pageSize);
        // dd($data);
        foreach($data as $k=>$v){
            $data[$k]->goods_imgs=explode('|',$v->goods_imgs);
            
        }
        // dd($data);
        return view('admin.shop.index',['data'=>$data,'CateInfo'=>$CateInfo,'BrandInfo'=>$BrandInfo]);
    }

    /**
     * Show the form for creating a new resource.
     *添加
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 查询商品分类
        $CateInfo=Cate::get();
        // dd($CateInfo);
        $Catedata=getCateInfo($CateInfo);
        // dd($data);
        // 查询商品品牌
        $BrandData=Brand::get();
        return view('admin.shop.create',['Catedata'=>$Catedata,'BrandData'=>$BrandData]);
        //
    }
   

    /**
     * Store a newly created resource in storage.
     *执行添加
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //接收数据
        $data=$request->except('_token');
        // dd($data);
        if ($request->hasFile('goods_img')) { //
            $data['goods_img']=upload('goods_img');
        }
        if (isset($data['goods_imgs'])) { //
            $imgs=uploads('goods_imgs');
            $data['goods_imgs']=implode('|',$imgs);
        }
        // dd($data);
        $res=Shop::insert($data);
        // dd($res);
        if($res){
            return redirect('/shop');
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
     *更新展示
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // 获取分类信息
        $cateInfo=Cate::all();
        $cateData=getCateInfo($cateInfo);
        // 获取品牌信息
        $brandData=Brand::all();
        $data=Shop::where('goods_id',$id)->first();
        $data->goods_imgs=explode('|',$data->goods_imgs);
        // dd($data);
        return view('admin.shop.edit',['cateData'=>$cateData,'brandData'=>$brandData,'data'=>$data]);
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
        //接收数据
        $data=$request->except('_token');
        // dd($data);
        if ($request->hasFile('goods_img')) { //
            $data['goods_img']=upload('goods_img');
        }
        if (isset($data['goods_imgs'])) { //
            $imgs=uploads('goods_imgs');
            $data['goods_imgs']=implode('|',$imgs);
        }
        // dd($data);
        $res=Shop::where('goods_id',$id)->insert($data);
        // dd($res);
        if($res){
            return redirect('/shop');
        }
    }

    /**
     * Remove the specified resource from storage.
     *删除
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res=Shop::where('goods_id',$id)->delete();
        if($res){
            return redirect('/shop');
        }
    }
}
