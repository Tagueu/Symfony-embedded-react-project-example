<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Tool;
use Doctrine\Persistence\ObjectManager;
use Doctrine\ORM\QueryBuilder;


/**
 * Description of TKDataBase
 *
 * @author tagueu
 */
class TKDataBase {
    //put your code here
    
    public static function getResult($page, ObjectManager $entityManager,$entityMetaData,$queryMetaData=null){
        $qb=$entityManager->createQueryBuilder();
        $qb->from($entityMetaData["class"],"e");
        $qb->select("e");
        $qb->addOrderBy("e.id","desc");
		$qb->setFirstResult(($page-1)*12);
		$qb->setMaxResults(12);
        $result=$qb->getQuery()->getResult();
        return $result;
    }
    
}
