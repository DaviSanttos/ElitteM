<?php $this->extend('template') ?>
<?= $this->section('conteudo') ?>
<link rel="stylesheet" href="../css/style.scss">
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"> </script>
<!-- <form class="row g-3 container m-auto w-75"> -->

<style>
    .my-custom-scrollbar {
    position: relative;
    height: 80vh;
    overflow: auto;
    }
    .table-wrapper-scroll-y {
    display: block;
    }
</style>

<?= form_open(base_url("/admin/material/cadastrar")) ?>
<div class="row container m-auto w-75 align-items-center">
  <div class="col-md-6">
    <label for="nome_material" class="form-label">Material</label>
    <input type="text" class="form-control" id="nome_material" name="nome_material">
  </div>
  <div class="col-md-4">
    <label for="fk_categoria" class="form-label">Categoria</label>
    <select id="fk_categoria" class="form-select" name="fk_categoria">
      <?php foreach ($categorias as $categoria): ?>
        <option value="<?= $categoria["id_categoria"] ?>"><?= $categoria["nome_categoria"] ?></option>
      <?php endforeach; ?>
    </select>
  </div>
  <div class="col-md-2">
    <a href="<?php echo base_url("/admin/categoria") ?>"><button type="button" class="btn btn-primary w-100"
        style="margin-top: 10px;">Nova Categoria</button></a>
    <a href="<?php echo base_url("/admin/marca") ?>"><button type="button" class="btn btn-primary w-100"
        style="margin-top: 10px;">Nova Marca</button></a>
  </div>
  <div class="col-md-4">
    <label for="inputMarca" class="form-label">Marca</label>
    <select id="inputMarca" class="form-select" name="fk_marca">
      <?php foreach ($marcas as $marca): ?>
        <option value="<?= $marca["id_marca"] ?>"><?= $marca["nome_marca"] ?></option>
      <?php endforeach; ?>
    </select>
  </div>
  <div class="col-md-4">
    <label for="inputFornecedor" class="form-label">Fornecedor</label>
    <select id="inputFornecedor" class="form-select" name="fk_fornecedor">
      <?php foreach ($fornecedores as $fornecedor): ?>
        <option value="<?= $fornecedor["id_fornecedor"] ?>"><?= $fornecedor["nome_fornecedor"] ?></option>
      <?php endforeach; ?>
    </select>
  </div>
  <div class="col-md-2">
    <label for="inputPreco" class="form-label">Preço</label>
    <input type="text" class="form-control" id="inputPreco" name="preco" value="00.00">
  </div>
  <div class="col-md-2">
    <a href="<?php echo base_url("/admin/fornecedor") ?>"><button type="button" class="btn btn-primary w-100"
        style="margin-top: 10px;">Novo Fornecedor</button></a>
  </div>
  <div class="text-center">
    <button type="submit" class="btn btn-warning col-md-3 mt-3">Cadastrar</button>
  </div>
</div>
<?= form_close() ?>

<?php if (session()->has("tipo")): ?>
  <div class="col-md-9 m-auto alert alert-<?= session("tipo") ?> mt-2" role="alert">
    <?= session("mensagem") ?>
  </div>
<?php endif; ?>
<!-- pesquisa -->
<div class="hstack gap-3 container w-75 mt-2 ">
  <input class="form-control" type="text" placeholder="Procurar Item" aria-label="Procurar Item" id="camp" name="filtro">
</div>
<!--fim pesquisa-->
<table class="table table-striped table-bordered mt-5 container w-75 ">
  <thead class="table-dark">
    <tr>
      <th scope="col-md-1">Ação</th>
      <th scope="col">Material</th>
      <th scope="col">Preço</th>
      <th scope="col">Fornecedor</th>
      <th scope="col">Marca</th>
      <th scope="col">Categoria</th>
    </tr>
  </thead>
  <tbody id="mytable">
    <?php foreach ($todos as $item): ?>
      <tr>
        <td class="text-center col-md-1"><button type="button" class="btn btn-success" data-bs-toggle="modal"
            data-bs-target="#mm<?= $item["id_material"] ?>" data-bs-whatever="@mdo"><i class="bi bi-pencil"></i></button>
          <button type="button" class="btn btn-danger" data-bs-toggle="modal"
            data-bs-target="#ma<?= $item["id_material"] ?>">
            <i class="bi bi-trash"></i>
          </button>
          <!-- \EXCLUSÃO -->
          <div class="modal fade" id="ma<?= $item["id_material"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Remover</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  Deseja remover a o material
                  <?= esc($item["nome_material"]); ?> ?
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Voltar</button>
                  <a href="/admin/Material/deletar/<?= $item["id_material"] ?>"><button type="button"
                      class="btn btn-success">Sim</button></a>
                </div>
              </div>
            </div>
          </div>
          <!-- update -->
          <?= form_open(base_url("/admin/material/atualizar")) ?>
          <div class="modal fade" id="mm<?= $item["id_material"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Atualizar</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Código:</label>
                    <input type="text" class="form-control" id="recipient-name" name="id_material" value="<?= $item
                    ["id_material"] ?>" readonly>
                  </div>
                  <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Nome:</label>
                    <input type="text" class="form-control" id="recipient-name" name="nome_material"
                      value="<?= esc($item["nome_material"]); ?>">
                  </div>
                  <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Preço:</label>
                    <input type="text" class="form-control" id="recipient-name" name="preco"
                      value="<?= esc($item["preco"]) ?>">
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Voltar</button>
                  <button type="submit" class="btn btn-success">Sim</button>
                </div>
              </div>
            </div>
          </div>
          <?= form_close(); ?>
        </td>

        <td scope="row">
          <?= esc($item["nome_material"]) ?>
        </td>
        <td>
          <?= esc($item["preco"]) ?>
        </td>
        <td>
          <?= $item["nome_fornecedor"] ?>
        </td>
        <td>
          <?= $item["nome_marca"] ?>
        </td>
        <td>
          <?= $item["nome_categoria"] ?>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<script>
  let dados ="";
  let arr ="";


  $('#camp').on('keyup', async function() {
  var $this = $(this);

  let table = await document.getElementById("mytable");

  dados = await $.post('/admin/material/pesquisar', { 
    param: $this.val()
  }, console.log('Enviado!'));
  arr = JSON.parse(dados);
  console.log(table);
  table.innerHTML = "";
  arr.forEach(element => {


    // tratando o campo qtd material
    if(element.qtd_material == null){
      element.qtd_material = "";
    }
    //.

  table.innerHTML += `
  <tbody>
      <tr>
        <td><button type="button" class="btn btn-success" data-bs-toggle="modal"
            data-bs-target="#mm${element.id_material}" data-bs-whatever="@mdo"><i class="bi bi-pencil"></i></button>
          <button type="button" class="btn btn-danger" data-bs-toggle="modal"
            data-bs-target="#ma${element.id_material}">
            <i class="bi bi-trash"></i>
          </button>
          <!-- EXCLUSÃO -->
          <div class="modal fade" id="ma${element.id_material}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Remover</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  Deseja remover a o material
                  ${element.nome_material}?
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Voltar</button>
                  <a href="/admin/Material/deletar/${element.id_material}"><button type="button"
                      class="btn btn-success">Sim</button></a>
                </div>
              </div>
            </div>
          </div>
          <!-- update -->
          <?= form_open(base_url("/admin/material/atualizar")) ?>
          <div class="modal fade" id="mm${element.id_material}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Atualizar</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Código:</label>
                    <input type="text" class="form-control" id="recipient-name" name="id_material" value="${element.id_material}" readonly>
                  </div>
                  <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Nome:</label>
                    <input type="text" class="form-control" id="recipient-name" name="nome_material"
                      value="${element.nome_material}">
                  </div>
                  <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Preço:</label>
                    <input type="text" class="form-control" id="recipient-name" name="preco"
                      value="${element.preco}">
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Voltar</button>
                  <button type="submit" class="btn btn-success">Sim</button>
                </div>
              </div>
            </div>
          </div>
          <?= form_close(); ?>
        </td>
        <td>
        ${element.qtd_material}
        </td>
        <td scope="row">
        ${element.nome_material}
        </td>
        <td>
        ${element.preco}
        </td>
        <td>
        ${element.nome_fornecedor}
        </td>
        <td>
        ${element.nome_marca}
        </td>
        <td>
        ${element.nome_categoria}
        </td>
        <td></td>
      </tr>
  </tbody>`
  });
});
</script>
<?= $this->endSection() ?>