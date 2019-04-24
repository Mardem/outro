$(document).ready(function () {
    let form = document.querySelector('#formImage');
    let btnSumit = document.querySelector('#submit');
    let files = document.querySelector('#files');

    files.addEventListener('change', function (e) {

        let data = 0;
        for (let i = 0; i < this.files.length; i++) {
            data += this.files[i].size;
        }

        if (data > 6250000) {

            swal({
                title: "Ops...",
                text: "Os arquivos são maiores que o permitido. Até 5MB é permitido.",
                icon: "error"
            });

            this.value = "";
        }
    });

    form.addEventListener('submit', function () {
        btnSumit.disabled = true;
        swal({
            title: "Okay!",
            text: "Aguarde enquanto suas imagens são enviadas.",
            icon: "success"
        });
    });
});
