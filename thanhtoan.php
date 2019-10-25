<?php 
    
   require 'autoload/autoload.php';  

    $user = $db->fetchID("users",intval($_SESSION['name_id']));
    
    


    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
       $data = 
       [
            'amount' => $_SESSION['total'],
            'users_id' => $_SESSION['name_id'],
            'note' => postInput("note"),
            'payment' => postInput("payment"),
       ];

      $idtran = $db->insert("transaction",$data);

      if ($idtran > 0) 
      {
            foreach($_SESSION['cart'] as $key => $value)
            {
                $data2 = 
                [
                    'transaction_id' => $idtran,
                    'product_id'     => $key,
                    'qty'            => $value['qty'],
                    'price'          => $value['price'],

                ];

                $id_insert = $db->insert("orders",$data2);
            } 

            unset($_SESSION['cart']);
            unset($_SESSION['total']);   

            $_SESSION['success'] = "Đặt hàng thành công, chúng tôi sẽ liên hệ với bạn sớm nhất ! ";
            header("location: thongbao.php");
      }
    }



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
                    Thanh toán đơn hàng
                </div>
            </div>

                 <h3><b>Phương thức thanh toán</b></h3>

                <br>


            <form method="POST" role="form" class="form-horizontal formcustome" style="margin-bottom: 200px">

                <input type="radio" name="payment" value="Thanh toán khi nhận hàng" checked="checked">Thanh toán khi nhận hàng
                    <input style="margin-left: 50px;" type="radio" name="payment" value="Thanh toán qua thẻ">Thanh toán qua thẻ

                    <br>
                    <br>
                    <br>

                <div class="form-group row">
                    <label class="col-md-2 col-md-offset-1">Tên khách hàng</label>
                    <div class="col-md-8">
                        <input type="text"  name="name" class="form-control" 
                            value="<?php echo $user['name'] ?>">
                    </div>
                </div>  

                <div class="form-group row">
                    <label class="col-md-2 col-md-offset-1">Email</label>
                    <div class="col-md-8">
                        <input type="email"  name="email" class="form-control" 
                            value="<?php echo $user['email'] ?>">
                    </div>
                </div> 

                <div class="form-group row">
                    <label class="col-md-2 col-md-offset-1">Số điện thoại</label>
                    <div class="col-md-8">
                        <input type="number"  name="phone" class="form-control" 
                            value="<?php echo $user['phone'] ?>">
                    </div>
                </div> 

                <div class="form-group row">
                    <label class="col-md-2 col-md-offset-1">Nơi giao hàng</label>
                    <div class="col-md-8">
                        <input type="text"  name="address" class="form-control" 
                            value="<?php echo $user['address'] ?>">
                    </div>
                </div>   

                <div class="form-group row">
                    <label class="col-md-2 col-md-offset-1">Ghi chú</label>
                    <div class="col-md-8">
                            <textarea rows="6" type="text"  name="note" class="form-control" 
                            value="" >
                            </textarea>
                    </div>
                </div>
                <br>
                <br>

                <button type="submit" class="btn btn-success col-md-2 col-md-offset-5">Đặt hàng</button>   
                            
            </form>
                
        </div>
    </div>
    <!--------------------------------------------- Footer ------------------------------------------------------>


<?php require 'layouts/footer.php'; ?>