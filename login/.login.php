<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php $tabindex = 1; ?>
<head>
	<?php header("Content-Type: text/html;  charset=ISO-8859-1",true); ?>
    <title>Sistema de Administra&ccedil;&atilde;o</title>
	<style type="text/css">
		/* CSS RESET */
		html, body, ul, li, form, fieldset, legend { margin:0; padding:0; }
		html, body, textarea { overflow:auto; }
		html, body { height:100%; width:100%; }
		h1, h2, h3, h4, h5, h6, p { margin:0; font-weight:normal; }
		img { border:0; }
		table { border-collapse:collapse; border-spacing:0; }
		th, td { text-align:left; vertical-align:top; font-weight:normal; }
		input, textarea, select { font-size:110%; line-height:1.1; }
		li { list-style:none; }
		span, a, i, u, b, strong, a{ font-size:inherit; color:inherit; }
		span { display:inline-block; }
		a, a:hover, a:active, a:visited { text-decoration:none; display:inline-block; cursor:pointer; }
		* { font-family:Tahoma, Geneva, sans-serif; }

		/* LOGIN */
		#bg-login{
			width:100%;
			height:100%;
			float:none;
			margin:auto;
			background: url(img/bg-login.png) repeat;	
		}
		#folha-login{
			width:inherit;
			height:inherit;
			float:none;
			margin:auto;
			background:url(img/bg-folha.png) no-repeat center center;
		}
		#borda-login{
			width:302px;
			height:182px;
			position:absolute;
			top:50%;
			left:50%;
			margin:-92px 0 0 -152px;
			border:solid 1px #DEE1D5;
			background:#DEE1D5;
		}
		#borda2-login{
			width:300px;
			height:180px;
			border:dotted 1px #D5D8C9;
		}
		#login{
			width:298px;
			height:178px;
			position:relative;
			border:solid 1px #333;
			background:#172322 url(img/bg-login2.png) repeat-x center center;
		}
		#restrito{
			width:14px;
			height:16px;
			position:absolute;
			top:5px;
			right:8px;
			background:url(img/restrito.png) no-repeat center center;
		}
		#login-ottawa{
			width:136px;
			height:39px;
			position:absolute;
			top:10px;
			left:28px;
			background:url(img/login-ottawa.png) no-repeat center center;
		}
		#usuario{
			position:absolute;
			top:53px;
			left:28px;
			border:solid 5px #F7F7F7;
		}
		#usuario input{
			background:#FFFFFF url(img/usuario.png) no-repeat 210px 1px;
		}
		#senha{
			position:absolute;
			bottom:52px;
			left:28px;
			border:solid 5px #F7F7F7;
		}
		#senha input{
			background:#FFFFFF url(img/senha.png) no-repeat 210px 1px;
		}
		input{
			width:223px;
			height:22px;
			font-size:12px;
			line-height:22px;
			color:#333;
			border:solid 1px #8BC53F;
			padding:0 5px;
		}
		#lembrar{
			position:absolute;
			bottom:18px;
			left:24px;
		}
		#lembrar input{
			width:auto !important;
			height:auto !important;
			padding:0 !important;
			border:0 !important;
			float:left;
		}
		#lembrar p{
			float:left;
			margin:3px 0 0 3px;
			color:#FFF;
			font-size:11px;
		}
		#entrar{
			position:absolute;
			right:30px;
			bottom:17px;
		}
		#entrar input{
			width:58px !important;
			border-color:#999999;
			line-height:20px !important;
			cursor:pointer;
			color:#33464E;
			font-family:Arial, Helvetica, sans-serif;
			font-size:11px;
		}
		#ottawa{
			float:none;
			margin:5px auto;
			color:#333333;
			font-size:11px;
			text-align:center;
		}
		.sombra{
			text-shadow:1px 1px 1px #FFF;
		}
    </style>
    <!--[if IE 8]>
        <style type="text/css">
			#lembrar{
				bottom:21px !important;
				left:28px !important;
			}
			#lembrar p{
				margin:0 0 0 7px !important;
			}
        </style>
    <![endif]-->
	<script src="js/jquery.js" type="text/javascript"></script>
	<script src="js/jquery.dropshadow.js" type="text/javascript"></script>
    <script type="text/javascript">
		function ajustaTextoFocus(campo, texto) {
			if(campo.value == texto)
				campo.value = "";
		}
		function ajustaTextoBlur(campo, texto) {
			if(campo.value == "")
				campo.value = texto;
		}
		$(document).ready(function(){
			$('.sombra').textShadow()
		});
	</script>
</head>
    
<body>

    <div id="bg-login">
        <div id="folha-login">
        
            <div id="borda-login">
                <div id="borda2-login">
                    <div id="login">
                        <div id="login-ottawa">
                        </div>
                        <div id="restrito">
                        </div>
                        <div id="usuario">
                        <form name="login" method="post" action="valida.php" />
                        	<input type="text" name="usuario" tabindex="<?= $tabindex++ ?>" value="Login" onfocus="ajustaTextoFocus(this, 'Login')" onblur="ajustaTextoBlur(this, 'Login')" />
                        </div>
                        <div id="senha">
                        	<input type="password" name="senha" tabindex="<?= $tabindex++ ?>" value="Senha" onfocus="ajustaTextoFocus(this, 'Senha')" onblur="ajustaTextoBlur(this, 'Senha')" />
                        </div>
                        <div id="lembrar">
                        	<input type="checkbox" name="lembrar" tabindex="<?= $tabindex++ ?>" value="" />
                            <p>Lembrar meus dados</p>
                        </div>
                        <div id="entrar">
                        	<input type="submit" name="entrar" tabindex="<?= $tabindex++ ?>" value="ENTRAR" />
                        </div>
                        </form>
                    </div>
                </div>
            <div id="ottawa" class="sombra">
            	
            </div>
            </div>
            
        
        </div>
    </div>  
              
</body>
</html>