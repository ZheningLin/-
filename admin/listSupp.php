<?php 
require_once '../include.php';
checkLogined();
$sql="select id,sName,contacts,phone,address,email,isShow from imooc_supplier";
$rows=fetchAll($sql);
if(!$rows){
	alertMes("sorry,没有用户,请添加!","addSupplier.php");
	exit;
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>-.-</title>
<link rel="stylesheet" href="styles/backstage.css">
</head>

<body>
<div class="details">
                    <div class="details_operation clearfix">
                        <div class="bui_select">
                            <input type="button" value="添&nbsp;&nbsp;加" class="add"  onclick="addSupplier()">
                        </div>
                            
                    </div>
                    <!--表格-->
                    <table class="table" cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                                <th width="10%">编号</th>
                                <th width="10%">供应商</th>
                                <th width="10%">联系人</th>
                                <th width="10%">联系电话</th>
                                <th width="20%">联系地址</th>
                                <th width="10%">联系邮箱</th>
                                <th width="10%">默认客户</th>
                                <!-- <th width="20%">是否激活</th> -->
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php  foreach($rows as $row):?>
                            <tr>
                                <!--这里的id和for里面的c1 需要循环出来-->
                                <td><input type="checkbox" id="c1" class="check"><label for="c1" class="label"><?php echo $row['id'];?></label></td>
                                <td><?php echo $row['sName'];?></td>
                                <td><?php echo $row['contacts'];?></td>
                                <td><?php echo $row['phone'];?></td>
                                <td><?php echo $row['address'];?></td>
                                <td><?php echo $row['email'];?></td>
                                <td>
                                <input type="checkbox" id="c1" class="check" <?php echo $row['isShow']==1?"checked='checked'":null;?>>
                                </td>
                                <td align="center"><input type="button" value="修改" class="btn" onclick="editSupplier(<?php echo $row['id'];?>)"><input type="button" value="删除" class="btn"  onclick="delSupplier(<?php echo $row['id'];?>)"></td>
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
</body>
<script type="text/javascript">

	function addSupplier(){
		window.location="addSupplier.php";	
	}
	function editSupplier(id){
			window.location='editSupplier.php?id='+id;
	}
	function delSupplier(id){
			if(window.confirm("您确定要删除吗？删除之后不可以恢复哦！！！")){
				window.location="doAdminAction.php?act=delSupplier&id="+id;
			}
	}
</script>
</html>