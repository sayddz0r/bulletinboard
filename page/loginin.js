(function (app) {
    app.LoginIn = {
        draw: function () {
            let content = document.querySelector(".content");

            let text = document.createTextNode("Вы вошли");

            content.append(text);
        }
    }
})(AdsBoard);