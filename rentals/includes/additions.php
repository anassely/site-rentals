<?php
$sql2 = 'select * from additions';
$tblAdditions = getData($sql2, "fetchAll");
?>
                <h4>Extra's (per persoon per dag)</h4>
                    <ul class="list-group list-group-flush">
                        <?php  
                        foreach($tblAdditions as $addition) { ?>
                            <li class="list-group-item"><?php echo $addition["addition_name"];?> &euro; <?php echo number_format($addition["addition_price"], 2);?></li>
                        <?php } //end foreach ?>
                    </ul>