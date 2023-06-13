<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.scss">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <style>
        @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css");
    </style>

<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"> </script>
    <style>
        li {
            padding: 0px 20px 0px 0px;
            font-family: 'Montserrat', sans-serif;
        }

        td button{
            --bs-btn-padding-y: 0.01rem !important;
            --bs-btn-padding-x: 0.35rem !important;
        }

        .table>:not(caption)>*>*{
        padding: 0.2rem 0.2rem !important; 
    }
    </style>
    <title>Elitte Moveis | Estoque</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="../img/Elitte-Logo.png" width="180px" height="40px"></a>
            <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-white" aria-current="page" href="/painel">Gráfico</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/materiais">Materiais</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/controle">Controle</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/projetoListagem">Projetos</a>
                    </li>
                    <?php if (session()->has("id_usuario") && session()->get("nivel") == 1) : ?>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/admin/material">Cadastrar</a>
                    </li>
                    <?php endif; ?>
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="/sair">Sair</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main>
    <?= $this->renderSection('conteudo') ?>
    </main>
</body>


</html>