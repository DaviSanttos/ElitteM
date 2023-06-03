<?php $this->extend('template')?>
<?= $this->section('conteudo') ?>
<!-- <form class="row g-3 container m-auto w-75"> -->
<?= form_open(base_url("/admin/cadastro/cadastrar")) ?>
  <div class="row container m-auto w-75 align-items-center">
      <div class="col-md-6">
        <label for="nome_material" class="form-label">Material</label>
        <input type="text" class="form-control" id="nome_material" name="nome_material">
      </div>
      <div class="col-md-4">
        <label for="fk_categoria" class="form-label">Categoria</label>
        <select id="fk_categoria" class="form-select" name="fk_categoria">
          <option selected>Nenhuma Marca</option>
          <option>...</option>
        </select>
      </div>
      <div class="col-md-2">
      <a href="<?php echo base_url("/admin/categoria/index")?>"><button type="button" class="btn btn-primary w-100" style="margin-top: 10px;">Nova Categoria</button></a>
      <a href="<?php echo base_url("/admin/marca/index")?>"><button type="button" class="btn btn-primary w-100" style="margin-top: 10px;">Nova Marca</button></a>
      </div>
      <div class="col-md-4">
        <label for="inputMarca" class="form-label">Marca</label>
        <select id="inputMarca" class="form-select">
          <option selected>Nenhuma Marca</option>
          <option>...</option>
        </select>
      </div>
      <div class="col-md-4">
        <label for="inputFornecedor" class="form-label">Fornecedor</label>
        <select id="inputFornecedor" class="form-select">
          <option selected>Nenhum Fornecedor</option>
          <option>...</option>
        </select>
      </div>
      <div class="col-md-2">
        <label for="inputPreco" class="form-label">Preço</label>
        <input type="number" class="form-control" id="inputPreco">
      </div>
      <div class="col-md-2">
      <a href="<?php echo base_url("/admin/fornecedor/index")?>"><button type="button" class="btn btn-primary w-100" style="margin-top: 10px;">Novo Fornecedor</button></a>
      </div>
      <div class="text-center">
        <button type="submit" class="btn btn-warning btn-lg col-md-3 mt-3">Cadastar</button>
      </div>
  </div>
  <?= form_close() ?>
<!-- </form> -->

  <!-- <input class="form-control col-md-3 ml-5 container w-50" list="datalistOptions" id="exampleDataList" placeholder="Pesquisar">
  <datalist id="datalistOptions">
    <option value="chapa">
  </datalist> -->

  <div class="hstack gap-3 container w-75 mt-2 ">
  <input class="form-control" type="text" placeholder="Procurar Item" aria-label="Procurar Item">
  <button type="button" class="btn btn-secondary">Procurar</button>
  <div class="vr"></div>
  <button type="button" class="btn btn-outline-danger">Limpar</button>
</div>

<table class="table table-striped table-bordered mt-5 container w-75">
  <thead class="table-dark">
    <tr>
      <th scope="col">Ação</th>
      <th scope="col">Qtd</th>
      <th scope="col">Materiais</th>
      <th scope="col">Preço</th>
      <th scope="col">Medida</th>
      <th scope="col">Fornecedor</th>
      <th scope="col">Marca</th>
      <th scope="col">Categoria</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo"><i class="bi bi-pencil"></i></button>
      <button type="button" class="btn btn-danger" onclick="remover()"><i class="bi bi-trash"></i></button></td>
      <td>7</td>
      <td scope="row">7</td>
      <td>7</td>
      <td>20</td>
      <td>7</td>
      <td>7</td>
      <td>7</td>
    </tr>
  </tbody>
</table>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Atualizar Material</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="" method="">
      <div class="modal-body">
          <div class="mb-3">
            <label for="material" class="col-form-label">Material:</label>
            <input type="text" class="form-control" id="material" name="material" value="">
          </div>
          <!-- <div class="mb-3">
            <label for="fornecedor" class="col-form-label">Fornecedor:</label>
            <input type="text" class="form-control" id="fornecedor" name="fornecedor" value="">
          </div> -->
          <div class="col-md-12">
            <label for="inputCategoria" class="form-label">Categoria</label>
            <select id="inputCategoria" class="form-select">
              <option selected>Nenhuma Categoria</option>
              <option>...</option>
            </select>
          </div>
          <div class="col-md-12">
            <label for="inputCategoria" class="form-label">Marca</label>
            <select id="inputCategoria" class="form-select">
              <option selected>Nenhuma Marca</option>
              <option>...</option>
            </select>
          </div>
          <div class="col-md-12">
            <label for="inputCategoria" class="form-label">Fornecedor</label>
            <select id="inputCategoria" class="form-select">
              <option selected>Nenhum Fornecedor</option>
              <option>...</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="preco" class="col-form-label">Preço:</label>
            <input type="number" class="form-control" id="preco" name="preco">
          </div>
      </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-primary">Atualizar</button>
      </div>
    </div>
  </div>
</div> 

<script>
  const exampleModal = document.getElementById('exampleModal')
  exampleModal.addEventListener('show.bs.modal', event => {
  // Button that triggered the modal
  const button = event.relatedTarget
  // Extract info from data-bs-* attributes
  const recipient = button.getAttribute('data-bs-whatever')
  // If necessary, you could initiate an AJAX request here
  // and then do the updating in a callback.
  //
  // Update the modal's content.
  const modalTitle = exampleModal.querySelector('.modal-title')

  //pegando o value do input

  // const modalBodyInput = exampleModal.querySelector('.modal-body input').id ="material"
  // const modalBodyInput2 = exampleModal.querySelector('.modal-body input').id ="fornecedor"
  // const modalBodyInput3 = exampleModal.querySelector('.modal-body input').id ="marca"

  //pegando o value do input
  const mate = document.getElementById("material");
  const forn = document.getElementById("fornecedor");
  const marca = document.getElementById("marca");
  const preco = document.getElementById("preco");
  const categoria = document.getElementById("categoria");

  console.log(mate)
  console.log(forn)
  console.log(marca)

  mate.value = "receber dados da tabela" // aqui tem q passar os dados da tabela q vai mandar para o input
  forn.value = "receber dados da tabela" // aqui tem q passar os dados da tabela q vai mandar para o input
  marca.value = "receber dados da tabela" // aqui tem q passar os dados da tabela q vai mandar para o input

  //pegando o name do input
  // const input = exampleModal.querySelector('.modal-body input').name

  // console.log(modalBodyInput)
  // console.log(modalBodyInput2)
  // console.log(modalBodyInput3)
  // console.log(recipient)
  // console.log(input)

  modalTitle.textContent = `Autualizar Material`
  // modalBodyInput.value = "fsf"
})

function remover(){
  alert("removendo");
}

// $('#exampleModal').on('show.bs.modal', function (event) {
//       var button = $(event.relatedTarget); // Button that triggered the modal
//       var funcionario = button.data('funcionario'); // Extract info from data-* attributes
//       console.log(funcionario);
    
//       var modal = $(this);
//       modal.find('[name="material"]').val("askjdla");
//       modal.find('[name="cpfFuncionario"]').val(funcionario.cpf);
//       modal.find('[name="nomeFuncionario"]').val(funcionario.nome);
//       modal.find('[name="salarioFuncionario"]').val(funcionario.salario);
//     });

</script>
<?= $this->endSection()?>
