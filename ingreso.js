document.addEventListener('DOMContentLoaded', function () {
    var accordions = document.getElementsByClassName("accordion");

    for (var i = 0; i < accordions.length; i++) {
        accordions[i].addEventListener("click", function () {
            this.classList.toggle("active");
            var panel = this.nextElementSibling;

            if (panel.classList.contains("show")) {
                panel.classList.remove("show"); // Oculta el panel
            } else {
                panel.classList.add("show"); // Muestra el panel
            }
        });
    }
});

