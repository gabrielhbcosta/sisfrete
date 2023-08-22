<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AGENDAMENTO</title>
    <link rel="stylesheet" href="ag.css">
</head>
<body>
    <h1 class="titulo">Cadastre um novo agendamento.</h1>

    <form action="validacao.php" method="POST">
  <fieldset>
    <legend>Selecione qual serviço deseja:</legend>
    <div>
      <input type="radio" id="serv1" name="servico" value="1" />
      <label for="serv1">SERVIÇO 1</label>

      <input type="radio" id="serv2" name="servico" value="2" />
      <label for="serv2">SERVIÇO 2</label>

      <input type="radio" id="serv3" name="servico" value="3" />
      <label for="serv3">SERVIÇO 3</label>
    </div><br>
    <div class="agendamento">
        <label for="date">
            Escolha a melhor data e horario para seu agendamento:
            <input id="dtag" type="datetime-local" name="dtag" />
        </label>
        
    </div>
    <div>
      <button type="submit">CADASTRAR</button>
    </div>
  </fieldset>
</form>
</body>
</html>