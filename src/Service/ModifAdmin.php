<?php

namespace Quizz\Service;

class ModifAdmin
{
    public static function getModifAdmin() {

        $connect = bddService::getConnect();

        if(!empty($_POST['login']) && !empty($_POST['email']) && !empty($_POST['motDePasse']) && !empty($_POST['motDePasse_retype']))
        {

            $pseudo = htmlspecialchars($_POST['login']);
            $nom = htmlspecialchars($_POST['nom']);
            $prenom = htmlspecialchars($_POST['prenom']);
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['motDePasse']);
            $password_retype = htmlspecialchars($_POST['motDePasse_retype']);

            $check = $connect->prepare('SELECT login, nom, prenom, email, password FROM admin WHERE token = :token');

            $email = strtolower($email);

            if(strlen($pseudo) <= 50){
                if(strlen($email) <= 50){
                    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                        if($password === $password_retype){

                            $cost = ['cost' => 12];
                            $password = password_hash($password, PASSWORD_BCRYPT, $cost);

                            $insert = $connect->prepare("UPDATE admin SET login = :login, nom = :nom, prenom = :prenom, email = :email, password = :password WHERE token = :token");
                            $insert->execute(array(
                                'login' => $pseudo,
                                'nom' => $nom,
                                'prenom' => $prenom,
                                'email' => $email,
                                'password' => $password,
                                'token' => $_SESSION['login']
                            ));
                            header('Location: espace-personnel?modif_err=success');
                            die();
                        }else{ header('Location: espace-personnel?modif_err=password'); die();}
                    }else{ header('Location: espace-personnelp?modif_err=email'); die();}
                }else{ header('Location: espace-personnel?modif_err=email_length'); die();}
            }else{ header('Location: espace-personnel?modif_err=login_length'); die();}
        }
    }
}