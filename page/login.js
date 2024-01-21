(function (app) {
    app.PageLogin = {
            draw: function () {


                let loginFormDiv                  = createLoginForm();
                let emailField                   = createEmailField();
                let emailDivText                  = createEmailText();
                let passwordField                = createPasswordField();
                let passwordDivText                = createPasswordDivText();
                let loginButton                 = createLoginButton();
                let registerButton              = createRegisterButton();

                let content = document.querySelector(".content");
                content.append(loginFormDiv,emailField, emailDivText, passwordField, passwordDivText, loginButton, registerButton);
            }
        }

        function createLoginForm() {
            let loginFormDiv=document.createElement("div");
            loginFormDiv.append(document.createTextNode("Вход"));
            loginFormDiv.classList.add("formLogin");
            return loginFormDiv;
        }
        function createEmailField() {
        // let emailDiv=document.createElement("div");
        let emailField = document.createElement("input");
        emailField.classList.add("emailField");
        return emailField
        }

        function createEmailText() {
        let emailDivText=document.createElement("div");
        emailDivText.classList.add("Email");
        emailDivText.innerHTML="Email";
        return emailDivText;
        }

        function createPasswordField() {
            let passwordField = document.createElement("input");
            passwordField.classList.add("passwordField");
            return passwordField;
        }

        function createPasswordDivText() {
            let passwordDivText=document.createElement("div");
            passwordDivText.innerHTML="Пароль";
            passwordDivText.classList.add("passwordText")
            return passwordDivText;
        }
        function createLoginButton() {
            let loginButton=document.createElement("button");
            loginButton.classList.add("loginButton", "button");
            loginButton.append(document.createTextNode("Войти"));
            loginButton.addEventListener("click", goToLogin);
            return loginButton;
        }
        function createRegisterButton() {
            let registerButton=document.createElement("button");
            registerButton.classList.add("registerButton", "button");
            registerButton.append(document.createTextNode("Зарегистрироваться"));
            registerButton.addEventListener("click", goToRegister);
            return registerButton;
        }

        function goToRegister() {
            document.querySelector(".content").innerHTML = "";
            app.PageRegister.draw();
        }

        function goToLogin() {
            document.querySelector(".content").innerHTML = "";
            app.LoginIn.draw();
        }


    })(AdsBoard);


