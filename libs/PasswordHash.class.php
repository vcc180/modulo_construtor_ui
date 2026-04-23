<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PasswordHash
 *
 * @author VANESSA
 */
class PasswordHash {
    //put your code here
    public function CheckPassword($passUser,$passDB) {
        //echo md5($passUser) .'='.$passDB;
        if($passDB == $passUser){
            return TRUE;
        }
        return FALSE;
    }
}
