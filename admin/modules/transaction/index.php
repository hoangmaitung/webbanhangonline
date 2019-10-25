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

    $sql = "SELECT transaction.* , users.name as nameuser , users.phone as phoneuser FROM transaction LEFT JOIN users ON 
            users.id = transaction.users_id ORDER bY ID DESC  ";
    $transaction = $db->fetchJone('transaction',$sql,$p,10,true);
    if (isset($transaction['page'])) {
        $sotrang = $transaction['page'];
        unset($transaction['page']);
    }
    

?>
    <?php require '../../layouts/header.php'; ?>

        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Danh sách đơn hàng</h1>

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
                                                            <th>Khách hàng</th>
                                                            <th>Số điện thoại</th>
                                                            <th>Phương thức</th>
                                                            <th>Trạng thái</th>
                                                            <th>Hành động</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        <?php $stt = 1; foreach ($transaction as $item): ?>

                                                            <tr role="row" class="odd">

                                                                <td>
                                                                    <?php echo $stt ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $item['nameuser'] ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $item['phoneuser'] ?>
                                                                </td>
                                                                <td >
                                                                    <?php echo $item['payment'] ?>
                                                                </td>
                                                                
                                                                <td>
<a href="status.php?id=<?php echo $item['id'] ?>" class="btn btn-sm <?php echo $item['status'] == 0 ? 
    'btn-danger' : 'btn-success' ?>"><?php echo $item['status'] == 0 ?
    'chưa xác nhận' : 'đã xác nhận' ?></a>
                                                                </td>
                                                                

                                                            
                                                                <td>
                                                                    <a class="btn btn-primary btn-sm btn-info" href="details.php?id=<?php echo $item['id'] ?>">
                                                                        <i class="fa fa-info"></i> Chi thiết</a>
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
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->

        <?php require '../../layouts/footer.php'; ?>