document.addEventListener("DOMContentLoaded", function () {
    let form = document.querySelector("form");

    form.addEventListener("submit", function (event) {
        let requiredFields = document.querySelectorAll("input[required], select[required]");
        let isValid = true;

        requiredFields.forEach(field => {
            if (!field.value.trim()) {
                isValid = false;
                field.style.border = "1px solid red";
            } else {
                field.style.border = "1px solid #a3d1a3";
            }
        });

        if (!isValid) {
            event.preventDefault();
            alert("Please fill in all required fields.");
        }
    });
});
