clearForm = (form, prof_selec) => setTimeout(() => {form.reset(); prof_selec.style.color = "transparent";}, 50);

function init() {
    const prof_selec = document.querySelector(".profile");
    const submit = document.querySelector(".submit");
    const form = document.querySelector(".form");

    prof_selec.onchange = () => prof_selec.value != "" ? prof_selec.style.color = "black" : null;
    submit.addEventListener('click', () => clearForm(form, prof_selec));
}

window.onload = () => init();