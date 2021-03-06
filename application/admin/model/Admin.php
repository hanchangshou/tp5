<?php
namespace app\admin\model;

use think\Model;

class Admin extends Model
{
	protected $table = 'v9_admin';

	public function getRoleIdAttr($value,$data)
    {
        $role = [1=>'超级管理员',2=>'站点管理员',3=>'运营总监',4=>'总编',5=>'编辑',7=>'发布人员'];
        
        return $role[$data['roleid']];
    }
}

?>