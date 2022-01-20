/*
* 1 Vérification du prénom du participant
*/
firstName.onchange = () => {
    if (firstName.value.match(/^[a-zA-Z\- 'À-ÖØ-öø-ÿ]+$/)) {
        messageFirstName.innerHTML = '<p class="validated"> Correct : Le prénom est valide</p>';
    } else {
        messageFirstName.innerHTML = '<p class="invalidated">Incorrect : Veuillez utiliser seulement des lettres en majuscule ou minuscule </p>';
    }
}

/*
* 2 Vérification du nom du participant
*/
lastName.onchange = () => {
    if (lastName.value.match(/^[a-zA-Z\- 'À-ÖØ-öø-ÿ]+$/)) {
        messageLastName.innerHTML = '<p class="validated"> Correct : Le nom est valide</p>';
    } else {
        messageLastName.innerHTML = '<p class="invalidated">Incorrect : Veuillez utiliser seulement des lettres en majuscule ou minuscule </p>';
    }
}

/*
* 3 Vérification de l'email du participant
*/
email.onchange = () => {
    if (email.value.match(/^([0-9a-z\-_.]+){1}(@){1}([a-z.\-]+){1}$/)) {
        messageEmail.innerHTML = '<p class="validated">Correct : L\'email est valide</p>';
    } else {
        messageEmail.innerHTML = '<p class="invalidated">Incorrect : Merci de vérifier le format de votre adresse email </p>';
    }
}

/*
* 4 Vérification du numéro de téléphone du participant
*/
phoneNumber.onchange = () => {
    if (phoneNumber.value.match(/^[0]{1}[1-79]{1}([ ]{1}[0-9]{2}){4}$/)) {
        messagePhone.innerHTML = '<p class="validated"> Correct : Le numéro de téléphone est valide</p>';
    } else {
        messagePhone.innerHTML = '<p class="invalidated">Incorrect : Veuillez utiliser seulement des chiffres </p>';
    }
}

let cleave = new Cleave('#phoneNumber', {
    delimiters: [' '],
    blocks: [2, 2, 2, 2, 2]
});

/*
* 5 Vérification du nom de l'entreprise
*/
company.onchange = () => {
    if (company.value.match(/^[0-9a-zA-Z\- 'À-ÖØ-öø-ÿ]+$/)) {
        messageCompany.innerHTML = '<p class="validated"> Correct : Le nom de l\'entreprise est valide</p>';
    } else {
        messageCompany.innerHTML = '<p class="invalidated">Incorrect : Le nom de l\'entreprise est invalide </p>';
    }
}

/*
* 6 Vérification du nom de l'entreprise
*/
typeOfProduct.onchange = () => {
    if (typeOfProduct.value.match(/^[0-9a-zA-Z\- 'À-ÖØ-öø-ÿ]+$/)) {
        messagetypeOfProduct.innerHTML = '<p class="validated"> Correct : Le nom de votre produit est valide</p>';
    } else {
        messagetypeOfProduct.innerHTML = '<p class="invalidated">Incorrect : Le nom de votre produit est invalide </p>';
    }
}

participantChoice.onchange = () => {
    if (participantChoice.value == 'Exposant') {
        companyContainer.style.display = 'block';
        typeOfProductContainer.style.display = 'block';
        photoContainer.style.display = 'block';

    }
    else {
        companyContainer.style.display = 'none';
        typeOfProductContainer.style.display = 'none';
        photoContainer.style.display = 'none';
    }
}
window.onload = () => {
    companyContainer.style.display = 'none';
    typeOfProductContainer.style.display = 'none';
    photoContainer.style.display = 'none';

}
