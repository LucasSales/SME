<?php
include_once '../Controller/ControladorPeriodo.php';
include_once '../Controller/ControladorEscola.php';
include_once '../Controller/ControladorAluno.php';

$idEscola = $_GET['idEscola'];

$c = new ControladorPeriodo();
$c1 = new ControladorEscola();
$c2 = new ControladorAluno();

$alunos = $c2->buscarAlunosPorEscola($idEscola);

$escola = $c1->buscarEscola($idEscola);


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

  ?>


<html>
  <head>
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">

      // Load the Visualization API and the piechart package.
      google.load('visualization', '1.0', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
          ['Pre-silabico', <?php echo $qtd_presilabico_1;?>],
          ['Silabico', <?php echo $qtd_silabico_1; ?>],
          ['Silabico Alfabetico', <?php echo $qtd_silabico_alf_1; ?>],
          ['Alfabetico', <?php echo $qtd_alf_1; ?>],
          ['Ortografico', <?php echo $qtd_ort_1; ?>]
        ]);

        var data2 = new google.visualization.DataTable();
        data2.addColumn('string', 'Topping');
        data2.addColumn('number', 'Slices');
        data2.addRows([
          ['Pre-silabico', <?php echo $qtd_presilabico_2;?>],
          ['Silabico', <?php echo $qtd_silabico_2; ?>],
          ['Silabico Alfabetico', <?php echo $qtd_silabico_alf_2; ?>],
          ['Alfabetico', <?php echo $qtd_alf_2; ?>],
          ['Ortografico', <?php echo $qtd_ort_2; ?>]
        ]);

        var data3 = new google.visualization.DataTable();
        data3.addColumn('string', 'Topping');
        data3.addColumn('number', 'Slices');
        data3.addRows([
          ['Pre-silabico', <?php echo $qtd_presilabico_3;?>],
          ['Silabico', <?php echo $qtd_silabico_3; ?>],
          ['Silabico Alfabetico', <?php echo $qtd_silabico_alf_3; ?>],
          ['Alfabetico', <?php echo $qtd_alf_3; ?>],
          ['Ortografico', <?php echo $qtd_ort_3; ?>]
        ]);

        var data4 = new google.visualization.DataTable();
        data4.addColumn('string', 'Topping');
        data4.addColumn('number', 'Slices');
        data4.addRows([
          ['Pre-silabico', <?php echo $qtd_presilabico_4;?>],
          ['Silabico', <?php echo $qtd_silabico_4; ?>],
          ['Silabico Alfabetico', <?php echo $qtd_silabico_alf_4; ?>],
          ['Alfabetico', <?php echo $qtd_alf_4; ?>],
          ['Ortografico', <?php echo $qtd_ort_4; ?>]
        ]);


        // Set chart options
        var options = {'title':'Periodo 1',
                       'width':400,
                       'height':300};

                       var options2 = {'title':'Periodo 2',
                       'width':400,
                       'height':300};

                       var options3 = {'title':'Periodo 3',
                       'width':400,
                       'height':300};

                       var options4 = {'title':'Periodo 4',
                       'width':400,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div1'));
        chart.draw(data, options);

        var chart2 = new google.visualization.PieChart(document.getElementById('chart_div2'));
        chart2.draw(data2, options2);

        var chart3 = new google.visualization.PieChart(document.getElementById('chart_div3'));
        chart3.draw(data3, options3);

        var chart4 = new google.visualization.PieChart(document.getElementById('chart_div4'));
        chart4.draw(data4, options4);
      }
    </script>


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

        if(count($alunos) > 0){
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

                    $periodo = 1;
                    foreach ($alunos as $aluno) {
                    ?>
                      <tr>
                      <td>*</td>
                      <td><?php echo $aluno->nome;?></td>
                    <?php
                      while($periodo < 5){
                        
                        $lista_alunos_periodo = $c->getIdsAlunoPorPeriodo($periodo);
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
                      $periodo = 1;
                    }

                    ?>
                    
                    
                    </tbody>
                </table>
            </div>
        </div>

        <?php 
        }
        ?>
        </div>
        </div>

        </div>


        
  </body>
</html>