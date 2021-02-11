<?php
  include 'config.php';

  if(isset($_POST['submit']))
  {
    // details transaction
      $sender_id = isset($_GET['id']) ? $_GET['id'] : '';         
      $receiver_id = isset($_POST['receiver_id']) ? $_POST['receiver_id'] : '';
      $amount = isset($_POST['amount']) ? $_POST['amount'] : '';                            

    //  sender account detail
      $query = "SELECT * FROM customers WHERE id = '$sender_id' ";
      $data = mysqli_query($conn,$query);
      $sender = mysqli_fetch_array($data);
    
    // receiver account detail
      $query = "SELECT * FROM customers WHERE id = '$receiver_id' ";
      $data = mysqli_query($conn,$query);
      $receiver = mysqli_fetch_array($data);



      // check for invalid amount
      if (($amount)<= 0)
    {
          echo '<script>alert("You have entered invalid amount")</script>';
      }


    
      // check sufficent fund to transfer
      else if($amount > $sender['balance']) 
      {
          echo '<script>alert("Insufficient Fund! Transaction failed")</script>';
      }
        
      
    else 
  {    
        // debit amount from sender
        $currentBalance = $sender['balance'] - $amount;
        $query = "UPDATE customers set balance=$currentBalance WHERE id = '$sender_id' ";
        mysqli_query($conn,$query);
          
        // credit amount to receiver
        $currentBalance = $receiver['balance'] + $amount;
        $query = "UPDATE customers set balance=$currentBalance WHERE id = '$receiver_id' ";
        mysqli_query($conn,$query);
                
    //  update in transaction history
        $debit = $sender['name'];
        $credit = $receiver['name'];
        $query = "INSERT INTO transaction(`sender`, `receiver`, `balance`) VALUES ('$debit','$credit','$amount')";
        $query=mysqli_query($conn,$query);

        if($query)
    {
            echo "<script> alert('Transaction Successful');window.location='history.php';</script>";   
        }
    }
}
?>



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


<!---------------------------- Start: style.css link ----------------------------------------------------------->
    <link rel="stylesheet" type="text/css" href="test2\style.css">
<!---------------------------- End: style.css link ------------------------------------------------------------->
</head>

<body class="index-page sidebar-collapse">

<!--------------- Start: Navbar -------------------------------------------------->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="customer">
        <div class="container">
          <div class="navbar-translate">
              <a class="navbar-brand" href="index.html">H.R Bank</a>
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
                    <a class="nav-link" rel="tooltip" data-placement="bottom" href="ourCust.php">
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
                  <li class="nav-item">
                    <a class="nav-link" rel="tooltip" data-placement="bottom" href="customer.php">
                        <i class="now-ui-icons arrows-1_minimal-left"></i>
                        <p class="d-lg d-xl">Back</p>
                    </a>
                  </li>
              </ul>
          </div>
        </div>
    </nav>
<!------------------------------------------ End: Navbar ------------------------------------------------------>

<!---------------------------------- Satrt: Table ------------------------------------------------------------------------>
    <div class="container">
            <form method="post" name="tcredit" class="tabletext" ><br>
	            <!-- display selected sender-->
	            <?php
	                      include 'config.php';
	                      $customer_id= isset($_GET['id']) ? $_GET['id'] : '';
	                      $sql = "SELECT * FROM  customers WHERE id = '$customer_id' ";
	                      $result=mysqli_query($conn,$sql);
	                      if(!$result)
	                      {
	                          echo "Error : ".$sql."<br>".mysqli_error($conn);
	                      }
	                      $rows=mysqli_fetch_assoc($result);
	            ?>    
	            <label>Your Account Detail</label>
	            <table class="table table-striped" id ="table">
	              <tr>
	                <th>I.D</th>
	                <th>Name</th>
	                <th>Email</th>
	                <th>Bank Balance</th>
	              </tr>
	              <tr>
	                <td><?php echo $rows['id'] ?></td>
	                <td><?php echo $rows['name']?></td>
	                <td><?php echo $rows['email']?></td>
	                <td><?php echo $rows['balance']?></td>
	              </tr>
	            </table>

	              <!-- select receiver -->
	              
	            <div style="width : 60%; float:left; padding:30px 30px;">
	            <label>Transfer To:</label>
	            <select name="receiver_id" class="form-select input-group mb-3" required>
	              <option value="" disabled selected>--Please choose the receiver--</option>
	                <?php
	                  include 'config.php';
	                  $sid=$_GET['id'];
	                  $sql = "SELECT * FROM customers where id!= '$sid' ";
	                  $result=mysqli_query($conn,$sql);
	                  if(!$result)
	                    {
	                      echo "Error ".$sql."<br>".mysqli_error($conn);
	                    }
	                    while($rows = mysqli_fetch_assoc($result)) {
	                ?>
	              <option class="table" value="<?php echo $rows['id'];?>" >
	                  <?php echo $rows['name'] ;?> (Balance: 
	                  <?php echo $rows['balance'] ;?> ) 
	              </option>
	                  <?php 
	                    } 
	                  ?>
	            </select>
	              
	                <!--  amount to transfer -->
	                <br><br>
	                <label>Amount:</label>
	                <input  class="input-group mb-3" style="padding-right:20px;" type="number" name="amount" required>   
	                <br><br>
	                
	                <!-- submit button -->
	                <button class="btn btn-warning btn-outline-warning" name="submit" type="submit" id="myBtn">Transfer</button>
	            </div>
          	</form>
	</div>
<!---------------------------------- End: Table ------------------------------------------------------------------------>



<!-- *************************** JavaScrpit And BootStrap Connections ****************************** -->

    <!---------------------------------- ORDER:: FIRST::  JQuery    connections ----------------------------->
    <!---------------------------------- ORDER:: SECOND:: BootStrap connections ----------------------------->

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
