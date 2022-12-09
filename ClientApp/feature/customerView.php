<html>

<head>
    <title>Login Page</title>
    <link href="../../vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../../vendor/twbs/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="asset/css/style.css" />
    <script src="../../vendor/twbs/bootstrap/dist/js/bootstrap.bundle.js"></script>
    <script src="../../vendor/components/jquery.slim.min.js"></script>
    <script src="asset/js/main.js"></script>
</head>

<body>
    <div class="container-fluid">
        <div><?php include '../shared/header.php'; ?></div>
        <div class="row flex-nowrap">
            <?php include 'sidebar.php' ?>
            <div class="col py-1">
                <div class="container-fluid">
                    <!-- <form action="" method="post"><button type="submit" name="prodbtn">product</button></form> -->
                    
                   <form>
                   <fieldset enabled>
                     <legend>Customer Details</legend>
                     <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Customer Name</th>
      <th scope="col">Address</th>
      <th scope="col">email</th>
      <th scope="col">Contact Number</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>fat</td>
      <td>mdo</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>@twitter</td>
      <td>@mdo</td>
      <td>@mdo</td>
    </tr>
  </tbody>
</table>
                     <div>
                       <button type="submit" class="btn btn-warning ">ADD</button>
                       <button type="submit" class="btn btn-warning ms-3">Reset</button>
                     </div>
                   </fieldset>
                 </form>
                    
                </div>

            </div>
        </div>
    </div>

</body>

</html>