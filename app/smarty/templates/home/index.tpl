<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <!-- CSS only -->
   
</head>
<body>
<div class="wrapper">
{foreach from=$names key=k item=i}
    Name: {$i.fullname} <br/>
{/foreach}
</div>

</body>
</html>