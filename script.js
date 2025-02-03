console.log("Starting");

const table = document.getElementById("table");
const tbody = table.getElementsByTagName("tbody")[0]; // Sélectionner le premier tbody (index 0)

// Fonction pour mettre à jour la largeur du tbody
function updateTbodyWidth() {
    tbody.style.width = table.offsetWidth + 5 + "px"; // Appliquer la largeur de la table au tbody
}

// Appeler la fonction lors du démarrage
updateTbodyWidth();

// Mettre à jour la largeur du tbody à chaque fois que la fenêtre change de taille
window.addEventListener("resize", updateTbodyWidth);
