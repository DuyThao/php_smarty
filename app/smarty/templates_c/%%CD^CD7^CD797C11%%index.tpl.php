<?php /* Smarty version 2.6.32, created on 2021-11-01 09:50:43
         compiled from home/index.tpl */ ?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<div class="wrapper">
<?php $_from = $this->_tpl_vars['names']; if (($_from instanceof StdClass) || (!is_array($_from) && !is_object($_from))) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['i']):
?>
    Name: <?php echo $this->_tpl_vars['i']['fullname']; ?>
 <br/>
<?php endforeach; endif; unset($_from); ?>
</div>

</body>
</html>