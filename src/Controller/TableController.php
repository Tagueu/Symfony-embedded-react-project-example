<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use App\Tool\TKTable;

/**
 * Description of SettingsController
 *
 * @author tagueu
 */


class TableController extends Controller{
    //put your code here
    
    public function index($table_name){
        
        return $this->render("table-index.html.twig", []);
    }
    


}
