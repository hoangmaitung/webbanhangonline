<?php 
      $open  = "category";
    require '../../autoload/autoload.php';
    
    $category = $db->fetchAll("category");

    if (isset($_GET['page']))
    {
        $p = $_GET['page'];
    } 
    else 
    {
        $p = 1;
    }

    $sql = "SELECT product.*,category.name as namecate FROM product
        LEFT JOIN category on category.id = product.category_id";
    $product = $db->fetchJone('product',$sql,$p,10,true);

    if (isset($product['page'])) {
        $sotrang = $product['page'];
        unset($product['page']);
    }


?>
<?php require '../../layouts/header.php'; ?>


        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Danh mục sản phẩm</h1>
          <a href="add.php" class="btn btn-success">Thêm mới danh mục</a>
          <p></p>
          
          <div class="clearfix"></div>

            <?php if(isset($_SESSION['success'])) :?>
               <div class="alert alert-success" role="alert">
                <?php echo $_SESSION['success']; unset($_SESSION['success']) ?>
               </div>
            <?php endif ; ?>

            <?php if(isset($_SESSION['error'])) :?>
               <div class="alert alert-danger" role="alert">
                <?php echo $_SESSION['error']; unset($_SESSION['error']) ?>
               </div>
            <?php endif ; ?>
             
          <div class="card-body">
   <div class="table-responsive">
      <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">

         <div class="row">
            <div class="col-sm-12">
               <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                  <thead>
                     <tr role="row">
                        <th >STT</th>
                        <th >Tên danh mục</th>
                        <th >Ngày tạo</th>
                        <th >Hành động</th>

                     </tr>
                  </thead>
                  
                  <tbody>
                     <?php $stt = 1; foreach ($category as $item): ?>

                        <tr role="row" class="odd">

                        <td><?php echo $stt ?></td>
                        <td><?php echo $item['name'] ?></td>
                   
                        
                        <td><?php echo $item['created_at'] ?></td>
                        <td>
                           <a class="btn btn-primary btn-sm btn-info" href="edit.php?id=<?php echo $item['id'] ?>">
                              <i class="fa fa-edit"></i> Sửa</a>
                           <a class="btn btn-primary btn-sm btn-danger" href="delete.php?id=<?php echo $item['id'] ?>">
                              <i class="fa fa-times"></i> Xóa</a>
                        </td>

                     
                     </tr>
                     <?php $stt++; endforeach ?>
                  </tbody>
               </table>
            </div>
         </div>
         <div class="row">
              
            
         </div>
      </div>
   </div>
</div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      

<?php require '../../layouts/footer.php'; ?>