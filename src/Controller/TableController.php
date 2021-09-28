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
        $metaData= \App\Tool\TKTableConstants::getMetaData($table_name);
        return $this->render("table-index.html.twig", ["metaData"=>$metaData]);
    }
    
    public function search($table_name,Request $request){
        $page=$request->get("page");
        $metaData= \App\Tool\TKTableConstants::getMetaData($table_name);
        if($page==null){
            $page=1;
        }
        $entityManager=$this->getDoctrine()->getManager();
        $queryMetaData=null;
        $id=$request->get('id');
        if($id!=null){
           $queryMetaData=['id'=>$id]; 
        }
        $result= \App\Tool\TKDataBase::getResult($page,$entityManager, $metaData,$queryMetaData);
        return $this->json($result);
    }
    
    public function createEdit($table_name,Request $request){
        $id=$request->get("id");
        $metaData= \App\Tool\TKTableConstants::getMetaData($table_name);
        $entityManager=$this->getDoctrine()->getManager();
        $element = new $metaData["class"];
        if($id!=null){
            $repository=$entityManager->getRepository($metaData["class"]);
            $element=$repository->find($id);
        }else{
            $entityManager->persist($element);
        }
        foreach($metaData["fields"] as $key=>$value){
            //setter! be cautious here
            $setter="set".ucfirst($key);
            $valToSet=$request->get($key);
            $element->$setter($valToSet);
            
        }
       $entityManager->flush();
        return $this->json(["success"=>"OK"]);
    }
    
    public function delete($table_name,Request $request){
        $id=$request->get("id");
        $metaData= \App\Tool\TKTableConstants::getMetaData($table_name);
        $entityManager=$this->getDoctrine()->getManager();
        $element = new $metaData["class"];
        if($id!=null){
            $repository=$entityManager->getRepository($metaData["class"]);
            $element=$repository->find($id);
            if($element!=null){
            $entityManager->remove($element);
            $entityManager->flush();
            }
        }
        
        return $this->json(["success"=>"OK"]);
    }
    
    


}
