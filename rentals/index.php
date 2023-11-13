<?php
include 'includes/database.php';
include 'includes/functions.php';
include 'header.php';
include 'includes/filter.php';

// Achtergrondafbeelding variabele
$backgroundImage = 'airbnb.jpg';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>
    <style>
        body {
           background-image: url('airbnb.jpg');
            background-size: cover; /* Om de achtergrondafbeelding volledig te bedekken /
            background-repeat: no-repeat; / Voorkomt herhaling van de achtergrondafbeelding /
            background-attachment: fixed; / Behoudt de achtergrond op zijn plaats tijdens het scrollen /
            / Andere CSS-stijlen hier... */
        }
    </style>
    <!-- Andere meta tags, links, scripts... -->
</head>
<body>

<section>
    <div class="container mt-4">
        <div class="row">
            <?php
            if ($filter == false) {
                $sql = "SELECT * FROM cottages";
            } else {
                $sql_add = "";

                if (count($arrFrmFilter) > 0) {
                    $sql_add = "AND cf.facility_id IN (" . implode(", ", $arrFrmFilter) . ")";
                }

                $sql = "SELECT * FROM `cottages` c WHERE c.cottage_id IN 
                    (
                        SELECT cottage_id FROM `cottages_facilities` cf
                        WHERE cf.cottage_id = c.cottage_id " .
                    $sql_add .
                    ")";
            }

            $tblCottages = getData($sql, "fetchAll");
            ?>

            <?php if (count($tblCottages) == 0) { ?>

                <div class="col-12">
                    <div class="alert alert-warning" role="alert">Helaas zijn er geen huisjes met de volgende selectie: <?php echo $selection; ?></div>
                </div>

            <?php } else { ?>

                <?php foreach ($tblCottages as $cottage) { ?>

                    <div class="col-12 col-md-4 mb-4 d-flex align-self-stretch">
                        <div class="card">
                            <img class="card-img-top" src="images/<?= $cottage['cottage_img']; ?>" alt="Afbeelding">
                            <div class="card-body">
                                <h5 class="card-title"><?= $cottage['cottage_name']; ?></h5>
                                <p class="card-text"><?= $cottage['cottage_excerpt']; ?></p>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Prijs voor volwassenen: €<?= $cottage['cottage_price_a']; ?></li>
                                    <li class="list-group-item">Prijs voor kinderen: €<?= $cottage['cottage_price_c']; ?></li>
                                </ul>
                                <a href="huisjes.php?cottageID=<?= $cottage['cottage_id']; ?>" class="btn btn-secondary mt-2">Lees meer...</a>
                            </div>
                        </div>
                    </div>

                <?php } ?>

            <?php } ?>
        </div>
    </div>
</section>

<?php
include 'footer.php';
?>
</body>
</html>
