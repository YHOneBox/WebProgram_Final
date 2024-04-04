<?php
    // enum Column : string
    // {
    //     // case ID = "id";
    //     case SEX = "sex";
    //     case AGE = "age";
    //     case DIASTOLIC = "diastolic";
    //     case SYSTOLIC = "systolic";
    //     case ANTI_HYPERTENSIVE = "anti-hypertensive";
    //     case SMOKER = "smoker";
    //     case DIABETES = "diabetes";
    //     case HDL = "hdl";
    //     case TDL = "tdl";
    //     case SCORE = "score";
    //     case RISK = "risk";

    //     // calculate the total value of the enum
    //     public static function getTotalValue()
    //     {
    //         $total = 0;
    //         foreach(self::cases() as $coulumn)
    //         {
    //             $total++;
    //         }
    //         return $total;
    //     }
    // }

    class Storage
    {
        public static $columnInTable = array(
            "heart" => array("sex", "age", "diastolic", "systolic", "anti-hypertensive", "smoker", "diabetes", "hdl", "tdl", "score", "risk", "userID"),
            "personal_data" => array("userID", "character")
        );
    }
?>