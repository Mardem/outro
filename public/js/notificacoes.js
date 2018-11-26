function notificacoes(nome = "", data = "") {
    iziToast.show({
        timeout: "20000",
        title: 'Lembrete para',
        titleColor: '#FFC300',
        message: 'entrar em contato com ' + nome + ' às ' + data,
        backgroundColor: '#BF0A0A',
        messageColor: '#fff',
        progressBarColor: '#FFC300',
        position: 'topRight',
        close: true,
        overlay: true,
        pauseOnHover: true,
    });
}

function mostrar() {
    let s = document.getElementById("situacao").value;
    if (s == 3) {
        document.getElementById("data_hora").style.display = 'block';
    }
    else if (s != 3) {
        document.getElementById("data_hora").style.display = 'none';
    }
}