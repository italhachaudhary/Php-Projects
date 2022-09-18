<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "curd";
// create Connection 
$connection = new mysqli($servername, $username, $password, $database);

$id = "";
$name = "";
$email = "";
$phone = "";
$address = "";

$errorMessage = "";
$successMessage = "";

// Get Method 
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  if (!isset($_GET['id'])) {
    header("location: /clients/index.php");
    exit;
  }

  $id = $_GET["id"];
  // reade the row of selected client from database 
  $sql = "SELECT * FROM clients WHERE id='$id' ";
  $result = $connection->query($sql);
  $row = $result->fetch_assoc();

  if (!$row) {
    header("location: /clients/index.php");
    exit;
  }
  $name = $row["name"];
  $email = $row["email"];
  $phone = $row["phone"];
  $address = $row["address"];
} else {
  // Post Method 

  $id = $_POST["id"];
  $name = $_POST["name"];
  $email = $_POST["email"];
  $phone = $_POST["phone"];
  $address = $_POST["address"];

  do {
    if (empty($id) || empty($name) || empty($email) || empty($phone) || empty($address)) {
      $errorMessage = "All the fields are required";
      break;
    }

    $sql = "UPDATE `clients` " .
    "SET name = '$name', email = '$email', phone = '$phone', address = '$address' " .
      "WHERE id = '$id' ";
    $result = $connection->query($sql);
    if (!$result) {
      $errorMessage = "Invalid query: " . $connection->error;
      break;
    }
    $successMessage = "Client Updated successfully";
    header("location: /clients/index.php");
    exit;
  } while (false);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>C.U.R.D-PHP</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
  <DIV class="container my-5">
    <h2>Update Client</h2>
    <?php
    if (!empty($errorMessage)) {
      echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>$errorMessage</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>           
            </div>  
            ";
    }
    ?>
    <form action="" method="POST">
      <input type="hidden" name="id" value="<?php echo $id; ?>">
      <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Name</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
        </div>
      </div>
      <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Email</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="email" value="<?php echo $email; ?>">
        </div>
      </div>

      <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Phone</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="phone" value="<?php echo $phone; ?>">
        </div>
      </div>
      <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Address</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="address" value="<?php echo $address; ?>">
        </div>
      </div>

      <?php
      if (!empty($successMessage)) {
        echo "
                    <div class='alert alert-success alert-dismissible fade show' role='alert'>
                       <strong>$successMessage</strong>
                       <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>           
                        </div>  
                        ";
      }
      ?>
      <div class="row mb-3">
        <div class="offset-sm-3 col-sm-3 d-grid">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        <div class="col-sm-3 d-grid">
          <a class="btn btn-outline-primary" href="/clients/index.php" role="button">Cancel</a>
        </div>
      </div>

    </form>
  </DIV>
</body>

</html>