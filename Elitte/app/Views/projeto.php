<?php $this->extend('template') ?>
<?php $this->section('conteudo') ?>
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
    crossorigin="anonymous"> </script>
<link rel="stylesheet" href="../css/style.scss">
<link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css"
/>

<style>
    th input.form-control {
        padding: 0 !important;
    }

    #h1Projeto{
        color: black;
    }
   
</style>

<div class="row ">
<div class="col-md-5 container mt-2">
    <h3 class="mr-auto btn btn-primary btn-xl" id="h1Projeto">Projeto:
        <?= $cliente["nome_cliente"] ?>
    </h3>
</div>
    <div class="col-md-2 mt-2">
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Finalizar Projeto
        </button>
    </div>
        <div class="col-md-2 mt-2">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalentrada">
                Entrada
            </button>
        </div>

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
                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
            </div>

            <div class="modal-body row">
                <div class="mb-3 col-md-9">
                    <label for="fkmarca" class="form-label">Materiais</label>
                    <select name="selecao" id="selecao" class="form-select">
                        <?php foreach ($materiais as $material) : ?>
                            <option value="<?= $material["id_material"] ?>">
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
                    <div class="mb-3 col-md-2">
                    <label for="preco" class="form-label">Quantidade</label>
                    <input type="number" class="form-control " id="preco" autocomplete="off">
                    <label for=""></label>
                    <button class="btn btn-primary form-control mt-1" id="enviar">OK</button>
                    </div>
            </div>

            <div class="modal-footer">
                <a href="/projeto/<?= $cliente["id_cliente"] ?>"><button type="button" class="btn btn-primary">Voltar</button></a>
            </div>
        </div>
    </div>
</div>
<div class="table-wrapper-scroll-y my-custom-scrollbar">
<table class="table table-striped table-bordered mt-3 container ">
    <thead class="table-dark">
        <tr>
            <th>-</th>
            <th scope="col">Qtd.</th>
            <th scope="col">MateriaL</th>
            <th scope="col">Preço/Un.</th>
            <th scope="col">Fornecedor</th>
            <th scope="col">Marca</th>
            <th scope="col">Categoria</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($materiais_pedido as $material) : ?>
        <tr>
            <td class="text-center"><a href="/remover/<?= $material["id_pedido"] ?>/<?= $cliente["id_cliente"]?>"><button type="button" class="btn btn-danger ">
                <i class="bi bi-trash"></i>
            </button></a></td>
            <th scope="row" class="col-md-1"><input id="<?= 'pedido' . $material['id_pedido'] ?>" class="form-control text-center" type="number" min="0" value="<?= $material["qtd"]; ?>" max="<?= $material["qtd"]; ?>" onkeypress="submit(event,<?= $material["id_pedido"] ?>)" ></th>
            <td><?= $material["nome_material"]; ?></td>
            <td>R$: <?= $material["preco"]; ?></td>
            <td><?= $material["nome_fornecedor"]; ?></td>
            <td><?= $material["nome_marca"]; ?></td>
            <td><?= $material["nome_categoria"]; ?></td>
        </tr>
        <?php endforeach ; ?>
    </tbody>
</table>
        </div>
<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>


<script>
    const campo = document.getElementById("campo");
    const preco = document.getElementById("preco");
    const selecao = document.getElementById("selecao");
    const lista = document.getElementById("lista");
    const saida = document.getElementById("saida");
    const btnEnviar = document.getElementById("enviar");
    const clienteId = <?= json_encode($cliente["id_cliente"]) ?>;

    
    btnEnviar.addEventListener("click", async () => {;
        let produtoId = selecao.value;
        let produtoQttd = preco.value;

        await fetch(`http://localhost:8080/salvar/${produtoId}/${produtoQttd}/${clienteId}`);
        
        lista.innerHTML += `<tr>
        <th scope="row">${preco.value}</th>
        <td>${selecao.innerHTML}</td>
        </tr>`
    });
    function submit(event,idPedido) {
        const saida = document.getElementById(`pedido${idPedido}`);
            if(event.key == "Enter"){
                window.location.assign(`http://localhost:8080/subtrair/${idPedido}/${saida.value}/${clienteId}`);
            }
        }
    
    const selectMarca = new Choices(selecao,{
        noResultsText: 'Nenhuma marca encontrada',
        noChoicesText: 'Nao existe marcas',
        itemSelectText: 'Selecionar',
    });

</script>

<?php $this->endSection() ?>