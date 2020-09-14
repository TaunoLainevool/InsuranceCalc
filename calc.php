<?php

class Calc{

    public $time;
    public $value;
    public $instalments;
    public $percentage;

    public function __construct($value,$percentage,$instalments,$time){
        $this->value = $value;
        $this->percentage = $percentage;
        $this->instalments = $instalments;
        $this->time = $time;
    }

    public function getBasePercentage(){
        $time= $this->time;
        if($time >= 15 && $time <= 20){
            return 13;
        }else{
            return 11;
        }
    }
    
    public function calculation(){
        $value = $this->value;
        $percentage = $this->getBasePercentage();
        $commission = 17;
        $tax = $this->percentage;
        $amounts = [];
        //$amounts['value']=$value;
        //base percentage amount
        $baseAmount = $value * $percentage/100;
        $amounts['baseAmount']=$baseAmount;
        //commission amount
        $commissionAmount = $value * $commission/100;
        $amounts['commissionAmount']=$commissionAmount;
        //tax amount
        $taxAmount = $value * $tax/100;
        $amounts['taxAmount']=$taxAmount;
        //sum amount
        $sumAmount = $taxAmount + $commissionAmount + $baseAmount;
        $amounts['sumAmount']=$sumAmount;
        
        
        return $amounts;
    }
    
    public function instalmentsCalc(){
        $percentage = $this->getBasePercentage();
        $value = $this->value;
        $instalments=[];
        $instalment_num = $this->instalments;
        $instalmentsAmounts = [];
        $amounts= $this->calculation();
       
        if($instalment_num>1){
            
            foreach($amounts as $index => $key){
                $instalmentAmount = round($key/$instalment_num,2);
                if($key != $instalmentAmount*$instalment_num){
                    $missing = round($key - ($instalmentAmount*$instalment_num),2, PHP_ROUND_HALF_EVEN);
                }
                    for($count=1;$count <= $instalment_num;$count++){
                        if($count!=$instalment_num){
                            $instalmentsAmounts[$count. " installment"]=$instalmentAmount;
                        }else{
                            $instalmentsAmounts[$count. " installment"]=$instalmentAmount+$missing;
                        }
                    }
                    $instalments[$index]=$instalmentsAmounts;
                    $instalmentsAmounts=[];
            }
            $amounts['instalments']=$instalments;
            $amounts['percentage']=$percentage;
            $amounts['value']=$value;
            return $amounts;
        }else{
            $amounts['percentage']=$percentage;
            $amounts['value']=$value;
            return $amounts;
        }
    }
}