const contactForm = document.querySelector('.contact-form');
let name = document.getElementById('name');
let email = document.getElementById('email');
let subject = document.getElementById('subject');
let mensagem = document.getElementById('mensagem');

contactForm.addEventListener('submit', (e)=>{
    e.preventDefault();

    let formData = {
        name: name.value,
        email: email.value,
        subject: subject.value,
        mensagem: mensagem.value
    }

    let xhr = new XMLHttpRequest();
    xhr.open('POST', '/');
    xhr.setRequestHeader('content-type', 'application/json'); 
    xhr.onload = function(){
        console.log(xhr.responseText);
        if(xhr.responseText == 'Sucesso'){
            alert('Menssagem enviada');
            name.value = '';
            email.value = '';
            subject.value = '';
            mensagem.value = '';
        }else{
            alert('Algo deu errado')
        }
    }

    xhr.send(JSON.stringify(formData));
})