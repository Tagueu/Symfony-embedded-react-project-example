<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Description of HomeController
 *
 * @author tagueu
 */


class HomeController extends Controller{
    //put your code here
    
    public function index(){
        
        
        return $this->render("index.html.twig", []);
    }
    
    public function login(){
        
        
        return $this->render("login.html.twig", []);
    }
}
