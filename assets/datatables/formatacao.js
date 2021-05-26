         $(document).ready( function () {
           $('#bolt').DataTable({
            "pageLength" : 5,
            "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, 'Todos']],
             "language": {
                       "lengthMenu": "",
                       "info": "Mostrando página <strong style='font-size:13pt;'>_PAGE_</strong> de _PAGES_",
                       "infoEmpty": "",
                       "infoFiltered": "(filtrado de MAX registros no total)",
                       "sInfoPostFix": "",
                       "sInfoThousands": ".",
                       "sLoadingRecords": "Carregando...",
                       "sProcessing": "Processando...",
                       "sZeroRecords": "NENHUM REGISTRO ENCONTRADO",
                       "sSearch": "<i class='fas fa-search btn btn-secondary' style='margin-right:-7px;border-radius:0;border:solid #6c757d 1.5px;'></i>",
                       "oPaginate": {
                           "sNext": "Próximo",
                           "sPrevious": "Anterior",
                           "sFirst": "Primeiro",
                           "sLast": "Último"
                       },
                       "oAria": {
                           "sSortAscending": ": Ordenar colunas de forma ascendente",
                           "sSortDescending": ": Ordenar colunas de forma descendente"
                       }
                   }, 
                   responsive: "true",
        dom: 'Bfrtilp',       
        buttons:[ 
      {
        extend:    'excelHtml5',
        text:      '<i class="fas fa-file-excel text-light"></i> ',
        titleAttr: 'Excel',
        className: 'btn btn-success'
      },
      {
        extend:    'pdfHtml5',
        text:      '<i class="fas fa-file-pdf text-light"></i> ',
        titleAttr: 'PDF',
        className: 'btn btn-danger ms-1'
      },
      {
        extend:    'print',
        text:      '<i class="fa fa-print text-light"></i> ',
        titleAttr: 'PRINT',
        className: 'btn ms-1'
      }]
          });
      });