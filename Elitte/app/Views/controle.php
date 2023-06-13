<?php $this->extend('template') ?>
<?php $this->section('conteudo') ?>
<style>
    @media print {
  #button, #i1, #i2{
  display: none;
  }
}
</style>
<div class="d-flex flex-row-reverse justify-content-between container">
    <button class= "btn btn-success mt-1 p-2 mt-2 mb-2" onclick="window.print()" id="button">Imprimir / Salvar PDF</button>  
    <input class="btn btn-secondary mt-1 p-2 mt-2 mb-2" type="week" id="weekId">
    <input class="btn btn-secondary mt-1 p-2 mt-2 mb-2" type="month" id="monthId">
</div>
<table class="table table-striped table-bordered mt-1 container">
    <thead class="table-dark">
        <tr>
            <th scope="col">Qtd.</th>
            <th scope="col">Material</th>
            <th scope="col">Preço</th>
            <th scope="col">Projeto</th>
            <th scope="col">Fornecedor</th>
            <th scope="col">Marca</th>
            <th scope="col">Categoria</th>
            <th scope="col">Data/Saída</th>
        </tr>
    </thead>
    <tbody id="myTable">
        <?php foreach($materiaisS as $material) : ?>
        <tr>
            <th scope="row"><?= $material["qtd"]?></th>
            <td><?= $material["nome_material"]?></td>
            <td><?= $material["preco"]?></td>
            <td><?= $material["nome_cliente"]?></td>
            <td><?= $material["nome_fornecedor"]?></td>
            <td><?= $material["nome_marca"]?></td>
            <td><?= $material["nome_categoria"]?></td>
            <td class="d-flex justify-content-around"><?= $material["dataS"]?>
            <?php if($material["nivel"] == 1) : ?>
                <button type="button" class="btn btn-success"><i class="bi bi-person-workspace"></i></button>
            <?php else : ?>
                <button type="button" class="btn btn-warning"><i class="bi bi-person"></i></button>
            <?php endif ; ?>
        </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script>
    const W = document.getElementById("weekId");
    const M = document.getElementById("monthId");
    const T = document.getElementById("myTable");
    W.addEventListener("change", (event) => {
        console.log(W.value);
    });
    M.addEventListener("change", async (event) => {
        dados = await fetch(`http://localhost:8080/saidaMes/${M.value}`);
        const obj = await dados.json();
        T.innerHTML = "";
        console.log(obj);
        obj.forEach(m => {
            T.innerHTML += `
            <tr>
            <th scope="row">${m.qtd}</th>
            <td>${m.nome_material}</td>
            <td>${m.preco}</td>
            <td>${m.nome_cliente}</td>
            <td>${m.nome_fornecedor}</td>
            <td>${m.nome_marca}</td>
            <td>${m.nome_categoria}</td>
            <td class="d-flex justify-content-around">${m.dataS}
                ${m.nivel == 1 ?
                '<button type="button" class="btn btn-success"><i class="bi bi-person-workspace"></i></button>' : 
                '<button type="button" class="btn btn-warning"><i class="bi bi-person"></i></button>'
            }
        </td>
        </tr>
            `
        });
    });
</script>
<?php $this->endSection() ?>