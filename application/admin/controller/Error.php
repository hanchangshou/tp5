<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;

class Error extends Controller
{
	public function index(Request $request)
    {
        $this->error("访问路径不存在!","admin");
    }
}