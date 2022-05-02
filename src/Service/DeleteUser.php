<?php

namespace Quizz\Service;

class DeleteUser
{
    public static function getDeleteUser() {

        $connect = bddService::getConnect();

        if (isset($_GET['deleteuser'])) {
            $idDelete = htmlspecialchars($_GET['deleteuser']);
            $connect->query("DELETE FROM etudiants WHERE idEtudiant = ".$idDelete);
            header('Location: /gestion-utilisateur?delete_err=success');
            die();
        } else {
            header('Location: /gestion-utilisateur?delete_err=error');
            die();
        }

//        echo ' <br> ';
//        echo "Vous êtes bien sur la page de suppression !";
//        echo '<a href="/gestion-utilisateur"> Retour </a>';

    }
}