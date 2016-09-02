<?php if (!defined('THINK_PATH')) exit();?><!-- $Id: goods_info.htm 17126 2010-04-23 10:30:26Z liuhui $ -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>ECSHOP 管理中心 - 添加新商品 </title>
<meta name="robots" content="noindex, nofollow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/Public/Admin/styles/general.css" rel="stylesheet" type="text/css" />
<link href="/Public/Admin/styles/main.css" rel="stylesheet" type="text/css" />
 <!--//  引入百度编辑器-->
    <script src="/Public/Js/jquery-1.11.3.min.js"></script> 
    
<link href="/Public/umeditor/themes/default/css/umeditor.css" type="text/css" rel='stylesheet'>
<script type="text/javascript" charset="utf-8" src="/Public/umeditor/umeditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/umeditor/umeditor.min.js"></script>
<script type="text/javascript" src="/Public/umeditor/lang/zh-cn/zh-cn.js"></script>

<script type="text/javascript">
$(function(){
        $("select[name=goods_type]").change(function(){
               //获取商品类型的id.
               var type_id = $(this).val();

              //使用ajax提交商品类型的id
              $.ajax({
                    type:'get',
                    url:'<?php echo U("showattr")?>',
                    data:'type_id='+type_id,
                    success:function(msg){
                        console.log(msg)
                            //返回的是已经生成好的html表单代码
                            $("#showattr").html(msg);
                    }
                
              });

        });
});


function charea(a) {
    var spans = ['general','detail','mix','attr','album'];
    for(i=0;i < 5;i++) {
        var o = document.getElementById(spans[i]+'-tab');
        var tb = document.getElementById(spans[i]+'-table');
        o.className = o.id==a+'-tab'?'tab-front':'tab-back';
        tb.style.display = tb.id==a+'-table'?'block':'none';
    }
    
}
</script>
</head>
<body>

<h1>
<span class="action-span"><a href="goods.php?act=list">商品列表</a></span>
<span class="action-span1"><a href="index.php?act=main">ECSHOP 管理中心</a> </span><span id="search_id" class="action-span1"> - 添加新商品 </span>
<div style="clear:both"></div>
</h1>

<!-- start goods form -->
<div class="tab-div">
    <!-- tab bar -->
    <div id="tabbar-div">
      <p>
        <span class="tab-front" id="general-tab" onclick="charea('general');">通用信息</span>
        <span class="tab-back" id="detail-tab" onclick="charea('detail');">详细描述</span>
        <span class="tab-back" id="mix-tab" onclick="charea('mix');">其他信息</span>
        <span class="tab-back" id="attr-tab" onclick="charea('attr');">商品属性</span>
        <span class="tab-back" id="album-tab" onclick="charea('album');">商品相册</span>

      </p>
    </div>

    <!-- tab body -->
    <div id="tabbody-div">
      <form enctype="multipart/form-data" action="/index.php/Admin/Goods/add" method="post" name="theForm" >
        <!-- 最大文件限制 -->
        <input type="hidden" name="MAX_FILE_SIZE" value="2097152" />
        <!-- 通用信息 -->
        <table width="90%" id="general-table" align="center">
          <tr>
            <td class="label">商品名称：</td>
            <td><input type="text" name="goods_name" value="" style="float:left;color:;" size="30" /></td>
          </tr>
          <tr>
            <td class="label">
            <a href="#" title="点击此处查看提示信息"><img src="/Public/Admin/images/notice.gif" width="16" height="16" border="0" alt="点击此处查看提示信息"></a> 商品货号： </td>
            <td><input type="text" name="goods_sn" value="" size="20"  /><span id="goods_sn_notice"></span><br />
            <span class="notice-span" style="display:block"  id="noticeGoodsSN">如果您不输入商品货号，系统将自动生成一个唯一的货号。</span></td>
          </tr>
          <tr>
            <td class="label">商品分类：</td>
            <td><select name="cat_id"  >
                <option value="0">请选择...</option>
                <?php foreach($cat_list as $rows):?>
                            <option value="<?php echo $rows['cat_id']?>"><?php echo str_repeat('--',$rows['deel']).$rows['cat_name']?></option>
                <?php endforeach?>
            </select>
             </td>
          </tr>
           <tr>
            <td class="label">商品品牌：</td>
            <td>
            	<select name="brand_id">
            	<?php foreach($brand_list as $brand):?>
                	<option value="<?php echo $brand['brand_id']?>"><?php echo $brand['brand_name']?></option>
                <?php endforeach?> 
                </select>
            </td>
          </tr>
          <tr>
            <td class="label">本店售价：</td>
            <td><input type="text" name="goods_price" value="0" size="20" /></td>
          </tr>
          <tr>
            <td class="label">市场售价：</td>
            <td><input type="text" name="market_price" value="0" size="20" /></td>
          </tr>
          
          <tr>
            <td class="label">上传商品图片：</td>
            <td>
              <input type="file" name="goods_origin" size="35" />
            </td>
          </tr>
        </table>

        <!-- 详细描述 -->
        <table width="90%" id="detail-table" style="display:none">
          <tr>
            <td><textarea name="goods_desc" id="goods_desc"></textarea></td>
          </tr>
        </table>

        <!-- 其他信息 -->
        <table width="90%" id="mix-table" style="display:none" align="center">
          <tr>
            <td class="label"><a href="#" title="点击此处查看提示信息"><img src="/Public/Admin/images/notice.gif" width="16" height="16" border="0" alt="点击此处查看提示信息"></a> 库存数量：</td>

            <td><input type="text" name="goods_number" value="1" size="20" />
          </tr>
                    <tr>
                        <td class="label">加入推荐：</td>
                        <td>
                            <input type="checkbox" name="is_best" value="1"  />精品
                            <input type="checkbox" name="is_new" value="1"  />新品
                            <input type="checkbox" name="is_hot" value="1"  />热销
                        </td>
          </tr>
          <tr id="alone_sale_1">
            <td class="label" id="alone_sale_2">上架：</td>
            <td id="alone_sale_3"><input type="checkbox" name="is_sale" value="1" checked="checked" /> 打勾表示允许销售，否则不允许销售。</td>
          </tr>
        </table>
          <!-- 商品属性 -->
        <table width="90%" id="attr-table" style="display:none">
          <tr>
            <td><strong>商品类型：</strong></td>
            <td><select name="goods_type" id="type">
                        <option value="0">请选择商品属性</option>
                        <?php foreach($type_list as $v):?>
                                <option value="<?php echo $v['type_id']?>"><?php echo $v['type_name']?></option>
                        <?php endforeach?>
            </select></td>
          </tr>
          <tr><td colspan="2"><div id="showattr"></div></td></tr>
        </table>
          <!-- 商品相册 -->
        <table width="90%" id="album-table" style="display:none">
          <tr>
            <td>上传文件：</td>
            <td><input type="file" name="photo[]"></td>
              <td><input type="button" onclick="tianjia(this)" value="添加"></td>
          </tr>
        </table>
  
        <div class="button-div">
          <input type="hidden" name="goods_id" value="0" />
                    <input type="submit" value=" 确定 " class="button" />
          <input type="reset" value=" 重置 " class="button" />
        </div>
        <input type="hidden" name="act" value="insert" />
      </form>
    </div>
</div>
<!-- end goods form -->

</body>
</html>
<script src="/Public/JS/jquery-1.7.2.js"></script>
<script>
	$('#type').onchange=function() {
		var type_id = $('#type').val();
			$.ajax({
				type:'GET',
				src:'<?php echo U("showattr")?>',
				data:'type='+type_id,
				success: function(data) {
						$('#showattr').html(data)
					}
			});
		}
    //添加相册
    function tianjia(obj) {
        var ce = $(obj).parent().parent();
        if(obj.value=='添加') {
            var but = ce.clone();
            but.find(':button').val('删除');
            ce.after(but)

        } else {
            ce.remove(but);
        }
    }
</script>

<script>
     var um=UM.getEditor('goods_desc',{
		 "initialFrameHeight" : 200,
        "initialFrameWidth":"80%"
		
    });
    
</script>
</script>