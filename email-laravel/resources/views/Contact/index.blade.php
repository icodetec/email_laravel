<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    

    <title>Contato</title>
    
    
    <style>
        body
        { 
        background:#f7f7f7; 
        }
        textarea:hover, 
        input:hover, 
        textarea:active, 
        input:active, 
        textarea:focus, 
        input:focus,
        button:focus,
        button:active,
        button:hover,
        label:focus,
        .btn:active,
        .btn.active
        {
            outline:0px !important;
            -webkit-appearance:none;
            box-shadow: none !important;
        }
        .icon
        {
            color:#af00ff;
        } 
        .fomr-col
        { 
            background-image: url("{{ asset('assets/img/background.jpg') }}");  /* The image used */
            background-color: #cccccc; /* Used if the image is unavailable */
            background-position: center; /* Center the image */
            background-repeat: no-repeat; /* Do not repeat the image */
            background-size: cover; /* Resize the background image to cover the entire container */
            border-radius: 10px;
            -webkit-border-radius: 10px;
            -moz-border-radius: 10px;
        }
    </style>
    </head>
<body>

<div id="container" class="container mt-5">
    
    <div class="row pt-2">
        
        <div class="col-2 col-md-4 col-sm-4"></div>    
        
        <div class="col-8 col-md-4 col-sm-4 fomr-col border border-1 p-3">
            <div class="icon text-center">
                <i class="fa-solid fa-envelope fa-3x"></i>     
            </div> 
            
            <div class="alert alert-danger d-none alert_box" role="alert"></div>

            <form id="contato_email" name="contato_email">
                {{ csrf_field() }}
                <div class="mt-5 mb-4">
                    <input class="form-control p-2" name="name" id="name" placeholder="Nome" value="">
                </div>    
                <div class="mb-4">
                    <input  class="form-control p-2" name="email" id="email" placeholder="Email@example.com"  value="">
                </div>
                <div class="mb-4">
                    <textarea class="form-control" name="menssage" id="message" placeholder="menssagem" rows="4"  value=""></textarea>
                </div>
                <button type="submit" class="btn mt-3 btn-primary">Enviar</button>
            </form>
        </div> 
            
        <div class="col-2 col-md-4 col-sm-4"></div>
        
    </div> 


    <script>
        //ENVIA OS DADOS PARA PAGINA(PHP) DE PROCESSAMENTO DE DADOS
        $('form[name="contato_email"]').submit(function(event)
        {   
            

            event.preventDefault();//Não atualiza a pagina após o submit
            
            //Validando Nome 
            var name  = $("#name").val();
            var regex =  /^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$/;//permite letras, letras com acento e espaços em branco. 
            var name_validate =  regex.test(name) && name.trim().split(' ').length >= 2;
            if(name_validate == false)
            {
                $('.alert_box').removeClass('d-none').text("Digite seu Nome e Sobrenome");
                return false;
            }
            
    
            //Validando Email
            var email = $("#email").val();
            var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/; 
            var email_validate =  regex.test(email);
            if(email_validate == false)
            { 
            $('.alert_box').addClass('d-none');//Fecha a div "alert_box" se ela estiver aberta no alert nome.  
            $('.alert_box').removeClass('d-none').text("Email inválido");
            return false;
            };
            
            //Validando Mensagem
            var message = $.trim($("#message").val().replace(/\s+/g, ' '));
            var message_value = message.length;
            if(message_value <= 10)
            {
            $('.alert_box').removeClass('d-none').text("Sua Mensagem deve ter mais de 10 Caracteres");
            return false;
           
            };
            
            $('.alert_box').removeClass('d-none').text("Enviando....");

            
            $.ajax({
                url:"{{url('store')}}",
                type:"post",
                data: $(this).serialize(),//pega todos os dados do formulário
                dataType: 'json',
                success: function(dados)
                {      
                $('.alert_box').removeClass('d-none').html(dados);
                $('form[name="contato_email"] input').val(' ');
                $('form[name="contato_email"] textarea').val(' '); 
                
                }
            });
        }); 
        </script>

</div> 
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>
</html>