<?php 
      $open  = "product";
    require '../../autoload/autoload.php';
    $product = $db->fetchAll("product");

    if (isset($_GET['page'])) 
    {
        $p = $_GET['page'];
    }
    else
    {
        $p = 1;
    }
    
    $sql = "SELECT product.*,category.name as namecate FROM product LEFT JOIN category on 
            category.id = product.category_id ";

    $product = $db->fetchJone('product',$sql,$p,true);

    if (isset($product['page'])) 
    {
        $sotrang = $product['page'];
        unset($product['page']);
    }

?>
    <?php require '../../layouts/header.php'; ?>

        
        <div class="container-fluid">

           
            <h1 class="h3 mb-4 text-gray-800">Danh mục sản phẩm</h1>
            <a href="add.php" class="btn btn-success">Thêm mới sản phẩm</a>
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
                                                    <th>STT</th>
                                                    <th>Tên sản phẩm</th>
                                                    <th>Danh mục</th>
                                                    <th>Ảnh</th>
                                                    <th>Thông tin</th>
                                                    <th>Hành động</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php $stt = 1; foreach ($product as $item): ?>
                                                     <tr role="row" class="odd">
                                                        <td>
                                                            <?php echo $stt ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $item['name'] ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $item['namecate'] ?>
                                                        </td>
                                                        <td>
                                                            <img src="<?php echo uploads() ?>product/<?php echo $item['thunbar'] ?>" width="80px" height="80px" >                         
                                                        </td>  
                                                        <td>
                                                            <ul>
                                                                <li>Giá:<?php echo $item['price'] ?></li>
                                                                <li>Số lượng<?php echo $item['number'] ?></li>
                                                            </ul>
                                                        </td>
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
                                    <div class="col-sm-12 col-md-7">
                                        <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                                                    
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        </div>

             
<?php require '../../layouts/footer.php'; ?>