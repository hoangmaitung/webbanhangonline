<?php 
    
    require 'autoload/autoload.php';  

    $id = intval(getInput('id'));

    $EditCategory = $db-> fetchID("category", $id);

    if(isset($_GET['p']))
    {
        $p = $_GET['p'];
    }
    else
    {
        $p = 1 ;
    }
    
    $sql = "SELECT * FROM product WHERE category_id = $id ";

    $total = count($db->fetchsql($sql));

    $product = $db->fetchJones("product", $sql, $total, $p,8, true);
    $sotrang = ($product['page']);

    unset($product['page']);

    $path = $_SERVER['SCRIPT_NAME'];
    


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
        <div class="col-9" style="border: 1px solid #EEEEEE;">
            
            <div class="album bg-light" style="margin-top: 10px;">
                <div style="font-size: 20px; font-weight: bold;" class="alert" role="alert">
                    <?php echo $EditCategory['name'] ?></div>
            </div>
            <div class="container row">

                    <?php foreach ($product as $item): ?>
                        
                    <div class="col-md-3">
                      <div class="card mb-3 shadow-sm">
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

            <nav aria-label="Page navigation example">
                  <ul class="pagination justify-content-center">
                    
                    <?php for ($i=1; $i <= $sotrang ; $i++) :?>
                    <li class="page-item <?php echo isset($_GET['p']) && $_GET['p'] == $i ? 'active' : '' ?>">
                    <a class="page-link" href="<?php echo $path ?>?id=<?php echo $id ?>&&p=<?php echo $i ?>"><?php echo $i; ?></a>
                    </li>
                    <?php endfor ; ?>

                    
                  </ul>
            </nav>

                   
        </div>
    </div>
    <!--------------------------------------------- Footer ------------------------------------------------------>


<?php require 'layouts/footer.php'; ?>