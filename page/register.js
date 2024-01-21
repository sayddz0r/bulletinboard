(function (app) {
    app.PageRegister = {
        draw: function () {

            let registerFormDiv = createRegisterForm();
            let emailRegField = createEmailRegField();
            let emailRegDivText = createEmailDivText();
            let phoneRegField = createPhoneRegField();
            let phoneRegDivText = createPhoneRegDivText();
            let nameUserRegField = createNameUserReg();
            let nameUserRegDivText = createNameUserRegDivText();
            let passwordRegField = createPasswordRegField();
            let passwordRegDivText = createPasswordRegDivText();
            let repeatPasswordRegField = createRepeatPasswordRegField();
            let repeatPasswordRegDivText = createrepeatPasswordDivText();
            let registerButton = createRegisterButton();
            let loginButton = createLoginButton();

            let content = document.querySelector(".content");
            content.append(registerFormDiv, emailRegField, emailRegDivText, phoneRegField, phoneRegDivText, nameUserRegField, nameUserRegDivText, passwordRegField, passwordRegDivText,
                repeatPasswordRegField, repeatPasswordRegDivText, registerButton, loginButton);
        }
    }

    function createRegisterForm() {
        let registerFormDiv = document.createElement("div");
        registerFormDiv.append(document.createTextNode("Регистрация"));
        registerFormDiv.classList.add("formRegister");
        return registerFormDiv;
    }

    function createEmailRegField() {
        let emailRegField = document.createElement("input");
        emailRegField.classList.add("emailReg");
        return emailRegField;
    }

    function createEmailDivText() {
        let emailRegDivText = document.createElement("div");
        emailRegDivText.classList.add("emailRegText");
        emailRegDivText.innerHTML = "E-mail";
        return emailRegDivText;
    }

    function createPhoneRegField() {
        let phoneRegField = document.createElement("input");
        phoneRegField.classList.add("phoneReg");
        return phoneRegField;
    }

    function createPhoneRegDivText() {
        let phoneRegDivText = document.createElement("div");
        phoneRegDivText.classList.add("phoneRegText");
        phoneRegDivText.innerHTML = "Телефон";
        return phoneRegDivText;
    }

    function createNameUserReg() {
        let nameUserRegField = document.createElement("input");
        nameUserRegField.classList.add("nameUserReg");
        return nameUserRegField;
    }

    function createNameUserRegDivText() {
        let nameUserRegDivText = document.createElement("div");
        nameUserRegDivText.classList.add("nameUserRegText");
        nameUserRegDivText.innerHTML = "ФИО";
        return nameUserRegDivText;
    }

    function createPasswordRegField() {
        let passwordRegField = document.createElement("input");
        passwordRegField.classList.add("passwordReg");
        return passwordRegField;
    }

    function createPasswordRegDivText() {
        let passwordRegDivText = document.createElement("div");
        passwordRegDivText.classList.add("passwordRegText");
        passwordRegDivText.innerHTML = "Пароль";
        return passwordRegDivText;
    }

    function createRepeatPasswordRegField() {
        let repeatPasswordRegField = document.createElement("input");
        repeatPasswordRegField.classList.add("repeatPasswordReg");
        return repeatPasswordRegField;
    }

    function createrepeatPasswordDivText() {
        let repeatPasswordRegDivText = document.createElement("div");
        repeatPasswordRegDivText.classList.add("repeatPasswordRegText");
        repeatPasswordRegDivText.innerHTML = "Подтверждение пароля";
        return repeatPasswordRegDivText;
    }

    function createRegisterButton() {
        let registerButton = document.createElement("button");
        registerButton.classList.add("registerButton", "button");
        registerButton.append(document.createTextNode("Зарегистрироваться"));
        registerButton.addEventListener("click", goToFullRegister);
        return registerButton;
    }

    function createLoginButton() {
        let loginButton = document.createElement("button");
        loginButton.classList.add("loginButton", "button");
        loginButton.append(document.createTextNode("Войти"));
        loginButton.addEventListener("click", goToLogin);
        return loginButton;
    }
    function goToFullRegister() {
        document.querySelector(".content").innerHTML = "";
        app.RegistrationSuccessful.draw();
    }
    function goToLogin() {
        document.querySelector(".content").innerHTML = "";
        app.PageLogin.draw();
    }

})(AdsBoard);