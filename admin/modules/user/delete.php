<?php  
    $open  = "product";
    require '../../autoload/autoload.php';

    $id = intval(getInput('id'));

    $user = $db-> fetchID("users", $id);
    if (empty($user)) {
      $_SESSION['error'] = "Dữ liệu không tồn tại";
      redirectAdmin("user");
    }

    $num = $db->delete("users",$id);  

    if($num > 0){

       $_SESSION['success'] = "Xóa thành công";
      redirectAdmin("user");

    } else {

        $_SESSION['error'] = "Xóa thất bại";
      redirectAdmin("user");

    }



?>
  