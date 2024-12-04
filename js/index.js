document.addEventListener('DOMContentLoaded', function() {
    const passwordField = document.getElementById('password');
    const confirmPasswordField = document.getElementById('confirmPassword');
    const eyeIcon = document.getElementById('togglePassword');
    const eyeSlashIcon = document.getElementById('togglePasswordSlash');
    const eyeIconConfirm = document.getElementById('toggleConfirmPassword');
    const eyeSlashIconConfirm = document.getElementById('toggleConfirmPasswordSlash');

    function togglePasswordVisibility(field, eye, eyeSlash) {
        if (field.type === 'password') {
            field.type = 'text';
            eye.style.display = 'none';
            eyeSlash.style.display = 'inline';
        } else {
            field.type = 'password';
            eye.style.display = 'inline';
            eyeSlash.style.display = 'none';
        }
    }

    eyeIcon.addEventListener('click', function() {
        togglePasswordVisibility(passwordField, eyeIcon, eyeSlashIcon);
    });

    eyeSlashIcon.addEventListener('click', function() {
        togglePasswordVisibility(passwordField, eyeIcon, eyeSlashIcon);
    });

    eyeIconConfirm.addEventListener('click', function() {
        togglePasswordVisibility(confirmPasswordField, eyeIconConfirm, eyeSlashIconConfirm);
    });

    eyeSlashIconConfirm.addEventListener('click', function() {
        togglePasswordVisibility(confirmPasswordField, eyeIconConfirm, eyeSlashIconConfirm);
    });

    function validatePassword() {
        const length = document.getElementById('length');
        const uppercase = document.getElementById('uppercase');
        const lowercase = document.getElementById('lowercase');
        const number = document.getElementById('number');
        const special = document.getElementById('special');

        const passwordValue = passwordField.value;

        length.classList.toggle('valid', passwordValue.length >= 8 && passwordValue.length <= 15);
        length.classList.toggle('invalid', passwordValue.length < 8 || passwordValue.length > 15);

        uppercase.classList.toggle('valid', /[A-Z]/.test(passwordValue));
        uppercase.classList.toggle('invalid', !/[A-Z]/.test(passwordValue));

        lowercase.classList.toggle('valid', /[a-z]/.test(passwordValue));
        lowercase.classList.toggle('invalid', !/[a-z]/.test(passwordValue));

        number.classList.toggle('valid', /[0-9]/.test(passwordValue));
        number.classList.toggle('invalid', !/[0-9]/.test(passwordValue));

        special.classList.toggle('valid', /[!@#$%^&*(),.?":{}|<>]/.test(passwordValue));
        special.classList.toggle('invalid', !/[!@#$%^&*(),.?":{}|<>]/.test(passwordValue));
    }

    passwordField.addEventListener('input', validatePassword);

    // Função para validar o formulário de cadastro
    // Validação do formulário
function validateForm(event) {
    const passwordValue = passwordField.value;
    const confirmPasswordValue = confirmPasswordField.value;
    const emailValid = validateEmail(); // Chama a função de validação de e-mail

    // Verificar se a senha atende aos requisitos
    const isPasswordValid = passwordValue.length >= 8 && passwordValue.length <= 15
        && /[A-Z]/.test(passwordValue)
        && /[a-z]/.test(passwordValue)
        && /[0-9]/.test(passwordValue)
        && /[!@#$%^&*(),.?":{}|<>]/.test(passwordValue);

    // Verificar se as senhas coincidem
    const isConfirmPasswordValid = passwordValue === confirmPasswordValue;

    // Se as senhas ou o e-mail não forem válidos, mostrar um alerta e impedir o envio do formulário
    if (!isPasswordValid || !isConfirmPasswordValid || !emailValid) {
        event.preventDefault(); // Impede o envio do formulário
        Swal.fire({
            title: 'Erro',
            text: 'Verifique os campos de senha e e-mail. O e-mail deve ser do tipo "usuario@gmail.com".',
            icon: 'error',
            confirmButtonText: 'OK'
        });
    }
}

    

    // Adicionar o listener de submit no formulário
    const form = document.querySelector('form');
    form.addEventListener('submit', validateForm);

    // Função para o login com o Google
    gapi.load('auth2', function() {
        const auth2 = gapi.auth2.init({
            client_id: '795836589716-3avdsmk6r53a0sed11kh6jujj667ho1v.apps.googleusercontent.com',
        });

        const googleSignInBtn = document.getElementById('googleSignInBtn');
        if (googleSignInBtn) {
            googleSignInBtn.addEventListener('click', function() {
                auth2.signIn().then(function(googleUser) {
                    const id_token = googleUser.getAuthResponse().id_token;
                    
                    fetch('verify_google_token.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                        },
                        body: 'id_token=' + id_token,
                    }).then(response => response.json()).then(data => {
                        if (data.success) {
                            window.location.href = 'inicio.php';
                        } else {
                            Swal.fire({
                                title: 'Erro',
                                text: data.message,
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                        }
                    }).catch(error => {
                        Swal.fire({
                            title: 'Erro',
                            text: 'Erro ao autenticar com Google. Tente novamente.',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    });
                });
            });
        }
    });
});
function validateEmail() {
    const emailValue = document.getElementById('email').value;

    const emailPattern = /^[a-zA-Z0-9._%+-]+@gmail\.com$/;

    const emailValid = emailPattern.test(emailValue);

    const emailErrorElement = document.getElementById('emailError');
    if (!emailValid) {
        emailErrorElement.style.display = 'block'; 
    } else {
        emailErrorElement.style.display = 'none'; 
    }

    return emailValid;
}
