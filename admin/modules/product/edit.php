<?php  
    $open  = "product";
    require '../../autoload/autoload.php';

    $id = intval(getInput('id'));

    $Editproduct = $db-> fetchID("product", $id);
    if (empty($Editproduct)) {
      $_SESSION['error'] = "Dữ liệu không tồn tại";
      redirectAdmin("product");
    }

    $category = $db->fetchAll("category");

    if ($_SERVER["REQUEST_METHOD"] == "POST"){

      $data =
      [
        "name" => postInput('name'),
        "slug" => to_slug(postInput('name')),
        "category_id" => postInput("category_id"),
        "price" => postInput("price"),
        "number" => postInput("number"),
        "content" => postInput("content"),
        "sale" => postInput("sale"),
      ];

      $error = [];

      if (postInput('name') == ''){
        $error['name'] = "Mời bạn nhập tên sản phẩm";
      }

      if (postInput('number') == ''){
        $error['number'] = "Mời bạn số lượng sản phẩm";
      }

      if (postInput('category_id') == ''){
        $error['category_id'] = "Mời bạn chọn tên danh mục";
      }

      if (postInput('price') == ''){
        $error['price'] = "Mời bạn nhập giá sản phẩm";
      }

      if (postInput('content') == ''){
        $error['content'] = "Mời bạn nhập thông tin sản phẩm";
      }

      //error trong => k co loi

      if (empty($error)) {

          if (isset($_FILES['thunbar'])){

            $file_name = $_FILES['thunbar']['name'];
            $file_tmp = $_FILES['thunbar']['tmp_name'];
            $file_type = $_FILES['thunbar']['type'];
            $file_erro = $_FILES['thunbar']['error'];

            if ($file_erro == 0) {
              $part = ROOT."product/";
              $data['thunbar'] = $file_name;
            }

          }

          $update = $db->update("product",$data,array("id"=>$id));

          if ($update  > 0) {

            move_uploaded_file( $file_tmp , $part.$file_name );

            $_SESSION['success'] = "Cập nhật thành công";

            redirectAdmin("product");

          } else{

            $_SESSION['error'] = "Cập nhật thất bại";
            redirectAdmin("product");

          }

      }

    }

?>

    <?php require '../../layouts/header.php'; ?>

        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Sửa sản phẩm</h1>
            <div class="clearfix"></div>
            <?php if(isset($_SESSION['error'])) :?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $_SESSION['error']; unset($_SESSION['error']) ?>
                </div>
                <?php endif ; ?>
                    <form method="POST" enctype="multipart/form-data">

                        <div class="form-group row" me>
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Danh mục sản phẩm</label>
                            <div class="col-sm-10">
                                <select class="form-control col-md-8" name="category_id">

                                    <option value="">-Mời bạn chọn danh mục sản phẩm-</option>

                                    <?php foreach ($category as $item): ?>
                                        <option value="<?php echo $item['id'] ?>" <?php echo $Editproduct[ 'category_id']==$item[ 'id'] ? "selected = 'selected'" : '   ' ?>>
                                            <?php echo $item['name'] ?>
                                        </option>

                                        <?php endforeach ?>

                                </select>

                                <?php if(isset($error['category_id'])):  ?>
                                    <p class="text-danger">
                                        <?php echo $error['category_id'] ?>
                                    </p>
                                    <?php endif ?>
                            </div>
                        </div>

                        <div class="form-group row" me>
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Tên sản phẩm</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="inputEmail3" placeholder="Sản phẩm" name="name" value="<?php echo $Editproduct['name'] ?>">

                                <?php if(isset($error['name'])):  ?>
                                    <p class="text-danger">
                                        <?php echo $error['name'] ?>
                                    </p>
                                    <?php endif ?>
                            </div>
                        </div>

                        <div class="form-group row" me>
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Giá sản phẩm</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="inputEmail3" placeholder="0" name="price" value="<?php echo $Editproduct['price'] ?>">

                                <?php if(isset($error['price'])):  ?>
                                    <p class="text-danger">
                                        <?php echo $error['price'] ?>
                                    </p>
                                    <?php endif ?>
                            </div>
                        </div>

                        <div class="form-group row" me>
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Số lượng sản phẩm</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="inputEmail3" placeholder="0" name="number" value="<?php echo $Editproduct['number'] ?>">

                                <?php if(isset($error['number'])):  ?>
                                    <p class="text-danger">
                                        <?php echo $error['prnumberice'] ?>
                                    </p>
                                    <?php endif ?>
                            </div>
                        </div>

                        <div class="form-group row" me>
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Giảm giá</label>
                            <div class="col-sm-2">
                                <input type="number" class="form-control" id="inputEmail3" sss name="sale" value="0" value="<?php echo $Editproduct['sale'] ?>">
                            </div>

                            <label for="inputEmail3" class="col-sm-2 col-form-label">Hình ảnh</label>
                            <div class="col-sm-3">
                                <input type="file" class="form-control" id="inputEmail3" name="thunbar" value="<?php echo $Editproduct['name'] ?>">
                                <?php if(isset($error['thunbar'])): ?>
                                    <p class="text-danger">
                                        <?php echo $error['thunbar'] ?>
                                    </p>
                                    <?php endif ?>
                                        <img src="<?php echo uploads() ?>product/<?php echo $Editproduct['thunbar'] ?>" width="60px" height="60px">

                            </div>
                        </div>

                        <div class="form-group row" me>
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Thông tin sản phẩm</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" rows="6" name="content">
                                    <?php echo $Editproduct['content'] ?>
                                </textarea>

                                <?php if(isset($error['content'])):  ?>
                                    <p class="text-danger">
                                        <?php echo $error['content'] ?>
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