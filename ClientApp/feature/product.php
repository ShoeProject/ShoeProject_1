<form class="w-75" method="" action="POST">
  <fieldset enabled>
    <legend>Add Products</legend>
    <div class="mb-4 pt-5">
      <input type="text" name="name" class="form-control" placeholder="Product Name">
    </div>
    <div class="mb-4">
      <input type="text" name="serialNo" class="form-control" placeholder="Serial Number">
    </div>
    <div class="mb-4">
      <input type="text" name="itemName" class="form-control" placeholder="Item Price">
    </div> 

    <div class="mb-4">
      <input type="text"  name="itemSize" class="form-control" placeholder="Item Size">
    </div>
    <div class="mb-4">
      <label for="disabledSelect" class="form-label">Item Color</label>
      <select name="itemColor" class="form-select">
        <option>Red</option>
        <option>Green</option>
        <option>Blue</option>
      </select> 
    </div>

    <div class="mb-4">
      <label for="disabledSelect" class="form-label">Category Id</label>
      <select name="categoryId" class="form-select">
        <option>Red</option>
        <option>Green</option>
        <option>Blue</option>
      </select> 
    </div>

    <div class="mb-4">
      <label for="disabledSelect" class="form-label">Sub Category Id</label>
      <select name="subCatergoryId" class="form-select">
        <option>Red</option>
        <option>Green</option>
        <option>Blue</option>
      </select> 
    </div>

    <div class="mb-4 pt-5">
      <input name="adedDate" type="date" class="form-control" >
    </div>

    <div class="mb-4 pt-5">
      <input name="updatedDate" type="date" class="form-control" >
    </div>  
   
    </div class="sizebtn">
    <button type="submit" name="prodbtn" class="btn btn-warning" >Submit</button>
    <button type="submit" class="btn btn-warning">Reset</button>
  </fieldset>
</form>

<?php

use ShoeApp\Logic\ProductLogic;

//$dbConnection = (new DatabaseConnector())->getConnection(); if you need use this code
if (isset($_POST['prodbtn'])) {
  $prod = new ProductLogic($dbConnection);
  $name = $_POST('name');
  $serialNo = $_POST('serialNo');
  $itemName = $_POST('itemName');
  $itemSize = $_POST('itemSize');
  $itemColor = $_POST('itemColor');
  $categoryId = $_POST('categoryId');
  $subCatergoryId = $_POST('subCatergoryId');

  $input = array($name,$serialNo,$itemName,$itemSize,$itemColor,$categoryId,$subCatergoryId);
  $prod->insert($input);
    
}


?>

