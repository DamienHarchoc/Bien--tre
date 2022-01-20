<?php include 'includes/header.php' ?>
<?php require_once 'controllers/participationFormController.php'; ?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/style.css" />
    <title>Document</title>
</head>

<body>

    <div class="registrationForm col-10 col-md-8 shadow ms-auto me-auto p-5 m-5 rounded">

        <h1 class="fw-bold mt-3 text-center">Participer</h1>
        <?php if (count($_POST) == 0 || count($formErrors) > 0) { ?>

            <!--Début du formulaire-->
            <form action="participationForm.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <!--1 Prénom de l'utilisateur-->
                    <div class="form-floating col-12 col-md-6 mt-3">
                        <label for="firstName" class="form-label">Prénom d'utilisateur <span class="text-danger"> *</span></label>
                        <input type="text" name="firstName" id="firstName" placeholder="ex : Jean" class="form-control <?= isset($formErrors['firstName']) ? 'is-invalid' : '' ?>" />
                        <small class="invalid-feedback"><?= @$formErrors['firstName'] ?></small>
                        <div id="messageFirstName"></div>
                    </div>

                    <!--2 Nom de l'utilisateur-->
                    <div class="form-floating col-12 col-md-6 mt-3">
                        <label for="lastName" class="form-label">Nom d'utilisateur <span class="text-danger"> *</span></label>
                        <input type="text" name="lastName" id="lastName" placeholder="ex : Dupont" class="form-control <?= isset($formErrors['lastName']) ? 'is-invalid' : '' ?>" />
                        <small class="invalid-feedback"><?= @$formErrors['lastName'] ?></small>
                        <div id="messageLastName"></div>
                    </div>

                    <!--3 Mail de l'utilisateur-->
                    <div class="form-floating col-12 col-md-6 mt-3">
                        <label for="email" class="form-label">Adresse email <span class="text-danger"> *</span></label>
                        <input type="email" name="email" id="email" placeholder="ex : jean.dupont@fournisseur.fr" class="form-control  <?= !isset($formErrors['email']) ?: 'is-invalid' ?>" />
                        <small class="invalid-feedback"><?= @$formErrors['email'] ?></small>
                        <div id="messageEmail"></div>
                    </div>

                    <!--4 Téléphone de l'utilisateur-->
                    <div class="form-floating col-12 col-md-6 mt-3">
                        <label for="phoneNumber" class="form-label">Numéro de téléphone<span class="text-danger"> *</span></label>
                        <input type="tel" name="phoneNumber" id="phoneNumber" placeholder="ex : 03 00 00 00 00" class="form-control <?= isset($formErrors['phoneNumber']) ? 'is-invalid' : '' ?>" />
                        <small class="invalid-feedback"><?= @$formErrors['phoneNumber'] ?></small>
                        <div id="messagePhone"></div>
                    </div>

                    <!--5 Choix entre Exposant et Visiteur-->
                    <div class="form-floating col-12 col-md-6 mt-3">
                        <select class="form-select <?= !isset($formErrors['participantChoice']) ?: 'is-invalid' ?>" id="participantChoice" name="participantChoice">
                            <option selected disabled>Choisissez</option>
                            <option value="Exposant">Exposant</option>
                            <option value="Visiteur">Visiteur</option>
                        </select>
                        <small class="invalid-feedback"><?= @$formErrors['participantChoice'] ?></small>
                        <label for="participantChoice" class="form-label">Choix du participant</label>
                    </div>

                    <!--6 Choix de la journée-->
                    <div class="form-floating col-12 col-md-6 mt-3">
                        <label for="dayChoice" class="form-label">Choix du jour<span class="text-danger"> *</span></label>
                        <select class="form-select" id="dayChoice" name="dayChoice">
                            <option selected disabled></option>
                            <option value="25 juin 2022">25 juin 2022</option>
                            <option value="26 juin 2022">26 juin 2022</option>
                            <option value="25 et 26 juin 2022">25 et 26 juin 2022</option>
                        </select>
                        <small class="invalid-feedback"><?= @$formErrors['dayChoice'] ?></small>
                    </div>

                    <!--7 Nom de l'entreprise-->
                    <div class="form-floating col-12 col-md-6 mt-3" id="companyContainer">
                        <label for="company" class="form-label">Nom de l'entreprise <span class="text-danger"> *</span></label>
                        <input type="text" name="company" id="company" placeholder="ex : " class="form-control <?= isset($formErrors['company']) ? 'is-invalid' : '' ?>" />
                        <small class="invalid-feedback"><?= @$formErrors['company'] ?></small>
                        <div id="messageCompany"></div>
                    </div>

                    <!--8 Type de produit-->
                    <div class="form-floating col-12 col-md-6 mt-3" id="typeOfProductContainer">
                        <label for="typeOfProduct" class="form-label">Type de produits<span class="text-danger"> *</span></label>
                        <input type="text" name="typeOfProduct" id="typeOfProduct" placeholder="ex : " class="form-control <?= isset($formErrors['typeOfProduct']) ? 'is-invalid' : '' ?>" />
                        <small class="invalid-feedback"><?= @$formErrors['typeOfProduct'] ?></small>
                        <div id="messagetypeOfProduct"></div>
                    </div>

                    <!--9 Photo de l'entreprise-->
                    <div class="form-floating col-12 col-md-6 mt-3" id="photoContainer">

                        <input class="form-control mt-2 <?= !isset($formErrors['photo']) ?: 'is-invalid' ?>" type="file" name="photo" id="photo" />
                        <small class="invalid-feedback"><?= @$formErrors['photo'] ?></small>
                        <label for="photo" class="form-label">Photo <span class="text-danger">*</label>
                    </div>

                </div>
                <div class="row">
                <button type="submit" class="btn colorb fw-bold mt-4 btnlev btnRegister ms-auto me-auto" value="Valider">Valider</button>
    <p class="text-center mt-2"><span class="text-danger">* </span>Champ obligatoire</p>
    <a href="index.php" class="text-center mt-2">Revenir a l'acceuil</a>
    </div>
            </form>
            
    </div>
    

    </form>
    </div>

    <!--Fin du formulaire-->

<?php } ?>
<script src="assets/js/cleave.min.js"></script>
<script src="assets/js/participationFormScript.js"></script>

<script>
    AOS.init();
</script>
<?php include 'includes/footer.php' ?>
</body>

</html>