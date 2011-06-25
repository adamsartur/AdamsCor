// JavaScript Document

$(function() {
	$('input:submit, input:button, input:file, .submit, .link').button();
});

/*
FUNCTION FOR VALIDATE FORMS
pra usar, use: onclick="MM_validateForm('campo','','valor');return document.MM_returnValue"
*/
function MM_validateForm() { //v4.0
  if (document.getElementById){
    var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
    for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=document.getElementById(args[i]);
      if (val) { nm=val.name; if ((val=val.value)!="") {
        if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
          if (p<1 || p==(val.length-1)) errors+='- '+nm+' precisa ser um endereco de e-mail valido.\n';
        } else if (test!='R') { num = parseFloat(val);
          if (isNaN(val)) errors+='- '+nm+' precisa conter apenas numeros.\n';
          if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
            min=test.substring(8,p); max=test.substring(p+1);
            if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
      } } } else if (test.charAt(0) == 'R') errors += '- Campo '+nm+' e obrigatorio\n'; }
    } if (errors) alert('Erros:\n\n'+errors);
    document.MM_returnValue = (errors == '');
} }


function cadastro_pessoa(tipo) {
	var erro  = 0;
	var nome  = $('#nome').val();
	var email = $('#email').val();
	var cpf   = $('#cpf').val();
	if(nome == '') {
		$('#nome-erro').html('Preencha o nome!');
		erro++;
	} else {
		$('#nome-erro').html('');	
	}
	if(email == '') {
		$('#email-erro').html('Preencha o email!');
		erro++;
	} else {
		$('#email-erro').html('');
	}
	if(tipo != 'editar') {
		var senha = $('#senha').val();
		if(senha == '') {
			$('#senha-erro').html('Preencha a senha!');	
			erro++;
		} else {
			$('#senha-erro').html('');	
		}
	}
	if(cpf == '') {
		$('#cpf-erro').html('Preencha o CPF!');	
		erro++;
	} else {
		$('#email-erro').html('	');	
	}
	
	if(erro == 0) {
		$('#cadastro-pessoa').submit();	
	}
}

function cadastro_aluno() {
	var matricula = $('#matricula').val();
	if(matricula == '') {
		$('#matricula-erro').html('Selecione o aluno!');
		return false;
	} else 
		$('#matricula-erro').html('');
	
	$('#cadastro-aluno').submit();
}

function excluir(url) {
	if(confirm("Deseja realmente excluir!?"))
		window.location = url;
}

function limpar_erros() {
	$('.erro').html('')	
}