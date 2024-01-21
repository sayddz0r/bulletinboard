(function (app) {
    app.RegistrationSuccessful = {
        draw: function () {
            let content = document.querySelector(".content");

            let text = document.createTextNode("Регистрация прошла успешно");

            content.append(text);
        }
    }
})(AdsBoard);