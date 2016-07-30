<?php 
namespace app\index\model;
use think\Model;

class Link extends Model
{
		
	protected $table = 'v9_link';
	//protected $autoWriteTimestamp = true;
		
	/*public function getLinkTypeAttr($value)
    {
        $linktype = [0=>'文字',1=>'图片'];
        return $linktype[$value];
    }*/
	
	public function setUrlAttr($value)
    {
        return strtolower($value);
    }
	
	public function setAddTimeAttr()
	{
		return time();		
	}
}

?>