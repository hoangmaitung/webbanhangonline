<?php 
    
    require 'autoload/autoload.php'; 

    $sum = 0;




?>
<?php require 'layouts/header.php'; ?>

    <!--------------------------------------------- menu va body ----------------------------------------------->

    <div class="container-fluid row">
        <div class="col-3">
            <div class="vertical-menu">
                <a href="" class="btn btn-active bg-primary ">Danh mục sản phẩm</a>
                
                    <?php foreach($category as $item) :?>
                    <a href="danhmuc.php?id=<?php echo $item['id'] ?>"><?php echo $item['name'] ?></a>
                    <?php endforeach; ?> 
                
            </div> 

            
        </div>
        <div class="col-9" style="border: 1px solid #EEEEEE;">



            <div class="album bg-light" style="margin-top: 10px;">
                <div style="font-size: 20px; font-weight: bold;" class="alert" role="alert">
                    Giỏ hàng của bạn
                </div>
            </div>

            <?php if (isset($_SESSION['success'])): ?>
                        <div class="alert alert-success">
                            <?php echo $_SESSION['success'] ; unset($_SESSION['success']) ?>
                        </div>
                  <?php endif ?>

            <table class="table table-hover" >
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên sản phẩm</th>
                        <th>Hình ảnh</th>
                        <th>Số lượng </th>
                        <th>Giá</th>
                        <th>Tổng giá</th>
                        <th>Hành động</th> 

                    </tr>
                </thead>
                <tbody>

                    <?php $stt = 1; foreach ($_SESSION['cart'] as $key => $value): ?> 
                        <tr>
                            <td><?php echo $stt ?></td>
                            <td><?php echo $value['name'] ?></td>
                            <td>
                                <img src="<?php echo uploads() ?>product/<?php echo $value['thunbar'] ?>" width="80px" height="80px" >
                            </td>
                             <td>
                                <input type="number" name="qty" class="form-control qty" id="qty" value="<?php echo $value['qty'] ?>" style = "width: 60px" min = "0" max = "99">

                            </td>
                            <td><?php echo formatprice($value['price']) ?></td>
                            <td><?php echo formatprice($value['price'] * $value['qty']) ?></td>
                            <td>
                                <a href="#" class="btn btn-info btn-sm updatecart" data-key= <?php echo $key ?>>    
                                    <i class="fa fa-refresh"></i> Cập nhật</a>
                                        
                                <a class="btn btn-danger btn-sm" href="xoa.php?key=<?php echo $key ?>">
                                    <i class="fa fa-trash"></i> Xóa</a>

                            </td>
                        </tr>

                        <?php $sum += $value['price'] * $value['qty']; 
                                    $_SESSION['tongtien'] = $sum ; ?>

                    <?php $stt ++; endforeach ?>
                </tbody>
            </table>



            <div class="col-md-6 pull-left" style="margin-bottom: 25px">
                
                <ul class="list-group">
                    <li class="list-group-item">
                        <h3>Thông tin đơn hàng</h3>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Số tiền
                        <span class="badge badge-pill badge-secondary"><?php echo formatprice($_SESSION['tongtien']) ?></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        VAT
                        <span class="badge badge-pill badge-secondary"> 5% </span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Tổng tiền đơn hàng
                        <span class="badge badge-pill badge-secondary">
                            <?php $_SESSION['total'] = $_SESSION['tongtien'] * 105/100 ;
                            echo formatprice($_SESSION['total']) ?>    
                        </span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <a href="thanhtoan.php" class="btn btn-success">Thanh toán</a>
                    </li>
                </ul>

            </div>

            

                   
        </div>
    </div>
    <!--------------------------------------------- Footer ------------------------------------------------------>


<?php require 'layouts/footer.php'; ?>