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
    <button class= "btn btn-success mt-1 p-2 " onclick="window.print()" id="button">Imprimir / Salvar PDF</button>  
    <input class="btn btn-secondary mt-1 p-2" type="week" id="i1">
    <input class="btn btn-secondary mt-1 p-2" type="month" id="i2">
    <div class="input-group-text p-2" style="margin-right: 0px;">R$ 1421412411</div>
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
    <tbody>
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
<?php $this->endSection() ?>