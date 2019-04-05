function getPartners(uriLogin, uriPartners) {
    axios.post(uriLogin, {
        email: localStorage.email,
        password: localStorage.password
    }).then(function (response) {
        // handle success
        $('#partner_id').select2({
            language: "pt-br",
            ajax: {
                headers: {
                    "Authorization": "Bearer " + response.data.token,
                    "Content-Type": "application/json",
                },
                url: uriPartners,
                data: function (params) {
                    return {
                        socio: params.term
                    }
                },
                processResults: function (data) {
                    return {
                        results: data.map(function (socio) {
                            return {id: socio.id, text: socio.nome, user_id: socio.user_id}
                        })
                    }
                }
            }
        }).on('select2:select', function (e) {
            let data = e.params.data;
            $('#userIDSelect').val(data.user_id);
        });

    }).catch(function (error) {
        // handle error
        console.log(error);
    });
}