
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
    debugger
    Importe.value = Number(Precio.value * Cantidad.value);
}
