<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="stylesheet" href="customer.css">
    <link rel="stylesheet" href="home.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   
    <!--<link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap-social/bootstrap-social.css"> -->
    <title>Customer</title>
    
    
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

    <?php
    
    //$con = mysqli_connect("localhost","root","","credit");
    $con = mysqli_connect("remotemysql.com","6FT4fQOdDH","LtaCGyjKpO","6FT4fQOdDH");//remote database
    $q = "SELECT * FROM customer_details";
    $res = mysqli_query($con,$q); ?>
    <h1><center>User List</center></h1>
    <form method="GET" ><center>
    <table>
    <tr><th>Name</th><th>Balance</th><tr>
    <?php
    $count = mysqli_num_rows($res);
    if($count>0)
    {
      while($rs=mysqli_fetch_array($res))
      {
         echo "<tr><td><a style=color:#000; href=details.php?id=$rs[id]>$rs[name]</a></td><td>$rs[balance] </td></tr>";
        
      }
    }?>
    </table></center></form>

    
     <!-- jQuery first, then Popper.js, then Bootstrap JS. -->
     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 

    <!-- <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script> -->
</body>
</html>