$(document).ready(function(){

    $("#telefone").mask("(00)00000-0000")
    $("#cpf").mask("000.000.000-00")
    $("#cep").mask("00000-000")

    $(".ver-endereco").on("click", function(){
        // var id = $(this).attr("id");

        // $.ajax({
        //     url:"endereco.php",
        //     type:"POST",
        //     data:{id:id},
        //     success:function(msg){
        //         console.log(msg);
        //     }
        // });
    });

});