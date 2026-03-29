const alertBox = document.getElementById("alerteUtilisateur");

if (sessionStorage.getItem("alertConnexionFaites") === null) {
    sessionStorage.setItem("alertConnexionFaites", "false");
}

if (sessionStorage.getItem("alertConnexionFaites") === "false") {
    setTimeout(() => {
        alertBox.classList.toggle("hidding");

        setTimeout(() => {
            alertBox.style.display = "none";
            sessionStorage.setItem("alertConnexionFaites", "true");
        }, 500);

    }, 5000);
}
else {
    alertBox.classList.toggle("hidding");
    alertBox.style.display = "none";
}