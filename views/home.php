<!DOCTYPE html>
<html>

<head lang="PT-BR">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Quake 3 arena</title>
    <!--img barra de navegação-->
    <link rel="shortcut icon" href="assets/img/Quake3-icon.png">
    <!--bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">

    <!--linhas para rodar um bowsers antigos-->
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <header>
        <!--================================================================================================-->
        <!-- BARRA DE NAVEGAÇÃO -->
        <!--================================================================================================-->
    </header>
    <nav id="conteudo" class="container">
        <!--================================================================================================-->
        <!-- NAV CONTAINER DE NAVEGAÇÃO -->
        <!--================================================================================================-->
        <!-- PAGINA FORMULARIO -->
        <div class="tab-pane" id="settings" role="tabpanel" aria-labelledby="settings-tab">
            <h4 class="card-title col-md-12 mt-2"><b>Leitor de Logs</b></h4>
            <?php $this->loadPag($viewName, $viewData); ?><!-- Redirecionamento para navForm.php -->
        </div><!-- FIM FORMULARIO -->
    </nav>
    <footer>
        <!--================================================================================================-->
        <!-- RODAPÉ DA PAGINA -->
        <!--================================================================================================-->
    </footer>
    <!--================================================================================================-->
    <!-- jQuery first, then Popper.js, Bootstrap, Validate.js then Mask.js -->
    <!--================================================================================================-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
    <!--Arquivo de edição js-->
    <script type="text/javascript" src="assets/js/custom.js"></script>
</body>

</html>