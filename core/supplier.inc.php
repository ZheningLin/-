<?php 

/**
 * 添加管理员
 * @return string
 */
function addSupplier(){
	$arr=$_POST;
	if(insert("imooc_supplier",$arr)){
		$mes="添加成功!<br/><a href='addSupplier.php'>继续添加</a>|<a href='listSupp.php'>查看供应商列表</a>";
	}else{
		$mes="添加失败!<br/><a href='addSupplier.php'>重新添加</a>";
	}
	return $mes;
}

// /**
//  * 得到所有的管理员
//  * @return array
//  */
// function getAllAdmin(){
	
// 	$sql="select id,username,email from imooc_admin ";
// 	$rows=fetchAll($sql);
// 	return $rows;
// }
// function getAdminByPage($page,$pageSize=2){
// 	$sql="select * from imooc_admin";
// 	global $totalRows;
// 	$totalRows=getResultNum($sql);
// 	global $totalPage;
// 	$totalPage=ceil($totalRows/$pageSize);
// 	if($page<1||$page==null||!is_numeric($page)){
// 		$page=1;
// 	}
// 	if($page>=$totalPage)$page=$totalPage;
// 	$offset=($page-1)*$pageSize;
// 	$sql="select id,username,email from imooc_admin limit {$offset},{$pageSize}";
// 	$rows=fetchAll($sql);
// 	return $rows;
// }


/**
 * 编辑管理员
 * @param int $id
 * @return string
 */
function editSupplier($id){
	$arr=$_POST;
	if(update("imooc_supplier", $arr,"id={$id}")){
		$mes="编辑成功!<br/><a href='listSupp.php'>查看供应商列表</a>";
	}else{
		$mes="编辑失败!<br/><a href='listSupp.php'>请重新修改</a>";
	}
	return $mes;
}

/**
 * 删除管理员的操作
 * @param int $id
 * @return string
 */
function delSupplier($id){
	if(delete("imooc_supplier","id={$id}")){
		$mes="删除成功!<br/><a href='listSupp.php'>查看供应商列表</a>";
	}else{
		$mes="删除失败!<br/><a href='listSupp.php'>请重新删除</a>";
	}
	return $mes;
}

/**
 * 根据id得到商品的详细信息
 * @param int $id
 * @return array
 */
function getSuppById($id){
		// $sql="select p.id,p.pName,p.pSn,p.pNum,p.mPrice,p.iPrice,p.pDesc,p.pubTime,p.isShow,p.isHot,c.cName,p.cId from imooc_pro as p join imooc_cate c on p.cId=c.id where p.id={$id}";
	    $sql="select id,sName,contacts,phone,address,email,isShow from imooc_supplier where id={$id}";
		$row=fetchOne($sql);
		return $row;
}

