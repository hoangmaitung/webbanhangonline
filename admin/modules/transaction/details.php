    <?php 

    $open  = "transaction";
    require '../../autoload/autoload.php';

    if (isset($_GET['page'])) {
        $p = $_GET['page'];
    } 
    else 
    {
        $p = 1;
    }


    $sql = "SELECT orders.transaction_id , orders.product_id , orders.qty , orders.price ,
            transaction.id, transaction.amount , product.id , product.name as namecate 
            FROM orders , transaction , product
            WHERE orders.transaction_id = transaction.id AND
                    orders.product_id = product.id ";




    $orders = $db->fetchJone('orders',$sql,$p,100,true);
    if (isset($orders['page'])) {
        $sotrang = $orders['page'];
        unset($orders['page']);
    }

?>
    <?php require '../../layouts/header.php'; ?>

        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Danh sách đơn hàng</h1>

            <div class="clearfix"></div>

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
                                            <th>Số lượng</th>
                                            <th>Giá</th>
                                            <th>Tổng giá</th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $stt = 1; foreach ($orders as $item): ?>

                                            <tr role="row" class="odd">

                                                <td>
                                                    <?php echo $stt ?>
                                                </td>
                                                <td>
                                                    <?php echo $item['namecate'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $item['qty'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $item['price'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $item['amount'] ?>
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
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->

        <?php require '../../layouts/footer.php'; ?>