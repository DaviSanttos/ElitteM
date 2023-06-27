<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Elitte Móveis | Login </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        body {
            margin: 0;
            background-image: url('../img/background.png');
            background-repeat: no-repeat;
            background-position: center 0;
            background-size: cover;
            width: 100vw;
            height: 100vh;
            overflow: hidden;
        }

        .container {
            background-color: rgba(0, 0, 0, 0.5);
            width: 35rem;
            height: 16rem;
            border-radius: 10px;
        }

        #svg {
            position: relative;
            top: 45px;
        }
    </style>
</head>

<body>
    <div>
        <div class="form-group d-flex justify-content-center pt-5" id="svg">
            <img src="../img/bonequin.svg" width="200" height="200">
        </div>


        <div class="container">
            <!-- <form action="" method="POST" name="formulario" class="d-flex flex-column justify-content-around w-100"> -->
            <?= form_open(base_url("/logar")) ?>
            <div class="form-group m-3 pt-5">
                <?php if (session()->has("tipo")): ?>
                    <div class="col-md-9 m-auto alert alert-<?= session("tipo") ?> mb-2" role="alert">
                        <?= session("aviso-login") ?>
                    </div>
                <?php endif; ?>
                <div class="col-md-6 offset-md-3">
                    <input type="text" name="nome_usuario" class="form-control rounded-0" placeholder="Username">
                </div>
            </div>

            <div class="form-group m-3">
                <div class="col-md-6 offset-md-3">
                    <input type="password" name="senha" class="form-control rounded-0 w-100" placeholder="Password">
                </div>
            </div>

            <div class="form-group m-3">
                <div class="col-md-6 offset-md-3">
                    <input type="submit" value="login" class="btn btn-primary w-50">
                </div>
            </div>
            <?= form_close() ?>
            <!-- </form> -->
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>

</html>