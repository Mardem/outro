let trip = new Trip([
    {
        sel: $('#expose'),
        content: "Controle do sócio",
        position: "n",
        expose: true
    }
], {
    delay: -1,
    enableKeyBinding: false
});
$(document).ready(function () {
    trip.start();
});