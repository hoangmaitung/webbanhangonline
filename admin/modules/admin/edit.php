<?php  
    $open  = "admin";
    require '../../autoload/autoload.php';

      //danh sach danh muc san pham
      
    $id = intval(getInput('id'));

    $Editadmin = $db-> fetchID("admin", $id);
    if (empty($Editadmin)) {
      $_SESSION['error'] = "Dữ liệu không tồn tại";
      redirectAdmin("admin");
    }

      

    if ($_SERVER["REQUEST_METHOD"] == "POST"){

      $data =
      [
            "name"     => postInput('name'),
            "email"    => postInput('email'),
            "phone"    => postInput("phone"),
            "address"  => postInput("address"),
            "level"    => postInput("level"),
      ];

      $error = [];

      if (postInput('name') == ''){
        $error['name'] = "Mời bạn nhập tên admin";
      }

      if (postInput('email') == ''){
        $error['email'] = "Mời bạn nhập email";
      } 

      else 
      {

        if (postInput("email") != $Editadmin['email']) {
            $is_check = $db->fetchOne("admin"," email = '".$data['email']."' ");
        if ($is_check != NULL) {
            $error['email'] = "Email đã tồn tại";
        }
        }

        
      }

      if (postInput('phone') == ''){
        $error['phone'] = "Mời bạn nhập sđt";
      }

      if (postInput('address') == ''){
        $error['address'] = "Mời bạn nhập địa chỉ";
      }

      // if (postInput('password') == ''){
      //   $error['password'] = "Mời bạn nhập mật khẩu";
      // }

      // if($data['password'] != MD5(postInput('re_password')))
      // {
      //     $error['password'] = "Mật khẩu không trùng nhau";
      // }
      if (postInput('password') != NULL && postInput("re_password") != NULL) 
      {
           if (postInput('password') != postInput('re_password')) {
               $error['password'] = "Mật khẩu thay đổi không trùng nhau";
           }
           else {
                $data['password'] = MD5(postInput('password'));
           }

        }

      //error trong => k co loi

      if (empty($error)) {



          

          $id_update = $db->update("admin",$data,array("id"=>$id));

          if ($id_update > 0) {


            $_SESSION['success'] = "Cập nhật thành công";

            redirectAdmin("admin");

          } else{

            $_SESSION['error'] = "Cập nhật thất bại";
            redirectAdmin("admin");

          }

      }

    }

?>

    <?php require '../../layouts/header.php'; ?>

        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Sửa thông tin Admin</h1>
            <div class="clearfix"></div>
            <?php if(isset($_SESSION['error'])) :?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $_SESSION['error']; unset($_SESSION['error']) ?>
                </div>
                <?php endif ; ?>
                    <form method="POST" enctype="multipart/form-data">

                        <div class="form-group row" me>
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Họ và tên</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="inputEmail3" placeholder="Họ và tên" name ="name" value="<?php echo $Editadmin['name'] ?>">

                                <?php if(isset($error['name'])):  ?>
                                    <p class="text-danger">
                                        <?php echo $error['name'] ?>
                                    </p>
                                    <?php endif ?>
                            </div>
                        </div>

                        <div class="form-group row" me>
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" id="inputEmail3" placeholder="@gmail.com" name="email" value="<?php echo $Editadmin['email'] ?>">

                                <?php if(isset($error['email'])):  ?>
                                    <p class="text-danger">
                                        <?php echo $error['email'] ?>
                                    </p>
                                    <?php endif ?>
                            </div>
                        </div>


                        <div class="form-group row" me>
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Số điện thoại</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="inputEmail3" placeholder="0916999999"  name="phone" value="<?php echo $Editadmin['phone'] ?>">

                                <?php if(isset($error['phone'])):  ?>
                                    <p class="text-danger">
                                        <?php echo $error['phone'] ?>
                                    </p>
                                    <?php endif ?>
                            </div>
                        </div>

                        <div class="form-group row" me>
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Mật khẩu</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" id="inputEmail3" placeholder="*********"  name="password">

                                <?php if(isset($error['password'])):  ?>
                                    <p class="text-danger">
                                        <?php echo $error['password'] ?>
                                    </p>
                                    <?php endif ?>
                            </div>
                        </div>

                        <div class="form-group row" me>
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Nhập lại mật khẩu</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" id="inputEmail3" placeholder="*********"  name="re_password" >

                                <?php if(isset($error['re_password'])):  ?>
                                    <p class="text-danger">
                                        <?php echo $error['re_password'] ?>
                                    </p>
                                    <?php endif ?>
                            </div>
                        </div>

                        <div class="form-group row" me>
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Địa chỉ</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="inputEmail3" placeholder="Địa chỉ" name ="address" value="<?php echo $Editadmin['address'] ?>">

                                <?php if(isset($error['address'])):  ?>
                                    <p class="text-danger">
                                        <?php echo $error['address'] ?>
                                    </p>
                                    <?php endif ?>
                            </div>
                        </div>

                        <div class="form-group row" me>
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Level</label>
                            <div class="col-sm-8">
                                <select name="level" class="form-control">
                                    <option value="1" <?php echo isset($Editadmin['level']) && $Editadmin['level'] == 1 ? "selected = 'selected'" : '' ?>>CTV</option>
                                    <option value="2" <?php echo isset($Editadmin['level']) && $Editadmin['level'] == 2 ? "selected = 'selected'" : '' ?>>Admin</option>  
                                </select>

                                <?php if(isset($error['level'])):  ?>
                                    <p class="text-danger">
                                        <?php echo $error['level'] ?>
                                    </p>
                                    <?php endif ?>
                            </div>
                        </div>

                        

                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Lưu</button>
                            </div>

                        </div>
                    </form>

        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->

        <?php require '../../layouts/footer.php'; ?>