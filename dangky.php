
<?php 

    require 'autoload/autoload.php'; 


    if (isset($_SESSION['name_id'])) {
    	echo "<script>
                alert('Bạn đang đăng nhập ! không thể đăng ký') ; location.href='index.php' 
              </script>" ;
    }

    $data = 
    [
    	'name' => postInput("name"),
    	'email' => postInput("email"),
    	'password' => postInput("password"),
    	'address' => postInput("address"),
    	'phone' => postInput("phone"),

    ];
    
  	
    $error = [];
   

    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        
        if ($data['name'] == '') {
            $error['name'] = "Tên không được để trống !";
        }
        
        if ($data['email'] == '') {
            $error['email'] = "Email không được để trống !";
        }
        else
        {
        	$is_check = $db->fetchOne("users"," email = '".$data['email']."' ");
        	if ($is_check != null) {
        		$error['email'] = "Email đã tồn tại ! Mời bạn nhập địa chỉ email khác";
        	}
        }
        
        if ($data['phone'] == '') {
            $error['phone'] = "Số điện thoại không được để trống !";
        }
        
        if ($data['address'] == '') {
            $error['address'] = "Địa chỉ không được để trống !";
        }
        
        if ($data['password'] == '') {
            $error['password'] = "Mật khẩu không được để trống !";
        }
        else
        {
        	$data['password'] = md5(postInput("password"));
        }

        //kiem tra

        if (empty($error)) {
            $idinsert = $db->insert("users",$data);
            if ($idinsert > 0) {

            	$_SESSION['success'] = " Đăng ký thành công ! Mời bạn đăng nhập " ;
				
				header("location: dangnhap.php"); 
				
            } 
            else
            {
            	echo "đăng ký thất bại";
            }
        }   
    }

?>



    <!DOCTYPE html>
    <html lang="en">

    <head>

    	
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Đăng ký tài khoản</title>

        <!-- Font Icon -->
        <link rel="stylesheet" href="public/css-signup/fonts/material-icon/css/material-design-iconic-font.min.css">

        <!-- Main css -->
        <link rel="stylesheet" href="public/css-signup/css/style.css">

        <link rel="stylesheet" type="text/css" href="public/css-login/css/util.css">
        <link rel="stylesheet" type="text/css" href="public/css-login/css/main.css">

    </head>

    <body>

        <div class="main">

            <section class="signup">
                <!-- <img src="images/signup-bg.jpg" alt=""> -->
                <div class="container">
                    <div class="signup-content">
                        <form method="POST" id="signup-form" class="signup-form">
                            <h2 class="form-title">Đăng ký tài khoản</h2>
                            <div class="form-group">
                                <input type="text" class="form-input" name="name" placeholder="Tên thành viên" value="<?php echo $data['name'] ?>">
                                <?php if (isset($error['name'])): ?>
                                    <p class="text-danger" style="color: red; margin-top: 5px;">
                                        <?php echo $error['name'] ?>
                                    </p>
                                    <?php endif ?>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-input" name="email" placeholder="Email" value="<?php echo $data['email'] ?>">
                                <?php if (isset($error['email'])): ?>
                                    <p class="text-danger" style="color: red; margin-top: 5px;">
                                        <?php echo $error['email'] ?>
                                    </p>
                                    <?php endif ?>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-input" name="password" placeholder="Mật khẩu" />
                                <?php if (isset($error['password'])): ?>
                                    <p class="text-danger" style="color: red; margin-top: 5px;">
                                        <?php echo $error['password'] ?>
                                    </p>
                                    <?php endif ?>
                            </div>
                            <div class="form-group">
                                <input type="tel" class="form-input" name="phone" placeholder="0916519999" value="<?php echo $data['phone'] ?>">
                                <?php if (isset($error['phone'])): ?>
                                    <p class="text-danger" style="color: red; margin-top: 5px;">
                                        <?php echo $error['phone'] ?>
                                    </p>
                                    <?php endif ?>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-input" name="address" placeholder="Địa chỉ" value="<?php echo $data['address'] ?>">
                                <?php if (isset($error['address'])): ?>
                                    <p class="text-danger" style="color: red; margin-top: 5px;">
                                        <?php echo $error['address'] ?>
                                    </p>
                                    <?php endif ?>
                            </div>

                            <div class="container-login100-form-btn">
                                <div class="wrap-login100-form-btn">
                                    <div class="login100-form-bgbtn"></div>
                                    <button type="submit" class="login100-form-btn">
                                        Đăng ký
                                    </button>
                                </div>
                            </div>
                        </form>
                        <p class="loginhere">
                            Đã có tài khoản ? <a href="dangnhap.php" class="loginhere-link">Đăng nhập tại đây</a>
                        </p>
                    </div>
                </div>
            </section>

        </div>

        <!-- JS -->
        <script src="public/css-signup/vendor/jquery/jquery.min.js"></script>
        <script src="public/css-signup/js/main.js"></script>
    </body>
    <!-- This templates was made by Colorlib (https://colorlib.com) -->

    </html>