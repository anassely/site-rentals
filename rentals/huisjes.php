<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>


<?php
// De programmeur is de isset gedeelte vergeten
include 'includes/database.php';
include 'includes/functions.php';
include 'header.php';

$huisjeid=1;
if (isset($_GET['cottageID'])) {
    $huisjeid = $_GET['cottageID'];
}


$sql = 'select * from cottages where cottage_id = ' . $huisjeid;

//echo $sql;

$tblcottage = getData($sql, "fetch");

// echo '<pre>';

// var_dump($tblCottages);

?>

<section>
    <div class="container mt-4">
    <h1><?= $tblcottage['cottage_name']; ?></h1>
        <div class="row">
            <div class="col">
                <div id="carouselExampleControls" class="carousel slide pointer-event" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item">
                    <img src="images/<?= $tblcottage['cottage_img']; ?>" class="d-block w-100" alt="<?= $tblcottage['cottage_img']; ?>"><!--src en alt dynamisch maken -->
                    </div>
                    <div class="carousel-item active">
                    <img src="images/<?= $tblcottage['cottage_img2']; ?>" class="d-block w-100" alt="<?= $tblcottage['cottage_img2']; ?>"><!--src en alt dynamisch maken -->
                    </div>
                    <div class="carousel-item">
                    <img src="images/<?= $tblcottage['cottage_img3']; ?>" class="d-block w-100" alt="<?= $tblcottage['cottage_img3']; ?>"><!--src en alt dynamisch maken -->
                    </div>
                    <div class="carousel-item">
                    <img src="images/<?= $tblcottage['cottage_img4']; ?>" class="d-block w-100" alt="<?= $tblcottage['cottage_img4']; ?>"><!--src en alt dynamisch maken -->
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
                </div>
            </div>
            <div class="col">
            <h5>Omschrijving</h5>
            <p><?= $tblcottage['cottage_descr']; ?></p>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container mt-4 bg-light">
        <div class="row  px-4 py-4">
            <div class="col">
               <?php
               include 'includes/facilities.php';
               ?>
            </div>

            <div class="col">
                <h4>Prijzen (per persoon per nacht)</h4>
                    <ul class="list-group list-group-flush">
                            <li class="list-group-item">Volwassenen: &euro; <?= number_format($tblcottage['cottage_price_a'], 2); ?></li>
                            <li class="list-group-item">Kinderen: &euro; <?= number_format($tblcottage['cottage_price_c'], 2); ?></li>
                    </ul>
            </div>

            <div class="col">
                <?php
                include 'includes/additions.php'
                ?>
            </div>
        </div>
    </div>
</section>
<?php 
include 'includes/calculateprice.php';
include 'footer.php';
;?>