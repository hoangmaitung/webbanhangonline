<?php 
    
    require 'autoload/autoload.php'; 
    

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
        <div class="col-9" style="border: 1px solid #EEEEEE; padding: 10px; ">

            <div class="album bg-light" style="margin-top: 10px;">
                <div style="font-size: 20px; font-weight: bold;" class="alert" role="alert">
                    Thông báo đặt hàng
                </div>
            </div>

            <?php if(isset($_SESSION['success'])): ?>

                <div class="alert alert-success">

                    <strong style="color: #3c763d">Success !</strong>
                    <?php echo $_SESSION['success'] ; unset($_SESSION['success']) ?>
                    
                </div>

                <a href="index.php" class="btn btn-success"> Trở về trang chủ</a>

            <?php endif ?>

            
                
        </div>
    </div>
    <!--------------------------------------------- Footer ------------------------------------------------------>


<?php require 'layouts/footer.php'; ?>