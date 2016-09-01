<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>ECSHOP 管理中心 - 添加新商品 </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="/Public/Admin/Styles/general.css" rel="stylesheet" type="text/css" />
    <link href="/Public/Admin/Styles/main.css" rel="stylesheet" type="text/css" />
     <!--//  引入百度编辑器-->
    <script src="/Public/Js/jquery-1.11.3.min.js"></script> 
    
<link href="/Public/umeditor/themes/default/css/umeditor.css" type="text/css" rel='stylesheet'>
<script type="text/javascript" charset="utf-8" src="/Public/umeditor/umeditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/umeditor/umeditor.min.js"></script>
<script type="text/javascript" src="/Public/umeditor/lang/zh-cn/zh-cn.js"></script>
</head>
<body>
<h1>
    <span class="action-span"><a href="<?php echo U($right_link); ?>"><?php echo $right_btn; ?></a>
    </span>
    <span class="action-span1"><a href="__GROUP__">ECSHOP 管理中心</a></span>
    <span id="search_id" class="action-span1"> - <?php echo $left_btn; ?> </span>
    <div style="clear:both"></div>
</h1>
   
<div class="form-div">
    <form action="/index.php/Admin/Goods/goodsList" name="searchForm" method="get">
        <img src="/Application/Admin/Public/Images/icon_search.gif" width="26" height="22" border="0" alt="search" />
       关键字 <input type="text" name="keyword" size="15" value="<?php echo I('get.keyword')?>" /><br>
        <span id="price">价钱</span> <input type="text" name="small" value="<?php echo I('get.small')?>" />
        到 <input type="text" name="big" value="<?php echo I('get.big')?>" /><br>
         <!-- 上架 -->
       <span id="sale">是否上架</span>
         <input type="radio" name="is_sale" value="1" <?php echo I('get.is_sale')==1?'checked':'';?> />是
        <input type="radio" name="is_sale" value="0"  <?PHP echo I('get.is_sale')==0?'checked':'';?> />否
        <input type="radio" name="is_sale" value=""   <?php echo I('get.is_sale')==''?'checked':'';?>/>全部
        <br>

        <!-- 关键字 -->
        <input type="submit" value=" 搜索 " class="button" />
    </form>
    <input type="button" name="order" value="asc">
    <input type="button" name="order" value="desc">
</div>

<!-- 商品列表 -->
<form method="post" action="" name="listForm" onsubmit="">
    <div class="list-div" id="listDiv">
      <table cellpadding="3" cellspacing="1">
            <tr>
                <th>编号</th>
                <th>商品名称</th>
                <th>价格</th>
                <th>上架</th>
                <th>市场价</th>
                <th>商品图片</th>
                <th>商品介绍</th>
                <th>操作</th>
            </tr>
           <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                <td align="center"><?php echo ($vo["goods_id"]); ?></td>
                <td align="center" class="first-cell"><span><?php echo ($vo["goods_name"]); ?></span></td>
                <td align="center"><span><?php echo ($vo["goods_price"]); ?></span></td>
                <td align="center"><img src="<?php if($vo["is_sale"] == 1): ?>/Application/Admin/Public/Images/yes.gif<?php else: ?>/Application/Admin/Public/Images/no.gif<?php endif; ?>"/></td>
                <td align="center"><?php echo ($vo["market_price"]); ?></td>
                <td><img src="/<?php echo ($vo["sm_img"]); ?>" alt="商品图片" ></td>
                <td align="center"><?php echo ($vo["goods_desc"]); ?></td>
                <td align="center">
                <a href="/index.php/Admin/Goods/GoodsDel?goods_id=<?php echo ($vo["goods_id"]); ?>" target="_blank" title="查看"><img src="/Application/Admin/Public/Images/icon_view.gif" width="16" height="16" border="0" /></a>
                <a href="/index.php/Admin/Goods/GoodsEdit?goods_id=<?php echo ($vo["goods_id"]); ?>" title="编辑"><img src="/Application/Admin/Public/Images/icon_edit.gif" width="16" height="16" border="0" /></a>
                <a href="/index.php/Admin/Goods/GoodsDel?goods_id=<?php echo ($vo["goods_id"]); ?>>" onclick="" title="回收站"><img src="/Application/Admin/Public/Images/icon_trash.gif" width="16" height="16" border="0" /></a></td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </table>

    <!-- 分页开始 -->
        <table width="100%" cellspacing="0" id="page-table">
            <tr>
                <td align="center">
                    <?php echo ($show); ?>                </td>
                <td align="center" nowrap="true">&nbsp;</td>
            </tr>
      </table>
    <!-- 分页结束 -->
        <script src="/Public/js/jquery-1.8.3.min.js"></script>
        <script>
            $('#price').css('margin-left','40px');
            $(':submit').css('margin-left','60px');
            $('#sale').css('margin-left','10px');
            $(':radio :gt(0)').css('margin-left','30px');
            $(':button').css('margin-left','60px');
            $(':button :eq(1)').click(function (){
                $(this).submit();

            });
        </script>
  </div>
</form>


<div id="footer">
    共执行 9 个查询，用时 0.025161 秒，Gzip 已禁用，内存占用 3.258 MB<br />
    版权所有 &copy; 2005-2012 上海商派网络科技有限公司，并保留所有权利。</div>
</body>
</html>