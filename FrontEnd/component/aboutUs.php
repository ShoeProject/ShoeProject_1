<?php
// Include config file
$server = 'http://' . $_SERVER['SERVER_NAME'] . '/Shoeproject_1';
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/ShoeProject_1";
$db_path = $path . "/Logic/DataAccess/";

include $db_path . 'DBConnect.php';




?>

<?php require('../Shared/header.php') ?>

<section class="p-5">
    <div class="container">
    <h1 id="aboutustxt" >  <b><i> Who we are? </i></b></h1>
        <div class="aligned2"> 
        <span id="aboutustxt" class="text-justify"><p>SSW Shoe Company was incorporated on the 10th of March, 2020 at Grand pass, Colombo in a small warehouse with 20 persons. Our initial representation was only in the City of Colombo and the Retail operations commenced in 2021 from our outlet in Main Street, Colombo 11.
            Today we have a spacious factory and office in Ratmalana, with 200 employees. We are now, one of the largest Footwear Manufacturers in the Republic with Retail Stores and Depots around the Island. We also have 74 Authorized Dealers and a countless number of department stores and independent retailers as our customers. In addition we have built for ourselves an export market around the world and we pride ourselves that we are “ Sri Lanka’s Largest Exporter of Quality Footwear.” <b> operating policy is fairness to our customers</b>.  WE look to all employees, old and new to make their contribution to ensure future progress.</p>
        </span>
            <img src="<?php echo $server; ?>ClientApp/Asset/images/factory.jpg" alt="factory.jpg"  />
        </div> 
    </div>
</section>


<div>



    <?php require('../Shared/footer.php') ?>
</div>