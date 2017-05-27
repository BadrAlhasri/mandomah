<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- main meta rules -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>منظومة الاداء الاشرافي</title>
    <!-- very nice reset -->
    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <!-- main css style file-->
    <link rel="stylesheet" type="text/css" href="css/myStyle.css">
</head>
<body>
  <div class="container">
    <!-- start header -->
    <header>
      <div class="logo"><img src="images/moe.png" alt ="logo"/></div>
      <nav >
        <h2>مكتب التعليم شمال المدينة </h2>
        <h3> منظومة الاداء الاشرافي </h3>
      </nav>
    </header>
    <!-- end header -->

    <!-- start content-->
    <div class="content">
      <div class ="sidebar">
        <!-- start section widget -->
        <div class="widget">
          <div class="title">اقسام الموقع</div>
          <div class="data">
            <ul>
              <li> الرئيسية</li>
              <li> البيانات الاساسية</li>
              <li> نموذج ٢</li>
              <li> التقارير</li>
              <li> راسلنا</li>
            </ul>
          </div>
        </div>
        <!-- end section widget -->
        <!-- start info widget -->
        <div class="widget">
          <div class="title">معلومات الموقع</div>
          <div class="data">
            <ul>
              <li> الرئيسية</li>
              <li> البيانات الاساسية</li>
              <li> نموذج ٢</li>
              <li> التقارير</li>
              <li> راسلنا</li>
            </ul>
          </div>
        </div>
        <!-- end info widget -->
        <!-- start visit widget -->
        <div class="widget">
          <div class="title"> الزيارات</div>
          <div class="data">
            <ul>
              <li> الرئيسية</li>
              <li> البيانات الاساسية</li>
              <li> نموذج ٢</li>
              <li> التقارير</li>
              <li> راسلنا</li>
            </ul>
          </div>
        </div>
        <!-- end visit widget -->
      </div>
      <!-- start left content php coding -->
      <div class="leftcontent">
        <div class="loging" >
          <!--  بداية تسجيل الدخول-->
                       <form method="post" action="" class="form1" >
                           <h1> تسجيل الدخول </h1>
                           <label>

                               اسم المستخدم:<br>

                               <input type="text" name="user_name">
                               <br>
                           </label>
                           الرقم السري:<br>
                           <input type="password" name="user_password">
                           <br><br>
                           <input type="submit" name="ok" class="button1" value="موافق">
                       </form>
<!-- connection to database -->
       <?php
       require_once('php/conniction.php');
       $query_str = "SELECT * FROM tblUsers";
       $query = mysqli_query($conn, $query_str);
       $num_rows = mysqli_num_rows($query);
       echo "عدد الستخمين للننظام  = ".$num_rows."<br>";
       echo "----------------------------"."<br>";

       // التحقق من ادخاتل المستخدم
       if (isset($_POST['ok']))
          {
           $u_name = $_POST['user_name'];
           $u_pass = $_POST['user_password'];
           echo "user : " . $u_name . "     AND    password =" . $u_pass;
           $query_str1 = "SELECT * FROM tblUsers WHERE userID = '$u_name' && userPass = '$u_pass' ";
           $query1 = mysqli_query($conn, $query_str1);
           $num_rows = mysqli_num_rows($query1);
           echo "<br>" . "عدد النتائج = " . $num_rows . "<br>";

            if ($num_rows == 1)
                {
                   //session_register("username");
                   $rs = mysqli_fetch_array($query1);
                   $_SESSION['un'] = $rs['userID'];

                    if($rs['userSalahia']==1)
                      { echo "<script> window.location.assign('php/main.php'); </script>"; }
                    else
                      { echo "<script> window.location.assign('entering.php'); </script>"; }
                  }

           else { echo "<br>" . "عفوا ,,,, اسم المستخدم او كلمة المرور غير صحيحة"; }
        }


       $conn->close(); //نقلت الى الصفحة الاخرى

       ?>

        </div>
      </div>
    </div>
    <!-- end content-->

    <!-- stert footer-->
    <footer>
      <div class="info">
        <div class="footer_right">1</div>
        <div class="footer_center">2</div>
        <div class="footer_left">
          <h4>
          نماذج للطباعة :
          </h4>
          <ul>
            <li> 1 </li>
            <li> 2 </li>
            <li> 3 </li>
            <li> 4 </li>
            <li> 5 </li>
            <li> 6 </li>
          </ul>
        </div>
      </div>
      <div class="copyright"> جميع الحقوق محفوظة لمكتب التعليم شمال المدينة</div>
    </footer>
    <!-- end footer-->

  </div>
<!-- jquary library -->
<script src="js/jquery-3.2.1.min.js"></script>
<!-- javascript plugins-->
  <script src="js/plugins.js"></script>

</body>
</html>
