<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
<body>
<h3>添加单据</h3>
<form action="doAdminAction.php?act=addBill" method="post">
<table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
	<tr>
		<td align="right">供应商</td>
		<td><input type="text" name="firm" placeholder="请输入供应商名称"/></td>
	</tr>
	<tr>
		<td align="right">日期</td>
		<td><input type="text" name="pubTime" placeholder="请输入日期"/></td>
	</tr>
	<tr>
		<td align="right">单号</td>
		<td><input type="text" name="NO" placeholder="请输入单号"/></td>
	</tr>
	<tr>
		<td align="right">状态</td>
		<td><input type="text" name="content" placeholder="请输入状态"/></td>
	</tr>
	<tr>
		<td align="right">总金额</td>
		<td><input type="text" name="sumPrice" placeholder="请输入分类名称"/></td>
	</tr>
	<tr>
		<td align="right">经办员</td>
		<td><input type="text" name="operator" placeholder="请输入分类名称"/></td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit"  value="添加单据"/></td>
	</tr>

</table>
</form>
</body>
</html>