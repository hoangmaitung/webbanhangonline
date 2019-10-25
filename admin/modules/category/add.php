
<?php  
    $open  = "category";
    require '../../autoload/autoload.php';
  
    if ($_SERVER["REQUEST_METHOD"] == "POST"){

      $data =
      [
        "name" => postInput('name'),
        "slug" => to_slug(postInput('name'))
      ];

      $error = [];


      if (postInput('name') == ''){
        $error['name'] = "Mời bạn nhập đầy đủ tên danh mục";
      }


      //error trong => k co loi
      
      if (empty($error)) {

        $isset = $db->fetchOne("category"," name = '".$data['name']."' ");

        if (count($isset) > 0) {
          
          $_SESSION['error'] = "Tên danh mục đã tồn tại ! ";
          
        } else {
            $id_insert = $db->insert("category",$data);
          
          if ($id_insert > 0) {

            $_SESSION['success'] = "Thêm mới thành công";
            redirectAdmin("category");

          } else{

            $_SESSION['error'] = "Thêm mới thất bại";

          }
        }
      }

    }


?>


<?php require '../../layouts/header.php'; ?>


        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Thêm mới danh mục</h1>
          <div class="clearfix"></div>
      <?php if(isset($_SESSION['error'])) :?>
               <div class="alert alert-danger" role="alert">
                <?php echo $_SESSION['error']; unset($_SESSION['error']) ?>
               </div>
            <?php endif ; ?>
          <form method="POST">
   <div class="form-group row" me>
      <label for="inputEmail3" class="col-sm-2 col-form-label">Tên danh mục</label>
      <div class="col-sm-10">
         <input type="text" class="form-control" id="inputEmail3" placeholder="Danh mục" name="name">

          <?php if(isset($error['name'])):  ?>
              <p class="text-danger"> <?php echo $error['name'] ?> </p>
          <?php endif ?>
      </div>
   </div>
   <div class="form-group row">
      <div class="col-sm-10">
         <button type="submit" class="btn btn-primary">Thêm mới</button>
      </div>

      


   </div>
</form>
          

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      

<?php require '../../layouts/footer.php'; ?>