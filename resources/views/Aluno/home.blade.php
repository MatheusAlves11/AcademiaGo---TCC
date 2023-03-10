<!DOCTYPE html>
<html lang="pt-br">
<!--TREINO DE HOJE-->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Academias Go</title>
    <link rel="stylesheet" href="../style/style.css">

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!--CSS pessoal-->
    <link rel="stylesheet" href="../public/css/css.css">

</head>

<body>

    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <!--Só aparece no celular--->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!--Links-->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
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
                        <a class="nav-link" href="https://wa.me/+55087988572731" target="_blank">Entrar em contato</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container bg-light mb-3" style="width: 90%;text-align: center;">
        <!-- <div class="row "> -->

        @if (session('msg'))
        <p class="alert alert-success">{{session('msg')}}</p>
        @endif
        <div class="row">
            <div class="col-sm-2" style="display: flex;flex-direction: column;justify-content: space-around;">
                <h4 id="saudacao"></h4>
                <div>
                    @if(!empty($usuario->foto))
                    <a type="file" href="/detalhes" class="fotoPerfil" style="padding:0px!important">
                        <img src="img/{{$usuario->foto}}" alt="" style="height: 6rem;width: 6rem;border-radius: inherit;">
                    </a>
                    @else
                    <a type="file" href="/detalhes" class="fotoPerfil">
                        <img src="../public/img/user.png" alt="" style="height: 3.5rem; width:3.5rem;">
                    </a>
                    @endif
                </div>
                <p><b>{{$usuario->name}}</b></p>
                <p class="mb-4">ID: {{$aluno->id}}</p>
                <p>{{$aluno->filial}}</p>

                <a class="btn btn-danger" href="/logout">Sair</a>
                <p>Garanhuns - PE</p>
            </div>

            <div class="col-sm-10">
                <h2 class="texto mb-4"> 
                     @if(!empty($treino))
                         <b>Treino  @foreach ($treino as $treinos) @if($treinos->nome==$aluno->treinoVez){{$treinos->nome}} @break @endif @endforeach de {{$usuario->name}} </b>
                    @else
                        <b>Treino não existe</b>
                    @endif
                </h2>
                <div class="table-responsive">
                    @if(!empty($treino))
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Exercício</th>
                                <th>Série</th>
                                <th>Repetição</th>
                                <th>Descanso</th>
                                <th>Musculo</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($treino as $treinos)
                            @foreach ($exercicios as $exercicio)
                            @foreach($treinos->exercicio as $exerciciosExpecificos)
                            @if($exerciciosExpecificos==$exercicio->id)
                            <tr>
                                    <td>{{$exercicio->exercicio}}</td>
                                    <td>{{$exercicio->serie}}</td>
                                    <td>{{$exercicio->repeticoes}}</td>
                                    <td>{{$exercicio->descanso}} {{$exercicio->tipoTempoDuracao}}</td>
                                    <td>{{$exercicio->musculo}}</td>
                                </tr>
                                @endif
                                @endforeach
                        @endforeach
                        @endforeach
                        </tbody>
                    </table>
                    @endif
                    @if(!empty($treino))
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Exercício</th>
                                <th>Duração</th>
                                <th>Meta(cal)</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($cardio as $cardioGeral)
                        @foreach ($cardios as $cardios)
                        @foreach ($cardioGeral->cardio as $cardioExpecifico)
                        @if($cardios->id==$cardioExpecifico)   
                            <tr>
                              <td>{{$cardios->exercicio}}</td>
                              <td>{{$cardios->duracao}} {{$cardios->tipoTempoDuracao}}</td>
                              <td>{{$cardios->meta}}</td>
                            </tr>
                        @endif
                        @endforeach
                        @endforeach
                        @endforeach
                        </tbody>
                    </table>
                    <div class="col-md-12">
                    @foreach ($treino as $treinos) 
                            @if($treinos->nome==$aluno->treinoVez)
                            <form action="/concluirTreino/{{$treinos->id}}" method="POST">
                                     @csrf 
                                    <button href="/concluirTreino/{{$treinos->id}}" class="btn btn-primary" onclick="event.preventDefault(); this.closest('form').submit();">Concluir treino</button>
                                 </form>
                                 @break
                            @endif
                        @endforeach
                    </div>
                    @endif
            </div>
        </div>
    </div>
    <script src="../public/js/jquery.js"></script>
    <script>
        window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')
    </script>
    <script src="../public/js/script.js"></script>
    <script src="../public/js/saudacao.js"></script>
</body>

</html>