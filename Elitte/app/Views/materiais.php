<?php $this->extend('template') ?>
<?php $this->section('conteudo') ?>
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
    crossorigin="anonymous"> </script>
<style>
    #pesquisa {
        padding-right: 0 !important;
        width: 30rem !important;
    }

    .my-custom-scrollbar {
position: relative;
height: 80vh;
overflow: auto;
}
.table-wrapper-scroll-y {
display: block;
}
</style>

<div class="col-md-12 container">
    <?php if (session()->has("tipo")): ?>
        <div class="col-md-9 m-auto alert alert-<?= session("tipo") ?> mt-2" role="alert">
            <?= session("mensagem") ?>
        </div>
    <?php endif; ?>
    <div class="row mt-4 mb-4 flex-row-reverse">
        <div class="col-md-4 pr-0" id="pesquisa">
            <div class="input-group">
                <input class="form-control border-end-0" placeholder="Pesquisar" type="text" name="filtro"
                id="example-search-input">
                <span class="input-group-append">
                    <button class="btn btn-outline-secondary bg-white border-bottom-0 border ms-n5" type="button">
                        <img src="/img/icons-pesquisar.svg">
                    </button>
                </span>
            </div>
        </div>
        <div class="input-group-text p-2 mb-2 col-md-2" style="margin-right: 0px;">R$ <?= $real->real ?></div>
    </div>
</div>

<div class="table-wrapper-scroll-y my-custom-scrollbar">
    <table class="table table-striped table-bordered mt-5 container">
        <thead class="table-dark">
            <tr>
                <th scope="col">Total Qtd.</th>
                <th scope="col">Materiais</th>
                <th scope="col">Total R$</th>
                <th scope="col">Fornecedor</th>
                <th scope="col">Marca</th>
                <th scope="col">Categoria</th>
            </tr>
        </thead>
        <tbody id="listagem">
            <?php foreach ($materiais as $material): ?>
                <tr>
                    <th scope="row">
                        <?= $material["qtd"] ?>
                    </th>
                    <td>
                        <?= $material["nome_material"] ?>
                    </td>
                    <td>
                        <?= $material["total"] ?>
                    </td>
                    <td>
                        <?= $material["nome_fornecedor"] ?>
                    </td>
                    <td>
                        <?= $material["nome_marca"] ?>
                    </td>
                    <td>
                        <?= $material["nome_categoria"] ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<script>
    let dados = "";
    let arr = "";

    $('#example-search-input').on('keyup', async function () {
        var $this = $(this);

        let table = await document.getElementById("listagem");

        dados = await $.post('buscar', {
            param: $this.val()
        }, console.log('Enviado!'));
        arr = JSON.parse(dados);
        console.log(dados);
        table.innerHTML = "";
        arr.forEach(element => {

            // tratando o campo qtd material
            if (element.qtd_material == null) {
                element.qtd_material = "";
            }
            //.

            table.innerHTML += `
    <tbody>
            <tr>
                <th scope="row">${element.qtd}</th>
                <td>${element.nome_material}</td>
                <td>${element.total}</td>
                <td>${element.nome_fornecedor}</td>
                <td>${element.nome_marca}</td>
                <td>${element.nome_categoria}</td>
            </tr>
    </tbody>`
        });
    });
</script>


<?php $this->endSection() ?>