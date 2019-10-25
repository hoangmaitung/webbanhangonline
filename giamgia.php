<?php 
    
    require 'autoload/autoload.php'; 

    $sqlHomecate = "SELECT name , id FROM category WHERE home = 1 ORDER BY updated_at";
    $CategoryHome = $db->fetchsql($sqlHomecate);

    $data = [];

    foreach ($CategoryHome as $item) {
        $cateId = intval($item['id']);
        $sql = "SELECT *FROM product WHERE category_id = $cateId";
        $ProductHome = $db->fetchsql($sql);
        $data[$item['name']] = $ProductHome;
    }    

?>
<?php require 'layouts/header.php'; ?>

    <!--------------------------------------------- menu va body ----------------------------------------------->

    <div class="container-fluid row">
        <div class="col-3">
            <div class="vertical-menu">
                <a  class="btn btn-active bg-primary ">Danh mục sản phẩm</a>
                
                    <?php foreach($category as $item) :?>
                    <a href="danhmuc.php?id=<?php echo $item['id'] ?>"><?php echo $item['name'] ?></a>
                    <?php endforeach; ?>
                
            </div>

            
        </div>
        <div class="col-9" style="border: 1px solid #EEEEEE;">

            
                <div class="container-fluid row">

                    <?php foreach ($productNEWg as $item): ?>
                        
                    <div class="col-md-3">
                      <div class="card mb-3 shadow-sm" style="margin-top: 20px; ">
                        <img src="<?php echo uploads() ?>product/<?php echo $item['thunbar'] ?>" class="bd-placeholder-img card-img-top" width="90%" height="275">
                        <div class="card-body">
                        <p class="card-text" style = "text-align: center; font-size: 18px font-weight: bold;"><?php echo $item['name'] ?></p>

                          <p class="card-text" style="text-align: center; color: red; font-weight: bold">
                            <?php echo formatpricesale($item['price'],$item['sale']) ?>
                            
                            </p>

                            <p class="card-text" style="text-align: center; color: gray; text-decoration: line-through; font-weight: bold">
                                <?php echo formatPrice($item['price']) ?>
                            </p>



                          <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                              <a href="chitietsanpham.php?id=<?php echo $item['id'] ?>" type="button" class="btn btn-primary btn-sm"> Chi tiết </a>
                              <a href="addcart.php?id=<?php echo $item['id'] ?>" class="btn btn-success btn-sm" style= "margin-left: 27px;"> Thêm <i class="fa fa-cart-arrow-down"></i></a>
                            </div>
                            
                          </div>
                        </div>
                      </div>
                    </div>

                    <?php endforeach ?>

                </div>
                          

                   
        </div>
    </div>
    <!--------------------------------------------- Footer ------------------------------------------------------>


<?php require 'layouts/footer.php'; ?>