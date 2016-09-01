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
<span class="action-span"><a href="/index.php/Admin/Attribute/attrAdd">添加属性</a></span>
<span class="action-span"><a href="index.php?p=Admin&c=AttrType&a=list">返回属性类型列表</a></span>

<span class="action-span1"><a href="index.php?act=main">SHOP 管理中心</a> </span><span id="search_id" class="action-span1"> - 商品属性 </span>
<div style="clear:both"></div>
</h1>

<div class="form-div">
  <form action="" name="searchForm">
    <img src="/Application/Admin/Public/images/icon_search.gif" width="26" height="22" border="0" alt="SEARCH">
    按商品类型显示：<select name="goods_type" onchange="location.href='/index.php/Admin/Attribute/attrList/type_id/' + this.value"><option value="0">所有商品类型</option>
    <?php  foreach($type_list as $rows):?>
    	<option value="<?php echo $rows['type_id']?>" <?php echo $rows['type_id'] == $_GET['type_id'] ?'selected':''; ?>><?php echo $rows['type_name'] ?></option>
    <?php endforeach?>
    </select>
  </form>
</div>

<form method="post" action="attribute.php?act=batch" name="listForm">
<div class="list-div" id="listDiv">

  <table cellpadding="3" cellspacing="1">
    <tbody>
		<tr>
			<th width="58"><input onclick="listTable.selectAll(this, &quot;checkboxes[]&quot;)" type="checkbox">编号 </th>
			<th width="68">属性名称</th>
			<th width="68">商品类型</th>
			<th width="136">属性值的录入方式</th>
			<th width="85">可选值列表</th>
			<th width="34">排序</a></th>
			<th width="69">操作</th>
		</tr>

		<?php foreach($attr_list as $rows):?>
       
        <tr>
      <td nowrap="true" valign="top" style="background-color: rgb(255, 255, 255);"><span><input value="2" name="checkboxes[]" type="checkbox"><?php echo $rows['attr_id']?></span></td>
      <td class="first-cell" nowrap="true" valign="top" style="background-color: rgb(255, 255, 255);"><span onclick="listTable.edit(this, 'edit_attr_name', 2)"><?php echo $rows['attr_name']?></span></td>
      <td nowrap="true" valign="top" style="background-color: rgb(255, 255, 255);"><span><?php echo $rows['type_id']?></span></td>
      <td nowrap="true" valign="top" style="background-color: rgb(255, 255, 255);"><span>
      	<?php
 switch($rows['attr_input_type']) { case 0 : echo '手工输入'; break; case 1 : echo '下拉列表'; break; default : echo '多行文本'; } ?>
      </span></td>
      <td valign="top" style="background-color: rgb(255, 255, 255);"><span><?php echo $rows['attr_value']?></span></td>
      <td align="right" nowrap="true" valign="top" style="background-color: rgb(255, 255, 255);"><span onclick="listTable.edit(this, 'edit_sort_order', 2)">0</span></td>
      <td align="center" nowrap="true" valign="top" style="background-color: rgb(255, 255, 255);">
        <a href="/index.php/Admin/Attribute/attrEdit/attr_id/<?php echo $rows['attr_id']?>" title="编辑"><img src="/Application/Admin/Public/images/icon_Edit.gif" border="0" height="16" width="16"></a>
        <a href="/index.php/Admin/Attribute/attrDelete/attr_id/<?php echo $rows['attr_id']?>" onclick="removeRow(2)" title="移除"><img src="/Application//Admin/Public/images/icon_drop.gif" border="0" height="16" width="16"></a>
      </td>
    </tr>
    <?php endforeach; ?>
      </tbody></table>

  <table cellpadding="4" cellspacing="0">
    <tbody><tr>
      <td style="background-color: rgb(255, 255, 255);"><input type="submit" id="btnSubmit" value="删除" class="button" disabled="true"></td>
      <td align="right" style="background-color: rgb(255, 255, 255);">      <!-- $Id: page.htm 14216 2008-03-10 02:27:21Z testyang $ -->
            <div id="turn-page">
        总计  <span id="totalRecords">12</span>
        个记录分为 <span id="totalPages">2</span>
        页当前第 <span id="pageCurrent">1</span>
        页，每页 <input type="text" size="3" id="pageSize" value="10" onkeypress="return listTable.changePageSize(event)">
        <span id="page-link">
          <a href="javascript:listTable.gotoPageFirst()">第一页</a>
          <a href="javascript:listTable.gotoPagePrev()">上一页</a>
          <a href="javascript:listTable.gotoPageNext()">下一页</a>
          <a href="javascript:listTable.gotoPageLast()">最末页</a>
          <select id="gotoPage" onchange="listTable.gotoPage(this.value)">
            <option value="1">1</option><option value="2">2</option>          </select>
        </span>
      </div>
</td>
    </tr>
  </tbody></table>
</div>

</form>

<div id="footer">
	版权所有 &copy; 2012-2013 传智播客 - PHP培训 - </div>
</div>

</body>
</html>