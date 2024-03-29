<?php
// hier maak je de waarde van de variabelen

$calcPrice = false;
$numberNights = 0;
$numberAdults = 0;
$numberChilds = 0;
$ArrAdditions = [];
$selAdditions = [];
$totalAdditions = 0;
$totalextra = 0;
$additionNames = "";
$AmountAdd = [];

//variabelen voor de prijzen
$CottagePriceA = $tblcottage['cottage_price_a'];
$CottagePriceC = $tblcottage["cottage_price_c"];

//en natuurlijk variabelen de juiste waarde geven

$calcPrice = false;
if(isset($_POST["calculate"])){
    $calcPrice = true;          //ingevuld
}

if(isset($_POST["numberNights"])){
    $numberNights = $_POST["numberNights"];
}

if(isset($_POST["numberAdults"])){
    $numberAdults = $_POST["numberAdults"];
} 

if(isset($_POST["numberChilds"])){
    $numberChilds = $_POST["numberChilds"];
}

if(isset($_POST["additions"])){
    $ArrAdditions = $_POST["additions"];
}


?>
<section>
<div class="container mt-4 mb-4 bg-light border border-info">
    <form name="calculate" method="post" action="huisjes.php?<?php echo 'cottageID=' . $huisjeid;?>">
        <div class="row px-4 py-4">
            <div class="col-12 mb-4">
                <h2>Bereken prijs</h2>
            </div>
            <div class="col">
                    <h5 class="pb-2">Aantal nachten en personen</h5>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Aantal nachten</span>
                            <input type="number" class="form-control" name="numberNights" id="numberNights" placeholder="Aantal nachten" aria-label="Aantal nachten" value="<?php echo $numberNights; ?>">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Aantal volwassenen</span>
                            <input type="number" class="form-control" name="numberAdults" id="numberAdults" placeholder="Aantal volwassenen" aria-label="Aantal volwassenen" value="<?php echo $numberAdults; ?>">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Aantal kinderen</span>
                            <input type="number" class="form-control" name="numberChilds" id="numberChilds" placeholder="Aantal kinderen" aria-label="Aantal kinderen" value="<?php echo $numberChilds; ?>">
                        </div>
            </div>
            <div class="col">
                <h5 class="pb-2">Selecteer extra's (prijs per persoon per dag)</h5>
                    <?php
                        //alle additions dynamisch neerzetten
                        foreach($tblAdditions as $addition) { 

                            if(isset($_POST["AmountAdd_" . $addition["addition_id"]])){
                                $AmountAdd[$addition["addition_name"]] = $_POST["AmountAdd_" . $addition["addition_id"]];
                            } else {
                                $AmountAdd[$addition["addition_name"]] = 0;
                            }?>

                        <div class="row">
                          <div class="col-9">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" id="<?php echo $addition["addition_id"];?>" value="<?php echo $addition["addition_id"];?>" name="additions[]" <?php if(in_array($addition["addition_id"], $ArrAdditions)){echo "checked"; $selAdditions[$addition["addition_name"]]= $addition["addition_price"];}?>>
                                    <label class="form-check-label" for="<?php echo $addition["addition_id"];?>"><?php echo $addition["addition_name"];?>  (&euro; <?php echo  $addition["addition_price"];?>)</label>
                                </div>
                            </div>
                            <div class="col-3">
                                <input type="number" class="form-control" id="AmountAdd_<?php echo $addition["addition_id"]; ?>" name="AmountAdd_<?php echo $addition["addition_id"]; ?>" value="<?php echo $AmountAdd[$addition["addition_name"]];?>">
                            </div>
                        </div>
                    <?php }  ?>

            </div>
        </div>
        <div class="col-12 mb-4">
            <div class="d-grid d-md-flex justify-content-md-end">
                <!--submit het formulier calculate -->
                <button class="btn btn-lg btn-info me-md-2 text-light" type="submit" value="calcPrice" name="calculate">Bereken</button>
            </div>
        </div>
    </form>
</div>
<section>

<?php 

//berekende prijs laten zien als die is opgevraagd
if($calcPrice == true){

    //gebruiken omdat we bij het laatste item natuurlijk geen komma willen
    $counter = 1;

    
    foreach($selAdditions as $key => $value){
        $additionNames .= $key . " (x" . $AmountAdd[$key] . ")";
        //komma toevoegen als het niet het laatste item is
        if($counter < count($selAdditions)) {$additionNames .= ", ";}

        // de totaalprijs van alle additions bij elkaar berekenen, nu maar even alleen een neerzetten nog toevoegen dat hij ze allemaal optelt
        $totalAdditions = $value * $AmountAdd[$key];
        $totalextra += $totalAdditions;

        $counter++;
    }

    //als er geen additions geselecteerd zijn
    if(count($selAdditions) == 0) {
        $additionNames = "Geen extra's geselecteerd!";
    }


    // $PriceA = $tbl["_price_a"];
    // $PriceC = $tbl["_price_c"];

    //prijs voor volwassenen
    $totalPriceA =  ($numberAdults * $numberNights) * $CottagePriceA;
    // prijs voor kinderen, berekening 
    $totalPriceC =  ($numberChilds * $numberNights) * $CottagePriceC;
    // alle additions * aantal dagen/nachten 
    $totalPriceAd =  $totalextra * $numberNights;

    ?>
<section>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="alert alert-primary" role="alert">
                    <h5>Berekende prijs</h5>
                    <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Omschrijving</th>
                        <th scope="col">Prijs</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                
                            <td>Prijs volwassenen (<?php echo $numberAdults ." x &euro; ".  number_format($CottagePriceA, 2) . " x ". $numberNights; ?>)</td>
                            <td>&euro; <?php echo $totalPriceA ?></td>
                        </tr>
                        <tr>
                            <td>Prijs kinderen (<?php echo $numberChilds ." x &euro;".  number_format($CottagePriceC, 2) . " x ". $numberNights; ?>)</td>
                            <td>&euro; <?php echo  $totalPriceC ?></td>
                        </tr>
                        <tr>
                            <td>Prijs extra's (<?php echo $additionNames;?>):</td>
                            <td>&euro; <?php echo  number_format($totalPriceAd, 2); ?></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <td><strong>Totaal</strong></td>
                        <td><strong>&euro; <?php echo  number_format($totalPriceA + $totalPriceC + $totalPriceAd, 2) ;?></strong></td>
                    </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<?php }  ?>

                            

