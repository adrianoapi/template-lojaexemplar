function valida(){
    
    var result   = true;
    var name     = $("input[name=name]"      ).val();
    var email    = $("input[name=email]"     ).val();
    var telefone = $("input[name=telefone]"  ).val();
    var mensagem = $("textarea[name=message]").val();
    
    if(name.length < 3 || email.length < 8 || telefone < 8 || mensagem < 5){
        result = false;
    }
    
    return result;    
}