<?php
namespace app\admin\controller;

use think\Controller;
use think\Debug;
use \app\admin\model\Category;

class Index extends Base
{
	private $pageSize = 10; 
	
	public function index($page=0)
	{
		$count = Category::count();
		$maxSize = floor($count/$this->pageSize);
	
		//$list = Category::limit($this->pageSize*$page, $this->pageSize*($page+1))->select();
		$list = Category::limit($this->pageSize*$page, $this->pageSize)->select();
		//echo $maxSize;
		return view('index', ['list'=>$list,"previou"=>$page-1<0?0:$page-1,"next"=>$page+1>$maxSize?$maxSize:$page+1,"maxSize"=>$maxSize,"page"=>$page]);
	}
		
	public function cache()
	{
		$options = [
			 // 缂撳瓨绫诲瀷涓篎ile
			'type'   => 'File', 
			 // 缂撳瓨鏈夋晥鏈熶负姘镐箙鏈夋晥
			'expire' => 0,
			 // 鎸囧畾缂撳瓨鐩綍
			'path'   => APP_PATH . 'runtime/cache/', 
		];

		// 缂撳瓨鍒濆鍖�
		// 涓嶈繘琛岀紦瀛樺垵濮嬪寲鐨勮瘽锛岄粯璁や娇鐢ㄩ厤缃枃浠朵腑鐨勭紦瀛橀厤缃�
		cache($options);

		// 璁剧疆缂撳瓨鏁版嵁
		cache('name', '$value', 3600);
		// 鑾峰彇缂撳瓨鏁版嵁
		//var_dump(cache('name'));
		// 鍒犻櫎缂撳瓨鏁版嵁
		//cache('name', NULL);

		// 璁剧疆缂撳瓨鐨勫悓鏃跺苟涓旇繘琛屽弬鏁拌缃�
		//cache('test', $value, $options); 
	}
		
	public function show()
	{
		echo var_dump(cache('name'));
	}
		
	public function err()
	{
		//throw new Exception('绯熺硶绯荤粺鍑虹幇閿欒!', 3306);
		//exception('寮傚父娑堟伅', 100006);
		// 鎶涘嚭 HTTP 寮傚父
		//throw new \think\exception\HttpException(404, '寮傚父娑堟伅', null, []);
		//abort(404, '寮傚父娑堟伅', []);
		
		Debug::remark('begin');
		// ...鍏朵粬浠ｇ爜娈�
		Debug::remark('end');
		// ...涔熻杩欓噷杩樻湁鍏朵粬浠ｇ爜
		// 杩涜缁熻鍖洪棿
		echo Debug::getRangeTime('begin','end').'s';

	}
}

?>