<!-- HOME DO ADM-->
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Academias Go</title>
    <!-- CSS bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- JavaScript Popper Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="../public/css/css.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
        
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item">
                      <a class="nav-link " href="ListagemPersonaisADM.html">Personais</a>
                  </li>
                  <li class="nav-item ">
                      <a class="nav-link active" href="ListagemAlunosADM.html">Alunos</a>
                  </li>
                </ul>
            </div>
        </nav>

    <div class="container bg-light " style="text-align: center;">
        <div class="row ">

            <div class="col-sm-2">
                <h4>
                    Olá, ADM
                </h4>
                <div>
                    <button type="file" class="fotoPerfil">
                        <img src="../public/img/user.png" alt="" style="height: 3.5rem; width:3.5rem;">
                    </button>
                </div>
                <div class="row align-items-end">
                    <p> <b>NomeADM</b></p>
                    <p class="mb-4">
                        1234871
                    </p>
                </div>
                <button class="btn btn-danger">Sair</button>
                <p>Garanhuns - PE</p>
            </div>

            <div class="col-sm-10">
                <h2 class="mb-4 texto"><b> Treino X de NomeAluno</b></h2>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>
                                    Exercício
                                </th>
                                <th>
                                    Série
                                </th>
                                <th>
                                    Repetição
                                </th>
                                <th>
                                    Descanso
                                </th>
                                <th>
                                    Meta(cal)
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    exercicio
                                </td>
                                <td>
                                    3
                                </td>
                                <td>
                                    12
                                </td>
                                <td>
                                    90''
                                </td>
                                <td>
                                    45
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="../public/js/jquery.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../public/js/script.js"></script>
</body>

</html>