function valida(){

    var name     = $("input[name=name]"      ).val();
    var email    = $("input[name=email]"     ).val();
    var telefone = $("input[name=telefone]"  ).val();
    var mensagem = $("textarea[name=message]").val();
    
    if(name.length < 3 || email.length < 8 || telefone < 8 || mensagem < 5){
        false;
    }
	
	//e-mail
    var exclude=/[^@\-\.\w]|^[_@\.\-]|[\._\-]{2}|[@\.]{2}|(@)[^@]*\1/;
    var check=/@[\w\-]+\./;
    var checkend=/\.[a-zA-Z]{2,3}$/;
    if(((email.search(exclude) != -1)||(email.search(check)) == -1)||(email.search(checkend) == -1)){return false;}
    else {return true;}
    
    return true;    
}