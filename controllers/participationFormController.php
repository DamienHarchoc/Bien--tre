<?php

if (count($_POST) > 0) {

    //Tableau contenant les erreurs potentielles
    $formErrors = [];

    //Regex pour le prénom et le nom du participant
    $regexName = '/^[a-zA-Z\- \'À-ÖØ-öø-ÿ]+$/';
    $regexCompany = '/^[0-9a-zA-Z\- \'À-ÖØ-öø-ÿ]+$/';
    $regexPhoneNumber = '/^[0]{1}[1-79]{1}([ ]{1}[0-9]{2}){4}$/';

    /*
    * 1 Vérification du prénom du participant
    */
    if (!empty($_POST['firstName'])) {
        if (preg_match($regexName, $_POST['firstName'])) {
            $firstName = strip_tags($_POST['firstName']);
        } else {
            $formErrors['firstName'] = 'Le prénom est incorrect';
        }
    } else {
        $formErrors['firstName'] = 'Le prénom est obligatoire';
    }

    /*
    * 2 Vérification du nom du participant
    */
    if (!empty($_POST['lastName'])) {
        if (preg_match($regexName, $_POST['lastName'])) {
            $lastName = strip_tags($_POST['lastName']);
        } else {
            $formErrors['lastName'] = 'Le nom est incorrect';
        }
    } else {
        $formErrors['lastName'] = 'Le nom est obligatoire';
    }

    /*
    * 3 Vérification de l'email du participant
    */
    if (!empty($_POST['email'])) {
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $email = strip_tags($_POST['email']);
        } else {
            $formErrors['email'] = 'L\'adresse mail est incorrecte';
        }
    } else {
        $formErrors['email'] = 'L\'adresse mail est obligatoire';
    }

    /*
    * 4 Vérification du numéro de téléphone du participant
    */
    if (!empty($_POST['phoneNumber'])) {
        if (preg_match($regexPhoneNumber, $_POST['phoneNumber'])) {
            $phoneNumber = strip_tags($_POST['phoneNumber']);
        } else {
            $formErrors['phoneNumber'] = 'Le nom est incorrect';
        }
    } else {
        $formErrors['phoneNumber'] = 'Le nom est obligatoire';
    }

    /*
    * 5 Choix du participant entre Exposant et Visiteur
    */
    if (!empty($_POST['participantChoice'])) {
        $participantChoiceArray = ["Exposant", "Visiteur"];
        if (in_array($_POST['participantChoice'], $participantChoiceArray)) {
            $participantChoice = strip_tags($_POST['participantChoice']);
        } else {
            $formErrors['participantChoice'] = 'Choisissez entre exposant et visiteur svp';
        }
    } else {
        $formErrors['participantChoice'] = 'Merci de faire un choix svp';
    }

    
    /*
    * 6 Choix de la journée
    */
    if (!empty($_POST['dayChoice'])) {
        $dayChoiceArray = ["25 juin 2022", "26 juin 2022", "25 et 26 juin 2022"];
        if (in_array($_POST['dayChoice'], $dayChoiceArray)) {
            $dayChoice = strip_tags($_POST['dayChoice']);
        } else {
            $formErrors['dayChoice'] = 'Choisissez une date dans la liste svp';
        }
    } else {
        $formErrors['dayChoice'] = 'Merci de faire un choix svp';
    }


    //Si le participant choisi 'Exposant'
    if ($_POST['participantChoice'] == 'Exposant') {

        /*
        * 7 Vérification du nom de l'entreprise
        */
        if (!empty($_POST['company'])) {
            if (preg_match($regexCompany, $_POST['company'])) {
                $company = strip_tags($_POST['company']);
            } else {
                $formErrors['company'] = 'Le format du nom de l\'entreprise est incorrect';
            }
        } else {
            $formErrors['company'] = 'Le nom de l\'entreprise est obligatoire';
        }

        /*
        * 8 Vérification du type de produits
        */
        if (!empty($_POST['typeOfProduct'])) {
            if (preg_match($regexCompany, $_POST['typeOfProduct'])) {
                $typeOfProduct = strip_tags($_POST['typeOfProduct']);
            } else {
                $typeOfProduct['typeOfProduct'] = 'Le format du type de produits est incorrect';
            }
        } else {
            $formErrors['typeOfProduct'] = 'Merci de renseigner vos produits';
        }

        /*
        * 9 Vérification de la photo
        */

        if ($_FILES['photo']['error'] == 0) {

            $fileInfos = pathinfo($_FILES['photo']['name']);
            $photoExtension = strtolower($fileInfos['extension']);

            $authorizedMimeTypes = [
                'png' => 'image/png',
                'jpg' => 'image/jpeg',
                'jpeg' => 'image/jpeg',
                'gif' => 'image/gif'
            ];

            if (array_key_exists($photoExtension, $authorizedMimeTypes) && mime_content_type($_FILES['photo']['tmp_name']) == $authorizedMimeTypes[$photoExtension]) {

                 // move_uploaded_file() permet de déplacer un fichier dans un dossier sur le serveur où est hebergé le site
                if (move_uploaded_file($_FILES['photo']['tmp_name'], 'uploads/' . $_FILES['photo']['name'])) {
                    //donne des droits au fichiers, utiles pour les sites hébergés sur un serveur Linux
                    chmod('uploads/' . $_FILES['photo']['name'], 0644);
                    $photo = 'uploads/' . $_FILES['photo']['name'];
                } else {
                    $formErrors['photo'] = 'Une erreur est survenue';
                }
            } else {
                $formErrors['photo'] = 'La photo n\'est pas au bon format';
            }
        } else {
            $formErrors['photo'] = 'La photo est obligatoire';
        }

    }
}