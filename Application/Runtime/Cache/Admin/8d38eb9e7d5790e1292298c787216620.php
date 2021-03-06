<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>ECSHOP 管理中心 - 编辑商品 </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/Application/Admin/Public/Styles/general.css" rel="stylesheet" type="text/css" />
<link href="/Application/Admin/Public/Styles/main.css" rel="stylesheet" type="text/css" />
</head>
<body>
<h1>
    <span class="action-span"><a href="__GROUP__/Goods/goodsList">商品列表</a>
    </span>
    <span class="action-span1"><a href="__GROUP__">ECSHOP 管理中心</a></span>
    <span id="search_id" class="action-span1"> - 编辑商品 </span>
    <div style="clear:both"></div>
</h1>

<div class="tab-div">
    <div id="tabbar-div">
        <p>
            <span class="tab-front" id="general-tab">通用信息</span>
        </p>
    </div>
    <div id="tabbody-div">
        <form enctype="multipart/form-data" action="/index.php/Admin/Goods/GoodsEdit?goods_id=45" method="post">
            <table width="90%" id="general-table" align="center">
                <tr>

                    <td class="label">商品名称：</td>
                    <td><input type="text" name="goods_name" value="<?php echo ($info["goods_name"]); ?>"size="30" />

                        <span class="require-field">*</span>
                        <input type="hidden"  value="<?php echo ($info["goods_id"]); ?>" name="goods_id">
                    </td>
                </tr>
                <tr>
                    <td class="label">本店售价：</td>
                    <td>
                        <input name="goods_price" type="text" id="goods_price" value="<?php echo ($info["goods_price"]); ?>" size="20"/>
                        <span class="require-field">*</span>
                    </td>
                </tr>
               
                    <td class="label">是否上架：</td>
                    <td>
                        <input type="radio" name="is_onsale" value="1" <?php if($info["is_sale"] == 1): ?>checked="true"<?php endif; ?>/> 是
                        <input type="radio" name="is_onsale" value="0" <?php if($info["is_sale"] == 0): ?>checked="true"<?php endif; ?> /> 否
                    </td>
                </tr>
                <tr>
                    <td class="label">市场售价：</td>
                    <td>
                        <input type="text" name="market_price" value="<?php echo ($info["market_price"]); ?>" size="20" />
                    </td>
                </tr>
                 <tr>
                    <td class="label">商品图片：</td>
                    <td>
                        <input type="file" name="goods_img" " size="20" />
                    </td>
                </tr>
                <tr>
                    <td class="label">商品简单描述：</td>
                    <td>
                        <textarea name="goods_desc" cols="40" rows="3" id="goods_desc"><?php echo ($info["goods_desc"]); ?></textarea>
                    </td>
                </tr>
            </table>
            <div class="button-div">
                <input type="submit" value=" 确定 " class="button"/>
                <input type="reset" value=" 重置 " class="button" />
            </div>
        </form>
    </div>
</div>

<div id="footer">
共执行 9 个查询，用时 0.025161 秒，Gzip 已禁用，内存占用 3.258 MB<br />
版权所有 &copy; 2005-2012 上海商派网络科技有限公司，并保留所有权利。</div>
</body>
</html>