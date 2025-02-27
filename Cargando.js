document.addEventListener("DOMContentLoaded", function () {
    const idUsuario = sessionStorage.getItem("id_usuario");

    if (!idUsuario) {
        console.error("ID de usuario no encontrado en sessionStorage.");
        return;
    }

    function verificarPermiso() {
        fetch(`verificar_estado.php?id_usuario=${idUsuario}`)
        .then(response => response.text())
        .then(data => {
            if (data.trim() === "ok") {
                window.location.href = "Token.html"; // Redirige cuando se aprueba
            }
        })
        .catch(error => console.error("Error verificando estado:", error));
    }

    setInterval(verificarPermiso, 3000);
});
