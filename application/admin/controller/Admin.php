<?php
namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\Session;
use think\Validate;

class Admin extends Controller
{
	public function _initialize(){
       	
    }
    
	public function index()
	{
		if(Session::has('admin')){
       		$this->redirect('/admin/index/index');
       	}
       	
		return view('login', ['errMsg'=>""]);
	}
	
	public function login(){
		$admin = Session::get('admin');
       	if(!is_null($admin)){
       		$this->redirect('/admin/index/index');
       	}

		if(!empty($_POST['submit'])){
			$username = trim(input('post.username'));
			$password = trim(input('post.password'));
			
			if(empty($username)){
				
				return view("login", ['errMsg'=>"输入用户名"]);
			}
			if(empty($password)){
				
				return view("login", ['errMsg'=>"输入密码",'username'=>$username ]);
			}

			$user = new \app\admin\model\Admin;
			$admin = $user->get(['username' => $username]);
			if(!empty($admin) && md5($password)==$admin->password){
				Session::set('admin', $admin);
				return $this->success('登陆成功','/admin/');
			}else{
				return view("login", ['errMsg'=>'登录失败，用户名或密码错误！']);
			}	
		}
		return view('login', ['errMsg'=>""]);
	}

	public function logout(){
		Session::delete('admin');
		//echo Session::get('admin');
		$this->success("登出成功!","/admin/admin/login");
	}

	public function adminlist()
	{
		if(!Session::has('admin')){
			$this->redirect('/admin/admin/index');
		}

		$list = \app\admin\model\Admin::all();
		$role = \app\admin\model\AdminRole::all();
		return $this->fetch("list", ['volist'=> $list,'role'=>$role]);
	}

	public function register()
	{
		$rule = [
			'username'  =>  'require|max:25',
			'email' =>  'email',
			'password'=> 'require'
		];

		$msg   =   [
			'username.require' => '名称必须',
			'name.max'     => '名称最多不能超过25个字符',
			'password.require'   => '密码不能为空',
			'email'        => '邮箱格式错误',
		];

		if(!empty($_POST['submit'])){
			$data["username"] = trim(input('post.username'));
			$data["password"] = trim(input('post.password'));
			$data["email"] = trim(input('post.email'));
			$rpassword = trim(input('post.rpassword'));
			$data["roleid"] = input('post.roleid');
			$data["realname"] = trim(input('post.realname'));

			echo dump($data);

			$validate = new Validate($rule);
			$result   = $validate->check($data);
			if(!$result){
				return $this->error($validate->getError(), "/admin/admin/adminlist");
			}

			if($rpassword!=$data["password"]){
				return $this->error("两次密码输入不一致", "/admin/admin/adminlist");
			}
			$data['lastlogintime'] = time();
			$data['lastlogintime'] = $this->getIP();
			$user = new \app\admin\model\Admin($data);
			$user->save();
			return $this->error("保存成功!", "/admin/admin/adminlist");
		}
	}

	public function getIP(){
		global $ip;
		if (getenv("HTTP_CLIENT_IP"))
			$ip = getenv("HTTP_CLIENT_IP");
		else if(getenv("HTTP_X_FORWARDED_FOR"))
			$ip = getenv("HTTP_X_FORWARDED_FOR");
		else if(getenv("REMOTE_ADDR"))
			$ip = getenv("REMOTE_ADDR");
		else $ip = "Unknow IP";
		return $ip;
	}
}

?>