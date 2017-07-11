<?php 
require_once '../include.php';
checkLogined();
$order=$_REQUEST['order']?$_REQUEST['order']:null;
$orderBy=$order?"order by i.".$order:null;
$keywords=$_REQUEST['keywords']?$_REQUEST['keywords']:null;
$where=$keywords?"where i.pName like '%{$keywords}%'":null;

// $keywords1=$_REQUEST['keywords1']?$_REQUEST['keywords1']:null;
// $where=$keywords1?"where c.cName like '%{$keywords1}%'":null;

//得到数据库中所有商品
// $sql="select p.id,p.pName,p.pSn,p.pNum,p.oPrice,p.iPrice,p.pDesc,p.lowhold,p.size,p.firm,c.cName from imooc_pro as p join imooc_cate c on p.cId=c.id {$where}  ";
$sql="select i.id,i.NO,i.pSn,i.pName,i.iPrice,i.size,i.pNum,i.sumPrice,i.pubTime,i.firm,i.operator,c.cName from imooc_pro_in as i join imooc_cate c on i.cId=c.id {$where}  ";
$totalRows=getResultNum($sql);
$pageSize=5;
$totalPage=ceil($totalRows/$pageSize);
$page=$_REQUEST['page']?(int)$_REQUEST['page']:1;
if($page<1||$page==null||!is_numeric($page))$page=1;
if($page>$totalPage)$page=$totalPage;
$offset=($page-1)*$pageSize;
$sql="select i.id,i.NO,i.pSn,i.pName,i.iPrice,i.size,i.pNum,i.sumPrice,i.pubTime,i.firm,i.operator,c.cName from imooc_pro_in as i join imooc_cate c on i.cId=c.id {$where} {$orderBy} limit {$offset},{$pageSize}";
$rows=fetchAll($sql);
$rows1=getAllCate();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>-.-</title>
<link rel="stylesheet" href="styles/backstage.css">
<link rel="stylesheet" href="scripts/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css" />
<script src="scripts/jquery-ui/js/jquery-1.10.2.js"></script>
<script src="scripts/jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>
<script src="scripts/jquery-ui/js/jquery-ui-1.10.4.custom.min.js"></script>
</head>

<body>
<h1>商品入库</h1>
<div id="showDetail"  style="display:none;">

</div>
<div class="details">
                    <div class="details_operation clearfix">
                                               
                        <div>
                            <input type="button" value="添加入库单·" class="btn" onclick="addPro()"> 
                            <input type="button" value="添加商品" class="btn" onclick="addPro()">

                        </div>

                    </div>             
                    <!--表格-->
                    <table class="table" cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                            	<th width="10%">序号</th>
                                <th width="15%">商品名称</th>
                                <th width="10%">商品分类</th>
                                <th width="10%">厂商</th>
                                <th width="10%">规格</th>
                                <th width="10%">单价</th>
                                <th width="10%">数量</th>
                                <th width="10%">合计金额</th>                                
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($rows as $row):?>
                            <tr>
                                <!--这里的id和for里面的c1 需要循环出来-->
<!--                                 <td>
	                                <input type="checkbox" id="c<?php echo $row['id'];?>" class="check" value=<?php echo $row['id'];?>><label for="c1" class="label"><?php echo $row['id'];?></label></td> -->
                                <td><?php echo $row['pSn'];?></td>
                                <td><?php echo $row['pName'];?></td>
                                <td><?php echo $row['cName'];?></td>
                                <td>
                                	<?php echo $row['firm'];?>
                                </td>
                                 <td><?php echo $row['size'];?></td>
                                  <td><?php echo $row['iPrice'];?>元</td>
                                  <td><?php echo $row['pNum'];?></td>
                                  <td><?php echo $row['pNum']*$row['iPrice'];?>元</td>
                                  <td align="center">
                                      <input type="button" value="修改" class="btn" onclick="editPro(<?php echo $row['id'];?>)">
                                      <input type="button" value="删除" class="btn"onclick="delPro(<?php echo $row['id'];?>)">
                                  </td> 

                            </tr>
                            
                           <?php  endforeach;?>
                           <?php if($totalRows>$pageSize):?>
                            <tr>
                            	<td colspan="9"><?php echo showPage($page, $totalPage,"keywords={$keywords}&order={$order}&keywords1={$keywords1}");?></td>
                            </tr>
                            <?php endif;?>
                            <tr>
                               <td colspan="2">单号：<?php echo $row['NO'];?></td>  
                               <td colspan="1">经办人：<?php echo $row['operator'];?></td>  
                               <td colspan="1">操作员：
                                   <?php 
                                        if(isset($_SESSION['adminName'])){
                                            echo $_SESSION['adminName'];
                                        }elseif(isset($_COOKIE['adminName'])){
                                            echo $_COOKIE['adminName'];
                                        }
                                     ?>
                               </td>  
                               <td colspan="3">收货日期：<?php echo $row['pubTime'];?></td>  
                               <td colspan="2">入库总金额：40960.00 元</td>  
                            </tr>
                        </tbody>
                    </table>
                </div>
<script type="text/javascript">
function showDetail(id,t){
	$("#showDetail"+id).dialog({
		  height:"auto",
	      width: "auto",
	      position: {my: "center", at: "center",  collision:"fit"},
	      modal:false,//是否模式对话框
	      draggable:true,//是否允许拖拽
	      resizable:true,//是否允许拖动
	      title:"商品名称："+t,//对话框标题
	      show:"slide",
	      hide:"explode"
	});
}
	function addPro(){
		window.location='addPro_in.php';
	}
	function editPro(id){
		window.location='editPro_in.php?id='+id;
	}
	function delPro(id){
		if(window.confirm("您确认要删除嘛？添加一次不易，且删且珍惜!")){
			window.location="doAdminAction.php?act=delProIn&id="+id;
		}
	}
	function search(){
		if(event.keyCode==13){
			var val=document.getElementById("search").value;
			window.location="listPro.php?keywords="+val;
		}
	}
	function change(val){
		window.location="listPro.php?order="+val;
	}
    function change1(val){
        window.location="listPro.php?keywords1="+val;
    }
</script>
</body>
</html>