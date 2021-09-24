<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Tool;

/**
 * Description of TKTableConstants
 *
 * @author tagueu
 */
// this constants are meant to use maximum reflexions
// we are thimking of using crudlex
class TKTableConstants {

    //put your code here
    public const NAME_SPACE_ENTITY = "App\\Entity\\";
    public const NAME_SPACE_REPOSITORY = "App\\Repository\\";

    public static $URL_TO_METADATA = [
        "textNatures" => [
            "tableTitle" => "Natures des textes",
            "tableName" => "natureTextes",
            "class" => TKTableConstants::NAME_SPACE_ENTITY . "TextNature",
            "repository" => TKTableConstants::NAME_SPACE_REPOSITORY . "TextNature",
            "fields" => [
                
            ]
        ]
    ];

}
