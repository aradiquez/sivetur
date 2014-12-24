<style type="text/css">
  body {
    font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
    font-size: 1.2em;
    color: #533b27;
    background-color: #f2f2f2;
    background: url("www.siveturcr.com/svt/img/login-bg.jpg") #f2f2f2 no-repeat top center;
    width: 100%;
    height: 100%;
  }
  table {
    max-width: 100%;
    background-color: transparent;
    border-collapse: collapse;
    border-spacing: 0;

    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
  }

  a {
    color: #006291;
    text-decoration: none;
  }
  img {
    width: auto 9;
    height: auto;
    max-width: 100%;
    vertical-align: middle;
    border: 0;
    -ms-interpolation-mode: bicubic;
  }
  p {
    margin: 0 0 9px;
    line-height: 18px;
  }
  ul {
  list-style: disc;
  }
</style>

<!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
<div style='font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
    font-size: 0.8em;
    color: #533b27;
    width: 100%;
    height: 100%;'>
  <center>
    <table border="0" width="100%" cellspacing="0" cellpadding="0">
      <tr>
        <td height="20"></td>
      </tr>
      <tr>
        <td valign="top" align="center">
          <table style="width:750px; background-color:#ffffff;" border="0" width="600" cellspacing="0" cellpadding="20" bgcolor="#ffffff">
            <tr>
              <td>
                <table>
                  <tr>
                    <td style="width: 50%"><img src="http://www.siveturcr.com/svt/img/logo_email.png" style="float: left; display: block;"  /></td>
                    <td style="width: 50%"><img src="http://www.siveturcr.com/svt/img/avianca_email.png" style="float: right; display: block; padding-left: 40px;" /></td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td width="100%" rowspan="1" colspan="1" >

                <h2>Ha recibido un nuevo mensaje de www.sivetur.com</h2>		
                <p>Un visitante ha solicitado mas informaci&oacute;n acerca de <?=$oferta_nombre?></p>
                ------------------------------------------------------------------------<br/>
                Esta es la informaci&oacute;n:<br/>
                ------------------------------------------------------------------------<br/>
                <label>Nombre:</label> <?=$nombre?> <br /> 
                <label>Telefono:</label> <?=$telefono?><br /> 
                <label>Correo:</label> <?=$email?><br /> 
                <label>Fecha de check in:</label> <?=$check_in?><br /> 
                <label>Fecha de check out:</label> <?=$check_out?><br /> 
                <label>Adultos:</label> <?=$adultos?><br /> 
                <label>Ni&ntilde;os:</label> <?=$ninos?><br />
                <h4>Comentario</h4>
                <p><?=$comentario?> </p>
                ------------------------------------------------------------------------<br/>
                <?=$oferta_nombre?>:<br/>
                ------------------------------------------------------------------------<br/>
                <label>Programa y Circuito: </label> <?=$programa_name?><br/>
                <label>Valido desde / hasta: </label> <?=$valido_desde?> / <?=$valido_hasta?><br/>
                <label>Precio: </label> <?=$precio_oferta?><br/>
                <label>Link a la oferta: </label><?php echo $html->link('ir a la oferta', Router::url(array('controller' =>'ofertas', 'action' => 'detalle', $oferta_id, slug($oferta_nombre)), true),array('escape'=>false,'target'=>'_blank')); ?><br/>
                ------------------------------------------------------------------------<br/>
                <p>Saludos</p>	
        				
			        </td>
            </tr>
            <tr>
              <td><table style="font-size:11px">
                  <tr>
                    <td align="left" width="450">© <?=date("Y")?> <a href="http://www.siveturcr.com">Sivetur S.A.</a></td>
                  </tr>
                  <tr>
                    <td align="right" colspan="2"><br/>
                      </td>
                  </tr>
                </table></td>
            </tr>
          </table></td>
      </tr>
    </table>
  </center>
</div>