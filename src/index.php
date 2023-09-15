<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>Agenda telefônica</title>
    <link type="image/png" sizes="16x16" rel="icon" href="img/agenda.png">
    <meta name="language" content="pt-BR">
    <meta name="description" content="Agenda para salvar seus cadastros pessoais.">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="styles.css">

</head>

<body>
    <?php
        $connect = mysqli_connect(
            'db',                # service name 
            'php-docker',        # username
            'password',          # password
            'listatelefonica'    # db table
        );

        $query = "SELECT u.id, p.user_id, u.name, p.number           # creating a single query and 
                  FROM user AS u
                  LEFT JOIN phones AS p ON u.id = p.user_id
                  ORDER BY u.name ASC";
          
        $response = mysqli_query($connect, $query);
    ?>
    <header>
        <h1 class="titulo">Agenda Telefônica</h1>
    </header>
    <main>
        <section class="formulario">

            <form action="process.php" method="POST">
                <div class="linha-form">
                    <label for="nome">Nome</label>
                    <input type="text" id="nome" name="nome" placeholder="Insira o Nome" class="campo-form">
                </div>

                <div class="linha-form">
                    <label for="telefone">Telefone</label>
                    <div class="campo-form-group-icon">
                        <input type="tel" id="telefone" name="tel[]" placeholder="Insira o(s) Telefone(s)"
                            class="campo-form campo-form-input-icon" pattern="[\\(][0-9]{2}[\\)][9][0-9]{4}-[0-9]{4}">
                        <button class="campo-form-icon" id="input-add-phone">+</button>
                    </div>

                </div>
                <div id="more-buttons"></div>
                <div class="botao-form">
                    <input type="submit" value="Cadastrar">
                </div>
            </form>
        </section>
        <hr class="linha">
        <section class="listagem">
            <table class="tabela">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Telefone</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($response)) { ?>
                        <tr>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['number']; ?></td>
                            <td>
                            <a href="remove.php?user_id=<?php echo $row['user_id']; ?>&phone_id=<?php echo $row['id']; ?>">X</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>

            </table>

        </section>


    </main>

    <script src="scripts.js"></script>

</body>

</html>