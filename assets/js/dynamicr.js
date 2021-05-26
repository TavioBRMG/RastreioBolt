function search(){
         var dados = $('#codigo').serialize();
         $.ajax({
            url:"api/obj.php",
            type:"POST",
            dataType: 'html',
            data: dados,
            success: function(data) {
               $('#result').empty().html(data);
            }
         });
}