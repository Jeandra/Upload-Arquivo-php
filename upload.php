<?php
    if (isset($_POST['bt_enviar'])) {
        $tipos_permitidos =['jpg', 'jpeg', 'gif', 'png', 
        'JPG', 'JPEG', 'GIF', 'PNG'];

        $extensao = pathinfo($_FILES['arquivo']['name'],
        PATHINFO_EXTENSION);

        if (in_array($extensao, $tipos_permitidos)) {
            $pasta = "arquivos/";
            $temporario = $_FILES['arquivo']['tmp_name'];
            $novo_nome = uniqid().".$extensao";

            #fazer upload do arquivo.
            if (move_uploaded_file($temporario, $pasta.$novo_nome)) {
                echo "<p>Upload realizado com sucesso!</p>";               
            } else {
                echo "<p>Falha no carregamento!</p>";
            } # fim da realização do upload.
        } else {
            echo "<p>Tipo de arquivo não permitido.</p>";
        } #fim if array
    }
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload de Arquivo.</title>
</head>
<body>
   
<form action="upload.php" method="POST" enctype="multipart/form-data" >
    <input type="file" name="arquivo" />
    <button type="submit" name="bt_enviar">Enviar </button>

</form>

</body>
</html>