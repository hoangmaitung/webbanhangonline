<?php 
    
    require 'autoload/autoload.php'; 

    $id = intval(getInput('id'));

    $product = $db->fetchID("product", $id);

        

   
    
?>
<?php require 'layouts/header.php'; ?>

    <!--------------------------------------------- menu va body ----------------------------------------------->

    <div class="container-fluid row">
        <div class="col-3">
            <div class="vertical-menu">
                <a href="#" class="btn btn-active bg-primary ">Danh mục sản phẩm</a>
                
                    <?php foreach($category as $item) :?>
                    <a href="danhmuc.php?id=<?php echo $item['id'] ?>"><?php echo $item['name'] ?></a>
                    <?php endforeach; ?>
                
            </div>

            
        </div>


        <div class="col-9 " style="border: 1px solid #EEEEEE;">

            <div class="album bg-light" style="margin-top: 10px;">
                <div style="font-size: 20px; font-weight: bold;" class="alert" role="alert">
                    Chi tiết sản phẩm
                </div>
            </div>
            
            <div class="row no-gutters" style=" margin-top: 15px; margin-bottom: 15px">

                <div class="col-md-4">
                    <img src="<?php echo uploads() ?>product/<?php echo $product['thunbar'] ?>" class="card-img" 
                    style="margin: 30px; width: 80%; height: 430px">
                </div>

                <div class="col-md-8">
                    <div class="card-body">
                        <p class="card-tittle" style="font-weight: bold; font-size: 50px; "><?php echo $product['name'] ?></p>
                        <p class="card-text" style="color: red; font-size: 30px">
                                Giảm giá:<?php echo formatpricesale($product['price'],$product['sale']) ?></p>

                        <p class="card-text" style="text-decoration: line-through; color: red; font-size: 30px">
                            Giá gốc:<?php echo formatprice($product['price']) ?></p>
                    </div>

                    <a href="addcart.php?id=<?php echo $product['id'] ?>" class="btn btn-success" style= "margin-left: 25px; font-size: 25px; margin-top: 150px;"> Thêm giỏ hàng <i class="fa fa-cart-arrow-down"></i></a>
                </div>
                
            </div>

            <div class="container" >

                <ul class="nav nav-tabs nav-justified">
                <li class="nav-item">
                  <a class="nav-link active" data-toggle="tab" href="#home">Mô tả sản phẩm</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#menu1">Chi tiết sản phẩm</a>
                </li>
              </ul>

              <!-- Tab panes -->
              <div class="tab-content">
                <div id="home" class="container tab-pane active"><br>
                  <h3>Mô tả</h3>
                  <p><?php echo $product['content'] ?></p>
                </div>
                <div id="menu1" class="container tab-pane fade"><br>
                  <h3>Chi tiết</h3>
                  <p>Danh mục:<?php echo $product['category_id'] ?></p>
                </div>
                </div>
            </div>

                   
        </div>
    </div>
    <!--------------------------------------------- Footer ------------------------------------------------------>

    


<?php require 'layouts/footer.php'; ?>