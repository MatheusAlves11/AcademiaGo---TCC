<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <link rel="stylesheet" href="../public/css/css.css">

  <!--ICONs-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">


  <title>Academias Go</title>
</head>

<body>

  <!--NAVBAR-->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    
    <!--SÓ APARECE NO CELULAR-->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!--LINKS-->
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link " href="/homeAdm">Personais</a>
      </li>
      <li class="nav-item ">
          <a class="nav-link active" href="/homeAdm-aluno">Alunos</a>
      </li>
    </ul>
    </div>
  </nav>

  <!--FORMULARIO-->
  <div class="container col-md-8 mb-4 container">
    <div class="row justify-content-center m-4">
      <div class="col-md-10">
        <h2 class="mb-4 texto"><b>Detalhes do Aluno</b></h2>

        <!--BOTÕES-->
        <div class="col-md-12 d-flex align-items-end flex-column bd-highlight"> <!--posição do botão no fim da tela-->
          <div class="p-2 bd-highlight">
            <a href="CadastrarAlunoADM.html"><button class="btn btn-primary mb-3" href="">Editar</button></a>
            <a href=""><button class="btn btn-danger mb-3"><i class="bi bi-trash"></i></button></a>
          </div>

          <!--INFORMAÇÕES DO FORMULARIO-->
          <form class="row"> <!--DEIXA EM LINHA-->
            <hr>

             <!--IMAGEM DO ALUNO-->
            <div class="d-flex justify-content-center mb-4">
              <button type="file" class="fotoPerfil">
                <img src="../public/img/user.png" alt="" style="height: 5.5rem; width:5.5rem;">
            </button>
            </div>
            <hr>
            <h5 class="g-4 mb-5 texto">Nome:</h5>

            <div class="col-md-8">
              <p>Data de nascimento: </p>
            </div>
            <div class="col-md-4">
              <p>Altura: </p>
            </div>
            <div class="col-md-8">
              <p>Sexo:</p>
            </div>
            <div class="col-md-4">
              <p>Peso: </p>
            </div>
            <div class="col-md-8">
              <p>Endereço: </p>
            </div>
            <div class="col-md-4">
              <p>Número: </p>
            </div>
            <div class="col-md-4">
              <p>Cidade: </p>
            </div>
            <div class="col-md-4">
              <p>Bairro: </p>
            </div>
            <div class="col-md-4">
              <p>Complemento: </p>
            </div>
            <div class="col-md-8">
              <p>Email: </p>
            </div>
            <div class="col-md-4">
              <p>Telefone: </p>
            </div>
            <div class="col-md-8">
              <p>IMC: </p>
            </div>
            <div class="col-md-4">
              <p>Unidade: </p>
            </div>
            <!-- <div class="col-md-4">
                    <p>% Gordura: </p>
                  </div> -->

            <hr>
            <h5 class="g-4 mb-5 texto">Informações adicionais:</h5>

            <div class="col-md-8">
              <p>Frequência semanal: </p>
            </div>
            <div class="col-md-4">
              <p>Objetivo: </p>
            </div>
            <div class="col-md-8">
              <p>Colesterol, triglicerídeo ou glicose alta: </p>
            </div>
            <div class="col-md-4">
              <p>Alteração Cardíaca: </p>
            </div>
            <div class="col-md-4">
              <p>Fumante: </p>
            </div>
            <div class="col-md-4">
              <p>Diabestes: </p>
            </div>
            <div class="col-md-4">
              <p>Hipertensão: </p>
            </div>
            <!--  <div class="col-md-12">
                    <p>Cirurgia: </p>
                  </div> -->
            <div class="col-md-8">
              <p>Medicamento controlado: </p>
            </div>
            <div class="col-md-4">
              <p>Bebida alcoolica: </p>
            </div>
            <div class="col-md-8">
              <p>Lesão: </p>
            </div>
             <div class="col-md-4">
              <p>Problema pulmonar: </p>
            </div>
           
            
            <!-- 
                  <hr>
                  <h5 class="g-4 mb-5 texto">Medidas corporais:</h5>

                  <div class="col-md-4">
                    <p>Tórax: </p>
                  </div>
                  <div class="col-md-4">
                    <p>Abdomen: </p>
                  </div>
                   <div class="col-md-4">
                    <p>Cintura: </p>
                  </div>
                  <div class="col-md-4">
                    <p>Coxa D.: </p>
                  </div>
                  <div class="col-md-4">
                    <p>Coxa E.: </p>
                  </div>
                  <div class="col-md-4">
                    <p>Quadril: </p>
                  </div>
                  <div class="col-md-4">
                    <p>Escapular: </p>
                  </div>
                  <div class="col-md-4">
                    <p>Braço D.: </p>
                  </div>
                  <div class="col-md-4">
                    <p>Braço E.: </p>
                  </div>
                  <div class="col-md-8">
                    <p>Antebraço D.: </p>
                  </div>
                  <div class="col-md-4">
                    <p>Antebraço E.: </p>
                  </div>
                  <div class="col-md-8">
                    <p>Panturrilha D.: </p>
                  </div>
                  <div class="col-md-4">
                    <p>Panturrilha E.: </p>
                  </div>
 -->
            <!--INFORMAÇÇOES DO TREINO-->
            <hr>
            <h5 class="g-4 mb-5 texto">Resumo:</h5>
            <div class="col-md-7">
              <progress value="25" max="100">25%</progress>
              <h5>Meta: 100%</h5>
            </div>
            <div class="col-md-5">
              <p>Total de treinos: </p>
              <p>Total de conclusão: </p>
            </div>

          </form>
        </div>
      </div>
    </div>

    <script src="../public/js/jquery.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../public/js/script.js"></script>

</body>

</html>