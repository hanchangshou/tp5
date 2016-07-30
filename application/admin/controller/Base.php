<?php
/**
 * Created by PhpStorm.
 * User: work
 * Date: 2016/7/26
 * Time: 9:35
 */
namespace app\admin\controller;
use think\Controller;
use \think\Session;
class Base extends Controller {

	public function _initialize(){
		
		$admin = Session::get('admin');
		if(is_null($admin)){
			$this->redirect('/admin/admin');
		}
	}
	
	public function _empty($name)
    {
        $this->error("访问路径不存在!", "/admin");
    }

} 