<?php $this->extend('template') ?>
<?= $this->section('conteudo') ?>
<?= form_open(base_url("/admin/marca/cadastrar")) ?>
<div class="row container m-auto w-75 ">
  <div class="col-md-9 m-auto">
    <label for="nome_marca" class="form-label">Marcas</label>
    <input type="text" class="form-control" id="nome_marca" name="nome_marca">
    <button type="submit" class="btn btn-warning mt-2">Cadastar</button>
    <a href="<?= base_url("admin/material")?>"><button type="button" class="btn btn-dark mt-2">Voltar</button></a>
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
        <th scope="col">Ação</th>
        <th scope="col">Código</th>
        <th scope="col">Nome</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($marcas as $marca): ?>
        <tr>
          <td><button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#am<?= $marca["id_marca"]?>"
              data-bs-whatever="@mdo"><i class="bi bi-pencil"></i></button>
            <!-- <button type="button" class="btn btn-danger" onclick="remover()"><i class="bi bi-trash"></i></button> -->
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#m<?=$marca["id_marca"]?>">
              <i class="bi bi-trash"></i>
            </button>
            <!-- Modal -->
            <div class="modal fade" id="m<?=$marca["id_marca"]?>" tabindex="-1" aria-labelledby="exampleModalLabel"
              aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Remover</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    Deseja remover a marca
                    <?= $marca["nome_marca"] ?> ?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Voltar</button>
                    <a href="/admin/Marca/deletar/<?= $marca["id_marca"] ?>"><button type="button"
                        class="btn btn-success">Sim</button></a>
                  </div>
                </div>
              </div>
            </div>
            <?= form_open(base_url("/admin/marca/atualizar")) ?>
            <div class="modal fade" id="am<?= $marca["id_marca"]?>" tabindex="-1" aria-labelledby="exampleModalLabel"
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
                        <input type="text" class="form-control" id="recipient-name" name="id_marca" value="<?=$marca["id_marca"]?>" readonly>
                      </div>
                      <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Nome:</label>
                        <input type="text" class="form-control" id="recipient-name" name="nome_marca" value="<?=$marca["nome_marca"]?>">
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
            <?= $marca["id_marca"] ?>
          </td>
          <td scope="row">
            <?= $marca["nome_marca"] ?>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <?= $this->endSection() ?>