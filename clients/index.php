<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>C.U.R.D-PHP</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>

<body>
  <div class="container">
    <h2>List of Clients</h2>
    <a class="btn btn-primary" href="/clients/create.php" role="button">New Client</a>
    <br>
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Address</th>
          <th>Created At</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "curd";
        // create Connection 
        $connection = new mysqli($servername, $username, $password, $database);
        // check Connection 
        if ($connection->connect_error) {
          die("Connection Failed : " . $connection->connect_error);
        }
        // read all rows from database table 
        $sql = "SELECT * FROM clients";
        $result = $connection->query($sql);

        if (!$result) {
          die("Invalid query " . $connection->error);
        }
        // read data from each row 
        while ($row = $result->fetch_assoc()) {
          echo "
            <tr>
            <td>$row[id]</td>
            <td>$row[name]</td>
            <td>$row[email]</td>
            <td>$row[phone]</td>
            <td>$row[address]</td>
            <td>$row[created_at]</td>
            <td>
              <a class='btn btn-primary btn-sm' href='/clients/edit.php?id=$row[id]'>Edit</a>
              <a class='btn btn-danger btn-sm' href='/clients/delete.php?id=$row[id]'>Delete</a>
            </td>
          </tr>
            ";
        }
        ?>
      </tbody>
    </table>
  </div>
</body>

</html>