const alertBox = document.getElementById("alerteUtilisateur");

if (alertBox) {
    if (sessionStorage.getItem("alertConnexionFaites") === null) {
        sessionStorage.setItem("alertConnexionFaites", "false");
    }

    if (sessionStorage.getItem("alertConnexionFaites") === "false") {
        setTimeout(() => {
            alertBox.classList.add("hidding");

            setTimeout(() => {
                alertBox.style.display = "none";
                sessionStorage.setItem("alertConnexionFaites", "true");
            }, 500);

        }, 5000);
    } else {
        alertBox.style.display = "none";
    }
}

const ctx = document.getElementById('monGraphique');

if (ctx) {
    new Chart(ctx, {
        type: 'pie',
        data: {
            labels: labelsOS,
            datasets: [{
                label: 'OS',
                backgroundColor: ['#4e79a7', '#f28e2b', '#e15759', '#76b7b2'],
                data: dataOS
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });
}

const ctx2 = document.getElementById('monGraphique2');

if (ctx2) {
    new Chart(ctx2, {
        type: 'pie',
        data: {
            labels: labelsClient,
            datasets: [{
                label: 'Clients',
                backgroundColor: ['#59a14f', '#edc949', '#af7aa1', '#ff9da7'],
                data: dataClient
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });
}