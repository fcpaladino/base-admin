<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>{!! $config['nome_site'] !!}</title>
</head>

<body style="margin: 0; padding: 0; font-family: arial, sans-serif;font-size: 14px; width: 100%">
<table cellpadding="15" cellspacing="0" style="width:100%; border-collapse:collapse ;margin:0 auto;">

    <tr style="border-bottom:1px solid #dbdbdb; background: #fafafa; width: 100%">
        <td colspan="2" width="100%"><p style="font-size: 25px; color:#212121; text-align: left; padding-left: 5%; line-height:20px;">Contato</p></td>
    </tr>


    <tr style="width: 100%;">
        <td width="15%" style="font-weight: bold; color:#212121; padding-left: 5%; border-bottom: 1px dashed #f1f1f1;">
            <p style="text-align: left; margin: 0; padding: 20px 0;">Nome</p>
        </td>
        <td width="85%" style="color:#757575; border-bottom: 1px dashed #f1f1f1;">
            <p style="text-align: left;">{!! $data['nome'] !!}</p>
        </td>
    </tr>

    <tr style="width: 100%;">
        <td width="15%" style="font-weight: bold; color:#212121; padding-left: 5%; border-bottom: 1px dashed #f1f1f1;">
            <p style="text-align: left; margin: 0; padding: 20px 0;">E-mail</p>
        </td>
        <td width="85%" style="color:#757575; border-bottom: 1px dashed #f1f1f1;">
            <p style="text-align: left;">{!! $data['email'] !!}</p>
        </td>
    </tr>

    <tr style="width: 100%;">
        <td width="15%" style="font-weight: bold; color:#212121; padding-left: 5%; border-bottom: 1px dashed #f1f1f1;">
            <p style="text-align: left; margin: 0; padding: 20px 0;">Telefone</p>
        </td>
        <td width="85%" style="color:#757575; border-bottom: 1px dashed #f1f1f1;">
            <p style="text-align: left;">{!! $data['telefone'] !!}</p>
        </td>
    </tr>

    <tr style="width: 100%;">
        <td width="15%" style="font-weight: bold; color:#212121; padding-left: 5%; border-bottom: 1px dashed #f1f1f1;">
            <p style="text-align: left; margin: 0; padding: 20px 0;">Cidade/UF</p>
        </td>
        <td width="85%" style="color:#757575; border-bottom: 1px dashed #f1f1f1;">
            <p style="text-align: left;">{!! $data['cidade'] !!} - {!! $estado['sigla'] !!}</p>
        </td>
    </tr>

    <tr style="width: 100%;">
        <td width="15%" style="font-weight: bold; color:#212121; padding-left: 5%; border-bottom: 1px dashed #f1f1f1;">
            <p style="text-align: left; margin: 0; padding: 20px 0;">Mensagem</p>
        </td>
        <td width="85%" style="color:#757575; border-bottom: 1px dashed #f1f1f1;">
            <p style="text-align: left;">{!! $data['mensagem'] !!}</p>
        </td>
    </tr>

    <tr style="width: 100%; margin:0; padding:0;">
        <td colspan="2" width="100%" style="margin-top: 15px; color:#dbdbdb; border-top: 1px solid #f1f1f1; padding: 0px 0 0 5%">
            <p style="text-align: left; margin: 0; padding: 20px 0;">
                © 2015 <a style="color:#c5c5c5; text-decoration: none;" href="{!! url('/') !!}">{!! $config['nome_site'] !!}</a>. Todos os direitos reservados.
            </p>
        </td>
        <!--td width="50%" style="color:#dbdbdb; border-top: 1px solid #f1f1f1;">
            <p style="text-align: right; margin: 0; padding: 20px 5% 20px 0;">
                <a style="color:#c5c5c5; text-decoration: none;" href="#">clique aqui.</a>
            </p>
        </td-->
    </tr>

</table>
</body>

</html>
