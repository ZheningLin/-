<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
<body>
<h3>添加用户</h3>
<form action="doAdminAction.php?act=addSupplier" method="post" enctype="multipart/form-data">
<table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
	<tr>
		<td align="right">供应商</td>
		<td><input type="text" name="sName" placeholder="请输入供应商名称"/></td>
	</tr>
	<tr>
		<td align="right">联系人</td>
		<td><input type="text" name="contacts" placeholder="请输入联系人姓名" /></td>
	</tr>
	<tr>
		<td align="right">联系电话</td>
		<td><input type="text" name="phone" placeholder="请输入联系人电话"/></td>
	</tr>
	<tr>
		<td align="right">联系地址</td>
		<td><input type="text" name="address" placeholder="请输入联系地址"/></td>
	</tr>
	<tr>
		<td align="right">联系人邮箱</td>
		<td><input type="text" name="email" placeholder="请输入联系人邮箱"/></td>
	</tr>
	<tr>
		<td align="right">默认供应商</td>
		<td>
			<input type="radio" name="isShow" value="1" checked="checked"/>是
			<input type="radio" name="isShow" value="0" />否
		</td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit"  value="添加供应商"/></td>
	</tr>

</table>
</form>
</body>
</html>