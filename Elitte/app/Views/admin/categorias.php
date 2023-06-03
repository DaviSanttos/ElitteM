<?php $this->extend('template') ?>
<?= $this->section('conteudo') ?>
<?= form_open(base_url("/admin/categoria/cadastrar")) ?>
<div class="row container m-auto w-75 ">
  <div class="col-md-9 m-auto">
    <label for="nome_categoria" class="form-label">Categoria</label>
    <input type="text" class="form-control" id="nome_categoria" name="nome_categoria">
    <button type="submit" class="btn btn-warning mt-2">Cadastar</button>
  </div>
<?= form_close(); ?>
  <?php if (session()->has("tipo")): ?>
    <div class="col-md-9 m-auto alert alert-<?= session("tipo") ?> mt-2" role="alert">
      <?= session("mensagem") ?>
    </div>
  <?php endif; ?>
  <table class="table table-striped table-bordered mt-5 container w-75">
    <thead class="table-dark">
      <tr>
        <th scope="col-md-2">Ação</th>
        <th scope="col">Código</th>
        <th scope="col">Nome</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($categorias as $categoria): ?>
        <tr>
          <td class="col-md-2"><button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ac<?= $categoria["id_categoria"]?>"
              data-bs-whatever="@mdo"><i class="bi bi-pencil"></i></button>
            <!-- <button type="button" class="btn btn-danger" onclick="remover()"><i class="bi bi-trash"></i></button> -->
            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
              data-bs-target="#c<?= $categoria["id_categoria"] ?>">
              <i class="bi bi-trash"></i>
            </button>

            <!-- Modal -->
            <div class="modal fade" id="c<?= $categoria["id_categoria"] ?>" tabindex="-1"
              aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Remover</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    Deseja remover a categoria
                    <?= $categoria["nome_categoria"] ?> ?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Voltar</button>
                    <a href="/admin/Categoria/deletar/<?= $categoria["id_categoria"] ?>"><button type="button"
                        class="btn btn-success">Sim</button></a>
                  </div>
                </div>
              </div>
            </div>
            <?= form_open(base_url("/admin/categoria/atualizar")) ?>
            <div class="modal fade" id="ac<?= $categoria["id_categoria"]?>" tabindex="-1" aria-labelledby="exampleModalLabel"
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
                        <input type="text" class="form-control" id="recipient-name" name="id_categoria" value="<?=$categoria["id_categoria"]?>" readonly>
                      </div>
                      <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Nome:</label>
                        <input type="text" class="form-control" id="recipient-name" name="nome_categoria" value="<?=$categoria["nome_categoria"]?>">
                      </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Voltar</button>
                    <button type="submit" class="btn btn-primary">Sim</button>
                  </div>
                </div>
              </div>
            </div>
            <?= form_close(); ?>
          </td>
          <td class="col-md-2">
            <?= $categoria["id_categoria"] ?>
          </td>
          <td scope="row">
            <?= $categoria["nome_categoria"] ?>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <?= $this->endSection() ?>