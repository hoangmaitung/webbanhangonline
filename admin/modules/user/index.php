<?php 
      $open  = "user";
    require '../../autoload/autoload.php';

  
    $user = $db->fetchAll("users");

    if (isset($_GET['page'])) {
        $p = $_GET['page'];
    } 
    else 
    {
        $p = 1;
    }

    $sql = "SELECT users.* FROM users ORDER BY ID DESC";
    $user = $db->fetchJone('users',$sql,$p,10,true);
    if (isset($user['page'])) {
        $sotrang = $user['page'];
        unset($user['page']);
    }
    

?>
    <?php require '../../layouts/header.php'; ?>

        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Danh sách người dùng</h1>
            
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
                                                            <th>Tên</th>
                                                            <th>Email</th>
                                                            <th>Số điện thoại</th>
                                                            <th>Hành động</th>

                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        <?php $stt = 1; foreach ($user as $item): ?>

                                                            <tr role="row" class="odd">

                                                                <td>
                                                                    <?php echo $stt ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $item['name'] ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $item['email'] ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $item['phone'] ?>
                                                                </td>

                                                            
                                                                <td>
                                                                    
                                                                    <a class="btn btn-primary btn-sm btn-danger" href="delete.php?id=<?php echo $item['id'] ?>">
                                                                        <i class="fa fa-times"></i> Xóa tài khoản</a>
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