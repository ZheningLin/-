<?php 
/**
 * 添加分类的操作
 * @return string
 */
function addBill(){
	$arr=$_POST;
	if(insert("imooc_bill",$arr)){
		$mes="单据添加成功!<br/><a href='addBill.php'>继续添加</a>|<a href='listBill.php'>查看分类</a>";
	}else{
		$mes="单据添加失败！<br/><a href='addBill.php'>重新添加</a>|<a href='listBill.php'>查看分类</a>";
	}
	return $mes;
}

/**
 * 根据ID得到指定分类信息
 * @param int $id
 * @return array
 */
function getBillById($id){
	$sql="select id,cName from imooc_cate where id={$id}";
	return fetchOne($sql);
}

/**
 * 修改分类的操作
 * @param string $where
 * @return string
 */
function editBill($where){
	$arr=$_POST;
	if(update("imooc_bill", $arr,$where)){
		$mes="分类修改成功!<br/><a href='listBill.php'>查看分类</a>";
	}else{
		$mes="分类修改失败!<br/><a href='listBill.php'>重新修改</a>";
	}
	return $mes;
}

/**
 *删除分类
 * @param string $where
 * @return string
 */
function delBill($id){
	$res=checkProExist($id);
	if(!$res){
		$where="id=".$id;
		if(delete("imooc_bill",$where)){
			$mes="分类删除成功!<br/><a href='listBill.php'>查看分类</a>|<a href='addBill.php'>添加分类</a>";
		}else{
			$mes="删除失败！<br/><a href='listBill.php'>请重新操作</a>";
		}
		return $mes;
	}else{
		alertMes("不能删除分类，请先删除该分类下的商品", "listBill.php");
	}
}

/**
 * 得到所有分类
 * @return array
 */
function getAllBill(){
	$sql="select id,cName from imooc_cate";
	$rows=fetchAll($sql);
	return $rows;
}



