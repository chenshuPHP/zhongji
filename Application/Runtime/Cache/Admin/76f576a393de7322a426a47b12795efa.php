<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>SHOP 管理中心 - 属性管理 </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/Application/Admin/Public/styles/general.css" rel="stylesheet" type="text/css" />
<link href="/Application/Admin/Public/styles/main.css" rel="stylesheet" type="text/css" />
</head>
<body>

<h1>
<span class="action-span"><a href="index.php?p=Admin&c=Attribute&a=list">商品属性</a></span>
<span class="action-span1"><a href="index.php?act=main">SHOP 管理中心</a> </span><span id="search_id" class="action-span1"> - 编辑属性 </span>
<div style="clear:both"></div>
</h1>

<div class="main-div">
  <form action="" method="post" name="theForm" onsubmit="return validate();">
  <table width="100%" id="general-table">
      <tbody><tr>
        <td class="label">属性名称：</td>
        <td>
          <input type="text" name="attr_name" value="<?php echo $info['attr_name'] ?>" size="30">
          <span class="require-field">*</span>        </td>
      </tr>
      <tr>
        <td class="label">所属商品类型：</td>
        <td>
          <select name="type_id" onchange="onChangeGoodsType(this.value)" id="type_id">
         	 <option value="0">请选择...</option>
             <?php foreach($type_list as $rows) :?>
             	<option value="<?php echo $rows['type_id']?>" <?php echo $info['type_id']==$rows['type_id']?'selected':'' ?>><?php echo $rows['type_name']?></option>
             <?php endforeach?>
          </select> <span class="require-field">*</span>        </td>
      </tr>
      <tr id="attrGroups" style="display: none;">
        <td class="label">属性分组：</td>
        <td>
          <select name="attr_group">
                    </select>
        </td>
      </tr>
      <tr>
        <td class="label">该属性值的录入方式：</td>
        <td>
          <input type="radio" name="attr_input_type" value="0" checked="true" checked onclick="radioClicked(0)">
          手工录入          <input type="radio" name="attr_input_type" <?php echo $info['attr_input_type'] == 1?'checked':''?> value="1" onclick="radioClicked(1)">
          从下面的列表中选择（一行代表一个可选值）          <input type="radio" name="attr_input_type" value="2" onclick="radioClicked(0)">
          多行文本框        </td>
      </tr>
      <tr>
        <td class="label">可选值列表：</td>
        <td>
         <textarea name="attr_values" id="attr_values" cols="30" rows="5" <?php echo $info['attr_input_type']!=1?'disabled':''?>><?php echo $attr_input_str?></textarea>
        </td>
      </tr>
      <tr>
        <td colspan="2">
        <div class="button-div">
          <input type="submit" value=" 确定 " class="button">
          <input type="reset" value=" 重置 " class="button">
        </div>
        </td>
      </tr>
      </tbody></table>
    <input type="hidden" name="act" value="update">
    <input type="hidden" name="attr_id" value="1">
  </form>
</div>

<div id="footer">
	版权所有 &copy; 2012-2013 传智播客 - PHP培训 - </div>
</div>
<script type="text/javascript">
/**
 * 点击类型按钮时切换选项的禁用状态
 */
function radioClicked(n)
{
  document.getElementById('attr_values').disabled = n > 0 ? false : true;
}


</script>
</body>
</html>