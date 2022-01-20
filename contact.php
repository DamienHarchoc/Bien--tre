<?php
include 'includes/header.php';
require_once 'controllers/contactController.php';
?>
<!--Formulaire de contact-->
<div class="registrationForm col-10 col-md-8 shadow ms-auto me-auto p-5 m-5 rounded">
    <div class="title">
        <h1 class="text-center mb-2">Contactez-nous</h1>
    </div>
    <?php if (count($_POST) == 0 || count($formErrors) > 0) { ?>
        <form action="contact.php" method="POST">

            <div class="row">
                <div class="form-floating col-12 col-md-6 mt-3">
                    <input type="text" name="email" id="email" placeholder="Entrez votre adresse mail" class="form-control <?= isset($formErrors['email']) ? 'is-invalid' : ''; ?>">
                    <label for="email">Entrez votre adresse mail</label>
                    <div id="messageEmail"></div>
                    <small class="invalid-feedback">
                        <?= @$formErrors['email']  ?>
                    </small>
                </div>
                <div class="form-floating col-12 col-md-6 mt-3">
                    <select name="category" id="category" class="form-select <?= isset($formErrors['category']) ? 'is-invalid' : ''; ?>">
                        <option disabled selected>Choisissez votre catégorie</option>
                        <option value="Exposant">Exposant</option>
                        <option value="Visiteur">Visiteur</option>
                    </select>
                    <small class="invalid-feedback">
                        <?= @$formErrors['category'] ?>
                    </small>
                    <label for="category">Catégorie</label>
                </div>

                <div class="form-floating col-12 col-md-6 mt-3">
                    <input type="text" name="subject" id="subject" placeholder="Entrez votre sujet" class="form-control <?= isset($formErrors['subject']) ? 'is-invalid' : ''; ?>">
                    <label for="subject">Entrez votre sujet</label>
                    <div id="messageSubject"></div>
                    <small class="invalid-feedback">
                        <?= @$formErrors['subject']  ?>
                    </small>
                </div>

                <div class="contactForm form-floating col-md-12 mt-3">
                    <textarea type="text" name="message" id="message" placeholder="Entrer votre message" class="form-control <?= isset($formErrors['message']) ? 'is-invalid' : ''; ?>"></textarea>
                    <label for="message">Entrez votre message</label>
                    <small class="invalid-feedback">
                        <?= @$formErrors['message'] ?>
                    </small>
                </div>

                <button type="submit" class="btn colorb fw-bold mt-4 btnlev btnRegister ms-auto me-auto">Envoyer</button>
                <a href="index.php" class="text-center mt-3">Revenir a l'acceuil</a>
            </div>
</div>
</form>
<?php } ?>
</div>
<script src="assets/js/Script.js"></script>
<?php include 'includes/footer.php' ?>