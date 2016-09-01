<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>ECSHOP 管理中心 - 商品品牌 </title>
<meta name="robots" content="noindex, nofollow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/Application/Admin/Public/Styles/general.css" rel="stylesheet" type="text/css" />
<link href="/Application/Admin/Public/Styles/main.css" rel="stylesheet" type="text/css" />
</head>
<body>
<h1>
    <span class="action-span"><a href="brandAdd.html">添加品牌</a></span>
    <span class="action-span1"><a href="#">ECSHOP 管理中心</a></span>
    <span id="search_id" class="action-span1"> - 商品品牌 </span>
    <div style="clear:both"></div>
</h1>
<div class="form-div">
    <form action="/index.php/Admin/Brand/brandList.html"  method="post" name="searchForm" >
    <img src="/Application/Admin/Public/Images/icon_search.gif" width="26" height="22" border="0" alt="search" />
    <input type="text" name="brand_name" size="15" />
    <input type="submit" value=" 搜索 " class="button" />
    </form>
</div>
<form method="post" action="" name="listForm">
    <div class="list-div" id="listDiv">
        <table cellpadding="3" cellspacing="1">
            <tr>
                <th>品牌名称</th>
                <th>品牌网址</th>
                <th>品牌描述</th>
                <th>排序</th>
                <th>是否显示</th>
                <th>操作</th>
            </tr>
            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                <td class="first-cell">
                    <span style="text-align:center"><a href="" target="_brank"><?php echo ($vo["brand_name"]); ?><img src="/<?php echo ($vo["sm_logo"]); ?>" width="16" height="16" border="0" alt="品牌LOGO" /></a></span>
                    <span></span>
                </td>
                <td align="center">
                    <a href="<<?php echo ($val["site_url"]); ?>>" target="_brank"> <?php echo ($vo["site_url"]); ?></a>
               </td>
                <td align="center"><?php echo ($vo["brand_desc"]); ?></td>
                <td align="center"><span><?php echo ($vo["sort_order"]); ?></span></td>
                <td align="center"><img src="<?php if($vo["is_show"] == 1): ?>/Application/Admin/Public/Images/yes.gif<?php else: ?>/Application/Admin/Public/Images/no.gif<?php endif; ?>" /></td>
                <td align="center">
                <a href="/index.php/Admin/Brand/brandUpdate/brand_id/<?php echo ($vo["brand_id"]); ?>" title="编辑">编辑</a> |
                <a href="/index.php/Admin/Brand/brandDel/brand_id/<?php echo ($vo["brand_id"]); ?>" title="编辑">移除</a> 
                </td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            <tr>
                <td align="right" nowrap="true" colspan="6">
                    <div id="turn-page" align="center">
                       <?php echo ($show); ?>
                            
                        </span>
                    </div>
                </td>
            </tr>
        </table>
    </div>
</form>

<div id="footer">
共执行 3 个查询，用时 0.021251 秒，Gzip 已禁用，内存占用 2.194 MB<br />
版权所有 &copy; 2005-2012 上海商派网络科技有限公司，并保留所有权利。</div>
</body>
</html>