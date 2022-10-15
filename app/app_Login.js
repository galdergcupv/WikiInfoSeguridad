/* NAVBAR */
const menu = document.querySelector('#mobile-menu')
const menuLinks = document.querySelector('.navbar__menu')

menu.addEventListener('click', function() {
    menu.classList.toggle('is-active');
    menuLinks.classList.toggle('active');
});

/* MAIN */
function setFormMessage(formElement, type, message) {
    const messageElement = formElement.querySelector(".form__message");

    messageElement.textContent = message;
    messageElement.classList.remove("form__message--success", "form__message--error");
    messageElement.classList.add(`form__message--${type}`);
}

function setInputError(inputElement, message) {
    inputElement.classList.add("form__input--error");
    inputElement.parentElement.querySelector(".form__input-error-message").textContent = message;
}

function clearInputError(inputElement) {
    inputElement.classList.remove("form__input--error");
    inputElement.parentElement.querySelector(".form__input-error-message").textContent = "";
}

function isValidDate(dateString)
{
    // First check for the pattern
    if(!/^\d{4}\-\d{1,2}\-\d{1,2}$/.test(dateString))
        return false;

    // Parse the date parts to integers
    var parts = dateString.split("-");
    var day = parseInt(parts[2], 10);
    var month = parseInt(parts[1], 10);
    var year = parseInt(parts[0], 10);

    // Check the ranges of month and year
    if(year < 1000 || year > 3000 || month == 0 || month > 12)
        return false;

    var monthLength = [ 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31 ];

    // Adjust for leap years
    if(year % 400 == 0 || (year % 100 != 0 && year % 4 == 0))
        monthLength[1] = 29;

    // Check the range of the day
    return day > 0 && day <= monthLength[month - 1];
};

function validateDNI(dni) {
    var numero, let, letra;
    var expresion_regular_dni = /^[XYZ]?\d{5,8}-[A-Z]$/;

    dni = dni.toUpperCase();

    if(expresion_regular_dni.test(dni) === true){
        numero = dni.substr(0,dni.length-2);
        numero = numero.replace('X', 0);
        numero = numero.replace('Y', 1);
        numero = numero.replace('Z', 2);
        let = dni.substr(dni.length-1, 1);
        numero = numero % 23;
        letra = 'TRWAGMYFPDXBNJZSQVHLCKET';
        letra = letra.substring(numero, numero+1);
        if (letra != let) {
            //alert('Dni erroneo, la letra del NIF no se corresponde');
            return false;
        }else{
            //alert('Dni correcto');
            return true;
        }
    }else{
        //alert('Dni erroneo, formato no válido');
        return false;
    }
}

document.addEventListener("DOMContentLoaded", () => {
    const loginForm = document.querySelector("#login");
    const createAccountForm = document.querySelector("#createAccount");

    document.querySelector("#linkCreateAccount").addEventListener("click", e => {
        e.preventDefault();
        loginForm.classList.add("form--hidden");
        createAccountForm.classList.remove("form--hidden");
    });

    document.querySelector("#linkLogin").addEventListener("click", e => {
        e.preventDefault();
        loginForm.classList.remove("form--hidden");
        createAccountForm.classList.add("form--hidden");
    });

    /* loginForm.addEventListener("submit", e => {
        e.preventDefault();

        //Perform your AJAX/Fetch login

        setFormMessage(loginForm, "error", "Usuario o contraseña incorrectos");
    }); */

    document.querySelectorAll(".form__input").forEach(inputElement => {
        inputElement.addEventListener("blur", e => {
            if (e.target.id === "signupNombre" && e.target.value.length > 0 && !/^[a-zA-Z]+$/.test(e.target.value)) {
                setInputError(inputElement, "El nombre solo puede contener texto (sin tíldes ni espacios)");
            };
        });

        inputElement.addEventListener("blur", e => {
            if (e.target.id === "signupApellidos" && e.target.value.length > 0 && !/^[A-Za-z\s]*$/.test(e.target.value)) {
                setInputError(inputElement, "Los apellidos solo pueden contener texto (sin tíldes)");
            };
        });

        inputElement.addEventListener("blur", e => {
            if (e.target.id === "signupDNI" && e.target.value.length > 0 && !validateDNI(e.target.value)) {
                setInputError(inputElement, "El DNI no es correcto, comprueba que el formato (12345678-A) y la letra son válidos");
            };
        });

        inputElement.addEventListener("blur", e => {
            if (e.target.id === "signupTel" && e.target.value.length > 0 && (e.target.value.length != 9 || /[a-z]/i.test(e.target.value))) {
                setInputError(inputElement, "El teléfono tiene que ser 9 dígitos");
            };
        });

        inputElement.addEventListener("blur", e => {
            if (e.target.id === "signupFecha" && e.target.value.length > 0 && !isValidDate(e.target.value)) {
                setInputError(inputElement, "Introduce una fecha válida (por ejemplo: 1999-08-26) aaaa-mm-dd");
            };
        });

        inputElement.addEventListener("blur", e => {
            if (e.target.id === "signupEmail" && e.target.value.length > 0 && !/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/.test(e.target.value)) {
                setInputError(inputElement, "Introduce un email válido (por ejemplo: ejemplo@servidor.extensión)");
            };
        });


        inputElement.addEventListener("input", e => {
            clearInputError(inputElement);
        });
    });
});
