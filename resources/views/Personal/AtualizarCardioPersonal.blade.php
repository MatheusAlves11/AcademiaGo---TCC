<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <!--CSS BOOTSTRAP-->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
   integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
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
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

   <!--LINK-->
   <div class="collapse navbar-collapse" id="navbarNav">
   <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link " href="/homePersonal">Alunos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/homePersonal-treino">Exercício</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="/homePersonal-cardio">Cardio</a>
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
        <h2 class="mb-4 texto"><b> Atualizar do Cardio</b></h2>

        <form class="row needs-validation" novalidate method="POST" action="/Forms-atualizar-cardio/{{$cardio->id}}">
             @csrf
             @method('PUT')
          <hr>
          <div class="col-md-4 mb-4">
            <input type="name" class="form-control" id="name" name="exercicio" value="{{$cardio->exercicio}}" placeholder="Nome *">
          </div>
          <div class="col-md-4 mb-4">
            <select name="intensidade" class="form-select form-control">
              <option selected disabled value="">Intensidade*</option>
              <option value="Leve" {{$cardio->intensidade=="Leve"?"selected='selected'":""}}>Leve</option>
              <option value="Moderada" {$cardio->intensidade=="Moderada"?"selected='selected'":""}}>Moderada</option>
              <option value="Alta" {$cardio->intensidade=="Alta"?"selected='selected'":""}}>Alta</option>
            </select>         
          </div>

          <div class="col-md-4 mb-4">
            <input type="number" class="form-control" id="number" name="meta" value="{{$cardio->meta}}" min="0" placeholder="Meta de Cal *">
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
</body>

</html>