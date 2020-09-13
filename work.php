<?php

include 'calc.php';

$value = $_POST['value'];
$percentage = $_POST['percentage'];
$instalments = $_POST['instalments'];
$time= $_POST['time'];

$calculator = new Calc($value,$percentage,$instalments,$time);
$amount = $calculator->instalmentsCalc();
$amounts=$calculator->calculation();
?>
<table >
<tr>
    <th></th>
    <th>Policy</th>
    <?php for($count=1;$count <= $instalments;$count++){ ?>
    <th> <?php echo $count ?> Instalment </th>
    <?php }?>
</tr>   
            <tr>
                <td>Value</td>
                <td><?php echo $amount['value']?></td>
            </tr>
            <tr>
                <td>Base premium(<?php echo $amount['percentage'] ?>%)</td>
                <td><?php echo $amounts['baseAmount']?></td>
                <?php 
                foreach($amount['baseAmount'] as $instalment=>$value){
                    ?>
                <td><?php echo $value ?></td>
                <?php } ?>
            </tr>
            <tr>
                <td>Commission(17%)</td>
                <td><?php echo $amounts['commissionAmount']?></td>
                <?php 
                foreach($amount['commissionAmount'] as $instalment=>$value){
                    ?>
                <td><?php echo $value ?></td>
                <?php } ?>
            </tr>
            <tr>
                <td>Tax(<?php echo $percentage. "%"?>)</td>
                <td><?php echo $amounts['taxAmount']?></td>
                <?php 
                foreach($amount['taxAmount'] as $instalment=>$value){
                    ?>
                <td><?php echo $value ?></td>
                <?php } ?>
            </tr>
            <tr>
                <td>Total Cost</td>
                <td><?php echo $amounts['sumAmount']?></td>
                <?php 
                for($count=1;$count <= $instalments;$count++){
                    ?>
                <td><?php echo $amount['baseAmount'][$count. " installment"]+$amount['taxAmount'][$count. " installment"]+$amount['commissionAmount'][$count. " installment"]?></td>
                <?php } ?>
            </tr>
        </table>
        </table>
    <?php

echo "<br><a href=\"javascript:history.go(-1)\">Back to calculator</a>";
