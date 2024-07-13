<?php
session_start();
if (!isset($_SESSION["user"])) {
   header("Location: userlogin.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body class="body">
    <div class=" p-3 mb-5 nav1">
        <nav class="navbar navbar-expand-lg navbar-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="col-4">
            </div>
            <div class="col-8">
                <div class="collapse navbar-collapse " id="navbarNav">
                    <ul class="navbar-nav">
                      <li class="nav-item active">
                        <a class="nav-link navbar-brand" href="user.php">Home <span class="sr-only">(current)</span></a>
                      </li>
                      <li class="nav-item active">
                        <a class="nav-link navbar-brand" href="#">Status</a>
                      </li>
                      <li class="nav-item active">
                        <a class="nav-link navbar-brand" href="#"><img class="adminimg" src="pictures/user logo.png" alt="#" srcset=""></a>
                      </li>
                      <li class="nav-item active">
                        <a class="nav-link navbar-brand" href="userlogout.php">Logout</a>
                      </li>
                    </ul>
                  </div>
            </div>
          </nav>
          </div>
    </div>

    <div class="row container-fluid">
      <div class="col-3">

      </div>
      <div class="col-4 ml-auto mr-auto">
      <div class="main m-auto shadow-lg">
        <form action="user.php" method="GET" class="d-flex flex-row">
          <div>
          <input class="input w-160" type="search" name="search" required  value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" placeholder="Search For Book's">
          </div>
          <div class="ml-auto">
          <button class="searchbutton" type="submit" name="submit"><i class="fa fa-search icon-search"></i></button> 
          </div>        
        
        </form>
       
      </div>
      </div>
      
      <div class="col-3">

      </div>
    </div>

    <div class="container mt-5">
    <table class="table table-striped table1 shadow-lg p-5">

    <?php
    require_once "config.php";
    if (isset($_GET['search'])) {
      $search=$_GET['search'];
      $sql="SELECT NAME, GENER, AUTHOR FROM books WHERE NAME like '%$search%' or GENER like '%$search%' or AUTHOR like '%$search%'";

      $result= mysqli_query($conn,$sql);
      if ( $num=mysqli_num_rows($result)>0) {
          echo'<thead>
    <tr>
      <th>Name</th>
      <th>Gener</th>
      <th>Author</th>
      <th>Action</th>
    </tr>
  </thead>';

  while($row1=mysqli_fetch_assoc($result)){
          echo'<tbody>
    <tr>
      <td>'.$row1["NAME"].'</td>
      <td>'.$row1["GENER"].'</td>
      <td>'.$row1["AUTHOR"].'</td>
      <td><button type="login" class="btn w-60 buttonback" name="login">Borrow</button></td>
    </tr>
  </tbody>';
}
        }else{
          echo"<div class='alert alert-danger'>Not Found</div>";
        }
      }
    ?>

</table>
    </div>
   
    
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>



</body>
</html>