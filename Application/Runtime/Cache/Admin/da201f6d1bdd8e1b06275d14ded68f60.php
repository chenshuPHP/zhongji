<?php if (!defined('THINK_PATH')) exit();?>
<table>
    <?php foreach($attr_list as $rows) if($rows['attr_type'] == 0) { if ($rows['attr_input_type'] == 0) { echo '<tr><td>'.$rows['attr_name'].'</td><td><input type="text" name="attr[' . $rows['attr_id'] . ']"></td></tr>'; } else { $attr = $rows['attr_value']; $attr = str_replace(',','，', $attr); $attr = explode(',',$attr); echo '<tr><td>'.$rows['attr_name'].'</td>'; echo '<td><select name="attr['.$rows['attr_id'].']">'; foreach($attr as $k=>$v) { echo "<option value='$v'>".$v."</option>"; } echo "</select></td></tr>"; } } else { if($rows['attr_input_type'] == 0) { echo '<tr><td>' . $rows['attr_name'] . '</td><td>'; echo '<input type="text" name="attr[' . $rows['attr_id'] . ']"/><input type="button" value="添加" onclick="dup(this)"></td></tr>'; } else { echo '<tr><td>'. $rows['attr_name'] . '</td><td>'; $attr = $rows['attr_value']; $attr = str_replace('，',',',$attr); $attr = explode(',',$attr); echo '<select name="attr[' . $rows['attr_id'] . '][]">'; foreach($attr as $value) { echo '<option value="' . $value . '"> ' . $value . '</option>'; } echo '</select><input type="button" value="添加" onclick="dup(this)">'; } } ?>

    </table>
<script>
    function dup(obj) {
        var butt = $(obj).parent().parent();
       if(obj.value=='添加') {
           var bu = butt.clone();
           bu.find(':button').val('删除');
           butt.after(bu);
       } else {
           $(obj).parent().parent().remove();
       }
    }
</script>