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
          <form>
            <fieldset enabled>
              <legend>Sub Categories</legend>
              <div class="mb-4 pt-5 w-50">

                <input type="text" id="subname" class="form-control" placeholder="Sub Category Name">
              </div>
              <div class="mb-3 pb-4 w-50">
                <input type="text" id="description" class="form-control" placeholder="Description">

              </div>
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