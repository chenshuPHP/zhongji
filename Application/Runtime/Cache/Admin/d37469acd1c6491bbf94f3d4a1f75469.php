<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>ECSHOP 管理中心 - 添加分类 </title>
<meta name="robots" content="noindex, nofollow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/Public/Admin/styles/general.css" rel="stylesheet" type="text/css" />
<link href="/Public/Admin/styles/main.css" rel="stylesheet" type="text/css" />
</head>
<body>

<h1>
<span class="action-span"><a href="/index.php/Admin/Category/lst">商品分类</a></span>
<span class="action-span1"><a href="#">ECSHOP 管理中心</a> </span><span id="search_id" class="action-span1"> - 添加商品栏目 </span>
<div style="clear:both"></div>
</h1>

<div class="main-div">
  <form action="/index.php/Admin/Category/update/cat_id/4.html" method="post" name="theForm" enctype="multipart/form-data">
  <table width="100%" id="general-table">
      <tr>
        <td class="label">栏目名称:</td>
        <td>
          <input type='text' name='cat_name' maxlength="20" value="<?php echo $info['cat_name']?>" size='27' />
        </td>
      </tr>
      <tr>
        <td class="label">上级栏目:</td>
        <td>
          <select name="parent_id">
                <option value="0">顶级栏目</option>
                <?php foreach($list as $v){ if(in_array($v['cat_id'],$childid)){ continue; } if($v['cat_id']==$info['parent_id']){ $sel = 'selected="selected"'; }else{ $sel=''; } ?>
                        <option <?php echo $sel;?>value="<?php echo $v['cat_id']?>"><?php echo str_repeat('--',$v['lev']).$v['cat_name']?></option>
                <?php }?>
          </select>
        </td>
      </tr>
      <tr>
      <input type="hidden" name="cat_id" value="<?php echo $info['cat_id']?>"/>
        <td></td>
        <td>

          <input type="reset" value=" 重置 " /><input type="submit" value=" 确定 " />
        </td>
      </tr>
      </table>
  </form>
</div>

<div id="footer">
共执行 3 个查询，用时 0.021687 秒，Gzip 已禁用，内存占用 2.081 MB<br />
版权所有 &copy; 2005-2010 上海商派网络科技有限公司，并保留所有权利。</div>

</body>
</html>