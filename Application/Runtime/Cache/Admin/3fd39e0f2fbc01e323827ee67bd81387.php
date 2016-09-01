<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>SHOP 管理中心 - 添加分类 </title>
<meta name="robots" content="noindex, nofollow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="Application/View/Admin/shop/styles/general.css" rel="stylesheet" type="text/css" />
<link href="Application/View/Admin/shop/styles/main.css" rel="stylesheet" type="text/css" />
</head>
<body>

<h1>
<span class="action-span"><a href="index.php?p=Admin&c=Category&a=list">商品分类</a></span><span class="action-span1"><a href="index.php?act=main"> 糯米管理中心</a> </span><span id="search_id" class="action-span1"> - 添加分类 </span>
<div style="clear:both"></div>
</h1>
<!-- start add new category form -->
<div class="main-div">
  <form action="" method="post" name="theForm" enctype="multipart/form-data" onsubmit="return validate()">
	 <table width="100%" id="general-table">
		<tbody>
			<tr>
				<td class="label">分类名称:</td>
				<td><input name="type_name" type="text" id="type_name" value="<?php echo $info['cat_name']?>" size="27" maxlength="20"> <font color="red">*</font></td>
			</tr>
      </tbody></table>
      <div class="button-div">
        <input type="submit" value=" 确定 ">
        <input type="reset" value=" 重置 ">
      </div>
    <input type="hidden" name="act" value="insert">
    <input type="hidden" name="old_cat_name" value="">
    <input type="hidden" name="cat_id" value="">
  </form>
</div>



<div id="footer">
	版权所有 &copy; 2012-2013 百度糯米 - 后台管理中心 - - 
</div>

</div>

</body>
</html>