<?php  
    $open  = "category";
    require '../../autoload/autoload.php';

    $id = intval(getInput('id'));

    $EditCategory = $db-> fetchID("category", $id);
    if (empty($EditCategory)) {
      $_SESSION['error'] = "Dữ liệu không tồn tại";
      redirectAdmin("category");
    }

    $id_product = $db->fetchOne("product"," category_id = $id ");
    if ($id_product == NULL) 
    {
        $num = $db->delete("category",$id);

        if($num > 0){

        $_SESSION['success'] = "Xóa thành công";
          redirectAdmin("category");

        } else {

          $_SESSION['error'] = "Xóa thất bại";
          redirectAdmin("category");

        };
    }
    else
    {
        $_SESSION['error'] = "Danh mục có sản phẩm, không thể xóa";
          redirectAdmin("category");
    }

?>
  