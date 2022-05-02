<?php

namespace Quizz\Service;

class Connexion
{
    public static function getConnexion() {

        $connect = bddService::getConnect();

        if (!empty($_POST['email']) && !empty($_POST['password'])) {

            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);

            $email = strtolower($email);

            $check = $connect->prepare('SELECT login, email, password, token FROM admin WHERE email = ?');
            $check->execute(array($email));
            $data = $check->fetch();
            $row = $check->rowCount();

            if ($row > 0) {
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    if (password_verify($password, $data['password'])) {
                        $_SESSION['login'] = $data['token'];
                        header('Location: admin');
                        die();
                    } else {
                        header('Location: /?login_err=password');
                        die();
                    }
                } else {
                    header('Location: /?login_err=email');
                    die();
                }
            } else {
                header('Location: /?login_err=already');
                die();
            }
        } else {
            header('Location: /');
            die();
        }

    }
}