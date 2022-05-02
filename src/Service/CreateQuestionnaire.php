<?php

namespace Quizz\Service;

class CreateQuestionnaire
{
    public static function getCreateQuestionnaire() {

        $connect = bddService::getConnect();

        if(!empty($_POST['libelleQuestionnaire']) && !empty($_POST['nomQuestion1']) && !empty($_POST['idQuestionnaire']) && !empty($_POST['reponse1Question1']) && !empty($_POST['reponse2Question4']))
        {
            $idQuestionnaire = htmlspecialchars($_POST['idQuestionnaire']);

            if(is_numeric($idQuestionnaire) == true) {

                $libelleQuestionnaire = htmlspecialchars($_POST['libelleQuestionnaire']);
                $nomQuestion1 = htmlspecialchars($_POST['nomQuestion1']);
                $nomQuestion2 = htmlspecialchars($_POST['nomQuestion2']);
                $nomQuestion3 = htmlspecialchars($_POST['nomQuestion3']);
                $nomQuestion4 = htmlspecialchars($_POST['nomQuestion4']);
                $reponse1Question1 = htmlspecialchars($_POST['reponse1Question1']);
                $reponse2Question1 = htmlspecialchars($_POST['reponse2Question1']);
                $reponse3Question1 = htmlspecialchars($_POST['reponse3Question1']);
                $reponse4Question1 = htmlspecialchars($_POST['reponse4Question1']);
                $reponse1Question2 = htmlspecialchars($_POST['reponse1Question2']);
                $reponse2Question2 = htmlspecialchars($_POST['reponse2Question2']);
                $reponse3Question2 = htmlspecialchars($_POST['reponse3Question2']);
                $reponse4Question2 = htmlspecialchars($_POST['reponse4Question2']);
                $reponse1Question3 = htmlspecialchars($_POST['reponse1Question3']);
                $reponse2Question3 = htmlspecialchars($_POST['reponse2Question3']);
                $reponse3Question3 = htmlspecialchars($_POST['reponse3Question3']);
                $reponse4Question3 = htmlspecialchars($_POST['reponse4Question3']);
                $reponse1Question4 = htmlspecialchars($_POST['reponse1Question4']);
                $reponse2Question4 = htmlspecialchars($_POST['reponse2Question4']);
                $reponse3Question4 = htmlspecialchars($_POST['reponse3Question4']);
                $reponse4Question4 = htmlspecialchars($_POST['reponse4Question4']);

                $check = $connect->prepare('SELECT idQuestionnaire, libelleQuestionnaire FROM questionnaire WHERE idQuestionnaire = ?');
                $check->execute(array($idQuestionnaire));
                $dataQuestionnaire = $check->fetch();

                $insert = $connect->prepare('INSERT INTO questionnaire(idQuestionnaire, libelleQuestionnaire) VALUES(:idQuestionnaire, :libelleQuestionnaire)');
                $insert->execute(array(
                    'idQuestionnaire' => $idQuestionnaire,
                    'libelleQuestionnaire' => $libelleQuestionnaire
                ));

                $type = 1;
                $nbReponse = 4;
                $nbBonneReponse = 1;

                $libelleQuestion = array($nomQuestion1, $nomQuestion2, $nomQuestion3, $nomQuestion4);

                $check = $connect->prepare('SELECT libelleQuestion, type, nbReponse, nbBonneReponse FROM question');
                $check->execute();
                $dataQuestion = $check->fetch();

                foreach ($libelleQuestion as $keyLibQuestion => $valueLibQuestion) {
                    $insert = $connect->prepare('INSERT INTO question(libelleQuestion, type, nbReponse, nbBonneReponse) VALUES(:libelleQuestion, :type, :nbReponse, :nbBonneReponse)');
                    $insert->execute(array(
                        'libelleQuestion' => $valueLibQuestion,
                        'type' => $type,
                        'nbReponse' => $nbReponse,
                        'nbBonneReponse' => $nbBonneReponse
                    ));
                }

                $valeurReponse = array(
                    $reponse1Question1,
                    $reponse2Question1,
                    $reponse3Question1,
                    $reponse4Question1,
                    $reponse1Question2,
                    $reponse2Question2,
                    $reponse3Question2,
                    $reponse4Question2,
                    $reponse1Question3,
                    $reponse2Question3,
                    $reponse3Question3,
                    $reponse4Question3,
                    $reponse1Question4,
                    $reponse2Question4,
                    $reponse3Question4,
                    $reponse4Question4
                );

                $check = $connect->prepare('SELECT valeur FROM reponse');
                $check->execute();
                $dataReponse = $check->fetch();

                foreach ($valeurReponse as $keyValReponse => $valueValReponse) {
                    $insert = $connect->prepare('INSERT INTO reponse(valeur) VALUES(:valeur)');
                    $insert->execute(array(
                        'valeur' => $valueValReponse
                    ));
                }

                header('Location: gestion-questionnaire?ques_err=success');
                die();

            } else{ header('Location: gestion-questionnaire?ques_err=idFalse'); die();}
        } else{ header('Location: gestion-questionnaire?ques_err=already'); die();}
    }
}