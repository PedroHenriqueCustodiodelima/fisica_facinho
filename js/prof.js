document.addEventListener("DOMContentLoaded", function() {
    const password = document.getElementById('password');
    const confirmPassword = document.getElementById('confirmPassword');
    const togglePassword = document.getElementById('togglePassword');
    const togglePasswordSlash = document.getElementById('togglePasswordSlash');
    const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
    const toggleConfirmPasswordSlash = document.getElementById('toggleConfirmPasswordSlash');

    function togglePasswordVisibility() {
        if (password.type === 'password') {
            password.type = 'text';
            togglePassword.style.display = 'none';
            togglePasswordSlash.style.display = 'block';
        } else {
            password.type = 'password';
            togglePassword.style.display = 'block';
            togglePasswordSlash.style.display = 'none';
        }
    }

    function toggleConfirmPasswordVisibility() {
        if (confirmPassword.type === 'password') {
            confirmPassword.type = 'text';
            toggleConfirmPassword.style.display = 'none';
            toggleConfirmPasswordSlash.style.display = 'block';
        } else {
            confirmPassword.type = 'password';
            toggleConfirmPassword.style.display = 'block';
            toggleConfirmPasswordSlash.style.display = 'none';
        }
    }

    togglePassword.addEventListener('click', togglePasswordVisibility);
    togglePasswordSlash.addEventListener('click', togglePasswordVisibility);
    toggleConfirmPassword.addEventListener('click', toggleConfirmPasswordVisibility);
    toggleConfirmPasswordSlash.addEventListener('click', toggleConfirmPasswordVisibility);

    function validatePassword() {
        const length = document.getElementById('length');
        const uppercase = document.getElementById('uppercase');
        const lowercase = document.getElementById('lowercase');
        const number = document.getElementById('number');
        const special = document.getElementById('special');

        const passwordValue = password.value;

        length.classList.toggle('valid', passwordValue.length >= 8);
        length.classList.toggle('invalid', passwordValue.length < 8);

        uppercase.classList.toggle('valid', /[A-Z]/.test(passwordValue));
        uppercase.classList.toggle('invalid', !/[A-Z]/.test(passwordValue));

        lowercase.classList.toggle('valid', /[a-z]/.test(passwordValue));
        lowercase.classList.toggle('invalid', !/[a-z]/.test(passwordValue));

        number.classList.toggle('valid', /[0-9]/.test(passwordValue));
        number.classList.toggle('invalid', !/[0-9]/.test(passwordValue));

        special.classList.toggle('valid', /[!@#$%^&*(),.?":{}|<>]/.test(passwordValue));
        special.classList.toggle('invalid', !/[!@#$%^&*(),.?":{}|<>]/.test(passwordValue));
    }

    password.addEventListener('input', validatePassword);

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
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({ id_token: id_token })
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

