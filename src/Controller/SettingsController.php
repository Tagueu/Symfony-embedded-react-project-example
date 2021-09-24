<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use App\Tool\TKAppConstants;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * Description of SettingsController
 *
 * @author tagueu
 */


class SettingsController extends Controller{
    //put your code here
    
    public function index(){
        
        return $this->render("settings.html.twig", []);
    }
    
    
    public function passwordChange( Request $request,UserPasswordEncoderInterface $passEncoder){
        $oldPassword= $request->get("old_password");
        $newPassword= $request->get("new_password");
        $newPasswordConfirm=$request->get("new_password_confirm");
        //check if oldPasssword is valid
        $user=$this->getUser();
        //$encoder_service = $this->get('security.encoder_factory');
        //$encoder = $encoder_service->getEncoder($user);
        if($passEncoder->isPasswordValid($user,$oldPassword)){
            if($newPassword==$newPasswordConfirm){
            $encodedPassword= $passEncoder->encodePassword($user,$newPassword);
            $this->addFlash(TKAppConstants::$SUCCESS_TYPE, "Modification de mot de passe réussie");
            $user->setPassword($encodedPassword);
            $em=$this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            }else{
                $this->addFlash(TKAppConstants::$ERROR_TYPE,"Echec de modification : la confirmation de mot de passe correspond pas au nouveau mot de passe precisé ");
            }
        }else{
            $this->addFlash(TKAppConstants::$ERROR_TYPE, "Echec de modification : Ancien mot de passe invalide");
        }
        return $this->redirectToRoute('settings');
       
    }

}
