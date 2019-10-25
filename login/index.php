<?php 

  session_start();
  require_once __DIR__. '/../libraries/Database.php';
  require_once __DIR__. '/../libraries/Function.php';

  $db = new Database;

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
          $is_check = $db->fetchOne("admin"," email = '".$data['email']."' AND password = '".md5($data['password'])."' ");


   
          if ($is_check != null) {
              $_SESSION['admin_name'] = $is_check['name'];
              $_SESSION['admin_id'] = $is_check['id'];

              echo "<script>alert('Đăng nhập thành công') ; location.href='/webbanhangonline/admin/'</script>" ;

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
      <link rel="stylesheet" href="../public/css-signup/css/style.css">
      <link rel="stylesheet" type="text/css" href="../public/css-login/css/util.css">
      <link rel="stylesheet" type="text/css" href="../public/css-login/css/main.css">
   </head>
   <body>
      <div class="main">
         <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
               <div class="signup-content">
                  <form method="POST" action="" id="signup-form" class="signup-form">

                     
                     <h2 class="form-title">Đăng nhập Admin</h2>
                     <div class="form-group" style="margin-top: 50px">
                        <input type="email" class="form-input" name="email" placeholder="Email" value="">
                        
                     </div>
                     <div class="form-group">
                        <input type="password" class="form-input" name="password" placeholder="Mật khẩu" />
                        
                     </div>
                     <div class="container-login100-form-btn" style="margin-top: 150px">
                        <div class="wrap-login100-form-btn">
                           <div class="login100-form-bgbtn"></div>
                           <button type="submit" class="login100-form-btn">
                           Đăng Nhập
                           </button>
                        </div>
                     </div>
                     
        
                  
               </div>
            </div>
         </section>
      </div>
      <!-- JS -->
      <script src="../public/css-signup/vendor/jquery/jquery.min.js"></script>
      <script src="../public/css-signup/js/main.js"></script>
   </body>
   <!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>