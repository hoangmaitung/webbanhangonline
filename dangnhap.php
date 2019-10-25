<?php 
   require 'autoload/autoload.php'; 
   
   
   
   
   $data = 
   [
   
     'email' => postInput("email"),
     'password' => postInput("password"),
   
   
   ];
   
   
   $error = [];
   
   
   if ($_SERVER["REQUEST_METHOD"] == "POST") 
   {
       
       
       if ($data['email'] == '') {
           $error['email'] = "Email không được để trống !";
       }
       
       if ($data['password'] == '') {
           $error['password'] = "Mật khẩu không được để trống !";
       }
       
   
       //kiem tra
       if (empty($error)) {
          $is_check = $db->fetchOne("users"," email = '".$data['email']."' AND password = '".md5($data['password'])."' ");


   
          if ($is_check != null) {
              $_SESSION['name_user'] = $is_check['name'];
              $_SESSION['name_id'] = $is_check['id'];

              echo "<script>
                alert('Đăng nhập thành công') ; location.href='index.php' 
              </script>" ;

          }
          else
          {
             $_SESSION['error'] = "Đăng nhập thất bại" ;
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
      <title>Đăng Nhập</title>
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

                      

                    <?php if (isset($_SESSION['success'])): ?>
                        <div class="alert alert-success">
                            <?php echo $_SESSION['success'] ; unset($_SESSION['success']) ?>
                        </div>
                  <?php endif ?>

                    <?php if (isset($_SESSION['error'])): ?>
                        <div class="alert alert-danger">
                            <?php echo $_SESSION['error'] ; unset($_SESSION['error']) ?>
                        </div>
                  <?php endif ?>



                     
                     <h2 class="form-title">Đăng nhập</h2>
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
                     <div class="container-login100-form-btn" style="margin-top: 40px">
                        <div class="wrap-login100-form-btn">
                           <div class="login100-form-bgbtn"></div>
                           <button type="submit" class="login100-form-btn">
                           Đăng Nhập
                           </button>
                        </div>
                     </div>
                     <div class="text-center p-t-12">
                        <span class="txt1" style="margin-left: 370px;"></span>
                        <a class="txt2" href="#">Quên Mật khẩu</a>
                     </div>
        
                  </form>
                  <p class="loginhere">
                     Chưa có tài khoản ? <a href="dangky.php" class="loginhere-link">Đăng ký tại đây</a>
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