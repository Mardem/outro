    var Ziggy = {
        namedRoutes: {"debugbar.openhandler":{"uri":"_debugbar\/open","methods":["GET","HEAD"],"domain":null},"debugbar.clockwork":{"uri":"_debugbar\/clockwork\/{id}","methods":["GET","HEAD"],"domain":null},"debugbar.assets.css":{"uri":"_debugbar\/assets\/stylesheets","methods":["GET","HEAD"],"domain":null},"debugbar.assets.js":{"uri":"_debugbar\/assets\/javascript","methods":["GET","HEAD"],"domain":null},"debugbar.cache.delete":{"uri":"_debugbar\/cache\/{key}\/{tags?}","methods":["DELETE"],"domain":null},"api.login":{"uri":"api\/login","methods":["POST"],"domain":null},"jsonUsers":{"uri":"api\/users","methods":["GET","HEAD"],"domain":null},"jsonPartners":{"uri":"api\/partners","methods":["GET","HEAD"],"domain":null},"jsonOccurrencies":{"uri":"api\/occurrencies","methods":["GET","HEAD"],"domain":null},"partnersOperator":{"uri":"api\/partners-operator","methods":["GET","HEAD"],"domain":null},"jsonUsers2":{"uri":"api\/users-select2","methods":["GET","HEAD"],"domain":null},"operatorsSelect":{"uri":"api\/operator-select2","methods":["GET","HEAD"],"domain":null},"login":{"uri":"login","methods":["GET","HEAD"],"domain":null},"logout":{"uri":"logout","methods":["POST"],"domain":null},"register":{"uri":"register","methods":["GET","HEAD"],"domain":null},"password.request":{"uri":"password\/reset","methods":["GET","HEAD"],"domain":null},"password.email":{"uri":"password\/email","methods":["POST"],"domain":null},"password.reset":{"uri":"password\/reset\/{token}","methods":["GET","HEAD"],"domain":null},"password.update":{"uri":"password\/reset","methods":["POST"],"domain":null},"home":{"uri":"home","methods":["GET","HEAD"],"domain":null},"admin":{"uri":"admin\/home","methods":["GET","HEAD"],"domain":null},"token":{"uri":"admin\/token","methods":["GET","HEAD"],"domain":null},"updateToken":{"uri":"admin\/update-token","methods":["POST"],"domain":null},"search":{"uri":"admin\/pesquisa","methods":["POST"],"domain":null},"usuario.index":{"uri":"admin\/controle\/usuario","methods":["GET","HEAD"],"domain":null},"usuario.create":{"uri":"admin\/controle\/usuario\/create","methods":["GET","HEAD"],"domain":null},"usuario.store":{"uri":"admin\/controle\/usuario","methods":["POST"],"domain":null},"usuario.show":{"uri":"admin\/controle\/usuario\/{usuario}","methods":["GET","HEAD"],"domain":null},"usuario.edit":{"uri":"admin\/controle\/usuario\/{usuario}\/edit","methods":["GET","HEAD"],"domain":null},"usuario.update":{"uri":"admin\/controle\/usuario\/{usuario}","methods":["PUT","PATCH"],"domain":null},"usuario.destroy":{"uri":"admin\/controle\/usuario\/{usuario}","methods":["DELETE"],"domain":null},"relatorio.index":{"uri":"admin\/gerenciamento\/relatorio","methods":["GET","HEAD"],"domain":null},"relatorio.create":{"uri":"admin\/gerenciamento\/relatorio\/create","methods":["GET","HEAD"],"domain":null},"searchRelatorio":{"uri":"admin\/gerenciamento\/relatorio","methods":["POST"],"domain":null},"relatorio.show":{"uri":"admin\/gerenciamento\/relatorio\/{relatorio}","methods":["GET","HEAD"],"domain":null},"relatorio.edit":{"uri":"admin\/gerenciamento\/relatorio\/{relatorio}\/edit","methods":["GET","HEAD"],"domain":null},"relatorio.update":{"uri":"admin\/gerenciamento\/relatorio\/{relatorio}","methods":["PUT","PATCH"],"domain":null},"relatorio.destroy":{"uri":"admin\/gerenciamento\/relatorio\/{relatorio}","methods":["DELETE"],"domain":null},"socios.index":{"uri":"admin\/controle\/socios","methods":["GET","HEAD"],"domain":null},"socios.create":{"uri":"admin\/controle\/socios\/create","methods":["GET","HEAD"],"domain":null},"socios.store":{"uri":"admin\/controle\/socios","methods":["POST"],"domain":null},"socios.show":{"uri":"admin\/controle\/socios\/{socio}","methods":["GET","HEAD"],"domain":null},"socios.edit":{"uri":"admin\/controle\/socios\/{socio}\/edit","methods":["GET","HEAD"],"domain":null},"socios.update":{"uri":"admin\/controle\/socios\/{socio}","methods":["PUT","PATCH"],"domain":null},"socios.destroy":{"uri":"admin\/controle\/socios\/{socio}","methods":["DELETE"],"domain":null},"searchPartner":{"uri":"admin\/controle\/socios\/pesquisa","methods":["POST"],"domain":null},"saveObservation":{"uri":"admin\/controle\/socios\/observacao\/{socio}","methods":["PUT"],"domain":null},"ocorrencia.index":{"uri":"admin\/gerenciamento\/ocorrencia","methods":["GET","HEAD"],"domain":null},"ocorrencia.create":{"uri":"admin\/gerenciamento\/ocorrencia\/create","methods":["GET","HEAD"],"domain":null},"ocorrencia.store":{"uri":"admin\/gerenciamento\/ocorrencia","methods":["POST"],"domain":null},"ocorrencia.show":{"uri":"admin\/gerenciamento\/ocorrencia\/{ocorrencium}","methods":["GET","HEAD"],"domain":null},"ocorrencia.edit":{"uri":"admin\/gerenciamento\/ocorrencia\/{ocorrencium}\/edit","methods":["GET","HEAD"],"domain":null},"ocorrencia.update":{"uri":"admin\/gerenciamento\/ocorrencia\/{ocorrencium}","methods":["PUT","PATCH"],"domain":null},"ocorrencia.destroy":{"uri":"admin\/gerenciamento\/ocorrencia\/{ocorrencium}","methods":["DELETE"],"domain":null},"mensagem.index":{"uri":"admin\/gerenciamento\/mensagem","methods":["GET","HEAD"],"domain":null},"mensagem.create":{"uri":"admin\/gerenciamento\/mensagem\/create","methods":["GET","HEAD"],"domain":null},"mensagem.store":{"uri":"admin\/gerenciamento\/mensagem","methods":["POST"],"domain":null},"mensagem.show":{"uri":"admin\/gerenciamento\/mensagem\/{mensagem}","methods":["GET","HEAD"],"domain":null},"mensagem.edit":{"uri":"admin\/gerenciamento\/mensagem\/{mensagem}\/edit","methods":["GET","HEAD"],"domain":null},"mensagem.update":{"uri":"admin\/gerenciamento\/mensagem\/{mensagem}","methods":["PUT","PATCH"],"domain":null},"mensagem.destroy":{"uri":"admin\/gerenciamento\/mensagem\/{mensagem}","methods":["DELETE"],"domain":null},"updateNotification":{"uri":"admin\/gerenciamento\/update-notification\/{notification}","methods":["PUT"],"domain":null},"email.index":{"uri":"admin\/contato\/email","methods":["GET","HEAD"],"domain":null},"email.create":{"uri":"admin\/contato\/email\/create","methods":["GET","HEAD"],"domain":null},"email.store":{"uri":"admin\/contato\/email","methods":["POST"],"domain":null},"email.show":{"uri":"admin\/contato\/email\/{email}","methods":["GET","HEAD"],"domain":null},"email.edit":{"uri":"admin\/contato\/email\/{email}\/edit","methods":["GET","HEAD"],"domain":null},"email.update":{"uri":"admin\/contato\/email\/{email}","methods":["PUT","PATCH"],"domain":null},"email.destroy":{"uri":"admin\/contato\/email\/{email}","methods":["DELETE"],"domain":null},"sms.index":{"uri":"admin\/contato\/sms","methods":["GET","HEAD"],"domain":null},"sms.create":{"uri":"admin\/contato\/sms\/create","methods":["GET","HEAD"],"domain":null},"sms.store":{"uri":"admin\/contato\/sms","methods":["POST"],"domain":null},"sms.show":{"uri":"admin\/contato\/sms\/{sm}","methods":["GET","HEAD"],"domain":null},"sms.edit":{"uri":"admin\/contato\/sms\/{sm}\/edit","methods":["GET","HEAD"],"domain":null},"sms.update":{"uri":"admin\/contato\/sms\/{sm}","methods":["PUT","PATCH"],"domain":null},"sms.destroy":{"uri":"admin\/contato\/sms\/{sm}","methods":["DELETE"],"domain":null}},
        baseUrl: 'http://localhost/',
        baseProtocol: 'http',
        baseDomain: 'localhost',
        basePort: false,
        defaultParameters: []
    };

    if (typeof window.Ziggy !== 'undefined') {
        for (var name in window.Ziggy.namedRoutes) {
            Ziggy.namedRoutes[name] = window.Ziggy.namedRoutes[name];
        }
    }

    export {
        Ziggy
    }