function validateForm(form) {
    let inputs = Array.from(form.getElementsByTagName("input"));
    const textAreas = Array.from(form.getElementsByTagName("textArea"));
    const selects = Array.from(form.getElementsByTagName("select"));
    const buttons = Array.from(form.getElementsByTagName("button"));

    inputs = inputs.filter(function (input) {
        return input.required == true;
    });

    const allInputs = [...inputs, ...textAreas, ...selects];

    const submitButton = buttons.find(function (button) {
        return button.getAttribute("type") == "submit";
    });

    let allInputsAreValid = true;

    allInputs.forEach(function (input) {
        if (input.value == "") {
            allInputsAreValid = false;
            input.classList.add("is-invalid");
            input.classList.remove("is-valid");
        } else {
            input.classList.add("is-valid");
            input.classList.remove("is-invalid");
        }
    });

    if (allInputsAreValid) {
        submitButton.disabled = false;
    } else {
        submitButton.disabled = true;
    }
}