subject.onchange = () => {
    if(subject.value.match(/^[0-9a-zA-Z- \'À-ÖØ-öø-ÿ]+$/)) {
        messageSubject.innerHTML = '<p class="validated"> Le sujet est correct </p>';
    } else {
        messageSubject.innerHTML ='<p class="invalidated"> Le sujet est incorrect </p>';
    }
}

email.onchange = () => {
    if(email.value.match(/^([0-9a-z-_.]+){1}(@){1}([a-z.-]+){1}$/)) {
        messageEmail.innerHTML = '<p class="validated"> Le mail est correct </p>';
    } else {
        messageEmail.innerHTML ='<p class="invalidated"> Le mail est incorrect </p>';
    }
}

