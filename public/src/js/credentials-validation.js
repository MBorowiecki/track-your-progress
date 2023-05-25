const form = document.querySelector('form');
const email = form.querySelector('input[name=email]');
const password = form.querySelector('input[name=password]');
const username = form.querySelector('input[name=username]');
const emailError = form.querySelector('#email-error');
const passwordError = form.querySelector('#password-error');
const usernameError = form.querySelector('#username-error');

const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
const minPasswordLength = 8;
const maxUsernameLength = 20;

let emailTimeout = null;
let passwordTimeout = null;
let usernameTimeout = null;

const shouldValidate = (element) => {
    return element.classList.contains('validate');
}

email.addEventListener('input', () => {
    clearTimeout(emailTimeout);
    hideEmailError();
    emailTimeout = setTimeout(() => {
        emailValidation();
    }, 200);
});

if(shouldValidate(password)) {
    password.addEventListener('input', () => {
        clearTimeout(passwordTimeout);
        hidePasswordError();
        passwordTimeout = setTimeout(() => {
            passwordValidation();
        }, 200);
    });  
}

if(shouldValidate(username)) {
    username.addEventListener('input', () => {
        clearTimeout(usernameTimeout);
        hideUsernameError();
        usernameTimeout = setTimeout(() => {
            usernameValidation();
        }, 200);
    });
}

form.addEventListener('submit', (event) => {
    event.preventDefault();
    emailValidation();
    if(shouldValidate(password))
        passwordValidation();
    if (!email.classList.contains('error') && !password.classList.contains('error')) {
        form.submit();
    }
});

const emailValidation = () => {
    if (emailRegex.test(email.value)) {
        hideEmailError();
    } else {
        showEmailError('Invalid email address');
    }
};

const showEmailError = (message) => {
    email.classList.add('error');
    emailError.classList.remove('close');
    emailError.innerHTML = message;
}

const hideEmailError = () => {
    email.classList.remove('error');
    emailError.classList.add('close');
}

const passwordValidation = () => {
    if (password.value.length >= minPasswordLength) {
        hidePasswordError();
    } else {
        showPasswordError('Length must be at least 8 characters');
    }
}

const showPasswordError = (message) => {
    password.classList.add('error');
    passwordError.classList.remove('close');
    passwordError.innerHTML = message;
}

const hidePasswordError = () => {
    password.classList.remove('error');
    passwordError.classList.add('close');
}

const usernameValidation = () => {
    if (username.value.length <= maxUsernameLength && username.value.length > 0) {
        hideUsernameError();
    } else {
        showUsernameError('Length is required and must be at most 20 characters');
    }
}

const showUsernameError = (message) => {
    username.classList.add('error');
    usernameError.classList.remove('close');
    usernameError.innerHTML = message;
}

const hideUsernameError = () => {
    username.classList.remove('error');
    usernameError.classList.add('close');
}