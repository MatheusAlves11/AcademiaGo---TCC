<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"
        defer></script>
        <link rel="stylesheet" href="../public/css/css.css">

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
                  <a class="nav-link active" href="/homeAdm">Personais</a>
              </li>
              <li class="nav-item ">
                  <a class="nav-link" href="/homeAdm-aluno">Alunos</a>
              </li>

            </ul>
        </div>
    </nav>

    <!--FORMULÁRIO-->
    <div class="container col-md-8 mb-4" style="width: 90%;">
    <div class="row justify-content-center m-4">
      <div class="col-md-10">
    <div >
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
        <form class="row needs-validation" novalidate method="POST" action="/Forms-atualizar-personal/{{$entidade->id}}" enctype="multipart/form-data">
             @csrf
            <h2 class="mb-4 texto"><b> Atualizar Personal</b></h2>

            <!--PARTE DE ENVIAR IMAGEM-->
            <div class=" col-md-12">
                <hr>
                <div class="input-group mb-3">
                    <input type="file" class="form-control" id="inputGroupFile02" name="foto" alt="{{$entidade->foto}}">
                    <label class="input-group-text" for="inputGroupFile02">Upload</label>
                </div>
                <hr>
            </div>

            <!--SEGUNDA COLUNA DO FORMULARIO-->
            <div class="col-md-6 order-2">
                    <div class="mb-3">
                        <input type="name" class="form-control" id="filial" name="filial" placeholder="Filial" value="{{$personal->filial}}" required>
                    </div>
                    <div class="mb-3">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email *" value="{{$entidade->email}}" required >

                    </div>
            </div>

            <!--PRIMEIRA COLUNA DO FORMULARIO-->
            <div class="col-md-6 order-1">
                <div class="mb-3">
                    <input type="name" class="form-control" id="nome" name="name" placeholder="Nome *" value="{{$entidade->name}}" required>
                </div>
                <div class="mb-3">
                    <input type="number" min="1" class="form-control" id="cref" name="cref" placeholder="CREF *" value="{{$personal->cref}}" required>
                </div>
                <div class="mb-3">
                    <input type="tel" class="form-control" id="telefone" name="telefone" placeholder="Telefone *" value="{{$personal->telefone}}" required>
                </div>
                </div>
            </div>
            <!--BOTÃO-->
            <button class="btn btn-primary" type="submit">Atualizar</button>
        </form>
    </div>
    </div>
    </div>
    </div>

    <script src="../public/js/jquery.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../public/js/script.js"></script>
</body>

</html>