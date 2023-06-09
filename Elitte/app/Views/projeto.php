<?php $this->extend('template') ?>
<?php $this->section('conteudo') ?>
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
    crossorigin="anonymous"> </script>
<link rel="stylesheet" href="../css/style.scss">
<<<<<<< HEAD
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />
=======
<link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css"
/>

<style>
    #saida{
        
    }
</style>
>>>>>>> 99a780ee9a876bb0d0f4b50a792f478632ef145a
<h6 class="mr-auto" id="h1Projeto">PROJETO:
    <?= $cliente["nome_cliente"] ?>
</h6>
<div class="d-flex m-4 justify-content-center">

    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Finalizar Projeto
    </button>

    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalentrada">
        Entrada
    </button>
<<<<<<< HEAD
    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalsaida">
        saida
    </button>
=======
>>>>>>> 99a780ee9a876bb0d0f4b50a792f478632ef145a

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Finalizar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <b>Deseja finalizar o Projeto: </b>
                    <?= $cliente["nome_cliente"] ?>?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Voltar</button>
                    <a href="/projeto/finalizarProjeto/<?= $cliente["id_cliente"] ?>"><button type="button"
                            class="btn btn-danger">Sim</button></a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- modal de entrada de itens -->
<div class="modal fade" id="modalentrada" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Materiais</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="mb-3">
                    <input type="text" class="form-control" id="preco">
                </div>
                <div class="mb-3">
                    <label for="fkmarca" class="form-label">Materiais</label>
                    <select name="selecao" id="selecao" class="form-select">
<<<<<<< HEAD
                        <?php foreach ($materiais as $material): ?>
                            <option value="<?= $material["id_material"] ?>" selected>
=======
                        <?php foreach ($materiais as $material) : ?>
                            <option value="<?= $material["id_material"] ?>">
>>>>>>> 99a780ee9a876bb0d0f4b50a792f478632ef145a
                                <?= $material["nome_material"] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>

                    <table class="table table-striped table-bordered mt-3 container">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">Qtd.</th>
                                <th scope="col">Materiais</th>
                            </tr>
                        </thead>
                        <tbody id="lista"></tbody>
                    </table>
                </div>
            </div>

            <div class="modal-footer">
                <a href="/projeto/<?= $cliente["id_cliente"] ?>"><button type="button"
                        class="btn btn-primary">Voltar</button></a>
            </div>
        </div>
    </div>
</div>
<<<<<<< HEAD
<!-- modal saida -->
<div class="modal fade" id="modalsaida" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Materiais</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div>oi</div>
            <div class="modal-footer">
                <a href="/projeto/<?= $cliente["id_cliente"] ?>"><button type="button"
                        class="btn btn-primary">Voltar</button></a>
            </div>
        </div>
    </div>
</div>
<!-- modal para qtd
<div class="modal fade" id="qtd" tabindex="-1" aria-labelledby="qtd" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">New message</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Quantidade:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
        </form>
      </div>
      <div class="modal-footer">
       <button type="button" class="btn btn-secondary" data-bs-target="#modalentrada" data-bs-toggle="modal">Voltar</button> -->
<!-- <button type="button" class="btn btn-primary" data-bs-target="#modalentrada" data-bs-toggle="modal">OK</button> -->
<!-- </div>
    </div>
  </div>
</div> -->
=======
>>>>>>> 99a780ee9a876bb0d0f4b50a792f478632ef145a

<table class="table table-striped table-bordered mt-3 container text-center">
    <thead class="table-dark">
        <tr>
            <th>-</th>
            <th scope="col">Qtd.</th>
            <th scope="col">Materiais</th>
            <th scope="col">Preço</th>
            <th scope="col">Fornecedor</th>
            <th scope="col">Marca</th>
            <th scope="col">Categoria</th>
        </tr>
    </thead>
    <tbody>
<<<<<<< HEAD
        <?php foreach ($materiais_pedido as $material): ?>
            <tr>
                <th scope="row">
                    <?= $material["qtd"]; ?>
                </th>
                <td>
                    <?= $material["nome_material"]; ?>
                </td>
                <td>
                    <?= $material["preco"]; ?>
                </td>
                <td>
                    <?= $material["nome_fornecedor"]; ?>
                </td>
                <td>
                    <?= $material["nome_marca"]; ?>
                </td>
                <td>
                    <?= $material["nome_categoria"]; ?>
                </td>
            </tr>
        <?php endforeach; ?>
=======
        <?php foreach($materiais_pedido as $material) : ?>
        <tr>
            <td><a href="/remover/<?= $material["id_pedido"] ?>/<?= $cliente["id_cliente"]?>"><button type="button" class="btn btn-danger">
                <i class="bi bi-trash"></i>
            </button></a></td>
            <th scope="row" class="col-md-1"><input id="<?= 'pedido' . $material['id_pedido'] ?>" class="form-control text-center" type="number" min="0" value="<?= $material["qtd"]; ?>" onkeypress="submit(event,<?= $material["id_pedido"] ?>)"></th>
            <td><?= $material["nome_material"]; ?></td>
            <td><?= $material["preco"]; ?></td>
            <td><?= $material["nome_fornecedor"]; ?></td>
            <td><?= $material["nome_marca"]; ?></td>
            <td><?= $material["nome_categoria"]; ?></td>
        </tr>
        <?php endforeach ; ?>
>>>>>>> 99a780ee9a876bb0d0f4b50a792f478632ef145a
    </tbody>
</table>

<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>


<script>
    const campo = document.getElementById("campo");
    const preco = document.getElementById("preco");
    const selecao = document.getElementById("selecao");
    const lista = document.getElementById("lista");
    const saida = document.getElementById("saida");
    const clienteId = <?= json_encode($cliente["id_cliente"]) ?>;

<<<<<<< HEAD
    async function pegarDados(filtro) {
        let requisicao = await fetch("http://localhost:8080/projeto/buscar/" + filtro);
        // let dados = await requisicao.json();
        // let arr = JSON.parse(dados)

        console.log(requisicao);
        // const preco = document.getElementById("preco");

        // campo.value = dados.campo;
        // preco.value = dados.preco;
    }

    selecao.addEventListener("change", async () => {
        ;
=======
    // console.log(qtd.innerHTML);

    // function subtrair(p){
    //     console.log(pId);
    //     await fetch(`http://localhost:8080/subtrair/${pId}/${produtoQttd}`);
    // }
    
    selecao.addEventListener("change", async () => {;
>>>>>>> 99a780ee9a876bb0d0f4b50a792f478632ef145a
        let produtoId = selecao.value;
        let produtoQttd = preco.value;

        await fetch(`http://localhost:8080/salvar/${produtoId}/${produtoQttd}/${clienteId}`);
        
        lista.innerHTML += `<tr>
        <th scope="row">${preco.value}</th>
        <td>${selecao.innerHTML}</td>
        </tr>`
    });

<<<<<<< HEAD
    const selectMarca = new Choices(selecao, {
=======
    async function submit(event,idPedido) {
        const saida = document.getElementById(`pedido${idPedido}`);
        if(event.key == "Enter"){
            await fetch(`http://localhost:8080/subtrair/${idPedido}/${saida.value}/${clienteId}`);
        }
    }
    
    const selectMarca = new Choices(selecao,{
>>>>>>> 99a780ee9a876bb0d0f4b50a792f478632ef145a
        noResultsText: 'Nenhuma marca encontrada',
        noChoicesText: 'Nao existe marcas',
        itemSelectText: 'Selecionar',
    });

</script>

<?php $this->endSection() ?>