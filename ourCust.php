<!DOCTYPE html>

<html lang="en">

  <head>

<!------------------- Start: UTF-8 Encoding and Browser Compatibility --------------------------------------->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<!------------------- End: UTF-8 Encoding and Browser Compatibility ------------------------------------------>


    <title>H.R Bank</title>
    <link rel="shortcut icon" type="image/jpg" href="favicon.png"/>
<!-------------------------Start: Bootsrap Mobile First Metadata ---------------------------------------------->
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!-------------------------End: Bootsrap Mobile First Metadata ------------------------------------------------->


<!--------------------------Start: Google Fonts API and icons-------------------------------------------------->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
<!----------------------------End: Google Fonts API and icons-------------------------------------------------->


<!-------------------------Start: Bootstrap core CSS Links ---------------------------------------------------->
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.rawgit.com/creativetimofficial/now-ui-kit/2e8e665f/assets/css/bootstrap.min.css">
    <link href="https://cdn.rawgit.com/creativetimofficial/now-ui-kit/2e8e665f/assets/css/now-ui-kit.min.css?v1.2.0" rel="stylesheet"/>
    <link href="https://cdn.rawgit.com/creativetimofficial/now-ui-kit/2e8e665f/assets/demo/demo.css" rel="stylesheet">
<!----------------------------End: Bootstrap core CSS Links ---------------------------------------------------->

<!-------------- reference your copy Font Awesome here (from our CDN or by hosting yourself)-------------------------->
    <link href="/your-path-to-fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="/your-path-to-fontawesome/css/brands.css" rel="stylesheet">
    <link href="/your-path-to-fontawesome/css/solid.css" rel="stylesheet">
<!-------------- reference your copy Font Awesome here (from our CDN or by hosting yourself)-------------------------->

<!---------------------------- Start: style.css link ----------------------------------------------------------->
    <link rel="stylesheet" type="text/css" href="style.css">
<!---------------------------- End: style.css link ------------------------------------------------------------->
  </head>

  <body class="index-page sidebar-collapse">

<!--------------- Start: Navbar -------------------------------------------------->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
          <div class="navbar-translate">
              <a class="navbar-brand" href="index.html">
                H.R Bank</a>
              <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
          </div>
          <div class="collapse navbar-collapse justify-content-end"data-nav-image="./assets/img/blurred-image-1.jpg">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" rel="tooltip" data-placement="bottom" href="index.html">
                      <i class="now-ui-icons business_globe"></i>
                      <p class="d-lg d-xl">Home</p>
                    </a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" rel="tooltip" data-placement="bottom" href="customer.php">
                      <i class="now-ui-icons business_money-coins"></i>
                      <p class="d-lg d-xl">Transfer Money</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" rel="tooltip" data-placement="bottom" href="#">
                    <i class="now-ui-icons business_bank"></i>
                    <p class="d-lg d-xl">Customers</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" rel="tooltip" data-placement="bottom" href="history.php">
                    <i class="now-ui-icons education_paper"></i>
                    <p class="d-lg d-xl">History</p>
                  </a>
                </li>
            </ul>
          </div>
        </div>
    </nav>
<!------------------------------------------ End: Navbar ------------------------------------------------------>


    <div class="container">
        <table class="table table-striped" id="table">
          <tr>
            <th>I.D</th>
            <th>Name</th>
            <th>Email</th>
            <th>Bank Balance</th>
          </tr>
          <?php

            include 'config.php';

            $sql ="select * from customers";

            $query =mysqli_query($conn, $sql);

            while($rows = mysqli_fetch_assoc($query))
            {
          ?>
            <tr>
              <td><?php echo $rows['id'] ?></td>
              <td><?php echo $rows['name']?></td>
              <td><?php echo $rows['email']?></td>
              <td><?php echo $rows['balance']?></td> 
          </tr>
            </tr>
        
          <?php
            }

          ?>
      
        </table>
      </div>


<!--------------- Start: Footer -------------------------------------------------->
      <footer class="footer" data-background-color="black">
        <div class="container">
          <nav>
            <ul>
              <li>
                <i class="fab fa-github"></i>
                  <a href="https://github.com/harshulraina01" target="_blank">
                      GitHub Repo
                  </a><hr class="line">
                <i class="fab fa-linkedin-in"></i>
                  <a href="https://www.linkedin.com/in/harshul-raina-686147202" target="_blank">
                      Linkedin Profile
                  </a>
              </li>
            </ul>
          </nav>
          <div class="copyright">
              &copy;
              <script>
                  document.write(new Date().getFullYear())
              </script><em>, Designed and Coded by Harshul Raina</em>
          </div>
        </div>
      </footer>
<!--------------------- End: Footer ------------------------------------------------------>


<!-- *************************** JavaScrpit And BootStrap Connections ****************************** -->

    <!---------------------------------- ORDER:: FIRST::  JQuery    connections ----------------------------->
    <!---------------------------------- ORDER:: SECOND:: BootStrap connections ----------------------------->


    <!-------------------------------------- Custom JavaScript File connection--------------------------------->
    <script src="script.js"></script>
    <!--------------------------------------- Custom JavaScript File connection--------------------------------->
    

    <!----------------------------------------------- aos data  ------------------------------------------------->

    <!------------------------------------------- spalsh screen js ----------------------------------------------->
    <script>
      var preloader = document.getElementById("loading");
      function loader(){
        preloader.style.display = 'none';
      }
    </script>
    <!---------------------------------------------- spalsh screen js --------------------------------------------->
    
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init({
        duration: 1500,
      });
    </script>
    <!------------------------------------------------ aos data  -------------------------------------------------->


    <!--------------------------------==---   Core JS Files  ----------------------------------------------------- -->
    
    <script src="https://cdn.rawgit.com/creativetimofficial/now-ui-kit/2e8e665f/assets/js/core/jquery.min.js"></script>
    <script src="https://cdn.rawgit.com/creativetimofficial/now-ui-kit/2e8e665f/assets/js/core/popper.min.js"></script>

    <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
    <script src="https://cdn.rawgit.com/creativetimofficial/now-ui-kit/2e8e665f/assets/js/plugins/bootstrap-switch.js"></script>
    <!--------------------------------- Plugin for Switches ------------------------------------------------------>


    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="https://cdn.rawgit.com/creativetimofficial/now-ui-kit/2e8e665f/assets/js/plugins/nouislider.min.js"></script>
    <!------------------------------- Plugin for the Sliders ---------------------------------------------------->


    <!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
    <script src="https://cdn.rawgit.com/creativetimofficial/now-ui-kit/2e8e665f/assets/js/now-ui-kit.js"></script>
    <!------------------------------ Control Center for Now Ui Kit -------------------------------------------->

    <!-------------====---------------------  Core JS Files  --------------------------------------------------- -->


    <!----------------------------------------- JQuery connection ------------------------------------------------>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!------------------------------------------ JQuery connection ------------------------------------------------>


    <!--************************* Start: Bootstrap connection ************************************************--->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!--  Plugin for the DatePicker,full documentation here: https://github.com/uxsolutions/bootstrap-datepicker-->
    <script src="https://cdn.rawgit.com/creativetimofficial/now-ui-kit/2e8e665f/assets/js/plugins/bootstrap-datepicker.js"></script>
    <!------------------------------- Plugin for the DatePicker -------------------------------------------------->
    <script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js"></script>
    <script src="https://cdn.rawgit.com/creativetimofficial/now-ui-kit/2e8e665f/assets/js/core/bootstrap.min.js"></script>
    <!--*************************** End: Bootstrap connection ************************************************--->

  </body>


</html>
