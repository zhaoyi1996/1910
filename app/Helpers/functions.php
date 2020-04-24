<?php

/**
 * 公用的方法  返回json数据，进行信息的提示
 * @param $status 状态
 * @param string $message 提示信息
 * @param array $data 返回数据
 */
function showMsg($status,$message = '',$data = array()){
    $result = array(
        'status' => $status,
        'message' =>$message,
        'data' =>$data
    );
    exit(json_encode($result));
}
 // 无限极分类
function getCateInfo($CateInfo,$pid=0,$level=0){
    // 判断是否传过来值
    if(!$CateInfo){
        return;
    }
    // 定义一个静态变量
    static $info=[];
    foreach($CateInfo as $v){
        if($v->p_id==$pid){
            $v->level=$level;
            $info[]=$v;
            // 再次调用自己
            getCateInfo($CateInfo,$v->cate_id,$v->level+1);
        } 
    }
    return $info;
}
 // 多图片上传
function uploads($filenames){
    //获取上传的文件
    $file = request()->$filenames;
   //  dd($file);
    if(!is_array($file)){
       return;
    }
    foreach($file as $k=>$v){
        // 设置路径
        $path[$k] = $v->store('uploads');
    }
   //  dd($path);
    return $path;
   die('上传文件出错');
}
// 图片上传
function upload($filename){
   // dd($filename);
   // 判断文件在上传过程中是否出错
   if (request()->file($filename)->isValid()){
       //获取上传的文件
       $file = request()->file($filename);
       // 设置路径
       $path = $file->store('uploads');
       // dd($path);
       return $path;
   }
   die('上传文件出错');
}