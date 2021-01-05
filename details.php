<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="stylesheet" href="customer.css">
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="details.css">
    <script src="https://kit.fontawesome.com/yourcode.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   
    <!--<link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap-social/bootstrap-social.css"> -->
    <title>Details</title>
    
    
</head>
<body>
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
      
        <a class="navbar-brand" href="#"><h1>Credit Manager</h1></a>
        <ul>
          <li><a class="active" href="home.html">Home</a></li>
          <li><a href="customer.php">Transfer Credit</a></li>
        </ul>
      </div>
    </nav>

        
    <!-- jQuery first, then Popper.js, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 
<div class="box">
<?php
//$con = mysqli_connect("localhost","root","","credit");
$con = mysqli_connect("remotemysql.com","6FT4fQOdDH","LtaCGyjKpO","6FT4fQOdDH");//remote database
$id = $_GET['id'];
$q = "SELECT * FROM customer_details where id=$id";
$res = mysqli_query($con,$q);
$count = mysqli_num_rows($res); 
if(mysqli_num_rows($res)>0)
{
    while($rs = mysqli_fetch_assoc($res))
    {
        $ar = mysqli_query($con,"SELECT * FROM customer_details where id=".$rs['id'] );
        
        echo "<h2 style='padding:10px 10px 10px 0px';>".$rs['name']."</h2><hr>";
        echo "<h3>Details</h3>";
        echo "<h6 style='padding:10px';>Email : ".$rs['email']."</h6>";
        echo "<h6 style='padding:10px';>Phone No : ".$rs['phone']."</h6>";
        echo "<h6 style='padding:10px';>PAN : ".$rs['pan']."</h6>";
        echo "<h5 style='padding:10px';>Credits : ".$rs['balance']."</h5>";

    }
}
?>
<center>
<p>
  <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
    Transfer Credit
  </a>
</p><br>
<div class="collapse" id="collapseExample">
  <div class="card card-body">
    <form  class="form-inline" method="post">
    <div class="form-group">
    <label for="exampleFormControlSelect1">Recipient User : </label>
    <select class="form-control" name='name'>
      <option value=1>Arockiaselcia</option>
      <option value=2>Sherlin silvia</option>
      <option value=3>Chandhana</option>
      <option value=4>Boopana</option>
      <option value=5>Benjamin</option>
      <option value=6>Brayden</option>
      <option value=7>Gilbert Fred</option>
      <option value=8>Anderson</option>
      <option value=9>Shwetha</option>
      <option value=10>Priyadharshini</option>
    </select>
    
</div><br><br>
  <div class="form-group">
      <label for="exampleFormControlSelect1">Credits :</label>  
      <input type="text" class="form-control" name="balance" id="usr">
  </div>
  <button type="submit" name="submit">Submit</button>
    </form>
  </div></div>
</center>
</div>
<?php
error_reporting(E_ERROR | E_PARSE);
//$con = mysqli_connect("localhost","root","","credit");
$con = mysqli_connect("remotemysql.com","6FT4fQOdDH","LtaCGyjKpO","6FT4fQOdDH");//remote database
$id = $_GET['id'];
if(isset($_POST['submit']))
{
  $name = $_POST["name"];
  $balance = $_POST["balance"];
  $query = "UPDATE customer_details SET balance=balance+$balance WHERE id=$name ";
  $q = "UPDATE customer_details SET balance=balance-$balance WHERE id=$id ";
  
  $result = mysqli_query($con,$query);
  $res = mysqli_query($con,$q);
  if($result)
  {
    
   ?>
    <div class="alert alert-success alert-dismissible" id="alert">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!</strong> The Credit has been transfered successfully.
  </div>
  
  <script type="text/javascript"> 
        setTimeout(function () { 
  
            // Closing the alert 
            $('#alert').alert('close'); 
        }, 8000); 
        
          location.replace("customer.php");
        
      
    </script> 
    
    
  <?php
    
    
  }
  else
  {
    echo '<script> alert("Failed")</script>';
  }
  
}

?>
 <div class="footer">
        <p><strong>&copy;2021 GRIP@The Sparks Foundation | Developed By Arockiaselcia A</strong></p>
      </div>
</body>
</html>
