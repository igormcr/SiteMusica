
function Login() {
  var done=0;
  var usuario = document.getElementsByName('usuario')[0].value;
  usuario=usuario.toLowerCase();
  var senha= document.getElementsByName('senha')[0].value;
  senha=senha.toLowerCase();
  var nomepai= document.getElementsByName('nomepai')[0].value;
  nomepai=nomepai.toLowerCase();
  var nomemae= document.getElementsByName('nomemae')[0].value;
  nomemae=nomemae.toLowerCase();
  var nomecao= document.getElementsByName('nomecao')[0].value;
  nomecao=nomecao.toLowerCase();
  
  var email= document.getElementsByName('email')[0].value;
  email=email.toLowerCase();
  
  if (usuario=="admin" && senha=="admin" && nomepai=="admin" && nomemae=="admin" && nomecao=="admin" && email=="admin@admin.com" ) {
    window.location="admin.html";
    done=1;
  }
  if (done==0) { alert("Dados incorretos, tente novamente"); }
}


