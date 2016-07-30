<?php
namespace app\index\controller;
use think\Controller;
use \think\View;
//use \think\Db;
use \think\Log;
use \app\index\model\Link;
use think\Session;

include "vcode.class.php";

class Index extends Controller
{
	
	
    public function index()
    {
		$view = new View([
			'type'          => 'think',
			'view_path'     => '',
			'view_suffix'   => 'html',
			'view_depr'     => '/',
		]);
		
		Session::set('name','thinkphp');
		Session::get('name');

		//$link2 = Link::get(7);
        //$data["name"] = $link2->linktype;
		$data["title"] = Session::get('name');
		$list = Link::all();
		// 娓叉煋妯℃澘杈撳嚭 骞惰祴鍊兼ā鏉垮彉閲�
		//return $view->fetch('index',['name'=>'thinkphp']);
		//$data = Db::query('select * from v9_news');
		
		//鏃ュ織
		//Log::error('閿欒淇℃伅');
		// 鍜屼笅闈㈢殑鐢ㄦ硶绛夋晥
		//Log::record('閿欒淇℃伅','error');
		//trace('閿欒淇℃伅','error');
		
		return $this->fetch('index',["list"=>$list, "title"=>$data["title"]]);
    }
	
	public function delete()
	{
		$id = $_GET["id"];
		if(isset($id))
		{
			Link::destroy($id);
		}
		$this->redirect('index');
	}
	
	public function add()
	{
		//浣跨敤鍐呯疆鐨刲ayout鏂规硶鍙互鏇寸伒娲荤殑鍦ㄧ▼搴忎腑鎺у埗妯℃澘杈撳嚭鐨勫竷灞�鍔熻兘锛屽挨鍏堕�傜敤浜庡眬閮ㄩ渶瑕佸竷灞�鎴栬�呭叧闂竷灞�鐨勬儏鍐碉紝杩欑鏂瑰紡涔熶笉闇�瑕佸湪閰嶇疆鏂囦欢涓紑鍚痩ayout_on
		//$this->view->engine->layout(true);
		$error = "";
		if(!empty($_POST['name']))
		{
			$name = $_POST['name'];
			if(!Link::where('name',$name)->count())
			{
				$link = new Link;
				$link->siteid = 1;
				$link->name = $_POST['name'];
				$link->linktype = $_POST['linktype'];
				$link->url = $_POST['url'];
				$link->save();
				
				return $this->redirect('index');
			}else{
				
				$error = '宸茬粡鏈夌浉鍚岀殑缃戠珯鍚嶇О浜嗭紒';
			}
		}
		
		return $this->fetch('add',['title'=>'澧炲姞涓�涓�', 'error'=>$error]);
	}
	
	public function json()
	{
		if(isset($_GET['id']))
		{
			$link = Link::get($_GET["id"]);
			if(!empty($link))
			{
				return '{"code": "1","data":"'.$link->toJson().'"}';
			}
		}
		$data = '{"code": "0","ErrMsg":"id notfind"}';
		return json_encode($data);
	}
	
	public function read()
	{
		return view();
	}


	public function code(){
		session_start();
		//构造方法
		$vcode = new Vcode(80, 30, 4);
		//将验证码放到服务器自己的空间保存一份
		$_SESSION['code'] = $vcode->getcode();
		//将验证码图片输出
		return $vcode->outimg();
	}
	
	public function upload()
	{
		// 鑾峰彇琛ㄥ崟涓婁紶鏂囦欢 渚嬪涓婁紶浜�001.jpg
		$file = request()->file('image');
		// 绉诲姩鍒版鏋跺簲鐢ㄦ牴鐩綍/public/uploads/ 鐩綍涓�
		$info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
		if($info){
			// 鎴愬姛涓婁紶鍚� 鑾峰彇涓婁紶淇℃伅
			// 杈撳嚭 jpg
			echo $info->getExtension();
			// 杈撳嚭 42a79759f284b767dfcb2a0197904287.jpg
			echo $info->getFilename(); 
		}else{
			// 涓婁紶澶辫触鑾峰彇閿欒淇℃伅
			echo $file->getError();
		}
	}
		
	
}
