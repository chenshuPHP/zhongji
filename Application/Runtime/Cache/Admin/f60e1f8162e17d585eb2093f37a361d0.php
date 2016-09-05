<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<select>
    <?php if(is_array($sheng)): foreach($sheng as $key=>$sheng): ?><option value="<?php echo ($sheng['id']); ?>"><?php echo ($sheng['name']); ?></option><?php endforeach; endif; ?>
</select>
</body>
</html>