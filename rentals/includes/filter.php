
    <div class="container mt-4 mb-1">
    <p>
        <!--  knop filter -->
        <button class="btn btn-info" type="button" data-toggle="collapse" data-target="#collapseFilter" aria-expanded="false" aria-controls="collapseFilter" >
        Filter op faciliteiten</button>
    </p>
        <div class="row">
            <div class="col-sm">
            <div class="_collapse" id="collapseFilter">
                <div class="card card-body">
                    <!--start filter form -->
                    <form name="filter" id="filter" method="GET" action="huis.php"> <!--stuurt via de button-->
                        <?php

                            //de faciliteiten komen uit de database, tabel faciliteiten, we moeten de data dus ophalen
                            //gebruik de juiste query om de faciliteiten uit de database  halen

                            
                            $tblFacilities = getData("SELECT * FROM `facilities`", "fetchAll");

                            //$tbl_facilities is nu een array die we kunnen gebruiken om de formulier velden te maken

                            //naast de data uit de database moeten we ook kijken of de gebruiker de filter heeft gebruikt
                            //hiervoor moeten we checken of het formulier filter is gesubmit en er faciliteiten zijn aangevinkt
                            
                            if(isset($_GET["formFacilities"])){
                                $arrFrmFilter = $_GET["formFacilities"];

                
                                $selection = "";
                                // variabele $filter , checken of er wel (true) of niet (false) gefiltert wordt
                                $filter = true;
                            }
                            else {


                                //lege waarde  voor $arrFrmFilter anders krijg je een foutmelding als er niks gefiltert wordt
                                $arrFrmFilter = [];
                                $filter = false;
                               


                            }

                            //we gebruiken een variabele $counter zodat er geen , na het laatste item komt
                            $counter = 0;

                            foreach($tblFacilities as $row) { 

                                //we moeten ook nog checken of dit een geselecteerde waarde is in de filter zodat we de checkbox weer aanzetten
                                //Dit doen we door te zoeken of de waarde van deze faciliteit in de array $arrFormFac voorkomt, 
                                if(in_array($row["facility_id"], $arrFrmFilter)){ 
                                    //voeg een , toe tussen de faciliteiten behalve bij de laatste, daar gebruiken we de counter voor
                                    if($counter < count($arrFrmFilter)-1) {
                                        $selection .=  $row["facility_name"] . ", ";
                                    }
                                    else{
                                        $selection .=  $row["facility_name"];
                                    }

                                    $counter++;
                                }
                            ?>

                                <!-- een faciliteit waarop gefiltert kan worden, met de naam em id van de faciliteiten die in de database staan -->    
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" value="<?php echo $row["facility_id"];?>" id="<?php echo $row["facility_id"];?>" name="formFacilities[]" <?php if(in_array($row["facility_id"], $arrFrmFilter)){echo "checked";}?>>
                                    <label class="form-check-label" for="<?php echo $row["facility_id"];?>"><?php echo $row["facility_name"];?></label>
                                </div>

                            <?php } ?>
                            
                        <!-- de stbmit button, om het filteren te activeren en de form te submitten -->
                        <button type="submit" name="submit_filter" value="submit" class="btn btn-primary  mb-4 mt-2">Filter</button>
                    </form>
                </div>
            </div>
            </div>
        </div>
    </div>
</section>

<?php

if($filter == true){?>
<section>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="alert alert-primary" role="alert">je hebt gefilterd op: <?php echo $selection; ?></div>
            </div>
        </div>
    </div>
</section>
<?php }  ?>