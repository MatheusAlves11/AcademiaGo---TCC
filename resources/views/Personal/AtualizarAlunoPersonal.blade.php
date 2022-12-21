<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!--CSS BOOTSTRAP-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <!--CSS-->
  <link rel="stylesheet" href="../public/css/css.css">
  <script src="jsv/scripts.js" defer></script>
  <!--defer faz com que o js seja executado dps q o html for executado-->

  <title>Academias Go</title>
</head>

<body>

  <!--NAVBAR-->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">

    <!--SÓ APARECE NO CELULAR-->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!--LINK-->
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" href="/homePersonal">Alunos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/homePersonal-treino">Exercício</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/homePersonal-cardio">Cardio</a>
        </li>
      </ul>
    </div>
  </nav>

  <!--FORMULARIO-->
  <div class="container col-md-8 mb-4" style="width: 90%;">
    <div class="row justify-content-center m-4">
      <div class="col-md-10">
       @if ($errors->any())
              <div>
                <div class="alert alert-danger">
                  <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                      @break;
                  @endforeach
                </ul>
              </div>
            </div>
          @endif
          @if (session('danger'))
            <div class="alert alert-danger">
              {{ session('danger') }}
            </div>
          @endif 
          <h2 class="mb-4 texto"><b> Atualizar Aluno</b></h2>
          <form class="row needs-validation" novalidate method="POST" action="/Forms-atualizar-aluno/{{$aluno->id}}" enctype="multipart/form-data">
          @csrf
          <hr>
          <div class="input-group mb-3">
            <input type="file" class="form-control" name="foto" id="inputGroupFile02" alt="{{$entidade->foto}}">
            <label class="input-group-text" for="inputGroupFile02">Upload</label>
          </div>
          <hr>
          <h5 class="g-4 mb-4 texto">Dados de Login:</h5>
          <div class="col-md-6 mb-4 mx-auto">
            <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu e-mail *" value="{{$entidade->email}}" readonly>
            <div class="valid-feedback">
              Ok!
            </div>
            </div>
          </hr>
          <hr>
          <h5 class="g-4 mb-4 texto">Dados pessoais:</h5>

          <!--NOME-->
          <div class="col-md-12 mb-4">
            <input type="name" class="form-control" id="name" name="name" placeholder="Digite seu nome *" value="{{$entidade->name}}"required>
            <div class="valid-feedback">
              Ok!
            </div>
          </div>

          <!--ENDEREÇO-->
          <div class="col-md-5 mb-4">
            <input type="text" class="form-control" id="cep" placeholder="Digite seu CEP *"  value="{{$aluno->cep}}" name="cep" maxlength="8" minlength="8" required data-cep>
            <div class="valid-feedback">
              Ok!
            </div>
          </div>
          <div class="col-md-5 mb-4">
            <input type="text" class="form-control" id="rua" placeholder="Rua *" name="rua" value="{{$aluno->rua}}" readonly >
            <div class="valid-feedback">
              Ok!
            </div>
          </div>
          <div class="col-md-2 mb-4">
            <input type="text" class="form-control" id="numero" placeholder="Nº *" name="numeroCasa" value="{{$aluno->numeroCasa}}"required>
            <div class="valid-feedback">
              Ok!
            </div>
          </div>
          <div class="col-md-4 mb-4">
            <input type="text" class="form-control" id="bairro" placeholder="Bairro *" name="bairro" value="{{$aluno->bairro}}" readonly >
            <div class="valid-feedback">
              Ok!
            </div>
          </div>
          <div class="col-md-4 mb-4">
            <input type="text" class="form-control" id="cidade" placeholder="Cidade *" name="cidade" value="{{$aluno->cidade}}" readonly >
            <div class="valid-feedback">
              Ok!
            </div>
          </div>
          <div class="col-md-4 mb-4">
            <input type="text" class="form-control" id="uf" name="uf" name="uf" placeholder="Estado *" value="{{$aluno->uf}}" readonly >
            <div class="valid-feedback">
              Ok!
            </div>
          </div>
          <div class="col-md-12 mb-4">
            <input type="text" class="form-control" id="complemento" name="complemento" placeholder="Complemento" value="{{$aluno->complemento}}" required>
            <div class="valid-feedback">
              Ok!
            </div>
          </div>
          <!--CONTATO-->
          <div class="col-md-4 mb-4">
            <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Telefone *" value="{{$aluno->telefone}}" required>
            <div class="valid-feedback">
              Ok!
            </div>
          </div>
          <div class="col-md-4 mb-4">
            <input type="text" class="form-control" name="filial" id="unidade" placeholder="Unidade *" value="{{$aluno->filial}}" required>
            <div class="valid-feedback">
              Ok!
            </div>
          </div>

          <!--INFOS-->
          <div class="col-md-4 mb-4">
            <input type="date" class="form-control" id="dataDeNascimento" name="dataNascimento" value="{{$aluno->dataNascimento}}" placeholder="Data de nascimento *" required>
            <div class="valid-feedback">
              Ok!
            </div>
          </div>

          <div class="col-md-4 mb-4">
            <select name="genero" class="form-select form-control">
              <option selected disabled value="">Sexo: *</option>
              <option value="Masculino" {{$aluno->genero=="Masculino"?"selected='selected'":""}}>Masculino</option>
              <option value="Feminino" {{$aluno->genero=="Feminino"?"selected='selected'":""}}>Feminino</option>
            </select>
          </div>
          <div class="col-md-4 mb-4">
            <input type="number" class="form-control" id="peso" name="peso" value="{{$aluno->peso}}" placeholder="Peso *" required>
            <div class="valid-feedback">
              Ok!
            </div>
          </div>
          <div class="col-md-4 mb-4">
            <input type="number" class="form-control" id="altura" name="altura" value="{{$aluno->altura}}" placeholder="Altura *" required>
            <div class="valid-feedback">
              Ok!
            </div>
          </div>

          <!--INFOS ADICIONAIS-->
          <hr>
          <h5 class="g-4 mb-4" id="texto">Informações adicionais:</h5>
          <div class="col-md-6 mb-4">
            <select name="frequencia" class="form-select form-control">
              <option selected disabled value="">Frequência *</option>
              <option value="1" {{$aluno->frequencia=="1"?"selected='selected'":""}}>1</option>
              <option value="2" {{$aluno->frequencia=="2"?"selected='selected'":""}}>2</option>
              <option value="3" {{$aluno->frequencia=="3"?"selected='selected'":""}}>3</option>
              <option value="4" {{$aluno->frequencia=="4"?"selected='selected'":""}}>4</option>
              <option value="5" {{$aluno->frequencia=="5"?"selected='selected'":""}}>5</option>
              <option value="6" {{$aluno->frequencia=="6"?"selected='selected'":""}}>6</option>
              <option value="7" {{$aluno->frequencia=="7"?"selected='selected'":""}}>7</option>
            </select>
          </div>
          <div class="col-md-6 mb-4">
            <select name="objetivo"  class="form-select form-control">
              <option selected disabled value="">Objetivo: *</option>
              <option value="Emagrecimento" {{$aluno->objetivo=="Emagrecimento"?"selected='selected'":""}}>Emagrecimento</option>
              <option value="Hipertrofia" {{$aluno->objetivo=="Hipertrofia"?"selected='selected'":""}}>Hipertrofia</option>
              <option value="Resistência" {{$aluno->objetivo=="Resistência"?"selected='selected'":""}}>Resistência</option>
            </select>
          </div>

          <div class="col-md-12 mb-4">
            <input type="text" class="form-control" id="remedio" name="remedioControlado"  value="{{$aluno->remedioControlado}}" placeholder="Toma remédio controlado? Se sim, quais?" required>
          </div>

          <div class="col-md-4 mb-4">
            <select name="bebidaAlcolica" class="form-select form-control">
              <option selected disabled value="">Consome bebida alcoolica*</option>
              <option value="0" {{$aluno->bebidaAlcolica=="0"?"selected='selected'":""}}>Não</option>
              <option value="1" {{$aluno->bebidaAlcolica=="1"?"selected='selected'":""}}>Sim</option>
            </select>   
          </div>
          <div class="col-md-5 mb-4">
          <select name="taxasAltas" class="form-select form-control">
              <option selected disabled value="">Colesterol, triglicerídeo ou glicose alta?*</option>
              <option value="0" {{$aluno->bebidaAlcolica=="0"?"selected='selected'":""}}>Não</option>
              <option value="1" {{$aluno->bebidaAlcolica=="1"?"selected='selected'":""}}>Sim</option>
            </select>           
          </div>
          <div class="col-md-3 mb-4">
            <select name="alteracaoCardiaca" class="form-select form-control">
              <option selected disabled value="">Alteração cardíaca?*</option>
              <option value="nao" {{$aluno->alteracaoCardiaca=="nao"?"selected='selected'":""}}>Não possui</option>
              <option value="leve" {{$aluno->alteracaoCardiaca=="leve"?"selected='selected'":""}}>Sim, leve</option>
              <option value="grave" {{$aluno->alteracaoCardiaca=="grave"?"selected='selected'":""}}>Sim, grave</option>
            </select>
          </div>

          <div class="col-md-4 mb-4">
            <select name="fumante" class="form-select form-control">
              <option selected disabled value="">É fumante?*</option>
              <option value="0" {{$aluno->fumante=="0"?"selected='selected'":""}}>Não</option>
              <option value="1" {{$aluno->fumante=="1"?"selected='selected'":""}}>Sim</option>
            </select>
          </div>

          <div class="col-md-4 mb-4">
            <select name="diabes" class="form-select form-control">
              <option selected disabled value="">Possui diabetes?*</option>
              <option value="0" {{$aluno->diabes=="0"?"selected='selected'":""}}>Não</option>
              <option value="1" {{$aluno->diabes=="1"?"selected='selected'":""}}>Sim</option>
            </select>
          </div>

          <div class="col-md-4 mb-4">
            <select name="hipertenso" class="form-select form-control">
              <option selected disabled value="">É hipertenso?*</option>
              <<option value="0" {{$aluno->hipertenso=="0"?"selected='selected'":""}}>Não</option>
              <option value="1" {{$aluno->hipertenso=="1"?"selected='selected'":""}}>Sim</option>
            </select>
          </div>
          <div class="col-md-12 mb-4">
              <b><p>Possui Lesão?*</p></b>
              <div style="display: flex;justify-content: space-evenly;align-items: center;flex-wrap: wrap;">
              <div class="from-grup">
                <input type="checkbox" name="lesao[]" value="Não Possui" onclick="marcaDesmarca(this)">Não Possui
              </div>
              <div class="from-grup">
                <input type="checkbox" name="lesao[]" value="Ombro" onclick="marcaDesmarca(this)">Ombro
              </div>
              <div class="from-grup">
                <input type="checkbox" name="lesao[]" value="Trapézio" onclick="marcaDesmarca(this)">Trapézio
              </div>
              <div class="from-grup">
                <input type="checkbox" name="lesao[]" value="Peito" onclick="marcaDesmarca(this)">Peito
              </div>
              <div class="from-grup">
                <input type="checkbox" name="lesao[]" value="Bíceps" onclick="marcaDesmarca(this)">Bíceps
              </div>
              <div class="from-grup">
                <input type="checkbox" name="lesao[]" value="Tríceps" onclick="marcaDesmarca(this)">Tríceps
              </div>
              <div class="from-grup">
                <input type="checkbox" name="lesao[]" value="Coxa" onclick="marcaDesmarca(this)">Coxa
              </div>
              <div class="from-grup">
                <input type="checkbox" name="lesao[]" value="Panturrilha" onclick="marcaDesmarca(this)">Panturrilha
              </div>
              <div class="from-grup">
                <input type="checkbox" name="lesao[]" value="Costas" onclick="marcaDesmarca(this)">Costas
              </div>
              <div class="from-grup">
                <input type="checkbox" name="lesao[]" value="Abdomen" onclick="marcaDesmarca(this)">Abdomen
              </div>
          </div>
          </div>
          <!--BOTÃO DE CADASTRAR-->
          <div class="col-md-12">
            <button class="btn btn-primary">Atualizar</button>
          </div>
        </form>
      </div>
    </div>
   </div>

  <script src="../public/js/jquery.js"></script>
  <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
  <script src="../public/js/script.js"></script>
  <script 
  src = "https://code.jquery.com/jquery-3.4.1.min.js" integridade = "sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin = "anonymous" > </script>
  <script src="../public/js/consultaCEP.js"></script>
</body>

</html>