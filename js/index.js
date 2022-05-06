function init() {
    const Importe = document.getElementById("Importe");

    const Cantidad = document.getElementById("Cantidad");
    const Precio = document.getElementById("Precio");
    Cantidad.addEventListener("change", function(event) {
        calculate(Cantidad, Precio, Importe);
    }, true);
    Precio.addEventListener("change", function(event) {
        calculate(Cantidad, Precio, Importe);
    }, true);
}

function calculate(Cantidad, Precio, Importe) {
    Importe.value = Number(Precio.value * Cantidad.value);
}

function validSession() {
    const navMenus = document.getElementById("nav-menus");
    const navSesion = document.getElementById("nav-sesion");
    const bodyFunctions = document.getElementById("body-functions");
    const bodySession = document.getElementById("body-session");
    const SessionID = localStorage.getItem('idUsert');
    if (SessionID) {
        navMenus.classList.remove("d-none");
        bodyFunctions.classList.remove("d-none");
    } else {
        bodySession.classList.remove("d-none");
        navSesion.classList.remove("d-none");
    }
}

function validTypeUser() {
    const typeUsert = localStorage.getItem('typeUsert');
    const elements = document.getElementsByClassName("functions-admin");
    const tagIva = document.getElementById("tag-iva");
    const tagProveedores = document.getElementById("tag-proveedores");
    if (typeUsert === "1") {
        tagIva.classList.remove("d-none");
        tagProveedores.classList.remove("d-none");
        for (let index = 0; index < elements.length; index++) {
            elements[index].classList.remove("d-none");
        }
    }

}

function closeSession() {
    localStorage.removeItem('typeUsert');
    localStorage.removeItem('idUsert');
}