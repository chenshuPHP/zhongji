<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>SHOP 管理中心 - 属性管理 </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/Application/Admin/Publi/styles/general.css" rel="stylesheet" type="text/css" />
<link href="/Application/Admin/Public/styles/main.css" rel="stylesheet" type="text/css" />
</head>
<body>

<h1>
<span class="action-span"><a href="index.php?p=admin&c=attribute&a=index">商品属性</a></span>
<span class="action-span1"><a href="index.php?act=main">SHOP 管理中心</a> </span><span id="search_id" class="action-span1"> - 添加属性 </span>
<div style="clear:both"></div>
</h1>

<div class="main-div">
  <form action="" method="post" name="theForm" onsubmit="return validate();">
  <table width="100%" id="general-table">
      <tbody><tr>
        <td class="label">属性名称：</td>
        <td>
          <input type="text" name="attr_name" value="" size="30">
          <span class="require-field">*</span>        </td>
      </tr>
      <tr>
        <td class="label">所属商品类型：</td>
        <td>
          <select name="type_id" onchange="onChangeGoodsType(this.value)" id="type_id">
          <option value="0">请选择...</option>
            <?php if(is_array($type_list)): $i = 0; $__LIST__ = $type_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["type_id"]); ?>"><?php echo ($vo["type_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
            </select> <span class="require-field">*</span>        </td>
      </tr>
      <tr id="attrGroups" style="display: none;">
        <td class="label">属性分组：</td>
        <td>
          <select name="attr_group">
                    </select>
        </td>
          <tr>
          <td class="label">属性类型</td>
            <td>
                <input type="radio" name="attr_type" value="0" checked="true"
                />唯一属性
                <input type="radio" name="attr_type" value="1" />单选属性
            </td>
        </tr>
      </tr>
      <tr>
        <td class="label">该属性值的录入方式：</td>
        <td>
          <input type="radio" name="attr_input_type" value="0" checked="true" onclick="radioClicked(0)">
          手工录入          <input type="radio" name="attr_input_type" value="1" onclick="radioClicked(1)">
          从下面的列表中选择（一行代表一个可选值）          <input type="radio" name="attr_input_type" value="2" onclick="radioClicked(0)">
          多行文本框        </td>
      </tr>
      <tr>
        <td class="label">可选值列表：</td>
        <td>
          <textarea name="attr_value" cols="30" rows="5" disabled=""></textarea>
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
    <input type="hidden" name="act" value="insert">
    <input type="hidden" name="attr_id" value="0">
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
  document.forms['theForm'].elements["attr_value"].disabled = n > 0 ? false : true;
}
</script>