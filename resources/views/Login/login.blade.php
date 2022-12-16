<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Academias Go</title>
  <!--CSS Bootstrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <!--CSS -->
    <link rel="stylesheet" href="../public/css/styleLogin.css">

</head>

<body>
  <div class="container col-md-6 form-container ">
   <h1 class="mb-5 m-auto">Login</h1>
   <div class="col-md-8 m-auto">
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
   </div>
    <form class="col-md-8 m-auto" action="{{route('login.login')}}" method="post">
      @csrf
      <div class="mb-3">
         <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Email:" required>
      </div>
      <div class="mb-3">
        <input type="password" class="form-control" name="password" placeholder="Senha:" required>
      </div>
      <a href="/esqueceuSenha" class="gay">Esqueci Senha</a>
      <div class="d-flex flex-row-reverse bd-highlight">
      <div class="p-2 bd-highlight">
           <input  class="btn btn-primary mb-3" id="btn-submit" type="submit" value="Entrar"></input>
      </div>
    </div>
      <a class="contato d-flex justify-content-center" href="https://wa.me/+55087988572731" target="_blank">Entrar em
        contato</a>
    </form>

  </div>


  <!--SCRIPTS-->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"
    integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk"
    crossorigin="anonymous"></script>
</body>

</html>