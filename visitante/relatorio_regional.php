<?php
include_once '../Controller/ControladorPeriodo.php';
include_once '../Controller/ControladorEscola.php';
include_once '../Controller/ControladorAluno.php';


$c = new ControladorPeriodo();
$c1 = new ControladorEscola();
$c2 = new ControladorAluno();

$idRegional = $_GET['id_regional'];


$escolasRegional = $c1->buscarEscolaPorRegional($idRegional);


$qtd_presilabico_inicial = 0;
$qtd_silabico_inicial = 0;
$qtd_alf_inicial = 0;
$qtd_ort_inicial = 0;
$qtd_silabico_alf_inicial = 0;

$qtd_presilabico_1 = 0;
$qtd_silabico_1 = 0;
$qtd_alf_1 = 0;
$qtd_ort_1 = 0;
$qtd_silabico_alf_1 = 0;

$qtd_presilabico_2 = 0;
$qtd_silabico_2 = 0;
$qtd_alf_2 = 0;
$qtd_ort_2 = 0;
$qtd_silabico_alf_2 = 0;

$qtd_presilabico_3 = 0;
$qtd_silabico_3 = 0;
$qtd_alf_3 = 0;
$qtd_ort_3 = 0;
$qtd_silabico_alf_3 = 0;

$qtd_presilabico_4 = 0;
$qtd_silabico_4 = 0;
$qtd_alf_4 = 0;
$qtd_ort_4 = 0;
$qtd_silabico_alf_4 = 0;



foreach($escolasRegional as $escola ){

    $idEscola = $escola->idEscola;


    $alunos = $c2->buscarAlunosPorEscola($idEscola);

    $escola = $c1->buscarEscola($idEscola);

    $lista_valores_inicial = $c->getValoresDaEscolaDoPeriodo($idEscola, 0);

    foreach ($lista_valores_inicial as $valor) {
    # code...
      if($valor == 1)
          $qtd_presilabico_inicial = $qtd_presilabico_inicial + 1;
      else if($valor == 2)
          $qtd_silabico_inicial = $qtd_silabico_inicial + 1;
      else if($valor == 3)
          $qtd_silabico_alf_inicial = $qtd_silabico_alf_inicial + 1;
      else if($valor == 4)
          $qtd_alf_inicial = $qtd_alf_inicial + 1;
      else if($valor == 5)
          $qtd_ort_inicial = $qtd_ort_inicial + 1;
    
    }


    $lista_valores_1 = $c->getValoresDaEscolaDoPeriodo($idEscola, 1);

        foreach ($lista_valores_1 as $valor) {
        # code...
        if($valor == 1)
            $qtd_presilabico_1 = $qtd_presilabico_1 + 1;
        else if($valor == 2)
            $qtd_silabico_1 = $qtd_silabico_1 + 1;
        else if($valor == 3)
            $qtd_silabico_alf_1 = $qtd_silabico_alf_1 + 1;
        else if($valor == 4)
            $qtd_alf_1 = $qtd_alf_1 + 1;
        else if($valor == 5)
            $qtd_ort_1 = $qtd_ort_1 + 1;
        
        }

    $lista_valores_2 = $c->getValoresDaEscolaDoPeriodo($idEscola, 2);

        foreach ($lista_valores_2 as $valor) {
        # code...
        if($valor == 1)
            $qtd_presilabico_2 = $qtd_presilabico_2 + 1;
        else if($valor == 2)
            $qtd_silabico_2 = $qtd_silabico_2 + 1;
        else if($valor == 3)
            $qtd_silabico_alf_2 = $qtd_silabico_alf_2 + 1;
        else if($valor == 4)
            $qtd_alf_2 = $qtd_alf_2 + 1;
        else if($valor == 5)
            $qtd_ort_2 = $qtd_ort_2 + 1;
        
        }

    $lista_valores_3 = $c->getValoresDaEscolaDoPeriodo($idEscola, 3);

        foreach ($lista_valores_3 as $valor) {
        # code...
        if($valor == 1)
            $qtd_presilabico_3 = $qtd_presilabico_3 + 1;
        else if($valor == 2)
            $qtd_silabico_3 = $qtd_silabico_3 + 1;
        else if($valor == 3)
            $qtd_silabico_alf_3 = $qtd_silabico_alf_3 + 1;
        else if($valor == 4)
            $qtd_alf_3 = $qtd_alf_3 + 1;
        else if($valor == 5)
            $qtd_ort_3 = $qtd_ort_3 + 1;
        
        }

    $lista_valores_4 = $c->getValoresDaEscolaDoPeriodo($idEscola, 4);

        foreach ($lista_valores_4 as $valor) {
        # code...
        if($valor == 1)
            $qtd_presilabico_4 = $qtd_presilabico_4 + 1;
        else if($valor == 2)
            $qtd_silabico_4 = $qtd_silabico_4 + 1;
        else if($valor == 3)
            $qtd_silabico_alf_4 = $qtd_silabico_alf_4 + 1;
        else if($valor == 4)
            $qtd_alf_4 = $qtd_alf_4 + 1;
        else if($valor == 5)
            $qtd_ort_4 = $qtd_ort_4 + 1;
        
    }
}

// $qtd_presilabico_media = ($qtd_presilabico_1+$qtd_presilabico_2+$qtd_presilabico_3+$qtd_presilabico_4)/4;
// $qtd_silabico_media = ($qtd_silabico_1+$qtd_silabico_2+$qtd_silabico_3+$qtd_silabico_4)/4;
// $qtd_silabico_alf_media = ($qtd_silabico_alf_1+$qtd_silabico_alf_2+$qtd_silabico_alf_3+$qtd_silabico_alf_4)/4;
// $qtd_alf_media = ($qtd_alf_1+$qtd_alf_2+$qtd_alf_3+$qtd_alf_4)/4;
// $qtd_ort_media = ($qtd_ort_1+$qtd_ort_2+$qtd_ort_3+$qtd_ort_4)/4;
  ?>

<html>
<meta charset="ISO-8859-1">
  <head>

     <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Bimestre', 'Pré-Silabico', 'Silabico', 'Silábico-Alfabético','Alfabetico','Ortografico'],
          ['Diagnostico Inicial', <?php echo $qtd_presilabico_inicial;?>, <?php echo $qtd_silabico_inicial;?>, <?php echo $qtd_silabico_alf_inicial?>,<?php echo $qtd_alf_inicial?>,<?php echo $qtd_ort_inicial?>],
          ['1 Bimestre', <?php echo $qtd_presilabico_1;?>, <?php echo $qtd_silabico_1;?>, <?php echo $qtd_silabico_alf_1?>,<?php echo $qtd_alf_1?>,<?php echo $qtd_ort_1?>],
          ['2 Bimestre', <?php echo $qtd_presilabico_2;?>, <?php echo $qtd_silabico_2;?>, <?php echo $qtd_silabico_alf_2?>,<?php echo $qtd_alf_1?>,<?php echo $qtd_ort_2?>],
          ['3 Bimestre', <?php echo $qtd_presilabico_3;?>, <?php echo $qtd_silabico_3;?>, <?php echo $qtd_silabico_alf_3?>,<?php echo $qtd_alf_1?>,<?php echo $qtd_ort_3?>],
          ['4 Bimestre', <?php echo $qtd_presilabico_4;?>, <?php echo $qtd_silabico_4;?>, <?php echo $qtd_silabico_alf_4?>,<?php echo $qtd_alf_1?>,<?php echo $qtd_ort_4?>]
        ]);

        var options = {
          chart: {
            title: 'Grafico',
            //subtitle: 'Sales, Expenses, and Profit: 2014-2017',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="columnchart_material" style="width: 1250px; height: 500px;"></div>
  </body>


  <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css"/>
  <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css.map"/>
  <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css"/>
  <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css.map"/>
  <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap-theme.css"/>
  <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap-theme.css.map"/>
  <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap-theme.min.css.map"/>
  <link rel="stylesheet" type="text/css" href="../bootstrap/css/styles.css"/>
  </head>

  <body>
  
    <div class="media"> 
      <div class="media-left"> 
        <a href="#"> <img data-holder-rendered="true" src="../img/sme.jpg" style="width: 64px; height: 64px;" class="media-object" data-src="holder.js/64x64" alt="64x64"> </a> 

      </div> 
      <div class="media-body"> 
        <h4 class="media-heading">Secretaria Municipal da Educação de Quixadá</h4>
        <h3>Relatório</h3>
      </div> 

    </div>



          <!-- /.info-box -->
        
          
  

    <!--Div that will hold the pie chart-->
    
    <div class="row">
      <div class="col-lg-6">
        <div id="chart_div1"></div>        
      </div>
      <div class="col-lg-6">
        <div id="chart_div2"></div>
      </div>
      <div class="col-lg-6">
        <div id="chart_div3"></div>
      </div>
      <div class="col-lg-6">
        <div id="chart_div4"></div>
      </div>
    </div>

        <div class="row">

        <div class="col-lg-12">
        <div class="ibox float-e-margins">
        <div class="ibox-title">
            <div class="ibox-tools">
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-wrench"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="#">Config option 1</a>
                    </li>
                    <li><a href="#">Config option 2</a>
                    </li>
                </ul>
                <a class="close-link">
                    <i class="fa fa-times"></i>
                </a>
            </div>
        </div>
        
        <?php 
        $periodo = 0;
        foreach($escolasRegional as $escola ){
            $idEscola2 = $escola->idEscola;


            $alunos2 = $c2->buscarAlunosPorEscola($idEscola2); 
        if(count($alunos2) > 0){
        ?>
        <div class="ibox-content">
            
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>

                        <th>#</th>
                        <th>Aluno </th>
                        <th>Periodo 1</th>
                        <th>Periodo 2</th>
                        <th>Periodo 3</th>
                        <th>Periodo 4</th>
                        
                    </tr>
                    </thead>
                    <tbody>
                    <?php 

                    $periodo =  0;
                    foreach ($alunos2 as $aluno) {
                    ?>
                      <tr>
                      <td>*</td>
                      <td><?php echo $aluno->nome;?></td>
                    <?php
                      while($periodo < 5){
                        
                        $lista_alunos_periodo = $c->getDadosAlunoPorPeriodo($periodo);
                        $flag = FALSE;

                        foreach ($lista_alunos_periodo as $lista) {
                            # code...
                            if($aluno->idAluno == $lista->idAluno){
                              switch ($lista->nivel) {
                                case 1:
                                  echo "<td>Pré-silabico</td>";
                                  break;
                                case 2:
                                  echo "<td>Silábico</td>";
                                  break;
                                case 3:
                                  echo "<td>Silábico-Alfabético</td>";
                                  break;
                                case 4:
                                  echo "<td>Alfabético</td>";
                                  break;
                                case 5:
                                  echo "<td>Ortográfico</td>";
                                  break;
                                default:
                                  # code...
                                  break;
                              }
                            ?>
                            <?php
                              $flag = TRUE;
                            }
                          }
                        if(!$flag){
                          echo "<td>-</td>";
                          $flag = FALSE;
                        }
                        $periodo = $periodo + 1;
                      }

                      echo "</tr>";
                      $periodo = 0;
                    }

                    ?>
                    
                    
                    </tbody>
                </table>
            </div>
        </div>

        <?php 
        }
    }
        ?>
        </div>
        </div>

        </div>


        
  </body>
</html>