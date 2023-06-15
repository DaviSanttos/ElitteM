<?php $this->extend('template') ?>
<?php $this->section('conteudo') ?>
<link rel="stylesheet" href="../css/style.scss">
<style>
  .grafico {
    width: 90%;
    margin: auto;
    background-color: rgb(255, 255, 255);
  }

  li {
    padding: 0px 20px 0px 0px;
    font-family: 'Montserrat', sans-serif;
  }

  td button {
    --bs-btn-padding-y: 0.01rem !important;
    --bs-btn-padding-x: 0.35rem !important;
  }

  #myChart {
    background-color: rgb(41, 41, 41) !important;
  }
</style>
<script src="<?= base_url("js/chart.js") ?>"></script>
<!-- import chartjs -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="grafico container mt-5 p-0">
  <canvas id="myChart" height="120"></canvas>
</div>

<script>
  let dados = "";
  let array = "";

  let categorias = [];
  let valores = [];


  async function getDados() {

      let dados = <?= json_encode($valores)?>;
      console.log(dados);
      
    dados.forEach(element => {
      categorias.push(element.nome_categoria);
      valores.push(element.preco);
    });

    const ctx = document.getElementById('myChart');

    chart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: categorias,
        datasets: [{
          label: 'Categoria',
          data: valores,
          borderWidth: 3,
          backgroundColor: "#ffb222",
          borderRadius: 10,
          borderColor: "orange"
        }]
      },
      options: {

        animation: true,
        scales: {
          y: {
            beginAtZero: false
          }
        }
      }
    });

    // // funçao para adicionar
    // function addData(chart, label, data) {
    //   chart.data.labels.push(label);
    //   chart.data.datasets.forEach((dataset) => {
    //     dataset.data.push(data);
    //   });
    //   chart.update();
    // }
    // // funçao para remover
    // function removeData(chart) {
    //   chart.data.labels.pop();
    //   chart.data.datasets.forEach((dataset) => {
    //     dataset.data.pop();
    //   });
    //   chart.update();
    // }


    // console.log(addData(chart,"davi",2000));
    // console.log(removeData(chart,"davi",2000));


    // funcao para atualizar options
    // function updateConfigAsNewObject(chart) {
    //   chart.options = {
    //     responsive: true,
    //     plugins: {
    //       title: {
    //         display: true,
    //         text: 'David'
    //       }
    //     },
    //     scales: {
    //       x: {
    //         display: true
    //       },
    //       y: {
    //         display: true
    //       }
    //     }
    //   };
    //   chart.update();
    // }

    // // funcao para alterar o titulo
    // function updateConfigByMutating(chart) {
    //   chart.options.plugins.title.text = 'Estoque em R$ por';
    //   chart.update();
    // }
    // updateConfigAsNewObject(chart);
    // console.log(updateConfigByMutating(chart));
  }

  getDados();

  console.log(categorias);
  console.log(valores);

</script>
<?php $this->endSection() ?>