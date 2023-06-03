<?php $this->extend('template') ?>
<?php $this->section('conteudo') ?>

<head>
    <style>
        .card-np-color {
            background-color: #F58634;
            width: 12rem;
            cursor: pointer;
        }

        .card-color {
            background-color: #0089C4;
            width: 12rem;
            cursor: pointer;
        }

        a{
            text-decoration: none !important;
        }
    </style>
</head>
<body>
    
    <div class="d-flex justify-content-start gap-4 flex-wrap container">
    
        <div class="card mt-4 mb-3 shadow-lg rounded card-np-color d-flex align-items-center text-center" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">
            <div class="card-body text-white">
                <h1 class="card-title">+</h1>
                <h5 class="card-text">Novo Projeto</h5>
            </div>
        </div>
        <?php foreach($projetos as $projeto) : ?>
        <a href="/projeto/<?= $projeto["id_cliente"] ?>">
            <div class="card mt-4 mb-3 shadow-lg rounded card-color d-flex align-items-center text-center" style="max-width: 18rem;">
                <div class="card-body">
                    <img src="../img/folder_folder.svg" width="85" height="85">
                    <h5 class="card-text text-white"><?=$projeto["nome_cliente"]?></h5>
                </div>
            </div>
        </a>
        <?php endforeach ; ?>

    </div>

    <?= form_open(base_url("/projetoListagem/novoCliente")) ?>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel"> Adionar Novo Projeto </h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Nome Projeto:</label>
                <input type="text" class="form-control" id="recipient-name" name="nome_cliente">
            </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> Fechar </button>
            <button type="submit" class="btn btn-warning"> Salvar </button>
        </div>
        </div>
    </div>
    </div>
    <?= form_close() ?>

</body>


<?php $this->endSection() ?>