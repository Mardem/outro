let trip = new Trip([
    {
        sel: $('#content-trip'),
        content: "Controle da ocorrência",
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
