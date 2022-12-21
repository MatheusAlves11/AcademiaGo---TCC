<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

  <link rel="stylesheet" href="../public/css/css.css">

  <!--ICONs-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">


  <title>Academias Go</title>
</head>

<body>

  <!--NAVBAR-->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <!--SÓ APARECE NO CELULAR-->

      <!--SÓ APARECE NO CELULAR-->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!--LINKS-->
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" href="/homeAluno">Início</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/treinos">Treinos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/historico">Histórico</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="https://wa.me/+55087988572731" target="_blank">Entrar em contato</a>
          </li>
        </ul>
      
    </div>
    </div>
  </nav>

  <!--FORMULARIO-->
  <div class="container bg-light " style="width: 90%;">
    <div class="row justify-content-center m-4">
      <div class="col-md-10">
        <h2 class="mb-4 texto"><b>Seus detalhes</b></h2>

        <!--BOTÕES-->
        <div class="col-md-12 d-flex align-items-end flex-column bd-highlight">
          <!--posição do botão no fim da tela-->
          <div class="p-2 bd-highlight" style="display: flex;">
            <a href="/editar" class="btn btn-primary" style="height: auto">Editar</a>
          </div>

          <!--INFORMAÇÕES DO FORMULARIO-->
          <form class="row">
            <!--DEIXA EM LINHA-->
            <hr>

            <!--IMAGEM DO ALUNO-->
            <div class="d-flex justify-content-center mb-4">
              @if(!empty($entidade->foto))
              <div type="file" class="fotoPerfil" style="padding:0px!important">
                <img src="../img/{{$entidade->foto}}" alt="" style="height: 12rem;width: 12rem;border-radius: inherit;">
              </div>
              @else
              <div type="file" class="fotoPerfil" style="background: rgb(219, 221, 223);">
                <img src="../public/img/user.png" alt="" style="height: 6.5rem; width:6.5rem;">
              </div>
              @endif
            </div>
            <hr>
            <h5 class="g-4 mb-5 texto">{{$entidade->name}}</h5>

            <div class="col-md-8">
            <p><b>Data de nascimento:</b> {{date('d/m/Y', strtotime($alunos->dataNascimento))}}</p>
            </div>
            <div class="col-md-4">
              <p><b>Altura:</b> {{$alunos->altura}}</p>
            </div>
            <div class="col-md-8">
              <p><b>Sexo:</b> {{$alunos->genero}}</p>
            </div>
            <div class="col-md-4">
              <p><b>Peso:</b> {{$alunos->peso}}</p>
            </div>
            <div class="col-md-8">
              <p><b>Endereço:</b> {{$alunos->rua}}</p>
            </div>
            <div class="col-md-4">
              <p><b>Número:</b> {{$alunos->numeroCasa}}</p>
            </div>
            <div class="col-md-4">
              <p><b>Cidade:</b> {{$alunos->cidade}}</p>
            </div>
            <div class="col-md-4">
              <p><b>Bairro:</b> {{$alunos->bairro}}</p>
            </div>
            <div class="col-md-4">
              <p><b>Complemento:</b> {{$alunos->complemento}}</p>
            </div>
            <div class="col-md-8">
              <p><b>Email:</b> {{$entidade->email}}</p>
            </div>
            <div class="col-md-4">
              <p><b>Telefone:</b> {{$alunos->telefone}}</p>
            </div>
            <div class="col-md-8">
              <p><b>IMC:</b> {{$alunos->imc}}</p>
            </div>
            <div class="col-md-4">
              <p><b>Unidade:</b> {{$alunos->filial}}</p>
            </div>
            <!-- <div class="col-md-4">
                    <p>% Gordura: </p>
                  </div> -->

            <hr>
            <h5 class="g-4 mb-5 texto">Informações adicionais:</h5>

            <div class="col-md-8">
              <p><b>Frequência semanal:</b> {{$alunos->frequencia}}</p>
            </div>
            <div class="col-md-4">
              <p><b>Objetivo:</b>{{$alunos->objetivo}} </p>
            </div>
            <div class="col-md-8">
              <p><b>Colesterol, triglicerídeo ou glicose alta:</b>
                @if ($alunos->altasTaxas==0)
              <p>Não possui taxas altas</p>
              @else
              <p>Possui</p>
              @endif</p>
            </div>
            <div class="col-md-4">
              <p><b>Alteração Cardíaca:</b>
                @if ($alunos->alteracaoCardiaca=='nao')
              <p>Não possui alteração Cardiaca</p>
              @elseif($alunos->alteracaoCardiaca=='leve')
              <p>Possui leve alteração</p>
              @elseif($alunos->alteracaoCardiaca=='grave')
              <p>Possui grave alteração</p>
              @endif</p>
            </div>
            <div class="col-md-4">
              <p><b>Fumante:</b>
                @if ($alunos->fumante=='0')
              <p>Não fumante</p>
              @else
              <p>fumante</p>
              @endif</p>
            </div>
            <div class="col-md-4">
              <p><b>Diabestes:</b>
                @if ($alunos->diabes=='0')
              <p>Não diabetico</p>
              @else
              <p>diabetico</p>
              @endif</p>
            </div>
            <div class="col-md-4">
              <p><b>Hipertensão:</b>
                @if ($alunos->hipertensao==0)
              <p>Não possuei hipertensão</p>
              @else
              <p>Possui hipertensão</p>
              @endif</p>
            </div>
            <!--  <div class="col-md-12">
                    <p>Cirurgia: </p>
                  </div> -->
            <div class="col-md-8">
              <p><b>Medicamento controlado: </b>
                @if (empty($alunos->remedioControlado))</p>
              <p>Não toma medicamento controlado</p>
              @else
              <p>{{$alunos->remedioControlado}}</p>
              @endif
            </div>
            <div class="col-md-4">
              <p><b>Bebida alcoolica: </b>
                @if ($alunos->bebibaAlcolica=='0')
              <p>Não bebe</p>
              @else
              <p>bebe</p>
              @endif</p>
            </div>
            <div class="col-md-8">
              <p><b>Lesão:</b> </p>
              @foreach ($alunos->lesao as $lesao)
              <li>{{$lesao}}</li>
              @endforeach
            </div>
            <div class="col-md-4">
              <p><b>Problema pulmonar:</b>
                @if ($alunos->fumante=='0')
              <p>Não possui</p>
              @else
              <p>fumante</p>
              @endif</p>
            </div>
            <!--INFORMAÇÇOES DO TREINO-->
            <hr>
            <h5 class="g-4 mb-5 texto">Resumo:</h5>
            <div class="col-md-7">
              <progress value="25" max="100">25%</progress>
              <h5>Meta: {{$alunos->metaTreino}}</h5>
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
    <script>
      window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')
    </script>
    <script src="../public/js/script.js"></script>

</body>

</html>