<?php

namespace Quizz\Service;

class CreateAdmin
{
    public static function getCreateAdmin() {

        $connect = bddService::getConnect();

        if(!empty($_POST['login']) && !empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password_retype']))
        {
            $pseudo = htmlspecialchars($_POST['login']);
            $nom = htmlspecialchars($_POST['nom']);
            $prenom = htmlspecialchars($_POST['prenom']);
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);
            $password_retype = htmlspecialchars($_POST['password_retype']);

            $check = $connect->prepare('SELECT login, email, password FROM admin WHERE email = ?');
            $check->execute(array($email));
            $data = $check->fetch();
            $row = $check->rowCount();

            $email = strtolower($email);

            if($row == 0){
                if(strlen($pseudo) <= 50){
                    if(strlen($email) <= 50){
                        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                            if($password === $password_retype){

                                $cost = ['cost' => 12];
                                $password = password_hash($password, PASSWORD_BCRYPT, $cost);

                                $insert = $connect->prepare('INSERT INTO admin(login, nom, prenom, email, password, token) VALUES(:login, :nom, :prenom, :email, :password, :token)');
                                $insert->execute(array(
                                    'login' => $pseudo,
                                    'nom' => $nom,
                                    'prenom' => $prenom,
                                    'email' => $email,
                                    'password' => $password,
                                    'token' => bin2hex(openssl_random_pseudo_bytes(64))
                                ));
                                header('Location: gestion-administrateur?reg_err=success');
                                die();
                            }else{ header('Location: gestion-administrateur?reg_err=password'); die();}
                        }else{ header('Location: gestion-administrateur?reg_err=email'); die();}
                    }else{ header('Location: gestion-administrateur?reg_err=email_length'); die();}
                }else{ header('Location: gestion-administrateur?reg_err=login_length'); die();}
            }else{ header('Location: gestion-administrateur?reg_err=already'); die();}
        }
    }
}