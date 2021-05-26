<!DOCTYPE html>
<html lang="pt-br">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="shortcut icon" href="img/icon.png">
      <title>RASTREIO BOLT</title>
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="assets/bootstrap/dist/css/bootstrap.min.css" crossorigin="anonymous">
      <!-- CSS personalizado --> 
      <link rel="stylesheet" type="text/css" href="assets/css/style.css">
      <!--datables CSS básico-->
      <link rel="stylesheet" type="text/css" href="assets/datatables/datatables.min.css"/>
      <!--datables estilo bootstrap 4 CSS-->  
      <link rel="stylesheet"  type="text/css" href="assets/datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
      <!--font awesome con CDN-->  
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
   </head>
   <body>
      <div class="input-group">
         <div class="input-group-prepend">
            <form method="POST" id="codigo">
               <button type='submit' class="input-group-text searchb btn-primary" id="basic-addon1">
               <img src="img/2250851.png" alt="" width="50"></button>
               </span>
         </div>
         <input type="text" class="form-control h-auto outlinen" placeholder="Código de rastreio" name='cod' id="cod" autofocus required>
         </form>
      </div>
      </div>
      <div class="cont mt-4 bg-white p-3 m-3 shadow-sm p-3 mb-5 bg-body rounded">
         <div class="row">
            <div class="col-lg-12">
               <div class="table-responsive">
                  <table id="bolt" class="table table-striped table-bordered fadeIn" cellspacing="0">
                     <thead class="bg-warning text-center">
                        <tr>
                           <th class="col-2">RASTREIO</th>
                           <th class="col-2">STATUS</th>
                           <th class="col-1">DIA</th>
                           <th class="col-1">HORA</th>
                           <th class="col-4">LOCAL</th>
                           <th class="col-1">UPDATE</th>
                           <th class="col-2"> </th>
                        </tr>
                     </thead>
                     <tbody class="text-center">
                       <?php
if (isset($_POST['cod']) && $_POST['cod'] != "")
{
    require ('api/obj.php');
    $set = new checkEnvio();
    foreach ($set->search($_POST['cod']) as $key => $value)
    {
        echo "<tr><td>$key</td>";
        foreach ($value as $chave => $text)
        {
            if ($text['Status'] == "Objeto entregue ao destinatário")
            {
                echo "<td><button type='button' class='btn btn-success'>ENTREGUE</button></td>";
            }
            else if ($text['Status'] == "Objeto em trânsito - por favor aguarde" || $text['Status'] == "Objeto postado")
            {
                echo "<td><button type='button' class='btn btn-primary'>POSTADO</button></td>";
            }
            else if ($text['Status'] == "Objeto roubado" || $text['Status'] == "Objeto ainda não chegou à unidade" || $text['Status'] == "Objeto não localizado no fluxo postal" || $text['Status'] == "Solicitação de suspensão de entrega recebida")
            {
                echo "<td><button type='button' class='btn btn-danger'>EXTRAVIADO</button></td>";
            }
            else if ($text['Status'] == "Objeto aguardando retirada no endereço indicado" || $text['Status'] == "Carteiro não atendido - Entrega não realizada")
            {
                echo "<td><button type='button' class='btn btn-successs'>FAZER RETIRADA</button></td>";
            }
            else if ($text['Status'] == "Destinatário não retirou objeto no prazo")
            {
                echo "<td><button type='button' class='btn btn-danger'>FAZER RETIRADA</button></td>";
            }
            else if ($text['Status'] == "A entrega não pode ser efetuada" || $text['Status'] == "Endereço incorreto Objeto sujeito a atraso na entrega ou a devolução ao remetente" || $text['Status'] == "Endereço incorreto Objeto será devolvido ao remetente")
            {
                echo "<td><button type='button' class='btn btn-warning'>DEVOLVIDO</button></td>";
            }
            else
            {
                echo "<td><button type='button' class='btn btn-secondary'>NULL</button></td>";
            }
            echo "<td>$text[Dia]</td>
                                   <td>$text[Hora]</td>
                                   <td>$text[Local]</td>
                                   <td>$text[Update]</td>
                                   <td><a class='link' href='api/obj.php?rastreio=$key' target='_blank'><i class='fas fa-plus'></i></a></td></tr>";
        }
    }
}
?>

                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>


<footer class="bg-secondary text-center text-white baixo">
  <!-- Copyright -->
  <div class="text-center p-3 bg-secondary">
    © 2021 - <b>V 1.0</b> Copyright:
    <b>Luiz Otávio </b> | 
      <!-- Github -->
      <a class="btn btn-outline-light btn-floating m-1" href="https://github.com/TavioBRMG" target="_blank" role="button"><i class="fab fa-github"></i></a>
      <!-- Email -->
      <a class="btn btn-outline-light btn-floating m-1" href="mailto:seunome@nomedaempresa.com.br" target="_blank" role="button"><i class="fas fa-envelope"></i></a>
  </div>
</footer>

      <!-- jQuery, Popper.js, Bootstrap JS -->
      <script src="assets/jquery/jquery-3.3.1.min.js"></script>
      <script src="assets/popper/popper.min.js"></script>
      <script src="assets/bootstrap/dist/js/bootstrap.min.js"></script>
      <!-- datatables JS -->
      <script type="text/javascript" src="assets/datatables/datatables.min.js"></script>    
      <!-- para usar botones en datatables JS -->  
      <script src="assets/datatables/Buttons-1.5.6/js/dataTables.buttons.min.js"></script>  
      <script src="assets/datatables/JSZip-2.5.0/jszip.min.js"></script>    
      <script src="assets/datatables/pdfmake-0.1.36/pdfmake.min.js"></script>    
      <script src="assets/datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
      <script src="assets/datatables/Buttons-1.5.6/js/buttons.html5.min.js"></script>
      <!-- código JS propìo-->    
      <script src="assets/dataTables/formatacao.js"></script>
      <script src="assets/js/dynamicr.js"></script> 
   </body>
</html>