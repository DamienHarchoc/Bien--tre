<?php 
 if (count($_POST) > 0) {
     $formErrors = [];
     $regexSubject = '/^[0-9a-zA-Z- \'À-ÖØ-öø-ÿ]+$/';
     
     if(!empty($_POST['email'])) {
        if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $email = strip_tags($_POST['email']);

        } else {
            $formErrors['email'] = 'L\'adresse mail est incorrecte';
        }
     } else {
         $formErrors['email'] ='L\'adresse mail est obligatoire';
     }

     if(!empty($_POST['category'])) {
        $categoryArray = ['Exposant', 'Visiteur'];
        if(in_array($_POST['category'], $categoryArray)) {
           $category = strip_tags($_POST['category']);
         } else {
             $formErrors['category'] = 'Merci de choisir entre Visiteur ou Exposant';
         }
        
     } else {
         $formErrors['category'] = 'Merci de faire un choix';
     }

     if(!empty($_POST['message'])) {
         $message = strip_tags($_POST['message']);

     } else {
         $formErrors['message'] = 'Veuillez entrer votre message';
     }


     if(!empty($_POST['subject'])) {
        if (preg_match($regexSubject, $_POST['subject'])) {
        $subject = strip_tags($_POST['subject']);

        } else {
            $formErrors['subject'] = 'Le sujet est incorrect';
        }

    } else {
        $formErrors['subject'] = 'Veuillez entrer votre sujet';
    }
 }
?>

