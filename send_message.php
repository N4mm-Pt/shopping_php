<?php
require('ketnoi.inc.php');
require('functions.inc.php');
$name=get_safe_value($con,$_POST['name']);
$email=get_safe_value($con,$_POST['email']);
$mobile=get_safe_value($con,$_POST['mobile']);
$comment=get_safe_value($con,$_POST['message']);
$added_on=date('Y-m-d h:i:s');
mysqli_query($con,"insert into lienhe(Ten,email,SoDT,NoiDung,NgayThem) values('$name','$email','$mobile','$comment','$added_on')");
echo "Cảm ơn đã cho chúng tôi biết ý kiến của bạn";
?>