
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
function validSession() {debugger
    const navMenus = document.getElementById("nav-menus");
    const navSesion = document.getElementById("nav-sesion");
    const bodyFunctions = document.getElementById("body-functions");
    const bodySession = document.getElementById("body-session");
    const SessionID = localStorage.getItem('idUsert')
    if(SessionID){
        navMenus.classList.remove("d-none");
        bodyFunctions.classList.remove("d-none");
    }
    else{
        bodySession.classList.remove("d-none");
        navSesion.classList.remove("d-none");
    }
}
function closeSession() {
    localStorage.removeItem('typeUsert');
    localStorage.removeItem('idUsert');
}
