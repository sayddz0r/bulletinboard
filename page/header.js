(function (app) {
    app.Heder= {
        draw: function () {
            document.querySelector(".header")
                .append(document.createTextNode("МояОбъява.RU"))
        }
    }
})(AdsBoard);