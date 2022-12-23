<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\alunos;
use App\Models\personals;
use App\Models\Cardio;
use App\Models\Exercicio;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function cadastrarTestes()
    {
        //Inicio criar ADM
            $novoADM = new User;
            $novoADM->name = 'Crisitano';
            $novoADM->email = 'adm@gmail.com';
            $novoADM->password = Hash::make('.');
            $novoADM->nivelAcesso = 1;
            $novoADM->foto = 'adm.png';
            $novoADM->save();
        //Fim criar ADM

        //Inicio criar PERSONAL
           //Personal Um
                $novaEntidade = new User;
                $novaEntidade->name = 'Lucas Sampaio';
                $novaEntidade->email = 'ls@gmail.com';
                $novaEntidade->password = Hash::make('.');
                $novaEntidade->nivelAcesso = 2;
                $novaEntidade->foto = 'instrutor1.png';
                $novaEntidade->save();
                $novoPersonal = new personals;
                $novoPersonal->cref = '11223';
                $novoPersonal->filial = 'Bairro Norte';
                $novoPersonal->telefone = '82981101112';
                $novoPersonal->id_usuario = $novaEntidade->id;
                $novoPersonal->save();
            //Personal Um 
            //Personal Dois
                $novaEntidade2 = new User;
                $novaEntidade2->name = 'Eduardo Wanderley';
                $novaEntidade2->email = 'e@gmail.com';
                $novaEntidade2->password = Hash::make('.');
                $novaEntidade2->nivelAcesso = 2;
                $novaEntidade2->foto = 'instrutor1.png';
                $novaEntidade2->save();
                $novoPersonal2 = new personals;
                $novoPersonal2->cref = '12345';
                $novoPersonal2->filial = 'Centro';
                $novoPersonal2->telefone = '87999990000';
                $novoPersonal2->id_usuario = $novaEntidade2->id;
                $novoPersonal2->save();
            //Personal Dois
            //Personal Dois
                $novaEntidade3 = new User;
                $novaEntidade3->name = 'Fábio Germano';
                $novaEntidade3->email = 'f@hotmail.com';
                $novaEntidade3->password = Hash::make('.');
                $novaEntidade3->nivelAcesso = 2;
                $novaEntidade3->foto = 'instrutor1.png';
                $novaEntidade3->save();
                $novoPersonal3 = new personals;
                $novoPersonal3->cref = '11';
                $novoPersonal3->filial = 'Heliópolis';
                $novoPersonal3->telefone = '87988889999';
                $novoPersonal3->id_usuario = $novaEntidade3->id;
                $novoPersonal3->save();
            //Personal Tres
            //Personal Quatro
                $novaEntidade4 = new User;
                $novaEntidade4->name = 'Vanessa Vieira';
                $novaEntidade4->email = 'v@gmail.com';
                $novaEntidade4->password = Hash::make('.');
                $novaEntidade4->nivelAcesso = 2;
                $novaEntidade->foto = 'instrutora.png';
                $novaEntidade4->save();
                $novoPersonal4 = new personals;
                $novoPersonal4->cref = '22435';
                $novoPersonal4->filial = 'Itabaianinha';
                $novoPersonal4->telefone = '87998983030';
                $novoPersonal4->id_usuario = $novaEntidade4->id;
                $novoPersonal4->save();
            //Personal Quatro
            //Fim criar PERSONAL

        //Inicio criar Aluno
            //Aluno 1
            $novoUsuarioAluno = new User;
            $novoUsuarioAluno->name = 'Pedro Vinícius';
            $novoUsuarioAluno->email = 'p@gmail.com';
            $novoUsuarioAluno->password = Hash::make('.');
            $novoUsuarioAluno->nivelAcesso = 3;
            $novoUsuarioAluno->foto = 'aluno3.jpeg';
            $novoUsuarioAluno->save();
            $novoAluno = new alunos;
            $novoAluno->filial = 'Heliopolis';
            $novoAluno->cep = '55298300';
            $novoAluno->rua = 'Rua bem bonita';
            $novoAluno->numeroCasa = '69';
            $novoAluno->bairro = 'magano';
            $novoAluno->cidade = 'Garanhuns';
            $novoAluno->uf = 'PE';
            $novoAluno->telefone = '82981101112';
            $novoAluno->dataNascimento = '2004-02-04';
            $novoAluno->genero = 'Masculino';
            $novoAluno->peso = '70';
            $novoAluno->altura = '1.7';
            $novoAluno->frequencia = '4';
            $novoAluno->objetivo = 'Hipertrofia';
            $novoAluno->fumante = '0';
            $novoAluno->lesao =  ["Não possui"];
            $novoAluno->alteracaoCardiaca = 'nao';
            $novoAluno->bebidaAlcolica = 0;
            $novoAluno->taxasAltas = 0;
            $novoAluno->diabes = 0;
            $novoAluno->hipertenso = 0;
            $novoAluno->imc = (70 / (1.7 * 1.7));
            $novoAluno->id_usuario = $novoUsuarioAluno->id;
            $novoAluno->intensidade = 'Alta';
            $novoAluno->metaTreino = 350;
            $novoAluno->save();
            //Aluno 1
            //Aluno 2
            $novoUsuarioAluno2 = new User;
            $novoUsuarioAluno2->name = 'Matheus Ruiz';
            $novoUsuarioAluno2->email = 'm@gmail.com';
            $novoUsuarioAluno2->password = Hash::make('.');
            $novoUsuarioAluno2->nivelAcesso = 3;
            $novoUsuarioAluno2->foto = 'aluno4.jpeg';
            $novoUsuarioAluno2->save();
            $novoAluno2 = new alunos;
            $novoAluno2->filial = 'Centro';
            $novoAluno2->cep = '55295370';
            $novoAluno2->rua = 'Rua Abílio Camilo Valença';
            $novoAluno2->numeroCasa = '389';
            $novoAluno2->bairro = 'Heliópolis';
            $novoAluno2->cidade = 'Garanhuns';
            $novoAluno2->uf = 'PE';
            $novoAluno2->telefone = '87981101002';
            $novoAluno2->dataNascimento = '2004-04-24';
            $novoAluno2->genero = 'Masculino';
            $novoAluno2->peso = '90';
            $novoAluno2->altura = '1.80';
            $novoAluno2->frequencia = '6';
            $novoAluno2->objetivo = 'Hipertrofia';
            $novoAluno2->fumante = '0';
            $novoAluno2->lesao =  ["Ombro"];
            $novoAluno2->alteracaoCardiaca = 'Leve';
            $novoAluno2->bebidaAlcolica = 0;
            $novoAluno2->taxasAltas = 0;
            $novoAluno2->diabes = 0;
            $novoAluno2->hipertenso = 0;
            $novoAluno2->imc = (90 / (1.80 * 1.80));
            $novoAluno2->intensidade = 'Moderada';
            $novoAluno2->metaTreino = 200;
            $novoAluno2->id_usuario = $novoUsuarioAluno2->id;

            $novoAluno2->save();
            //Aluno 2
            //Aluno 3
            $novoUsuarioAluno3 = new User;
            $novoUsuarioAluno3->name = 'Humberto Beltrão';
            $novoUsuarioAluno3->email = 'gb01@gmail.com';
            $novoUsuarioAluno3->password = Hash::make('.');
            $novoUsuarioAluno3->nivelAcesso = 3;
            $novoUsuarioAluno3->save();
            $novoAluno3 = new alunos;
            $novoAluno3->filial = 'Parque Florido';
            $novoAluno3->cep = '57035060';
            $novoAluno3->rua = 'Rua Durval Guimarães';
            $novoAluno3->numeroCasa = '914';
            $novoAluno3->bairro = 'Ponta Verde';
            $novoAluno3->cidade = 'Maceió';
            $novoAluno3->uf = 'AL';
            $novoAluno3->telefone = '82981101112';
            $novoAluno3->dataNascimento = '2004-12-03';
            $novoAluno3->genero = 'Masculino';
            $novoAluno3->peso = '50';
            $novoAluno3->altura = '1.7';
            $novoAluno3->frequencia = '4';
            $novoAluno3->objetivo = 'Resistência';
            $novoAluno3->fumante = '0';
            $novoAluno3->lesao =  ["Não Possui"];
            $novoAluno3->alteracaoCardiaca = 'nao';
            $novoAluno3->bebidaAlcolica = 0;
            $novoAluno3->taxasAltas = 0;
            $novoAluno3->diabes = 0;
            $novoAluno3->hipertenso = 0;
            $novoAluno3->imc = (50 / (1.7 * 1.7));
            $novoAluno3->intensidade = 'Leve';
            $novoAluno3->metaTreino = 500;
            $novoAluno3->id_usuario = $novoUsuarioAluno3->id;

            $novoAluno3->save();
            //Aluno 3
            //Aluno 4
            $novoUsuarioAluno4 = new User;
            $novoUsuarioAluno4->name = 'Carlos Gabryel';
            $novoUsuarioAluno4->email = 'c@gmail.com';
            $novoUsuarioAluno4->password = Hash::make('.');
            $novoUsuarioAluno4->nivelAcesso = 3;
            $novoUsuarioAluno4->foto = 'alunoCarlos.jpeg';
            $novoUsuarioAluno4->save();
            $novoAluno4 = new alunos;
            $novoAluno4->filial = 'Sítio';
            $novoAluno4->cep = '55330000';
            $novoAluno4->rua = 'Rua bom conselho';
            $novoAluno4->numeroCasa = '24';
            $novoAluno4->bairro = 'Centro';
            $novoAluno4->cidade = 'Bom Conselho';
            $novoAluno4->uf = 'PE';
            $novoAluno4->telefone = '87999992424';
            $novoAluno4->dataNascimento = '2003-01-24';
            $novoAluno4->genero = 'Masculino';
            $novoAluno4->peso = '50';
            $novoAluno4->altura = '1.5';
            $novoAluno4->frequencia = '3';
            $novoAluno4->objetivo = 'Hipertrofia';
            $novoAluno4->fumante = '0';
            $novoAluno4->lesao =  ["Coxa", "Ombro"];
            $novoAluno4->alteracaoCardiaca = 'grave';
            $novoAluno4->bebidaAlcolica = 0;
            $novoAluno4->taxasAltas = 0;
            $novoAluno4->diabes = 0;
            $novoAluno4->hipertenso = 0;
            $novoAluno4->imc = (50 / (1.5 * 1.5));
            $novoAluno4->intensidade = 'Alta';
            $novoAluno4->metaTreino = 200;
            $novoAluno4->id_usuario = $novoUsuarioAluno4->id;

            $novoAluno4->save();
            //Aluno 4
            //Aluno 5
            $novoUsuarioAluno5 = new User;
            $novoUsuarioAluno5->name = 'Davi Teixeira';
            $novoUsuarioAluno5->email = 'd@gmail.com';
            $novoUsuarioAluno5->password = Hash::make('.');
            $novoUsuarioAluno5->nivelAcesso = 3;
            $novoUsuarioAluno5->save();
            $novoAluno5 = new alunos;
            $novoAluno5->filial = 'Boa Vista';
            $novoAluno5->cep = '57035760';
            $novoAluno5->rua = 'Rua Brasil';
            $novoAluno5->numeroCasa = '87';
            $novoAluno5->bairro = 'Cohab';
            $novoAluno5->cidade = 'Garanhuns';
            $novoAluno5->uf = 'PE';
            $novoAluno5->telefone = '82982104232';
            $novoAluno5->dataNascimento = '2002-06-23';
            $novoAluno5->genero = 'Masculino';
            $novoAluno5->peso = '67';
            $novoAluno5->altura = '1.6';
            $novoAluno5->frequencia = '7';
            $novoAluno5->objetivo = 'Hipertrofia';
            $novoAluno5->fumante = '0';
            $novoAluno5->lesao =  ["Bíceps", "Panturrilha", "Coxa",];
            $novoAluno5->alteracaoCardiaca = 'grave';
            $novoAluno5->bebidaAlcolica = 0;
            $novoAluno5->taxasAltas = 0;
            $novoAluno5->diabes = 0;
            $novoAluno5->hipertenso = 0;
            $novoAluno5->imc = (67 / (1.6 * 1.6));
            $novoAluno5->intensidade = 'Moderada';
            $novoAluno5->metaTreino = 200;
            $novoAluno5->id_usuario = $novoUsuarioAluno5->id;

            $novoAluno5->save();
            //Aluno 5
            //Aluno 6
            $novoUsuarioAluno6 = new User;
            $novoUsuarioAluno6->name = 'Emanuelle Maria';
            $novoUsuarioAluno6->email = 'manu@gmail.com';
            $novoUsuarioAluno6->password = Hash::make('.');
            $novoUsuarioAluno6->nivelAcesso = 3;
            $novoUsuarioAluno6->foto = 'aluna2.jpeg';
            $novoUsuarioAluno6->save();
            $novoAluno6 = new alunos;
            $novoAluno6->filial = 'Limo';
            $novoAluno6->cep = '55700000';
            $novoAluno6->rua = 'Rua Dom José';
            $novoAluno6->numeroCasa = '914';
            $novoAluno6->bairro = 'Viana e moura';
            $novoAluno6->cidade = 'Garanhuns';
            $novoAluno6->uf = 'PE';
            $novoAluno6->telefone = '87988572731';
            $novoAluno6->dataNascimento = '2000-09-23';
            $novoAluno6->genero = 'Feminino';
            $novoAluno6->peso = '100';
            $novoAluno6->altura = '1.7';
            $novoAluno6->frequencia = '4';
            $novoAluno6->objetivo = 'Emagrecimento';
            $novoAluno6->fumante = '0';
            $novoAluno6->lesao =  ["Trapézio", "Ombro", "Panturrilha", "Abdomen"];
            $novoAluno6->alteracaoCardiaca = 'grave';
            $novoAluno6->bebidaAlcolica = 0;
            $novoAluno6->taxasAltas = 1;
            $novoAluno6->diabes = 0;
            $novoAluno6->hipertenso = 1;
            $novoAluno6->imc = (100 / (1.7 * 1.7));
            $novoAluno6->id_usuario = $novoUsuarioAluno6->id;
            $novoAluno6->intensidade = 'Leve';
            $novoAluno6->metaTreino = 350;
            $novoAluno6->save();
            //Aluno 6
            //Aluno 7
            $novoUsuarioAluno7 = new User;
            $novoUsuarioAluno7->name = 'João Victor';
            $novoUsuarioAluno7->email = 'jv@gmail.com';
            $novoUsuarioAluno7->password = Hash::make('.');
            $novoUsuarioAluno7->nivelAcesso = 3;
            $novoUsuarioAluno7->save();
            $novoAluno7 = new alunos;
            $novoAluno7->filial = 'Heliopolis';
            $novoAluno7->cep = '55299435';
            $novoAluno7->rua = 'Rua Duque de Caxias';
            $novoAluno7->numeroCasa = '69';
            $novoAluno7->bairro = 'Heliópolis';
            $novoAluno7->cidade = 'Garanhuns';
            $novoAluno7->uf = 'PE';
            $novoAluno7->telefone = '82988297012';
            $novoAluno7->dataNascimento = '1998-04-02';
            $novoAluno7->genero = 'Masculino';
            $novoAluno7->peso = '90';
            $novoAluno7->altura = '1.80';
            $novoAluno7->frequencia = '6';
            $novoAluno7->objetivo = 'Emagrecimento';
            $novoAluno7->fumante = '0';
            $novoAluno7->lesao =  ["Tríceps"];
            $novoAluno7->alteracaoCardiaca = 'nao';
            $novoAluno7->bebidaAlcolica = 0;
            $novoAluno7->taxasAltas = 0;
            $novoAluno7->diabes = 0;
            $novoAluno7->hipertenso = 0;
            $novoAluno7->imc = (90 / (1.80 * 1.80));
            $novoAluno7->id_usuario = $novoUsuarioAluno7->id;
            $novoAluno7->intensidade = 'Moderada';
            $novoAluno7->metaTreino = 500;
            $novoAluno7->save();
            //Aluno 7
            //Aluno 8
            $novoUsuarioAluno8 = new User;
            $novoUsuarioAluno8->name = 'Claúdio Marcelo';
            $novoUsuarioAluno8->email = 'cm@gmail.com';
            $novoUsuarioAluno8->password = Hash::make('.');
            $novoUsuarioAluno8->nivelAcesso = 3;
            $novoUsuarioAluno8->save();
            $novoAluno8 = new alunos;
            $novoAluno8->filial = 'sesc';
            $novoAluno8->cep = '55397370';
            $novoAluno8->rua = 'Rua Abílio Camilo Valença';
            $novoAluno8->numeroCasa = '389';
            $novoAluno8->bairro = 'heliópolis';
            $novoAluno8->cidade = 'Garanhuns';
            $novoAluno8->uf = 'PE';
            $novoAluno8->telefone = '87999006444';
            $novoAluno8->dataNascimento = '1980-06-02';
            $novoAluno8->genero = 'Masculino';
            $novoAluno8->peso = '100';
            $novoAluno8->altura = '1.8';
            $novoAluno8->frequencia = '5';
            $novoAluno8->objetivo = 'Hipertrofia';
            $novoAluno8->fumante = '0';
            $novoAluno8->lesao =  ["Bíceps"];
            $novoAluno8->alteracaoCardiaca = 'nao';
            $novoAluno8->bebidaAlcolica = 0;
            $novoAluno8->taxasAltas = 0;
            $novoAluno8->diabes = 0;
            $novoAluno8->hipertenso = 0;
            $novoAluno8->imc = (100 / (1.8 * 1.8));
            $novoAluno8->id_usuario = $novoUsuarioAluno8->id;
            $novoAluno8->intensidade = 'Leve';
            $novoAluno8->metaTreino = 500;
            $novoAluno8->save();
            //Aluno 8
            //Aluno 9
            $novoUsuarioAluno9 = new User;
            $novoUsuarioAluno9->name = 'Pedro José';
            $novoUsuarioAluno9->email = 'pj@gmail.com';
            $novoUsuarioAluno9->password = Hash::make('.');
            $novoUsuarioAluno9->nivelAcesso = 3;
            $novoUsuarioAluno9->save();
            $novoAluno9 = new alunos;
            $novoAluno9->filial = 'Centro';
            $novoAluno9->cep = '55370297';
            $novoAluno9->rua = 'Rua bem feita';
            $novoAluno9->numeroCasa = '96';
            $novoAluno9->bairro = 'indiano';
            $novoAluno9->cidade = 'Garanhuns';
            $novoAluno9->uf = 'PE';
            $novoAluno9->telefone = '87980010012';
            $novoAluno9->dataNascimento = '2001-01-01';
            $novoAluno9->genero = 'Masculino';
            $novoAluno9->peso = '65';
            $novoAluno9->altura = '1.7';
            $novoAluno9->frequencia = '6';
            $novoAluno9->objetivo = 'Emagrecimento';
            $novoAluno9->fumante = '0';
            $novoAluno9->lesao =  ["Não Possui"];
            $novoAluno9->alteracaoCardiaca = 'Leve';
            $novoAluno9->bebidaAlcolica = 0;
            $novoAluno9->taxasAltas = 0;
            $novoAluno9->diabes = 0;
            $novoAluno9->hipertenso = 0;
            $novoAluno9->imc = (65 / (1.7 * 1.7));
            $novoAluno9->id_usuario = $novoUsuarioAluno9->id;
            $novoAluno9->intensidade = 'Alta';
            $novoAluno9->metaTreino = 350;
            $novoAluno9->save();
            //Aluno 9
            //Aluno 10
            $novoUsuarioAluno10 = new User;
            $novoUsuarioAluno10->name = 'Ana Paula';
            $novoUsuarioAluno10->email = 'ap@gmail.com';
            $novoUsuarioAluno10->password = Hash::make('.');
            $novoUsuarioAluno10->nivelAcesso = 3;
            $novoUsuarioAluno10->save();
            $novoAluno10 = new alunos;
            $novoAluno10->filial = 'Sesc';
            $novoAluno10->cep = '5528903';
            $novoAluno10->rua = 'Rua maria bonita';
            $novoAluno10->numeroCasa = '190';
            $novoAluno10->bairro = 'Lacerdópolis';
            $novoAluno10->cidade = 'Garanhuns';
            $novoAluno10->uf = 'PE';
            $novoAluno10->telefone = '82981102987';
            $novoAluno10->dataNascimento = '2000-01-30';
            $novoAluno10->genero = 'Feminino';
            $novoAluno10->peso = '50';
            $novoAluno10->altura = '1.6';
            $novoAluno10->frequencia = '5';
            $novoAluno10->objetivo = 'Hipertrofia';
            $novoAluno10->fumante = '0';
            $novoAluno10->lesao =  ["Tríceps"];
            $novoAluno10->alteracaoCardiaca = 'Leve';
            $novoAluno10->bebidaAlcolica = 0;
            $novoAluno10->taxasAltas = 0;
            $novoAluno10->diabes = 0;
            $novoAluno10->hipertenso = 0;
            $novoAluno10->imc = (50 / (1.6 * 1.6));
            $novoAluno10->id_usuario = $novoUsuarioAluno10->id;
            $novoAluno10->intensidade = 'Leve';
            $novoAluno10->metaTreino = 350;
            $novoAluno10->save();
            //Aluno 10
            //Aluno 11
            $novoUsuarioAluno11 = new User;
            $novoUsuarioAluno11->name = 'Paulo Henrique';
            $novoUsuarioAluno11->email = 'pah@gmail.com';
            $novoUsuarioAluno11->password = Hash::make('.');
            $novoUsuarioAluno11->nivelAcesso = 3;
            $novoUsuarioAluno11->save();
            $novoAluno11 = new alunos;
            $novoAluno11->filial = 'Sesc';
            $novoAluno11->cep = '5529830';
            $novoAluno11->rua = 'Rua Dorgival Dantas';
            $novoAluno11->numeroCasa = '1000';
            $novoAluno11->bairro = 'Centro';
            $novoAluno11->cidade = 'Garanhuns';
            $novoAluno11->uf = 'PE';
            $novoAluno11->telefone = '87981009896';
            $novoAluno11->dataNascimento = '2007-11-04';
            $novoAluno11->genero = 'Masculino';
            $novoAluno11->peso = '90';
            $novoAluno11->altura = '1.7';
            $novoAluno11->frequencia = '3';
            $novoAluno11->objetivo = 'Hipertrofia';
            $novoAluno11->fumante = '0';
            $novoAluno11->lesao =  ["Não Possui"];
            $novoAluno11->alteracaoCardiaca = 'nao';
            $novoAluno11->bebidaAlcolica = 0;
            $novoAluno11->taxasAltas = 0;
            $novoAluno11->diabes = 0;
            $novoAluno11->hipertenso = 0;
            $novoAluno11->imc = (90 / (1.7 * 1.7));
            $novoAluno11->id_usuario = $novoUsuarioAluno11->id;
            $novoAluno11->intensidade = 'Leve';
            $novoAluno11->metaTreino = 500;
            $novoAluno11->save();
            //Aluno 11 
//Fim criar Aluno

        //Inicio criar Cardio
        // INTENSIDADE ALTA
        //Cardio 1
        $novoCardio = new Cardio;
        $novoCardio->exercicio = 'Bicicleta';
        $novoCardio->duracao = 20;
        $novoCardio->tipoTempoDuracao = 'Min';
        $novoCardio->meta = 100;
        $novoCardio->intensidade = 'Alta';
        $novoCardio->save();
        //Cardio 1
        //Cardio 2
        $novoCardio2 = new Cardio;
        $novoCardio2->exercicio = 'Esteira';
        $novoCardio2->duracao = 20;
        $novoCardio2->tipoTempoDuracao = 'Min';
        $novoCardio2->meta = 100;
        $novoCardio2->intensidade = 'Alta';
        $novoCardio2->save();
        //Cardio 2
        //Cardio 3
        $novoCardio3 = new Cardio;
        $novoCardio3->exercicio = 'Escada';
        $novoCardio3->duracao = 20;
        $novoCardio3->tipoTempoDuracao = 'Min';
        $novoCardio3->meta = 100;
        $novoCardio3->intensidade = 'Alta';
        $novoCardio3->save();
        //CARDIO 3
        //Cardio 4
        $novoCardio4 = new Cardio;
        $novoCardio4->exercicio = 'Eliptico';
        $novoCardio4->duracao = 20;
        $novoCardio4->tipoTempoDuracao = 'Min';
        $novoCardio4->meta = 100;
        $novoCardio4->intensidade = 'Alta';
        $novoCardio4->save();
        //Cardio 4 
        // INTENSIDADE MODERADA
        //CARDI 5
        $novoCardio5 = new Cardio;
        $novoCardio5->exercicio = 'Bicicleta';
        $novoCardio5->duracao = 15;
        $novoCardio5->tipoTempoDuracao = 'Min';
        $novoCardio5->meta = 70;
        $novoCardio5->intensidade = 'Moderada';
        $novoCardio5->save();
        //CARDIO 5
        //CARDIO 6
        $novoCardio6 = new Cardio;
        $novoCardio6->exercicio = 'Esteira';
        $novoCardio6->duracao = 15;
        $novoCardio6->tipoTempoDuracao = 'Min';
        $novoCardio6->meta = 70;
        $novoCardio6->intensidade = 'Moderada';
        $novoCardio6->save();
        //CARDIO 6
        //CARDIO 7
        $novoCardio7 = new Cardio;
        $novoCardio7->exercicio = 'Escada';
        $novoCardio7->duracao = 15;
        $novoCardio7->tipoTempoDuracao = 'Min';
        $novoCardio7->meta = 70;
        $novoCardio7->intensidade = 'Moderada';
        $novoCardio7->save();
        //CARDIO 7
        //CARDIO 8
        $novoCardio8 = new Cardio;
        $novoCardio8->exercicio = 'Eliptico';
        $novoCardio8->duracao = 15;
        $novoCardio8->tipoTempoDuracao = 'Min';
        $novoCardio8->meta = 70;
        $novoCardio8->intensidade = 'Moderada';
        $novoCardio8->save();
        //CARDIO 8
        // INTENSIDADE LEVE
        //CARDIO 9
        $novoCardio9 = new Cardio;
        $novoCardio9->exercicio = 'Bicicleta';
        $novoCardio9->duracao = 10;
        $novoCardio9->tipoTempoDuracao = 'Min';
        $novoCardio9->meta = 50;
        $novoCardio9->intensidade = 'Leve';
        $novoCardio9->save();
        //CARDIO 9
        //CARDIO 10
        $novoCardio10 = new Cardio;
        $novoCardio10->exercicio = 'Esteira';
        $novoCardio10->duracao = 10;
        $novoCardio10->tipoTempoDuracao = 'Min';
        $novoCardio10->meta = 50;
        $novoCardio10->intensidade = 'Leve';
        $novoCardio10->save();
        //CARDIO 10
        //CARDIO 11
        $novoCardio11 = new Cardio;
        $novoCardio11->exercicio = 'Escada';
        $novoCardio11->duracao = 10;
        $novoCardio11->tipoTempoDuracao = 'Min';
        $novoCardio11->meta = 50;
        $novoCardio11->intensidade = 'Leve';
        $novoCardio11->save();
        //CARDIO 11
        //CARDIO 12
        $novoCardio12 = new Cardio;
        $novoCardio12->exercicio = 'Eliptico';
        $novoCardio12->duracao = 10;
        $novoCardio12->tipoTempoDuracao = 'Min';
        $novoCardio12->meta = 50;
        $novoCardio12->intensidade = 'Leve';
        $novoCardio12->save();
        //CARDIO 12
        //Fim criar Cardio

        //Inicio criar Exercicio
        //Exercicio 1
        $novoExercicio = new Exercicio;
        $novoExercicio->exercicio = 'Supino reto com halter';
        $novoExercicio->musculo = 'Peito';
        $novoExercicio->serie = 4;
        $novoExercicio->repeticoes = 12;
        $novoExercicio->descanso = 2;
        $novoExercicio->tipoTempoDuracao = 'Min';
        $novoExercicio->meta = 90;
        $novoExercicio->intensidade = 'Alta';
        $novoExercicio->save();
        //Exercicio 1
        //Exercicio 2
        $novoExercicio2 = new Exercicio;
        $novoExercicio2->exercicio = 'Puxada alta pronada';
        $novoExercicio2->musculo = 'Costas';
        $novoExercicio2->serie = 4;
        $novoExercicio2->repeticoes = 12;
        $novoExercicio2->descanso = 2;
        $novoExercicio2->tipoTempoDuracao = 'Min';
        $novoExercicio2->meta = 90;
        $novoExercicio2->intensidade = 'Alta';
        $novoExercicio2->save();
        //Exercicio 2
        //Exercicio 3
        $novoExercicio3 = new Exercicio;
        $novoExercicio3->exercicio = 'Leg Press 45°';
        $novoExercicio3->musculo = 'Coxa';
        $novoExercicio3->serie = 4;
        $novoExercicio3->repeticoes = 12;
        $novoExercicio3->descanso = 2;
        $novoExercicio3->tipoTempoDuracao = 'Min';
        $novoExercicio3->meta = 90;
        $novoExercicio3->intensidade = 'Alta';
        $novoExercicio3->save();
        //Exercicio 3
        //Exercicio 4 
        $novoExercicio4 = new Exercicio;
        $novoExercicio4->exercicio = 'Remada baixa com triângulo';
        $novoExercicio4->musculo = 'Costas';
        $novoExercicio4->serie = 4;
        $novoExercicio4->repeticoes = 12;
        $novoExercicio4->descanso = 2;
        $novoExercicio4->tipoTempoDuracao = 'Min';
        $novoExercicio4->meta = 90;
        $novoExercicio4->intensidade = 'Alta';
        $novoExercicio4->save();
        //Exercicio 4
        //Exercicio 5 
        $novoExercicio5 = new Exercicio;
        $novoExercicio5->exercicio = 'Rosca Direta com barra';
        $novoExercicio5->musculo = 'Bíceps';
        $novoExercicio5->serie = 4;
        $novoExercicio5->repeticoes =  12;
        $novoExercicio5->descanso = 2;
        $novoExercicio5->tipoTempoDuracao = 'Min';
        $novoExercicio5->meta = 90;
        $novoExercicio5->intensidade = 'Alta';
        $novoExercicio5->save();
        //Exercicio 5
        //Exercicio 6
        $novoExercicio6 = new Exercicio;
        $novoExercicio6->exercicio = 'Rosca 21';
        $novoExercicio6->musculo = 'Bíceps';
        $novoExercicio6->serie = 4;
        $novoExercicio6->repeticoes =  12;
        $novoExercicio6->descanso = 2;
        $novoExercicio6->tipoTempoDuracao = 'Min';
        $novoExercicio6->meta = 90;
        $novoExercicio6->intensidade = 'Alta';
        $novoExercicio6->save();
        //Exercicio 6
        //Exercicio 7
        $novoExercicio7 = new Exercicio;
        $novoExercicio7->exercicio = 'Supino inclinado com halter';
        $novoExercicio7->musculo = 'Peito';
        $novoExercicio7->serie = 4;
        $novoExercicio7->repeticoes = 12;
        $novoExercicio7->descanso = 2;
        $novoExercicio7->tipoTempoDuracao = 'Min';
        $novoExercicio7->meta = 90;
        $novoExercicio7->intensidade = 'Alta';
        $novoExercicio7->save();
        //Exercicio 7
        //Exercicio 8
        $novoExercicio8 = new Exercicio;
        $novoExercicio8->exercicio = 'Voador';
        $novoExercicio8->musculo = 'Peito';
        $novoExercicio8->serie = 4;
        $novoExercicio8->repeticoes = 12;
        $novoExercicio8->descanso = 2;
        $novoExercicio8->tipoTempoDuracao = 'Min';
        $novoExercicio8->meta = 90;
        $novoExercicio8->intensidade = 'Alta';
        $novoExercicio8->save();
        //Exercicio 8
        //Exercicio 9
        $novoExercicio9 = new Exercicio;
        $novoExercicio9->exercicio = 'Supino reto com barra';
        $novoExercicio9->musculo = 'Peito';
        $novoExercicio9->serie = 4;
        $novoExercicio9->repeticoes = 12;
        $novoExercicio9->descanso = 2;
        $novoExercicio9->tipoTempoDuracao = 'Min';
        $novoExercicio9->meta = 90;
        $novoExercicio9->intensidade = 'Alta';
        $novoExercicio9->save();
        //Exercicio 9
        //Exercicio 10
        $novoExercicio10 = new Exercicio;
        $novoExercicio10->exercicio = 'Supino inclinado com barra';
        $novoExercicio10->musculo = 'Peito';
        $novoExercicio10->serie = 4;
        $novoExercicio10->repeticoes = 12;
        $novoExercicio10->descanso = 2;
        $novoExercicio10->tipoTempoDuracao = 'Min';
        $novoExercicio10->meta = 90;
        $novoExercicio10->intensidade = 'Alta';
        $novoExercicio10->save();
        //Exercicio 10
        //Exercicio 11
        $novoExercicio11 = new Exercicio;
        $novoExercicio11->exercicio = 'Supino vertical';
        $novoExercicio11->musculo = 'Peito';
        $novoExercicio11->serie = 4;
        $novoExercicio11->repeticoes = 12;
        $novoExercicio11->descanso = 2;
        $novoExercicio11->tipoTempoDuracao = 'Min';
        $novoExercicio11->meta = 90;
        $novoExercicio11->intensidade = 'Alta';
        $novoExercicio11->save();
        //Exercicio 11
        //Exercicio 12
        $novoExercicio12 = new Exercicio;
        $novoExercicio12->exercicio = 'Agachamento livre';
        $novoExercicio12->musculo = 'Coxa';
        $novoExercicio12->serie = 4;
        $novoExercicio12->repeticoes = 12;
        $novoExercicio12->descanso = 2;
        $novoExercicio12->tipoTempoDuracao = 'Min';
        $novoExercicio12->meta = 90;
        $novoExercicio12->intensidade = 'Alta';
        $novoExercicio12->save();
        //Exercicio 12
        //Exercicio 13
        $novoExercicio13 = new Exercicio;
        $novoExercicio13->exercicio = 'Agachamento smith';
        $novoExercicio13->musculo = 'Coxa';
        $novoExercicio13->serie = 4;
        $novoExercicio13->repeticoes = 12;
        $novoExercicio13->descanso = 2;
        $novoExercicio13->tipoTempoDuracao = 'Min';
        $novoExercicio13->meta = 90;
        $novoExercicio13->intensidade = 'Alta';
        $novoExercicio13->save();
        //Exercicio 13
        //Exercicio 14 
        $novoExercicio14 = new Exercicio;
        $novoExercicio14->exercicio = 'Agachamento bulgaro';
        $novoExercicio14->musculo = 'Coxa';
        $novoExercicio14->serie = 4;
        $novoExercicio14->repeticoes = 12;
        $novoExercicio14->descanso = 2;
        $novoExercicio14->tipoTempoDuracao = 'Min';
        $novoExercicio14->meta = 90;
        $novoExercicio14->intensidade = 'Alta';
        $novoExercicio14->save();
        //Exercicio 14
        //Exercicio 15
        $novoExercicio15 = new Exercicio;
        $novoExercicio15->exercicio = 'Agachamento sumô';
        $novoExercicio15->musculo = 'Coxa';
        $novoExercicio15->serie = 4;
        $novoExercicio15->repeticoes = 12;
        $novoExercicio15->descanso = 2;
        $novoExercicio15->tipoTempoDuracao = 'Min';
        $novoExercicio15->meta = 90;
        $novoExercicio15->intensidade = 'Alta';
        $novoExercicio15->save();
        //Exercicio 15
        //Exercicio 16 
        $novoExercicio16 = new Exercicio;
        $novoExercicio16->exercicio = 'Agachamento hack';
        $novoExercicio16->musculo = 'Coxa';
        $novoExercicio16->serie = 4;
        $novoExercicio16->repeticoes = 12;
        $novoExercicio16->descanso = 2;
        $novoExercicio16->tipoTempoDuracao = 'Min';
        $novoExercicio16->meta = 90;
        $novoExercicio16->intensidade = 'Alta';
        $novoExercicio16->save();
        //Exercicio 16
        //Exercicio 17 
        $novoExercicio17 = new Exercicio;
        $novoExercicio17->exercicio = 'Leg Press 60°';
        $novoExercicio17->musculo = 'Coxa';
        $novoExercicio17->serie = 4;
        $novoExercicio17->repeticoes = 12;
        $novoExercicio17->descanso = 2;
        $novoExercicio17->tipoTempoDuracao = 'Min';
        $novoExercicio17->meta = 90;
        $novoExercicio17->intensidade = 'Alta';
        $novoExercicio17->save();
        //Exercicio 17
        //Exercicio 18
        $novoExercicio18 = new Exercicio;
        $novoExercicio18->exercicio = 'Afundo';
        $novoExercicio18->musculo = 'Coxa';
        $novoExercicio18->serie = 4;
        $novoExercicio18->repeticoes = 12;
        $novoExercicio18->descanso = 2;
        $novoExercicio18->tipoTempoDuracao = 'Min';
        $novoExercicio18->meta = 90;
        $novoExercicio18->intensidade = 'Alta';
        $novoExercicio18->save();
        //Exercicio 18
        //Exercicio 19
        $novoExercicio19 = new Exercicio;
        $novoExercicio19->exercicio = 'Passada';
        $novoExercicio19->musculo = 'Coxa';
        $novoExercicio19->serie = 4;
        $novoExercicio19->repeticoes = 12;
        $novoExercicio19->descanso = 2;
        $novoExercicio19->tipoTempoDuracao = 'Min';
        $novoExercicio19->meta = 90;
        $novoExercicio19->intensidade = 'Alta';
        $novoExercicio19->save();
        //Exercicio 19
        //Exercicio 20
        $novoExercicio20 = new Exercicio;
        $novoExercicio20->exercicio = 'Avanço';
        $novoExercicio20->musculo = 'Coxa';
        $novoExercicio20->serie = 4;
        $novoExercicio20->repeticoes = 12;
        $novoExercicio20->descanso = 2;
        $novoExercicio20->tipoTempoDuracao = 'Min';
        $novoExercicio20->meta = 90;
        $novoExercicio20->intensidade = 'Alta';
        $novoExercicio20->save();
        //Exercicio 20
        //Exercicio 21
        $novoExercicio21 = new Exercicio;
        $novoExercicio21->exercicio = 'Cadeira extensora';
        $novoExercicio21->musculo = 'Coxa';
        $novoExercicio21->serie = 4;
        $novoExercicio21->repeticoes = 12;
        $novoExercicio21->descanso = 2;
        $novoExercicio21->tipoTempoDuracao = 'Min';
        $novoExercicio21->meta = 90;
        $novoExercicio21->intensidade = 'Alta';
        $novoExercicio21->save();
        //Exercicio 21
        //Exercicio 22 
        $novoExercicio22 = new Exercicio;
        $novoExercicio22->exercicio = 'Cadeira flexora';
        $novoExercicio22->musculo = 'Coxa';
        $novoExercicio22->serie = 2;
        $novoExercicio22->repeticoes = 12;
        $novoExercicio22->descanso = 1;
        $novoExercicio22->tipoTempoDuracao = 'Min';
        $novoExercicio22->meta = 90;
        $novoExercicio22->intensidade = 'Alta';
        $novoExercicio22->save();
        //Exercicio 22
        //Exercicio 23
        $novoExercicio23 = new Exercicio;
        $novoExercicio23->exercicio = 'Mesa flexora';
        $novoExercicio23->musculo = 'Coxa';
        $novoExercicio23->serie = 4;
        $novoExercicio23->repeticoes = 12;
        $novoExercicio23->descanso = 2;
        $novoExercicio23->tipoTempoDuracao = 'Min';
        $novoExercicio23->meta = 90;
        $novoExercicio23->intensidade = 'Alta';
        $novoExercicio23->save();
        //Exercicio 23
        //Exercicio 24
        $novoExercicio24 = new Exercicio;
        $novoExercicio24->exercicio = 'Flexora vertical';
        $novoExercicio24->musculo = 'Coxa';
        $novoExercicio24->serie = 4;
        $novoExercicio24->repeticoes = 12;
        $novoExercicio24->descanso = 2;
        $novoExercicio24->tipoTempoDuracao = 'Min';
        $novoExercicio24->meta = 90;
        $novoExercicio24->intensidade = 'Alta';
        $novoExercicio24->save();
        //Exercicio 24
        //Exercicio 25
        $novoExercicio25 = new Exercicio;
        $novoExercicio25->exercicio = 'Stiff';
        $novoExercicio25->musculo = 'Coxa';
        $novoExercicio25->serie = 4;
        $novoExercicio25->repeticoes = 12;
        $novoExercicio25->descanso = 2;
        $novoExercicio25->tipoTempoDuracao = 'Min';
        $novoExercicio25->meta = 90;
        $novoExercicio25->intensidade = 'Alta';
        $novoExercicio25->save();
        //Exercicio 25
        //Exercicio 26
        $novoExercicio26 = new Exercicio;
        $novoExercicio26->exercicio = 'Abdutora';
        $novoExercicio26->musculo = 'Coxa';
        $novoExercicio26->serie = 4;
        $novoExercicio26->repeticoes = 12;
        $novoExercicio26->descanso = 2;
        $novoExercicio26->tipoTempoDuracao = 'Min';
        $novoExercicio26->meta = 90;
        $novoExercicio26->intensidade = 'Alta';
        $novoExercicio26->save();
        //Exercicio 26
        //Exercicio 27
        $novoExercicio27 = new Exercicio;
        $novoExercicio27->exercicio = 'Adutora';
        $novoExercicio27->musculo = 'Coxa';
        $novoExercicio27->serie = 4;
        $novoExercicio27->repeticoes = 12;
        $novoExercicio27->descanso = 2;
        $novoExercicio27->tipoTempoDuracao = 'Min';
        $novoExercicio27->meta = 90;
        $novoExercicio27->intensidade = "Alta";
        $novoExercicio27->save();
        //Exercicio 27
        //Exercicio 28
        $novoExercicio28 = new Exercicio;
        $novoExercicio28->exercicio = 'Elevação pelvica';
        $novoExercicio28->musculo = 'Coxa';
        $novoExercicio28->serie = 4;
        $novoExercicio28->repeticoes = 12;
        $novoExercicio28->descanso = 2;
        $novoExercicio28->tipoTempoDuracao = 'Min';
        $novoExercicio28->meta = 90;
        $novoExercicio28->intensidade = 'Alta';
        $novoExercicio28->save();
        //Exercicio 28
        //Exercicio 28
        $novoExercicio29 = new Exercicio;
        $novoExercicio29->exercicio = 'Panturrilha sentado';
        $novoExercicio29->musculo = 'Panturrilha';
        $novoExercicio29->serie = 4;
        $novoExercicio29->repeticoes = 12;
        $novoExercicio29->descanso = 2;
        $novoExercicio29->tipoTempoDuracao = 'Min';
        $novoExercicio29->meta = 90;
        $novoExercicio29->intensidade = 'Alta';
        $novoExercicio29->save();
        //Exercicio 28
        //Exercicio 29
        $novoExercicio30 = new Exercicio;
        $novoExercicio30->exercicio = 'Panturrilha em pé';
        $novoExercicio30->musculo = 'Panturrilha';
        $novoExercicio30->serie = 4;
        $novoExercicio30->repeticoes = 12;
        $novoExercicio30->descanso = 2;
        $novoExercicio30->tipoTempoDuracao = 'Min';
        $novoExercicio30->meta = 90;
        $novoExercicio30->intensidade = 'Alta';
        $novoExercicio30->save();
        //Exercicio 29
        //Exercicio 30
        $novoExercicio31 = new Exercicio;
        $novoExercicio31->exercicio = 'Desenvolvimento articulado';
        $novoExercicio31->musculo = 'Ombro';
        $novoExercicio31->serie = 4;
        $novoExercicio31->repeticoes = 12;
        $novoExercicio31->descanso = 2;
        $novoExercicio31->tipoTempoDuracao = 'Min';
        $novoExercicio31->meta = 90;
        $novoExercicio31->intensidade = 'Alta';
        $novoExercicio31->save();
        //Exercicio 30
        //Exercicio 31
        $novoExercicio32 = new Exercicio;
        $novoExercicio32->exercicio = 'Desenvolvimento com alter';
        $novoExercicio32->musculo = 'Ombro';
        $novoExercicio32->serie = 4;
        $novoExercicio32->repeticoes = 12;
        $novoExercicio32->descanso = 2;
        $novoExercicio32->tipoTempoDuracao = 'Min';
        $novoExercicio32->meta = 90;
        $novoExercicio32->intensidade = 'Alta';
        $novoExercicio32->save();
        //Exercicio 31
        //Exercicio 32
        $novoExercicio33 = new Exercicio;
        $novoExercicio33->exercicio = 'Elevação lateral com alter';
        $novoExercicio33->musculo = 'Ombro';
        $novoExercicio33->serie = 4;
        $novoExercicio33->repeticoes = 12;
        $novoExercicio33->descanso = 2;
        $novoExercicio33->tipoTempoDuracao = 'Min';
        $novoExercicio33->meta = 90;
        $novoExercicio33->intensidade = 'Alta';
        $novoExercicio33->save();
        //Exercicio 32
        //Exercicio 33
        $novoExercicio34 = new Exercicio;
        $novoExercicio34->exercicio = 'Elevação frontal';
        $novoExercicio34->musculo = 'Ombro';
        $novoExercicio34->serie = 4;
        $novoExercicio34->repeticoes = 12;
        $novoExercicio34->descanso = 2;
        $novoExercicio34->tipoTempoDuracao = 'Min';
        $novoExercicio34->meta = 90;
        $novoExercicio34->intensidade = 'Alta';
        $novoExercicio34->save();
        //Exercicio 33
        //Exercicio 34
        $novoExercicio35 = new Exercicio;
        $novoExercicio35->exercicio = 'Crucifixo inverso';
        $novoExercicio35->musculo = 'Trapézio';
        $novoExercicio35->serie = 4;
        $novoExercicio35->repeticoes = 12;
        $novoExercicio35->descanso = 2;
        $novoExercicio35->tipoTempoDuracao = 'Min';
        $novoExercicio35->meta = 90;
        $novoExercicio35->intensidade = 'Alta';
        $novoExercicio35->save();
        //Exercicio 34  
        //Exercicio 35
        $novoExercicio36 = new Exercicio;
        $novoExercicio36->exercicio = 'FacePull';
        $novoExercicio36->musculo = 'Ombro';
        $novoExercicio36->serie = 4;
        $novoExercicio36->repeticoes = 12;
        $novoExercicio36->descanso = 2;
        $novoExercicio36->tipoTempoDuracao = 'Min';
        $novoExercicio36->intensidade = "Alta";
        $novoExercicio36->meta = 90;
        $novoExercicio36->intensidade = 'Alta';
        $novoExercicio36->save();
        //Exercicio 35
        //Exercicio 36
        $novoExercicio37 = new Exercicio;
        $novoExercicio37->exercicio = 'Tríceps testa na polia';
        $novoExercicio37->musculo = 'Tríceps';
        $novoExercicio37->serie = 4;
        $novoExercicio37->repeticoes = 15;
        $novoExercicio37->descanso = 2;
        $novoExercicio37->tipoTempoDuracao = 'Min';
        $novoExercicio37->meta = 90;
        $novoExercicio37->intensidade = 'Alta';
        $novoExercicio37->save();
        //Exercicio 36
        //Exercicio 37
        $novoExercicio38 = new Exercicio;
        $novoExercicio38->exercicio = 'Tríceps francês na polia';
        $novoExercicio38->musculo = 'Tríceps';
        $novoExercicio38->serie = 4;
        $novoExercicio38->repeticoes = 12;
        $novoExercicio38->descanso = 2;
        $novoExercicio38->tipoTempoDuracao = 'Min';
        $novoExercicio38->meta = 90;
        $novoExercicio38->intensidade = 'Alta';
        $novoExercicio38->save();
        //Exercicio 37
        //Exercicio 38
        $novoExercicio39 = new Exercicio;
        $novoExercicio39->exercicio = 'Tríceps pulley';
        $novoExercicio39->musculo = 'Tríceps';
        $novoExercicio39->serie = 4;
        $novoExercicio39->repeticoes = 12;
        $novoExercicio39->descanso = 2;
        $novoExercicio39->tipoTempoDuracao = 'Min';
        $novoExercicio39->meta = 90;
        $novoExercicio39->intensidade = 'Alta';
        $novoExercicio39->save();
        //Exercicio 38
        //Exercicio 39
        $novoExercicio40 = new Exercicio;
        $novoExercicio40->exercicio = 'Tríceps corda';
        $novoExercicio40->musculo = 'Tríceps';
        $novoExercicio40->serie = 4;
        $novoExercicio40->repeticoes = 12;
        $novoExercicio40->descanso = 2;
        $novoExercicio40->tipoTempoDuracao = 'Min';
        $novoExercicio40->meta = 90;
        $novoExercicio40->intensidade = 'Alta';
        $novoExercicio40->save();
        //Exercicio 39
        //Exercicio 40 
        $novoExercicio41 = new Exercicio;
        $novoExercicio41->exercicio = 'Paralela';
        $novoExercicio41->musculo = 'Tríceps';
        $novoExercicio41->serie = 4;
        $novoExercicio41->repeticoes = 12;
        $novoExercicio41->descanso = 2;
        $novoExercicio41->tipoTempoDuracao = 'Min';
        $novoExercicio41->meta = 90;
        $novoExercicio41->intensidade = 'Alta';
        $novoExercicio41->save();
        //Exercicio 40
        //Exercicio 41
        $novoExercicio42 = new Exercicio;
        $novoExercicio42->exercicio = 'Encolhimento';
        $novoExercicio42->musculo = 'Trapézio';
        $novoExercicio42->serie = 4;
        $novoExercicio42->repeticoes = 12;
        $novoExercicio42->descanso = 2;
        $novoExercicio42->tipoTempoDuracao = 'Min';
        $novoExercicio42->meta = 90;
        $novoExercicio42->intensidade = 'Alta';
        $novoExercicio42->save();
        //Exercicio 41
        //Exercicio 42
        $novoExercicio43 = new Exercicio;
        $novoExercicio43->exercicio = 'Puxada alta supinada';
        $novoExercicio43->musculo = 'Costas';
        $novoExercicio43->serie = 4;
        $novoExercicio43->repeticoes = 12;
        $novoExercicio43->descanso = 2;
        $novoExercicio43->tipoTempoDuracao = 'Min';
        $novoExercicio43->meta = 90;
        $novoExercicio43->intensidade = 'Alta';
        $novoExercicio43->save();
        //Exercicio 42
        //Exercicio 43
        $novoExercicio44 = new Exercicio;
        $novoExercicio44->exercicio = 'Serrote';
        $novoExercicio44->musculo = 'Costas';
        $novoExercicio44->serie = 4;
        $novoExercicio44->repeticoes = 12;
        $novoExercicio44->descanso = 2;
        $novoExercicio44->tipoTempoDuracao = 'Min';
        $novoExercicio44->meta = 90;
        $novoExercicio44->intensidade = 'Alta';
        $novoExercicio44->save();
        //Exercicio 43
        //Exercicio 44
        $novoExercicio45 = new Exercicio;
        $novoExercicio45->exercicio = 'Remada curvada';
        $novoExercicio45->musculo = 'Costas';
        $novoExercicio45->serie = 4;
        $novoExercicio45->repeticoes = 12;
        $novoExercicio45->descanso = 2;
        $novoExercicio45->tipoTempoDuracao = 'Min';
        $novoExercicio45->meta = 90;
        $novoExercicio45->intensidade = 'Alta';
        $novoExercicio45->save();
        //Exercicio 44
        //Exercicio 45
        $novoExercicio65 = new Exercicio;
        $novoExercicio65->exercicio = 'Remada cavalinho';
        $novoExercicio65->musculo = 'Costas';
        $novoExercicio65->serie = 4;
        $novoExercicio65->repeticoes = 12;
        $novoExercicio65->descanso = 2;
        $novoExercicio65->tipoTempoDuracao = 'Min';
        $novoExercicio65->meta = 90;
        $novoExercicio65->intensidade = 'Alta';
        $novoExercicio65->save();
        //Exercicio 45
        //Exercicio 46
        $novoExercicio46 = new Exercicio;
        $novoExercicio46->exercicio = 'Remada articulada';
        $novoExercicio46->musculo = 'Costas';
        $novoExercicio46->serie = 4;
        $novoExercicio46->repeticoes = 12;
        $novoExercicio46->descanso = 2;
        $novoExercicio46->tipoTempoDuracao = 'Min';
        $novoExercicio46->meta = 90;
        $novoExercicio46->intensidade = 'Alta';
        $novoExercicio46->save();
        //Exercicio 46
        //Exercicio 47
        $novoExercicio47 = new Exercicio;
        $novoExercicio47->exercicio = 'Puxada alta com triângulo';
        $novoExercicio47->musculo = 'Costas';
        $novoExercicio47->serie = 4;
        $novoExercicio47->repeticoes = 12;
        $novoExercicio47->descanso = 2;
        $novoExercicio47->tipoTempoDuracao = 'Min';
        $novoExercicio47->meta = 90;
        $novoExercicio47->intensidade = 'Alta';
        $novoExercicio47->save();
        //Exercicio 47
        //Exercicio 48
        $novoExercicio48 = new Exercicio;
        $novoExercicio48->exercicio = 'PullDown';
        $novoExercicio48->musculo = 'Costas';
        $novoExercicio48->serie = 4;
        $novoExercicio48->repeticoes = 12;
        $novoExercicio48->descanso = 2;
        $novoExercicio48->tipoTempoDuracao = 'Min';
        $novoExercicio48->meta = 90;
        $novoExercicio48->intensidade = 'Alta';
        $novoExercicio48->save();
        //Exercicio 48
        //Exercicio 49
        $novoExercicio49 = new Exercicio;
        $novoExercicio49->exercicio = 'Remada baixa unilateral';
        $novoExercicio49->musculo = 'Costas';
        $novoExercicio49->serie = 4;
        $novoExercicio49->repeticoes = 12;
        $novoExercicio49->descanso = 2;
        $novoExercicio49->tipoTempoDuracao = 'Min';
        $novoExercicio49->meta = 90;
        $novoExercicio49->intensidade = 'Alta';
        $novoExercicio49->save();
        //Exercicio 49
        //Exercicio 50
        $novoExercicio50 = new Exercicio;
        $novoExercicio50->exercicio = 'Barra fixa';
        $novoExercicio50->musculo = 'Costas';
        $novoExercicio50->serie = 4;
        $novoExercicio50->repeticoes = 12;
        $novoExercicio50->descanso = 2;
        $novoExercicio50->tipoTempoDuracao = 'Min';
        $novoExercicio50->meta = 90;
        $novoExercicio50->intensidade = 'Alta';
        $novoExercicio50->save();
        //Exercicio 50
        //Exercicio 51
        $novoExercicio51 = new Exercicio;
        $novoExercicio51->exercicio = 'Rosca alternada com halter';
        $novoExercicio51->musculo = 'Bíceps';
        $novoExercicio51->serie = 4;
        $novoExercicio51->repeticoes = 12;
        $novoExercicio51->descanso = 2;
        $novoExercicio51->tipoTempoDuracao = 'Min';
        $novoExercicio51->meta = 90;
        $novoExercicio51->intensidade = 'Alta';
        $novoExercicio51->save();
        //Exercicio 51
        //Exercicio 52
        $novoExercicio52 = new Exercicio;
        $novoExercicio52->exercicio = 'Rosca scott';
        $novoExercicio52->musculo = 'Bíceps';
        $novoExercicio52->serie = 4;
        $novoExercicio52->repeticoes = 12;
        $novoExercicio52->descanso = 2;
        $novoExercicio52->tipoTempoDuracao = 'Min';
        $novoExercicio52->meta = 90;
        $novoExercicio52->intensidade = 'Alta';
        $novoExercicio52->save();
        //Exercicio 52
        //Exercicio 53
        $novoExercicio53 = new Exercicio;
        $novoExercicio53->exercicio = 'Rosca spider';
        $novoExercicio53->musculo = 'Bíceps';
        $novoExercicio53->serie = 4;
        $novoExercicio53->repeticoes = 12;
        $novoExercicio53->descanso = 2;
        $novoExercicio53->tipoTempoDuracao = 'Min';
        $novoExercicio53->meta = 90;
        $novoExercicio53->intensidade = 'Alta';
        $novoExercicio53->save();
        //Exercicio 53
        //Exercicio 54
        $novoExercicio54 = new Exercicio;
        $novoExercicio54->exercicio = 'Rosca direta na polia';
        $novoExercicio54->musculo = 'Bíceps';
        $novoExercicio54->serie = 4;
        $novoExercicio54->repeticoes = 12;
        $novoExercicio54->descanso = 2;
        $novoExercicio54->tipoTempoDuracao = 'Min';
        $novoExercicio54->meta = 90;
        $novoExercicio54->intensidade = 'Alta';
        $novoExercicio54->save();
        //Exercicio 54
        //Exercicio 55
        $novoExercicio55 = new Exercicio;
        $novoExercicio55->exercicio = 'Rosca martelo com halter';
        $novoExercicio55->musculo = 'Bíceps';
        $novoExercicio55->serie = 4;
        $novoExercicio55->repeticoes = 12;
        $novoExercicio55->descanso = 2;
        $novoExercicio55->tipoTempoDuracao = 'Min';
        $novoExercicio55->meta = 90;
        $novoExercicio55->intensidade = 'Alta';
        $novoExercicio55->save();
        //Exercicio 55 
        //Exercicio 56
        $novoExercicio56 = new Exercicio;
        $novoExercicio56->exercicio = 'Rosca martelo na polia';
        $novoExercicio56->musculo = 'Bíceps';
        $novoExercicio56->serie = 4;
        $novoExercicio56->repeticoes = 12;
        $novoExercicio56->descanso = 2;
        $novoExercicio56->tipoTempoDuracao = 'Min';
        $novoExercicio56->meta = 90;
        $novoExercicio56->intensidade = 'Alta';
        $novoExercicio56->save();
        //Exercicio 56
        //Exercicio 57
        $novoExercicio57 = new Exercicio;
        $novoExercicio57->exercicio = 'Rosca concentrada';
        $novoExercicio57->musculo = 'Bíceps';
        $novoExercicio57->serie = 4;
        $novoExercicio57->repeticoes = 12;
        $novoExercicio57->descanso = 2;
        $novoExercicio57->tipoTempoDuracao = 'Min';
        $novoExercicio57->meta = 90;
        $novoExercicio57->intensidade = 'Alta';
        $novoExercicio57->save();
        //Exercicio 57
        //Exercicio 58
        $novoExercicio58 = new Exercicio;
        $novoExercicio58->exercicio = 'Flexão do tronco ';
        $novoExercicio58->musculo = 'Abdomen';
        $novoExercicio58->serie = 4;
        $novoExercicio58->repeticoes = 12;
        $novoExercicio58->descanso = 2;
        $novoExercicio58->tipoTempoDuracao = 'Min';
        $novoExercicio58->meta = 90;
        $novoExercicio58->intensidade = 'Alta';
        $novoExercicio58->save();
        //Exercicio 58
        //Exercicio 59
        $novoExercicio59 = new Exercicio;
        $novoExercicio59->exercicio = 'Flexão com elevação do quadril';
        $novoExercicio59->musculo = 'Abdomen';
        $novoExercicio59->serie = 4;
        $novoExercicio59->repeticoes = 12;
        $novoExercicio59->descanso = 2;
        $novoExercicio59->tipoTempoDuracao = 'Min';
        $novoExercicio59->meta = 90;
        $novoExercicio59->intensidade = 'Alta';
        $novoExercicio59->save();
        //Exercicio 59
        //Exercicio 60
        $novoExercicio60 = new Exercicio;
        $novoExercicio60->exercicio = 'Flexão com leve rotação do tronco';
        $novoExercicio60->musculo = 'Abdomen';
        $novoExercicio60->serie = 4;
        $novoExercicio60->repeticoes = 12;
        $novoExercicio60->descanso = 2;
        $novoExercicio60->tipoTempoDuracao = 'Min';
        $novoExercicio60->meta = 90;
        $novoExercicio60->intensidade = 'Alta';
        $novoExercicio60->save();
        //Exercicio 60 
        //Exercicio 61
        $novoExercicio61 = new Exercicio;
        $novoExercicio61->exercicio = 'Pracha Ventral';
        $novoExercicio61->musculo = 'Abdomen';
        $novoExercicio61->serie = 4;
        $novoExercicio61->repeticoes = 12;
        $novoExercicio61->descanso = 2;
        $novoExercicio61->tipoTempoDuracao = 'Min';
        $novoExercicio61->meta = 90;
        $novoExercicio61->intensidade = 'Alta';
        $novoExercicio61->save();
        //Exercicio 61
        //Exercicio 62
        $novoExercicio62 = new Exercicio;
        $novoExercicio62->exercicio = 'Abdominal “canoa”';
        $novoExercicio62->musculo = 'Abdomen';
        $novoExercicio62->serie = 4;
        $novoExercicio62->repeticoes = 12;
        $novoExercicio62->descanso = 2;
        $novoExercicio62->tipoTempoDuracao = 'Min';
        $novoExercicio62->meta = 90;
        $novoExercicio62->intensidade = 'Alta';
        $novoExercicio62->save();
        //Exercicio 62
        //Exercicio 63
        $novoExercicio63 = new Exercicio;
        $novoExercicio63->exercicio = 'Abdominal “canivete”';
        $novoExercicio63->musculo = 'Abdomen';
        $novoExercicio63->serie = 4;
        $novoExercicio63->repeticoes = 12;
        $novoExercicio63->descanso = 2;
        $novoExercicio63->tipoTempoDuracao = 'Min';
        $novoExercicio63->meta = 90;
        $novoExercicio63->intensidade = 'Alta';
        $novoExercicio63->save();
        //Exercicio 63 
        //Exercicio 64 
        $novoExercicio64 = new Exercicio;
        $novoExercicio64->exercicio = 'Giro russo';
        $novoExercicio64->musculo = 'Abdomen';
        $novoExercicio64->serie = 4;
        $novoExercicio64->repeticoes = 12;
        $novoExercicio64->descanso = 2;
        $novoExercicio64->tipoTempoDuracao = 'Min';
        $novoExercicio64->meta = 90;
        $novoExercicio64->intensidade = 'Alta';
        $novoExercicio64->save();
        //Exercicio 64
        //Fim criar Exercicio ALTA

        //Inicio criar Exercício MODERADA
        //Exercicio 66
        $novoExercicio66 = new Exercicio;
        $novoExercicio66->exercicio = 'Supino reto com halter';
        $novoExercicio66->musculo = 'Peito';
        $novoExercicio66->serie = 3;
        $novoExercicio66->repeticoes = 12;
        $novoExercicio66->descanso = 1;
        $novoExercicio66->tipoTempoDuracao = 'Min';
        $novoExercicio66->meta = 60;
        $novoExercicio66->intensidade = 'Moderada';
        $novoExercicio66->save();
        //Exercicio 66
        //Exercicio 67
        $novoExercicio67 = new Exercicio;
        $novoExercicio67->exercicio = 'Puxada alta pronada';
        $novoExercicio67->musculo = 'Costas';
        $novoExercicio67->serie = 3;
        $novoExercicio67->repeticoes = 12;
        $novoExercicio67->descanso = 1;
        $novoExercicio67->tipoTempoDuracao = 'Min';
        $novoExercicio67->meta = 60;
        $novoExercicio67->intensidade = 'Moderada';
        $novoExercicio67->save();
        //Exercicio 67
        //Exercicio 68
        $novoExercicio68 = new Exercicio;
        $novoExercicio68->exercicio = 'Leg Press 45°';
        $novoExercicio68->musculo = 'Coxa';
        $novoExercicio68->serie = 3;
        $novoExercicio68->repeticoes = 12;
        $novoExercicio68->descanso = 1;
        $novoExercicio68->tipoTempoDuracao = 'Min';
        $novoExercicio68->meta = 60;
        $novoExercicio68->intensidade = 'Moderada';
        $novoExercicio68->save();
        //Exercicio 68
        //Exercicio 69
        $novoExercicio69 = new Exercicio;
        $novoExercicio69->exercicio = 'Remada baixa com triângulo';
        $novoExercicio69->musculo = 'Costas';
        $novoExercicio69->serie = 3;
        $novoExercicio69->repeticoes = 12;
        $novoExercicio69->descanso = 1;
        $novoExercicio69->tipoTempoDuracao = 'Min';
        $novoExercicio69->meta = 60;
        $novoExercicio69->intensidade = 'Moderada';
        $novoExercicio69->save();
        //Exercicio 69
        //Exercicio 70
        $novoExercicio70 = new Exercicio;
        $novoExercicio70->exercicio = 'Rosca Direta com barra';
        $novoExercicio70->musculo = 'Bíceps';
        $novoExercicio70->serie = 3;
        $novoExercicio70->repeticoes =  12;
        $novoExercicio70->descanso = 1;
        $novoExercicio70->tipoTempoDuracao = 'Min';
        $novoExercicio70->meta = 60;
        $novoExercicio70->intensidade = 'Moderada';
        $novoExercicio70->save();
        //Exercicio 70
        //Exercicio 71
        $novoExercicio71 = new Exercicio;
        $novoExercicio71->exercicio = 'Rosca 21';
        $novoExercicio71->musculo = 'Bíceps';
        $novoExercicio71->serie = 3;
        $novoExercicio71->repeticoes =  12;
        $novoExercicio71->descanso = 1;
        $novoExercicio71->tipoTempoDuracao = 'Min';
        $novoExercicio71->meta = 60;
        $novoExercicio71->intensidade = 'Moderada';
        $novoExercicio71->save();
        //Exercicio 71
        //Exercicio 72
        $novoExercicio72 = new Exercicio;
        $novoExercicio72->exercicio = 'Supino inclinado com halter';
        $novoExercicio72->musculo = 'Peito';
        $novoExercicio72->serie = 3;
        $novoExercicio72->repeticoes = 12;
        $novoExercicio72->descanso = 1;
        $novoExercicio72->tipoTempoDuracao = 'Min';
        $novoExercicio72->meta = 60;
        $novoExercicio72->intensidade = 'Moderada';
        $novoExercicio72->save();
        //Exercicio 72
        //Exercicio 73
        $novoExercicio73 = new Exercicio;
        $novoExercicio73->exercicio = 'Voador';
        $novoExercicio73->musculo = 'Peito';
        $novoExercicio73->serie = 3;
        $novoExercicio73->repeticoes = 12;
        $novoExercicio73->descanso = 1;
        $novoExercicio73->tipoTempoDuracao = 'Min';
        $novoExercicio73->meta = 60;
        $novoExercicio73->intensidade = 'Moderada';
        $novoExercicio73->save();
        //Exercicio 73
        //Exercicio 74
        $novoExercicio74 = new Exercicio;
        $novoExercicio74->exercicio = 'Supino reto com barra';
        $novoExercicio74->musculo = 'Peito';
        $novoExercicio74->serie = 3;
        $novoExercicio74->repeticoes = 12;
        $novoExercicio74->descanso = 1;
        $novoExercicio74->tipoTempoDuracao = 'Min';
        $novoExercicio74->meta = 60;
        $novoExercicio74->intensidade = 'Moderada';
        $novoExercicio74->save();
        //Exercicio 74
        //Exercicio 75
        $novoExercicio75 = new Exercicio;
        $novoExercicio75->exercicio = 'Supino inclinado com barra';
        $novoExercicio75->musculo = 'Peito';
        $novoExercicio75->serie = 3;
        $novoExercicio75->repeticoes = 12;
        $novoExercicio75->descanso = 1;
        $novoExercicio75->tipoTempoDuracao = 'Min';
        $novoExercicio75->meta = 60;
        $novoExercicio75->intensidade = 'Moderada';
        $novoExercicio75->save();
        //Exercicio 75
        //Exercicio 76
        $novoExercicio76 = new Exercicio;
        $novoExercicio76->exercicio = 'Supino vertical';
        $novoExercicio76->musculo = 'Peito';
        $novoExercicio76->serie = 3;
        $novoExercicio76->repeticoes = 12;
        $novoExercicio76->descanso = 1;
        $novoExercicio76->tipoTempoDuracao = 'Min';
        $novoExercicio76->meta = 60;
        $novoExercicio76->intensidade = 'Moderada';
        $novoExercicio76->save();
        //Exercicio 76
        //Exercicio 77
        $novoExercicio77 = new Exercicio;
        $novoExercicio77->exercicio = 'Agachamento livre';
        $novoExercicio77->musculo = 'Coxa';
        $novoExercicio77->serie = 3;
        $novoExercicio77->repeticoes = 12;
        $novoExercicio77->descanso = 1;
        $novoExercicio77->tipoTempoDuracao = 'Min';
        $novoExercicio77->meta = 60;
        $novoExercicio77->intensidade = 'Moderada';
        $novoExercicio77->save();
        //Exercicio 77
        //Exercicio 78
        $novoExercicio78 = new Exercicio;
        $novoExercicio78->exercicio = 'Agachamento smith';
        $novoExercicio78->musculo = 'Coxa';
        $novoExercicio78->serie = 3;
        $novoExercicio78->repeticoes = 12;
        $novoExercicio78->descanso = 1;
        $novoExercicio78->tipoTempoDuracao = 'Min';
        $novoExercicio78->meta = 60;
        $novoExercicio78->intensidade = 'Moderada';
        $novoExercicio78->save();
        //Exercicio 78
        //Exercicio 79
        $novoExercicio79 = new Exercicio;
        $novoExercicio79->exercicio = 'Agachamento bulgaro';
        $novoExercicio79->musculo = 'Coxa';
        $novoExercicio79->serie = 3;
        $novoExercicio79->repeticoes = 12;
        $novoExercicio79->descanso = 1;
        $novoExercicio79->tipoTempoDuracao = 'Min';
        $novoExercicio79->meta = 60;
        $novoExercicio79->intensidade = 'Moderada';
        $novoExercicio79->save();
        //Exercicio 79
        //Exercicio 80
        $novoExercicio80 = new Exercicio;
        $novoExercicio80->exercicio = 'Agachamento sumô';
        $novoExercicio80->musculo = 'Coxa';
        $novoExercicio80->serie = 3;
        $novoExercicio80->repeticoes = 12;
        $novoExercicio80->descanso = 1;
        $novoExercicio80->tipoTempoDuracao = 'Min';
        $novoExercicio80->meta = 60;
        $novoExercicio80->intensidade = 'Moderada';
        $novoExercicio80->save();
        //Exercicio 80
        //Exercicio 81
        $novoExercicio81 = new Exercicio;
        $novoExercicio81->exercicio = 'Agachamento hack';
        $novoExercicio81->musculo = 'Coxa';
        $novoExercicio81->serie = 3;
        $novoExercicio81->repeticoes = 12;
        $novoExercicio81->descanso = 1;
        $novoExercicio81->tipoTempoDuracao = 'Min';
        $novoExercicio81->meta = 60;
        $novoExercicio81->intensidade = 'Moderada';
        $novoExercicio81->save();
        //Exercicio 81
        //Exercicio 82 
        $novoExercicio82 = new Exercicio;
        $novoExercicio82->exercicio = 'Leg Press 60°';
        $novoExercicio82->musculo = 'Coxa';
        $novoExercicio82->serie = 3;
        $novoExercicio82->repeticoes = 12;
        $novoExercicio82->descanso = 1;
        $novoExercicio82->tipoTempoDuracao = 'Min';
        $novoExercicio82->meta = 60;
        $novoExercicio82->intensidade = 'Moderada';
        $novoExercicio82->save();
        //Exercicio 82
        //Exercicio 83
        $novoExercicio83 = new Exercicio;
        $novoExercicio83->exercicio = 'Afundo';
        $novoExercicio83->musculo = 'Coxa';
        $novoExercicio83->serie = 3;
        $novoExercicio83->repeticoes = 12;
        $novoExercicio83->descanso = 1;
        $novoExercicio83->tipoTempoDuracao = 'Min';
        $novoExercicio83->meta = 60;
        $novoExercicio83->intensidade = 'Moderada';
        $novoExercicio83->save();
        //Exercicio 83
        //Exercicio 84
        $novoExercicio84 = new Exercicio;
        $novoExercicio84->exercicio = 'Passada';
        $novoExercicio84->musculo = 'Coxa';
        $novoExercicio84->serie = 3;
        $novoExercicio84->repeticoes = 12;
        $novoExercicio84->descanso = 1;
        $novoExercicio84->tipoTempoDuracao = 'Min';
        $novoExercicio84->meta = 60;
        $novoExercicio84->intensidade = 'Moderada';
        $novoExercicio84->save();
        //Exercicio 84
        //Exercicio 85
        $novoExercicio85 = new Exercicio;
        $novoExercicio85->exercicio = 'Avanço';
        $novoExercicio85->musculo = 'Coxa';
        $novoExercicio85->serie = 3;
        $novoExercicio85->repeticoes = 12;
        $novoExercicio85->descanso = 1;
        $novoExercicio85->tipoTempoDuracao = 'Min';
        $novoExercicio85->meta = 60;
        $novoExercicio85->intensidade = 'Moderada';
        $novoExercicio85->save();
        //Exercicio 85
        //Exercicio 8686
        $novoExercicio86 = new Exercicio;
        $novoExercicio86->exercicio = 'Cadeira extensora';
        $novoExercicio86->musculo = 'Coxa';
        $novoExercicio86->serie = 3;
        $novoExercicio86->repeticoes = 12;
        $novoExercicio86->descanso = 1;
        $novoExercicio86->tipoTempoDuracao = 'Min';
        $novoExercicio86->meta = 60;
        $novoExercicio86->intensidade = 'Moderada';
        $novoExercicio86->save();
        //Exercicio 86
        //Exercicio 87 
        $novoExercicio87 = new Exercicio;
        $novoExercicio87->exercicio = 'Cadeira flexora';
        $novoExercicio87->musculo = 'Coxa';
        $novoExercicio87->serie = 3;
        $novoExercicio87->repeticoes = 12;
        $novoExercicio87->descanso = 1;
        $novoExercicio87->tipoTempoDuracao = 'Min';
        $novoExercicio87->meta = 60;
        $novoExercicio87->intensidade = 'Moderada';
        $novoExercicio87->save();
        //Exercicio 87
        //Exercicio 88
        $novoExercicio88 = new Exercicio;
        $novoExercicio88->exercicio = 'Mesa flexora';
        $novoExercicio88->musculo = 'Coxa';
        $novoExercicio88->serie = 3;
        $novoExercicio88->repeticoes = 12;
        $novoExercicio88->descanso = 1;
        $novoExercicio88->tipoTempoDuracao = 'Min';
        $novoExercicio88->meta = 60;
        $novoExercicio88->intensidade = 'Moderada';
        $novoExercicio88->save();
        //Exercicio 88
        //Exercicio 89
        $novoExercicio89 = new Exercicio;
        $novoExercicio89->exercicio = 'Flexora vertical';
        $novoExercicio89->musculo = 'Coxa';
        $novoExercicio89->serie = 3;
        $novoExercicio89->repeticoes = 12;
        $novoExercicio89->descanso = 1;
        $novoExercicio89->tipoTempoDuracao = 'Min';
        $novoExercicio89->meta = 60;
        $novoExercicio89->intensidade = 'Moderada';
        $novoExercicio89->save();
        //Exercicio 89
        //Exercicio 90
        $novoExercicio90 = new Exercicio;
        $novoExercicio90->exercicio = 'Stiff';
        $novoExercicio90->musculo = 'Coxa';
        $novoExercicio90->serie = 3;
        $novoExercicio90->repeticoes = 12;
        $novoExercicio90->descanso = 1;
        $novoExercicio90->tipoTempoDuracao = 'Min';
        $novoExercicio90->meta = 60;
        $novoExercicio90->intensidade = 'Moderada';
        $novoExercicio90->save();
        //Exercicio 90
        //Exercicio 91
        $novoExercicio91 = new Exercicio;
        $novoExercicio91->exercicio = 'Abdutora';
        $novoExercicio91->musculo = 'Coxa';
        $novoExercicio91->serie = 3;
        $novoExercicio91->repeticoes = 12;
        $novoExercicio91->descanso = 1;
        $novoExercicio91->tipoTempoDuracao = 'Min';
        $novoExercicio91->meta = 60;
        $novoExercicio91->intensidade = 'Moderada';
        $novoExercicio91->save();
        //Exercicio 91
        //Exercicio 92
        $novoExercicio92 = new Exercicio;
        $novoExercicio92->exercicio = 'Adutora';
        $novoExercicio92->musculo = 'Coxa';
        $novoExercicio92->serie = 3;
        $novoExercicio92->repeticoes = 12;
        $novoExercicio92->descanso = 1;
        $novoExercicio92->tipoTempoDuracao = 'Min';
        $novoExercicio92->meta = 60;
        $novoExercicio92->intensidade = "Moderada";
        $novoExercicio92->save();
        //Exercicio 92
        //Exercicio 93
        $novoExercicio93 = new Exercicio;
        $novoExercicio93->exercicio = 'Elevação pelvica';
        $novoExercicio93->musculo = 'Coxa';
        $novoExercicio93->serie = 3;
        $novoExercicio93->repeticoes = 12;
        $novoExercicio93->descanso = 1;
        $novoExercicio93->tipoTempoDuracao = 'Min';
        $novoExercicio93->meta = 60;
        $novoExercicio93->intensidade = 'Moderada';
        $novoExercicio93->save();
        //Exercicio 93
        //Exercicio 94
        $novoExercicio94 = new Exercicio;
        $novoExercicio94->exercicio = 'Panturrilha sentado';
        $novoExercicio94->musculo = 'Panturrilha';
        $novoExercicio94->serie = 3;
        $novoExercicio94->repeticoes = 12;
        $novoExercicio94->descanso = 1;
        $novoExercicio94->tipoTempoDuracao = 'Min';
        $novoExercicio94->meta = 60;
        $novoExercicio94->intensidade = 'Moderada';
        $novoExercicio94->save();
        //Exercicio 94
        //Exercicio 95
        $novoExercicio95 = new Exercicio;
        $novoExercicio95->exercicio = 'Panturrilha em pé';
        $novoExercicio95->musculo = 'Panturrilha';
        $novoExercicio95->serie = 3;
        $novoExercicio95->repeticoes = 12;
        $novoExercicio95->descanso = 1;
        $novoExercicio95->tipoTempoDuracao = 'Min';
        $novoExercicio95->meta = 60;
        $novoExercicio95->intensidade = 'Moderada';
        $novoExercicio95->save();
        //Exercicio 95
        //Exercicio 96
        $novoExercicio96 = new Exercicio;
        $novoExercicio96->exercicio = 'Desenvolvimento articulado';
        $novoExercicio96->musculo = 'Ombro';
        $novoExercicio96->serie = 3;
        $novoExercicio96->repeticoes = 12;
        $novoExercicio96->descanso = 1;
        $novoExercicio96->tipoTempoDuracao = 'Min';
        $novoExercicio96->meta = 60;
        $novoExercicio96->intensidade = 'Moderada';
        $novoExercicio96->save();
        //Exercicio 96
        //Exercicio 97
        $novoExercicio97 = new Exercicio;
        $novoExercicio97->exercicio = 'Desenvolvimento com alter';
        $novoExercicio97->musculo = 'Ombro';
        $novoExercicio97->serie = 3;
        $novoExercicio97->repeticoes = 12;
        $novoExercicio97->descanso = 1;
        $novoExercicio97->tipoTempoDuracao = 'Min';
        $novoExercicio97->meta = 60;
        $novoExercicio97->intensidade = 'Moderada';
        $novoExercicio97->save();
        //Exercicio 97
        //Exercicio 98
        $novoExercicio98 = new Exercicio;
        $novoExercicio98->exercicio = 'Elevação lateral com alter';
        $novoExercicio98->musculo = 'Ombro';
        $novoExercicio98->serie = 3;
        $novoExercicio98->repeticoes = 12;
        $novoExercicio98->descanso = 1;
        $novoExercicio98->tipoTempoDuracao = 'Min';
        $novoExercicio98->meta = 60;
        $novoExercicio98->intensidade = 'Moderada';
        $novoExercicio98->save();
        //Exercicio 98
        //Exercicio 99
        $novoExercicio99 = new Exercicio;
        $novoExercicio99->exercicio = 'Elevação frontal';
        $novoExercicio99->musculo = 'Ombro';
        $novoExercicio99->serie = 3;
        $novoExercicio99->repeticoes = 12;
        $novoExercicio99->descanso = 1;
        $novoExercicio99->tipoTempoDuracao = 'Min';
        $novoExercicio99->meta = 60;
        $novoExercicio99->intensidade = 'Moderada';
        $novoExercicio99->save();
        //Exercicio 99
        //Exercicio 100
        $novoExercicio100 = new Exercicio;
        $novoExercicio100->exercicio = 'Crucifixo inverso';
        $novoExercicio100->musculo = 'Trapézio';
        $novoExercicio100->serie = 3;
        $novoExercicio100->repeticoes = 12;
        $novoExercicio100->descanso = 1;
        $novoExercicio100->tipoTempoDuracao = 'Min';
        $novoExercicio100->meta = 60;
        $novoExercicio100->intensidade = 'Moderada';
        $novoExercicio100->save();
        //Exercicio 100  
        //Exercicio 101
        $novoExercicio101 = new Exercicio;
        $novoExercicio101->exercicio = 'FacePull';
        $novoExercicio101->musculo = 'Ombro';
        $novoExercicio101->serie = 3;
        $novoExercicio101->repeticoes = 12;
        $novoExercicio101->descanso = 1;
        $novoExercicio101->tipoTempoDuracao = 'Min';
        $novoExercicio101->meta = 60;
        $novoExercicio101->intensidade = 'Moderada';
        $novoExercicio101->save();
        //Exercicio 101
        //Exercicio 102
        $novoExercicio102 = new Exercicio;
        $novoExercicio102->exercicio = 'Tríceps testa';
        $novoExercicio102->musculo = 'Tríceps';
        $novoExercicio102->serie = 3;
        $novoExercicio102->repeticoes = 12;
        $novoExercicio102->descanso = 1;
        $novoExercicio102->tipoTempoDuracao = 'Min';
        $novoExercicio102->meta = 60;
        $novoExercicio102->intensidade = 'Moderada';
        $novoExercicio102->save();
        //Exercicio 102
        //Exercicio 103
        $novoExercicio103 = new Exercicio;
        $novoExercicio103->exercicio = 'Tríceps francês';
        $novoExercicio103->musculo = 'Tríceps';
        $novoExercicio103->serie = 3;
        $novoExercicio103->repeticoes = 12;
        $novoExercicio103->descanso = 1;
        $novoExercicio103->tipoTempoDuracao = 'Min';
        $novoExercicio103->meta = 60;
        $novoExercicio103->intensidade = 'Moderada';
        $novoExercicio103->save();
        //Exercicio 103
        //Exercicio 104
        $novoExercicio104 = new Exercicio;
        $novoExercicio104->exercicio = 'Tríceps pulley';
        $novoExercicio104->musculo = 'Tríceps';
        $novoExercicio104->serie = 3;
        $novoExercicio104->repeticoes = 12;
        $novoExercicio104->descanso = 1;
        $novoExercicio104->tipoTempoDuracao = 'Min';
        $novoExercicio104->meta = 60;
        $novoExercicio104->intensidade = 'Moderada';
        $novoExercicio104->save();
        //Exercicio 104
        //Exercicio 105
        $novoExercicio105 = new Exercicio;
        $novoExercicio105->exercicio = 'Tríceps corda';
        $novoExercicio105->musculo = 'Tríceps';
        $novoExercicio105->serie = 3;
        $novoExercicio105->repeticoes = 12;
        $novoExercicio105->descanso = 1;
        $novoExercicio105->tipoTempoDuracao = 'Min';
        $novoExercicio105->meta = 60;
        $novoExercicio105->intensidade = 'Moderada';
        $novoExercicio105->save();
        //Exercicio 105
        //Exercicio 106
        $novoExercicio106 = new Exercicio;
        $novoExercicio106->exercicio = 'Paralela';
        $novoExercicio106->musculo = 'Tríceps';
        $novoExercicio106->serie = 3;
        $novoExercicio106->repeticoes = 12;
        $novoExercicio106->descanso = 1;
        $novoExercicio106->tipoTempoDuracao = 'Min';
        $novoExercicio106->meta = 60;
        $novoExercicio106->intensidade = 'Moderada';
        $novoExercicio106->save();
        //Exercicio 106
        //Exercicio 107
        $novoExercicio107 = new Exercicio;
        $novoExercicio107->exercicio = 'Encolhimento';
        $novoExercicio107->musculo = 'Trapézio';
        $novoExercicio107->serie = 3;
        $novoExercicio107->repeticoes = 12;
        $novoExercicio107->descanso = 1;
        $novoExercicio107->tipoTempoDuracao = 'Min';
        $novoExercicio107->meta = 60;
        $novoExercicio107->intensidade = 'Moderada';
        $novoExercicio107->save();
        //Exercicio 107
        //Exercicio 108
        $novoExercicio108 = new Exercicio;
        $novoExercicio108->exercicio = 'Puxada alta supinada';
        $novoExercicio108->musculo = 'Costas';
        $novoExercicio108->serie = 3;
        $novoExercicio108->repeticoes = 12;
        $novoExercicio108->descanso = 1;
        $novoExercicio108->tipoTempoDuracao = 'Min';
        $novoExercicio108->meta = 60;
        $novoExercicio108->intensidade = 'Moderada';
        $novoExercicio108->save();
        //Exercicio 108
        //Exercicio 109
        $novoExercicio109 = new Exercicio;
        $novoExercicio109->exercicio = 'Serrote';
        $novoExercicio109->musculo = 'Costas';
        $novoExercicio109->serie = 3;
        $novoExercicio109->repeticoes = 12;
        $novoExercicio109->descanso = 1;
        $novoExercicio109->tipoTempoDuracao = 'Min';
        $novoExercicio109->meta = 60;
        $novoExercicio109->intensidade = 'Moderada';
        $novoExercicio109->save();
        //Exercicio 109
        //Exercicio 110
        $novoExercicio110 = new Exercicio;
        $novoExercicio110->exercicio = 'Remada curvada';
        $novoExercicio110->musculo = 'Costas';
        $novoExercicio110->serie = 3;
        $novoExercicio110->repeticoes = 12;
        $novoExercicio110->descanso = 1;
        $novoExercicio110->tipoTempoDuracao = 'Min';
        $novoExercicio110->meta = 60;
        $novoExercicio110->intensidade = 'Moderada';
        $novoExercicio110->save();
        //Exercicio 110
        //Exercicio 111
        $novoExercicio111 = new Exercicio;
        $novoExercicio111->exercicio = 'Remada cavalinho';
        $novoExercicio111->musculo = 'Costas';
        $novoExercicio111->serie = 3;
        $novoExercicio111->repeticoes = 12;
        $novoExercicio111->descanso = 1;
        $novoExercicio111->tipoTempoDuracao = 'Min';
        $novoExercicio111->meta = 60;
        $novoExercicio111->intensidade = 'Moderada';
        $novoExercicio111->save();
        //Exercicio 111
        //Exercicio 112
        $novoExercicio112 = new Exercicio;
        $novoExercicio112->exercicio = 'Remada articulada';
        $novoExercicio112->musculo = 'Costas';
        $novoExercicio112->serie = 3;
        $novoExercicio112->repeticoes = 12;
        $novoExercicio112->descanso = 1;
        $novoExercicio112->tipoTempoDuracao = 'Min';
        $novoExercicio112->meta = 60;
        $novoExercicio112->intensidade = 'Moderada';
        $novoExercicio112->save();
        //Exercicio 112
        //Exercicio 113
        $novoExercicio114 = new Exercicio;
        $novoExercicio114->exercicio = 'Puxada alta com triângulo';
        $novoExercicio114->musculo = 'Costas';
        $novoExercicio114->serie = 3;
        $novoExercicio114->repeticoes = 12;
        $novoExercicio114->descanso = 1;
        $novoExercicio114->tipoTempoDuracao = 'Min';
        $novoExercicio114->meta = 60;
        $novoExercicio114->intensidade = 'Moderada';
        $novoExercicio114->save();
        //Exercicio 114
        //Exercicio 115
        $novoExercicio115 = new Exercicio;
        $novoExercicio115->exercicio = 'PullDown';
        $novoExercicio115->musculo = 'Costas';
        $novoExercicio115->serie = 3;
        $novoExercicio115->repeticoes = 12;
        $novoExercicio115->descanso = 1;
        $novoExercicio115->tipoTempoDuracao = 'Min';
        $novoExercicio115->meta = 60;
        $novoExercicio115->intensidade = 'Moderada';
        $novoExercicio115->save();
        //Exercicio 115
        //Exercicio 116
        $novoExercicio116 = new Exercicio;
        $novoExercicio116->exercicio = 'Remada baixa unilateral';
        $novoExercicio116->musculo = 'Costas';
        $novoExercicio116->serie = 3;
        $novoExercicio116->repeticoes = 12;
        $novoExercicio116->descanso = 1;
        $novoExercicio116->tipoTempoDuracao = 'Min';
        $novoExercicio116->meta = 60;
        $novoExercicio116->intensidade = 'Moderada';
        $novoExercicio116->save();
        //Exercicio 116
        //Exercicio 117
        $novoExercicio117 = new Exercicio;
        $novoExercicio117->exercicio = 'Barra fixa';
        $novoExercicio117->musculo = 'Costas';
        $novoExercicio117->serie = 3;
        $novoExercicio117->repeticoes = 12;
        $novoExercicio117->descanso = 1;
        $novoExercicio117->tipoTempoDuracao = 'Min';
        $novoExercicio117->meta = 60;
        $novoExercicio117->intensidade = 'Moderada';
        $novoExercicio117->save();
        //Exercicio 117
        //Exercicio 118
        $novoExercicio118 = new Exercicio;
        $novoExercicio118->exercicio = 'Rosca alternada com halter';
        $novoExercicio118->musculo = 'Bíceps';
        $novoExercicio118->serie = 3;
        $novoExercicio118->repeticoes = 12;
        $novoExercicio118->descanso = 1;
        $novoExercicio118->tipoTempoDuracao = 'Min';
        $novoExercicio118->meta = 60;
        $novoExercicio118->intensidade = 'Moderada';
        $novoExercicio118->save();
        //Exercicio 118
        //Exercicio 119
        $novoExercicio119 = new Exercicio;
        $novoExercicio119->exercicio = 'Rosca scott';
        $novoExercicio119->musculo = 'Bíceps';
        $novoExercicio119->serie = 3;
        $novoExercicio119->repeticoes = 12;
        $novoExercicio119->descanso = 1;
        $novoExercicio119->tipoTempoDuracao = 'Min';
        $novoExercicio119->meta = 60;
        $novoExercicio119->intensidade = 'Moderada';
        $novoExercicio119->save();
        //Exercicio 119
        //Exercicio 120
        $novoExercicio120 = new Exercicio;
        $novoExercicio120->exercicio = 'Rosca spider';
        $novoExercicio120->musculo = 'Bíceps';
        $novoExercicio120->serie = 3;
        $novoExercicio120->repeticoes = 12;
        $novoExercicio120->descanso = 1;
        $novoExercicio120->tipoTempoDuracao = 'Min';
        $novoExercicio120->meta = 60;
        $novoExercicio120->intensidade = 'Moderada';
        $novoExercicio120->save();
        //Exercicio 120
        //Exercicio 121
        $novoExercicio121 = new Exercicio;
        $novoExercicio121->exercicio = 'Rosca direta na polia';
        $novoExercicio121->musculo = 'Bíceps';
        $novoExercicio121->serie = 3;
        $novoExercicio121->repeticoes = 12;
        $novoExercicio121->descanso = 1;
        $novoExercicio121->tipoTempoDuracao = 'Min';
        $novoExercicio121->meta = 60;
        $novoExercicio121->intensidade = 'Moderada';
        $novoExercicio121->save();
        //Exercicio 121
        //Exercicio 122
        $novoExercicio122 = new Exercicio;
        $novoExercicio122->exercicio = 'Rosca martelo com halter';
        $novoExercicio122->musculo = 'Bíceps';
        $novoExercicio122->serie = 3;
        $novoExercicio122->repeticoes = 12;
        $novoExercicio122->descanso = 1;
        $novoExercicio122->tipoTempoDuracao = 'Min';
        $novoExercicio122->meta = 60;
        $novoExercicio122->intensidade = 'Moderada';
        $novoExercicio122->save();
        //Exercicio 122 
        //Exercicio 123
        $novoExercicio123 = new Exercicio;
        $novoExercicio123->exercicio = 'Rosca martelo na polia';
        $novoExercicio123->musculo = 'Bíceps';
        $novoExercicio123->serie = 3;
        $novoExercicio123->repeticoes = 12;
        $novoExercicio123->descanso = 1;
        $novoExercicio123->tipoTempoDuracao = 'Min';
        $novoExercicio123->meta = 60;
        $novoExercicio123->intensidade = 'Moderada';
        $novoExercicio123->save();
        //Exercicio 123
        //Exercicio 124
        $novoExercicio124 = new Exercicio;
        $novoExercicio124->exercicio = 'Rosca concentrada';
        $novoExercicio124->musculo = 'Bíceps';
        $novoExercicio124->serie = 3;
        $novoExercicio124->repeticoes = 12;
        $novoExercicio124->descanso = 1;
        $novoExercicio124->tipoTempoDuracao = 'Min';
        $novoExercicio124->meta = 60;
        $novoExercicio124->intensidade = 'Moderada';
        $novoExercicio124->save();
        //Exercicio 124
        //Exercicio 125
        $novoExercicio125 = new Exercicio;
        $novoExercicio125->exercicio = 'Flexão do tronco ';
        $novoExercicio125->musculo = 'Abdomen';
        $novoExercicio125->serie = 3;
        $novoExercicio125->repeticoes = 12;
        $novoExercicio125->descanso = 1;
        $novoExercicio125->tipoTempoDuracao = 'Min';
        $novoExercicio125->meta = 60;
        $novoExercicio125->intensidade = 'Moderada';
        $novoExercicio125->save();
        //Exercicio 125
        //Exercicio 126
        $novoExercicio126 = new Exercicio;
        $novoExercicio126->exercicio = 'Flexão com elevação do quadril';
        $novoExercicio126->musculo = 'Abdomen';
        $novoExercicio126->serie = 3;
        $novoExercicio126->repeticoes = 12;
        $novoExercicio126->descanso = 1;
        $novoExercicio126->tipoTempoDuracao = 'Min';
        $novoExercicio126->meta = 60;
        $novoExercicio126->intensidade = 'Moderada';
        $novoExercicio126->save();
        //Exercicio 126
        //Exercicio 127
        $novoExercicio127 = new Exercicio;
        $novoExercicio127->exercicio = 'Flexão com leve rotação do tronco';
        $novoExercicio127->musculo = 'Abdomen';
        $novoExercicio127->serie = 3;
        $novoExercicio127->repeticoes = 12;
        $novoExercicio127->descanso = 1;
        $novoExercicio127->tipoTempoDuracao = 'Min';
        $novoExercicio127->meta = 60;
        $novoExercicio127->intensidade = 'Moderada';
        $novoExercicio127->save();
        //Exercicio 127 
        //Exercicio 128
        $novoExercicio128 = new Exercicio;
        $novoExercicio128->exercicio = 'Pracha Ventral';
        $novoExercicio128->musculo = 'Abdomen';
        $novoExercicio128->serie = 3;
        $novoExercicio128->repeticoes = 12;
        $novoExercicio128->descanso = 1;
        $novoExercicio128->tipoTempoDuracao = 'Min';
        $novoExercicio128->meta = 60;
        $novoExercicio128->intensidade = 'Moderada';
        $novoExercicio128->save();
        //Exercicio 128
        //Exercicio 129
        $novoExercicio129 = new Exercicio;
        $novoExercicio129->exercicio = 'Abdominal “canoa”';
        $novoExercicio129->musculo = 'Abdomen';
        $novoExercicio129->serie = 3;
        $novoExercicio129->repeticoes = 12;
        $novoExercicio129->descanso = 1;
        $novoExercicio129->tipoTempoDuracao = 'Min';
        $novoExercicio129->meta = 60;
        $novoExercicio129->intensidade = 'Moderada';
        $novoExercicio129->save();
        //Exercicio 129
        //Exercicio 113
        $novoExercicio113 = new Exercicio;
        $novoExercicio113->exercicio = 'Abdominal “canivete”';
        $novoExercicio113->musculo = 'Abdomen';
        $novoExercicio113->serie = 3;
        $novoExercicio113->repeticoes = 12;
        $novoExercicio113->descanso = 1;
        $novoExercicio113->tipoTempoDuracao = 'Min';
        $novoExercicio113->meta = 60;
        $novoExercicio113->intensidade = 'Moderada';
        $novoExercicio113->save();
        //Exercicio 113 
        //Exercicio 130 
        $novoExercicio130 = new Exercicio;
        $novoExercicio130->exercicio = 'Giro russo';
        $novoExercicio130->musculo = 'Abdomen';
        $novoExercicio130->serie = 3;
        $novoExercicio130->repeticoes = 12;
        $novoExercicio130->descanso = 1;
        $novoExercicio130->tipoTempoDuracao = 'Min';
        $novoExercicio130->meta = 60;
        $novoExercicio130->intensidade = 'Moderada';
        $novoExercicio130->save();
        //Exercicio 130
        //Fim criar Exercicio Moderada 

//Inicio criar Exercício Leve
        $novoExercicio131 = new Exercicio;
        $novoExercicio131->exercicio = 'Supino reto com halter';
        $novoExercicio131->musculo = 'Peito';
        $novoExercicio131->serie = 2;
        $novoExercicio131->repeticoes = 8;
        $novoExercicio131->descanso = 1;
        $novoExercicio131->tipoTempoDuracao = 'Min';
        $novoExercicio131->meta = 40;
        $novoExercicio131->intensidade = 'Leve';
        $novoExercicio13->save();
        //Exercicio 131
        //Exercicio 132
        $novoExercicio132 = new Exercicio;
        $novoExercicio132->exercicio = 'Puxada alta pronada';
        $novoExercicio132->musculo = 'Costas';
        $novoExercicio132->serie = 2;
        $novoExercicio132->repeticoes = 8;
        $novoExercicio132->descanso = 1;
        $novoExercicio132->tipoTempoDuracao = 'Min';
        $novoExercicio132->meta = 40;
        $novoExercicio132->intensidade = 'Leve';
        $novoExercicio132->save();
        //Exercicio 132
        //Exercicio 133
        $novoExercicio133 = new Exercicio;
        $novoExercicio133->exercicio = 'Leg Press 45°';
        $novoExercicio133->musculo = 'Coxa';
        $novoExercicio133->serie = 2;
        $novoExercicio133->repeticoes = 8;
        $novoExercicio133->descanso = 1;
        $novoExercicio133->tipoTempoDuracao = 'Min';
        $novoExercicio133->meta = 40;
        $novoExercicio133->intensidade = 'Leve';
        $novoExercicio133->save();
        //Exercicio 133
        //Exercicio 134
        $novoExercicio134 = new Exercicio;
        $novoExercicio134->exercicio = 'Remada baixa com triângulo';
        $novoExercicio134->musculo = 'Costas';
        $novoExercicio134->serie = 2;
        $novoExercicio134->repeticoes = 8;
        $novoExercicio134->descanso = 1;
        $novoExercicio134->tipoTempoDuracao = 'Min';
        $novoExercicio134->meta = 40;
        $novoExercicio134->intensidade = 'Leve';
        $novoExercicio134->save();
        //Exercicio 134
        //Exercicio 135
        $novoExercicio135 = new Exercicio;
        $novoExercicio135->exercicio = 'Rosca Direta com barra';
        $novoExercicio135->musculo = 'Bíceps';
        $novoExercicio135->serie = 2;
        $novoExercicio135->repeticoes = 8;
        $novoExercicio135->descanso = 1;
        $novoExercicio135->tipoTempoDuracao = 'Min';
        $novoExercicio135->meta = 40;
        $novoExercicio135->intensidade = 'Leve';
        $novoExercicio135->save();
        //Exercicio 135
        //Exercicio 136
        $novoExercicio136 = new Exercicio;
        $novoExercicio136->exercicio = 'Rosca 21';
        $novoExercicio136->musculo = 'Bíceps';
        $novoExercicio136->serie = 2;
        $novoExercicio136->repeticoes = 8;
        $novoExercicio136->descanso = 1;
        $novoExercicio136->tipoTempoDuracao = 'Min';
        $novoExercicio136->meta = 40;
        $novoExercicio136->intensidade = 'Leve';
        $novoExercicio136->save();
        //Exercicio 136
        //Exercicio 137
        $novoExercicio137 = new Exercicio;
        $novoExercicio137->exercicio = 'Supino inclinado com halter';
        $novoExercicio137->musculo = 'Peito';
        $novoExercicio137->serie = 2;
        $novoExercicio137->repeticoes = 8;
        $novoExercicio137->descanso = 1;
        $novoExercicio137->tipoTempoDuracao = 'Min';
        $novoExercicio137->meta = 40;
        $novoExercicio137->intensidade = 'Leve';
        $novoExercicio137->save();
        //Exercicio 137
        //Exercicio 138
        $novoExercicio138 = new Exercicio;
        $novoExercicio138->exercicio = 'Voador';
        $novoExercicio138->musculo = 'Peito';
        $novoExercicio138->serie = 2;
        $novoExercicio138->repeticoes = 8;
        $novoExercicio138->descanso = 1;
        $novoExercicio138->tipoTempoDuracao = 'Min';
        $novoExercicio138->meta = 40;
        $novoExercicio138->intensidade = 'Leve';
        $novoExercicio138->save();
        //Exercicio 138
        //Exercicio 139
        $novoExercicio139 = new Exercicio;
        $novoExercicio139->exercicio = 'Supino reto com barra';
        $novoExercicio139->musculo = 'Peito';
        $novoExercicio139->serie = 2;
        $novoExercicio139->repeticoes = 8;
        $novoExercicio139->descanso = 1;
        $novoExercicio139->tipoTempoDuracao = 'Min';
        $novoExercicio139->meta = 40;
        $novoExercicio139->intensidade = 'Leve';
        $novoExercicio139->save();
        //Exercicio 139
        //Exercicio 140
        $novoExercicio140 = new Exercicio;
        $novoExercicio140->exercicio = 'Supino inclinado com barra';
        $novoExercicio140->musculo = 'Peito';
        $novoExercicio140->serie = 2;
        $novoExercicio140->repeticoes = 8;
        $novoExercicio140->descanso = 1;
        $novoExercicio140->tipoTempoDuracao = 'Min';
        $novoExercicio140->meta = 40;
        $novoExercicio140->intensidade = 'Leve';
        $novoExercicio140->save();
        //Exercicio 140
        //Exercicio 141
        $novoExercicio141 = new Exercicio;
        $novoExercicio141->exercicio = 'Supino vertical';
        $novoExercicio141->musculo = 'Peito';
        $novoExercicio141->serie = 2;
        $novoExercicio141->repeticoes = 8;
        $novoExercicio141->descanso = 1;
        $novoExercicio141->tipoTempoDuracao = 'Min';
        $novoExercicio141->meta = 40;
        $novoExercicio141->intensidade = 'Leve';
        $novoExercicio141->save();
        //Exercicio 141
        //Exercicio 142
        $novoExercicio142 = new Exercicio;
        $novoExercicio142->exercicio = 'Agachamento livre';
        $novoExercicio142->musculo = 'Coxa';
        $novoExercicio142->serie = 2;
        $novoExercicio142->repeticoes = 8;
        $novoExercicio142->descanso = 1;
        $novoExercicio142->tipoTempoDuracao = 'Min';
        $novoExercicio142->meta = 40;
        $novoExercicio142->intensidade = 'Leve';
        $novoExercicio142->save();
        //Exercicio 142
        //Exercicio 143
        $novoExercicio143 = new Exercicio;
        $novoExercicio143->exercicio = 'Agachamento smith';
        $novoExercicio143->musculo = 'Coxa';
        $novoExercicio143->serie = 2;
        $novoExercicio143->repeticoes = 8;
        $novoExercicio143->descanso = 1;
        $novoExercicio143->tipoTempoDuracao = 'Min';
        $novoExercicio143->meta = 40;
        $novoExercicio143->intensidade = 'Leve';
        $novoExercicio143->save();
        //Exercicio 143
        //Exercicio 144
        $novoExercicio144 = new Exercicio;
        $novoExercicio144->exercicio = 'Agachamento bulgaro';
        $novoExercicio144->musculo = 'Coxa';
        $novoExercicio144->serie = 2;
        $novoExercicio144->repeticoes = 8;
        $novoExercicio144->descanso = 1;
        $novoExercicio144->tipoTempoDuracao = 'Min';
        $novoExercicio144->meta = 40;
        $novoExercicio144->intensidade = 'Leve';
        $novoExercicio144->save();
        //Exercicio 144
        //Exercicio 145
        $novoExercicio145 = new Exercicio;
        $novoExercicio145->exercicio = 'Agachamento sumô';
        $novoExercicio145->musculo = 'Coxa';
        $novoExercicio145->serie = 2;
        $novoExercicio145->repeticoes = 8;
        $novoExercicio145->descanso = 1;
        $novoExercicio145->tipoTempoDuracao = 'Min';
        $novoExercicio145->meta = 40;
        $novoExercicio145->intensidade = 'Leve';
        $novoExercicio145->save();
        //Exercicio 145
        //Exercicio 146
        $novoExercicio146 = new Exercicio;
        $novoExercicio146->exercicio = 'Agachamento hack';
        $novoExercicio146->musculo = 'Coxa';
        $novoExercicio146->serie = 2;
        $novoExercicio146->repeticoes = 8;
        $novoExercicio146->descanso = 1;
        $novoExercicio146->tipoTempoDuracao = 'Min';
        $novoExercicio146->meta = 40;
        $novoExercicio146->intensidade = 'Leve';
        $novoExercicio146->save();
        //Exercicio 146
        //Exercicio 147
        $novoExercicio147 = new Exercicio;
        $novoExercicio147->exercicio = 'Leg Press 60°';
        $novoExercicio147->musculo = 'Coxa';
        $novoExercicio147->serie = 2;
        $novoExercicio147->repeticoes = 8;
        $novoExercicio147->descanso = 1;
        $novoExercicio147->tipoTempoDuracao = 'Min';
        $novoExercicio147->meta = 40;
        $novoExercicio147->intensidade = 'Leve';
        $novoExercicio147->save();
        //Exercicio 147
        //Exercicio 148
        $novoExercicio148 = new Exercicio;
        $novoExercicio148->exercicio = 'Afundo';
        $novoExercicio148->musculo = 'Coxa';
        $novoExercicio148->serie = 2;
        $novoExercicio148->repeticoes = 8;
        $novoExercicio148->descanso = 1;
        $novoExercicio148->tipoTempoDuracao = 'Min';
        $novoExercicio148->meta = 40;
        $novoExercicio148->intensidade = 'Leve';
        $novoExercicio148->save();
        //Exercicio 148
        //Exercicio 149
        $novoExercicio149 = new Exercicio;
        $novoExercicio149->exercicio = 'Passada';
        $novoExercicio149->musculo = 'Coxa';
        $novoExercicio149->serie = 2;
        $novoExercicio149->repeticoes = 8;
        $novoExercicio149->descanso = 1;
        $novoExercicio149->tipoTempoDuracao = 'Min';
        $novoExercicio149->meta = 40;
        $novoExercicio149->intensidade = 'Leve';
        $novoExercicio149->save();
        //Exercicio 147
        //Exercicio 150
        $novoExercicio150 = new Exercicio;
        $novoExercicio150->exercicio = 'Avanço';
        $novoExercicio150->musculo = 'Coxa';
        $novoExercicio150->serie = 2;
        $novoExercicio150->repeticoes = 8;
        $novoExercicio150->descanso = 1;
        $novoExercicio150->tipoTempoDuracao = 'Min';
        $novoExercicio150->meta = 40;
        $novoExercicio150->intensidade = 'Leve';
        $novoExercicio150->save();
        //Exercicio 
        //Exercicio 
        $novoExercicio151 = new Exercicio;
        $novoExercicio151->exercicio = 'Cadeira extensora';
        $novoExercicio151->musculo = 'Coxa';
        $novoExercicio151->serie = 2;
        $novoExercicio151->repeticoes = 8;
        $novoExercicio151->descanso = 1;
        $novoExercicio151->tipoTempoDuracao = 'Min';
        $novoExercicio151->meta = 40;
        $novoExercicio151->intensidade = 'Leve';
        $novoExercicio151->save();
        //Exercicio 
        //Exercicio  
        $novoExercicio152 = new Exercicio;
        $novoExercicio152->exercicio = 'Cadeira flexora';
        $novoExercicio152 ->musculo = 'Coxa';
        $novoExercicio152->serie = 2;
        $novoExercicio152->repeticoes = 8;
        $novoExercicio152->descanso = 1;
        $novoExercicio152->tipoTempoDuracao = 'Min';
        $novoExercicio152->meta = 40;
        $novoExercicio152->intensidade = 'Leve';
        $novoExercicio152->save();
        //Exercicio 
        //Exercicio 
        $novoExercicio153 = new Exercicio;
        $novoExercicio153->exercicio = 'Mesa flexora';
        $novoExercicio153->musculo = 'Coxa';
        $novoExercicio153->serie = 2;
        $novoExercicio153->repeticoes = 8;
        $novoExercicio153->descanso = 1;
        $novoExercicio153->tipoTempoDuracao = 'Min';
        $novoExercicio153->meta = 40;
        $novoExercicio153->intensidade = 'Leve';
        $novoExercicio153->save();
        //Exercicio 
        //Exercicio
        $novoExercicio154 = new Exercicio;
        $novoExercicio154->exercicio = 'Flexora vertical';
        $novoExercicio154->musculo = 'Coxa';
        $novoExercicio154->serie = 2;
        $novoExercicio154->repeticoes = 8;
        $novoExercicio154->descanso = 1;
        $novoExercicio154->tipoTempoDuracao = 'Min';
        $novoExercicio154->meta = 40;
        $novoExercicio154->intensidade = 'Leve';
        $novoExercicio154->save();
        //Exercicio 
        //Exercicio 
        $novoExercicio155 = new Exercicio;
        $novoExercicio155->exercicio = 'Stiff';
        $novoExercicio155->musculo = 'Coxa';
        $novoExercicio155->serie = 2;
        $novoExercicio155->repeticoes = 8;
        $novoExercicio155->descanso = 1;
        $novoExercicio155->tipoTempoDuracao = 'Min';
        $novoExercicio155->meta = 40;
        $novoExercicio155->intensidade = 'Leve';
        $novoExercicio155->save();
        //Exercicio 
        //Exercicio 
        $novoExercicio156 = new Exercicio;
        $novoExercicio156->exercicio = 'Abdutora';
        $novoExercicio156->musculo = 'Coxa';
        $novoExercicio156->serie = 2;
        $novoExercicio156->repeticoes = 8;
        $novoExercicio156->descanso = 1;
        $novoExercicio156->tipoTempoDuracao = 'Min';
        $novoExercicio156->meta = 40;
        $novoExercicio156->intensidade = 'Leve';
        $novoExercicio156->save();
        //Exercicio 
        //Exercicio 
        $novoExercicio157 = new Exercicio;
        $novoExercicio157->exercicio = 'Adutora';
        $novoExercicio157->musculo = 'Coxa';
        $novoExercicio157->serie = 2;
        $novoExercicio157->repeticoes = 8;
        $novoExercicio157->descanso = 1;
        $novoExercicio157->tipoTempoDuracao = 'Min';
        $novoExercicio157->meta = 40;
        $novoExercicio157->intensidade = "Leve";
        $novoExercicio157->save();
        //Exercicio 
        //Exercicio 
        $novoExercicio158 = new Exercicio;
        $novoExercicio158->exercicio = 'Elevação pelvica';
        $novoExercicio158->musculo = 'Coxa';
        $novoExercicio158->serie = 2;
        $novoExercicio158->repeticoes = 8;
        $novoExercicio158->descanso = 1;
        $novoExercicio158->tipoTempoDuracao = 'Min';
        $novoExercicio158->meta = 40;
        $novoExercicio158->intensidade = 'Leve';
        $novoExercicio158->save();
        //Exercicio 
        //Exercicio 
        $novoExercicio159 = new Exercicio;
        $novoExercicio159->exercicio = 'Panturrilha sentado';
        $novoExercicio159->musculo = 'Panturrilha';
        $novoExercicio159->serie = 2;
        $novoExercicio159->repeticoes = 8;
        $novoExercicio159->descanso = 1;
        $novoExercicio159->tipoTempoDuracao = 'Min';
        $novoExercicio159->meta = 40;
        $novoExercicio159->intensidade = 'Leve';
        $novoExercicio159->save();
        //Exercicio 
        //Exercicio 
        $novoExercicio160 = new Exercicio;
        $novoExercicio160->exercicio = 'Panturrilha em pé';
        $novoExercicio160->musculo = 'Panturrilha';
        $novoExercicio160->serie = 2;
        $novoExercicio160->repeticoes = 8;
        $novoExercicio160->descanso = 1;
        $novoExercicio160->tipoTempoDuracao = 'Min';
        $novoExercicio160->meta = 40;
        $novoExercicio160->intensidade = 'Leve';
        $novoExercicio160->save();
        //Exercicio 
        //Exercicio 
        $novoExercicio161 = new Exercicio;
        $novoExercicio161->exercicio = 'Desenvolvimento articulado';
        $novoExercicio161->musculo = 'Ombro';
        $novoExercicio161->serie = 2;
        $novoExercicio161->repeticoes = 8;
        $novoExercicio161->descanso = 1;
        $novoExercicio161->tipoTempoDuracao = 'Min';
        $novoExercicio161->meta = 40;
        $novoExercicio161->intensidade = 'Leve';
        $novoExercicio161->save();
        //Exercicio 
        //Exercicio 
        $novoExercicio162 = new Exercicio;
        $novoExercicio162->exercicio = 'Desenvolvimento com alter';
        $novoExercicio162->musculo = 'Ombro';
        $novoExercicio162->serie = 2;
        $novoExercicio162->repeticoes = 8;
        $novoExercicio162->descanso = 1;
        $novoExercicio162->tipoTempoDuracao = 'Min';
        $novoExercicio162->meta = 40;
        $novoExercicio162->intensidade = 'Leve';
        $novoExercicio162->save();
        //Exercicio 
        //Exercicio 
        $novoExercicio163 = new Exercicio;
        $novoExercicio163->exercicio = 'Elevação lateral com alter';
        $novoExercicio163->musculo = 'Ombro';
        $novoExercicio163->serie = 2;
        $novoExercicio163->repeticoes = 8;
        $novoExercicio163->descanso = 1;
        $novoExercicio163->tipoTempoDuracao = 'Min';
        $novoExercicio163->meta = 40;
        $novoExercicio163->intensidade = 'Leve';
        $novoExercicio163->save();
        //Exercicio 
        //Exercicio
        $novoExercicio164 = new Exercicio;
        $novoExercicio164->exercicio = 'Elevação frontal';
        $novoExercicio164->musculo = 'Ombro';
        $novoExercicio164->serie = 2;
        $novoExercicio164->repeticoes = 8;
        $novoExercicio164->descanso = 1;
        $novoExercicio164->tipoTempoDuracao = 'Min';
        $novoExercicio164->meta = 40;
        $novoExercicio164->intensidade = 'Leve';
        $novoExercicio164->save();
        //Exercicio 164
        //Exercicio 165
        $novoExercicio165 = new Exercicio;
        $novoExercicio165->exercicio = 'Crucifixo inverso';
        $novoExercicio165->musculo = 'Trapézio';
        $novoExercicio165->serie = 2;
        $novoExercicio165->repeticoes = 8;
        $novoExercicio165->descanso = 1;
        $novoExercicio165->tipoTempoDuracao = 'Min';
        $novoExercicio165->meta = 40;
        $novoExercicio165->intensidade = 'Leve';
        $novoExercicio165->save();
        //Exercicio 165  
        //Exercicio 166
        $novoExercicio166 = new Exercicio;
        $novoExercicio166->exercicio = 'FacePull';
        $novoExercicio166->musculo = 'Ombro';
        $novoExercicio166->serie = 2;
        $novoExercicio166->repeticoes = 8;
        $novoExercicio166->descanso = 1;
        $novoExercicio166->tipoTempoDuracao = 'Min';
        $novoExercicio166->meta = 40;
        $novoExercicio166->intensidade = 'Leve';
        $novoExercicio166->save();
        //Exercicio 166
        //Exercicio 
        $novoExercicio167 = new Exercicio;
        $novoExercicio167->exercicio = 'Tríceps testa';
        $novoExercicio167->musculo = 'Tríceps';
        $novoExercicio167->serie = 2;
        $novoExercicio167->repeticoes = 8;
        $novoExercicio167->descanso = 1;
        $novoExercicio167->tipoTempoDuracao = 'Min';
        $novoExercicio167->meta = 40;
        $novoExercicio167->intensidade = 'Leve';
        $novoExercicio167->save();
        //Exercicio 167
        //Exercicio 168
        $novoExercicio168 = new Exercicio;
        $novoExercicio168->exercicio = 'Tríceps francês';
        $novoExercicio168->musculo = 'Tríceps';
        $novoExercicio168->serie = 2;
        $novoExercicio168->repeticoes = 8;
        $novoExercicio168->descanso = 1;
        $novoExercicio168->tipoTempoDuracao = 'Min';
        $novoExercicio168->meta = 40;
        $novoExercicio168->intensidade = 'Leve';
        $novoExercicio168->save();
        //Exercicio 168
        //Exercicio 169
        $novoExercicio169 = new Exercicio;
        $novoExercicio169->exercicio = 'Tríceps pulley';
        $novoExercicio169->musculo = 'Tríceps';
        $novoExercicio169->serie = 2;
        $novoExercicio169->repeticoes = 8;
        $novoExercicio169->descanso = 1;
        $novoExercicio169->tipoTempoDuracao = 'Min';
        $novoExercicio169->meta = 40;
        $novoExercicio169->intensidade = 'Leve';
        $novoExercicio169->save();
        //Exercicio 169
        //Exercicio 170
        $novoExercicio170 = new Exercicio;
        $novoExercicio170->exercicio = 'Tríceps corda';
        $novoExercicio170->musculo = 'Tríceps';
        $novoExercicio170->serie = 2;
        $novoExercicio170->repeticoes = 8;
        $novoExercicio170->descanso = 1;
        $novoExercicio170->tipoTempoDuracao = 'Min';
        $novoExercicio170->meta = 40;
        $novoExercicio170->intensidade = 'Leve';
        $novoExercicio170->save();
        //Exercicio 170
        //Exercicio  171
        $novoExercicio171 = new Exercicio;
        $novoExercicio171->exercicio = 'Paralela';
        $novoExercicio171->musculo = 'Tríceps';
        $novoExercicio171->serie = 2;
        $novoExercicio171->repeticoes = 8;
        $novoExercicio171->descanso = 1;
        $novoExercicio171->tipoTempoDuracao = 'Min';
        $novoExercicio171->meta = 40;
        $novoExercicio171->intensidade = 'Leve';
        $novoExercicio171->save();
        //Exercicio 171
        //Exercicio 
        $novoExercicio172 = new Exercicio;
        $novoExercicio172->exercicio = 'Encolhimento';
        $novoExercicio172->musculo = 'Trapézio';
        $novoExercicio172->serie = 2;
        $novoExercicio172->repeticoes = 8;
        $novoExercicio172->descanso = 1;
        $novoExercicio172->tipoTempoDuracao = 'Min';
        $novoExercicio172->meta = 40;
        $novoExercicio172->intensidade = 'Leve';
        $novoExercicio172->save();
        //Exercicio 173
        //Exercicio 
        $novoExercicio173 = new Exercicio;
        $novoExercicio173->exercicio = 'Puxada alta supinada';
        $novoExercicio173->musculo = 'Costas';
        $novoExercicio173->serie = 2;
        $novoExercicio173->repeticoes = 8;
        $novoExercicio173->descanso = 1;
        $novoExercicio173->tipoTempoDuracao = 'Min';
        $novoExercicio173->meta = 40;
        $novoExercicio173->intensidade = 'Leve';
        $novoExercicio173->save();
        //Exercicio 173
        //Exercicio 174
        $novoExercicio174 = new Exercicio;
        $novoExercicio174->exercicio = 'Serrote';
        $novoExercicio174->musculo = 'Costas';
        $novoExercicio174->serie = 2;
        $novoExercicio174->repeticoes = 8;
        $novoExercicio174->descanso = 1;
        $novoExercicio174->tipoTempoDuracao = 'Min';
        $novoExercicio174->meta = 40;
        $novoExercicio174->intensidade = 'Leve';
        $novoExercicio174->save();
        //Exercicio 174
        //Exercicio 175
        $novoExercicio175 = new Exercicio;
        $novoExercicio175->exercicio = 'Remada curvada';
        $novoExercicio175->musculo = 'Costas';
        $novoExercicio175->serie = 2;
        $novoExercicio175->repeticoes = 8;
        $novoExercicio175->descanso = 1;
        $novoExercicio175->tipoTempoDuracao = 'Min';
        $novoExercicio175->meta = 40;
        $novoExercicio175->intensidade = 'Leve';
        $novoExercicio175->save();
        //Exercicio 175
        //Exercicio 176
        $novoExercicio176 = new Exercicio;
        $novoExercicio176->exercicio = 'Remada cavalinho';
        $novoExercicio176->musculo = 'Costas';
        $novoExercicio176->serie = 2;
        $novoExercicio176->repeticoes = 8;
        $novoExercicio176->descanso = 1;
        $novoExercicio176->tipoTempoDuracao = 'Min';
        $novoExercicio176->meta = 40;
        $novoExercicio176->intensidade = 'Leve';
        $novoExercicio->save();
        //Exercicio 176
        //Exercicio 
        $novoExercicio178 = new Exercicio;
        $novoExercicio178->exercicio = 'Remada articulada';
        $novoExercicio178->musculo = 'Costas';
        $novoExercicio178->serie = 2;
        $novoExercicio178->repeticoes = 8;
        $novoExercicio178->descanso = 1;
        $novoExercicio178->tipoTempoDuracao = 'Min';
        $novoExercicio178->meta = 40;
        $novoExercicio178->intensidade = 'Leve';
        $novoExercicio178->save();
        //Exercicio 178
        //Exercicio 179
        $novoExercicio179 = new Exercicio;
        $novoExercicio179->exercicio = 'Puxada alta com triângulo';
        $novoExercicio179->musculo = 'Costas';
        $novoExercicio179->serie = 2;
        $novoExercicio179->repeticoes = 8;
        $novoExercicio179->descanso = 1;
        $novoExercicio179->tipoTempoDuracao = 'Min';
        $novoExercicio179->meta = 40;
        $novoExercicio179->intensidade = 'Leve';
        $novoExercicio179->save();
        //Exercicio 179
        //Exercicio 180 
        $novoExercicio180 = new Exercicio;
        $novoExercicio180->exercicio = 'PullDown';
        $novoExercicio180->musculo = 'Costas';
        $novoExercicio180->serie = 2;
        $novoExercicio180->repeticoes = 8;
        $novoExercicio180->descanso = 1;
        $novoExercicio180->tipoTempoDuracao = 'Min';
        $novoExercicio180->meta = 40;
        $novoExercicio180->intensidade = 'Leve';
        $novoExercicio180->save();
        //Exercicio 180
        //Exercicio 181
        $novoExercicio181 = new Exercicio;
        $novoExercicio181->exercicio = 'Remada baixa unilateral';
        $novoExercicio181->musculo = 'Costas';
        $novoExercicio181->serie = 2;
        $novoExercicio181->repeticoes = 8;
        $novoExercicio181->descanso = 1;
        $novoExercicio181->tipoTempoDuracao = 'Min';
        $novoExercicio181->meta = 40;
        $novoExercicio181->intensidade = 'Leve';
        $novoExercicio181->save();
        //Exercicio 181
        //Exercicio 182
        $novoExercicio182 = new Exercicio;
        $novoExercicio182->exercicio = 'Barra fixa';
        $novoExercicio182->musculo = 'Costas';
        $novoExercicio182->serie = 2;
        $novoExercicio182->repeticoes = 8;
        $novoExercicio182->descanso = 1;
        $novoExercicio182->tipoTempoDuracao = 'Min';
        $novoExercicio182->meta = 40;
        $novoExercicio182->intensidade = 'Leve';
        $novoExercicio182->save();
        //Exercicio 182
        //Exercicio 183
        $novoExercicio183 = new Exercicio;
        $novoExercicio183->exercicio = 'Rosca alternada com halter';
        $novoExercicio183->musculo = 'Bíceps';
        $novoExercicio183->serie = 2;
        $novoExercicio183->repeticoes = 8;
        $novoExercicio183->descanso = 1;
        $novoExercicio183->tipoTempoDuracao = 'Min';
        $novoExercicio183->meta = 40;
        $novoExercicio183->intensidade = 'Leve';
        $novoExercicio183->save();
        //Exercicio 183
        //Exercicio 184
        $novoExercicio184 = new Exercicio;
        $novoExercicio184->exercicio = 'Rosca scott';
        $novoExercicio184->musculo = 'Bíceps';
        $novoExercicio184->serie = 2;
        $novoExercicio184->repeticoes = 8;
        $novoExercicio184->descanso = 1;
        $novoExercicio184->tipoTempoDuracao = 'Min';
        $novoExercicio184->meta = 40;
        $novoExercicio184->intensidade = 'Leve';
        $novoExercicio184->save();
        //Exercicio 184
        //Exercicio 185
        $novoExercicio185 = new Exercicio;
        $novoExercicio185->exercicio = 'Rosca spider';
        $novoExercicio185->musculo = 'Bíceps';
        $novoExercicio185->serie = 2;
        $novoExercicio185->repeticoes = 8;
        $novoExercicio185->descanso = 1;
        $novoExercicio185->tipoTempoDuracao = 'Min';
        $novoExercicio185->meta = 40;
        $novoExercicio185->intensidade = 'Leve';
        $novoExercicio185->save();
        //Exercicio 185
        //Exercicio 186
        $novoExercicio186 = new Exercicio;
        $novoExercicio186->exercicio = 'Rosca direta na polia';
        $novoExercicio186->musculo = 'Bíceps';
        $novoExercicio186->serie = 2;
        $novoExercicio186->repeticoes = 8;
        $novoExercicio186->descanso = 1;
        $novoExercicio186->tipoTempoDuracao = 'Min';
        $novoExercicio186->meta = 40;
        $novoExercicio186->intensidade = 'Leve';
        $novoExercicio186->save();
        //Exercicio 186
        //Exercicio 187
        $novoExercicio187 = new Exercicio;
        $novoExercicio187->exercicio = 'Rosca martelo com halter';
        $novoExercicio187->musculo = 'Bíceps';
        $novoExercicio187->serie = 2;
        $novoExercicio187->repeticoes = 8;
        $novoExercicio187->descanso = 1;
        $novoExercicio187->tipoTempoDuracao = 'Min';
        $novoExercicio187->meta = 40;
        $novoExercicio187->intensidade = 'Leve';
        $novoExercicio187->save();
        //Exercicio  187
        //Exercicio 188
        $novoExercicio188 = new Exercicio;
        $novoExercicio188->exercicio = 'Rosca martelo na polia';
        $novoExercicio188->musculo = 'Bíceps';
        $novoExercicio188->serie = 2;
        $novoExercicio188->repeticoes = 8;
        $novoExercicio188->descanso = 1;
        $novoExercicio188->tipoTempoDuracao = 'Min';
        $novoExercicio188->meta = 40;
        $novoExercicio188->intensidade = 'Leve';
        $novoExercicio188->save();
        //Exercicio 
        //Exercicio 
        $novoExercicio189 = new Exercicio;
        $novoExercicio189->exercicio = 'Rosca concentrada';
        $novoExercicio189->musculo = 'Bíceps';
        $novoExercicio189->serie = 2;
        $novoExercicio189->repeticoes = 8;
        $novoExercicio189->descanso = 1;
        $novoExercicio189->tipoTempoDuracao = 'Min';
        $novoExercicio189->meta = 40;
        $novoExercicio189->intensidade = 'Leve';
        $novoExercicio189->save();
        //Exercicio 
        //Exercicio 
        $novoExercicio190 = new Exercicio;
        $novoExercicio190 ->exercicio = 'Flexão do tronco ';
        $novoExercicio190 ->musculo = 'Abdomen';
        $novoExercicio190 ->serie = 2;
        $novoExercicio190 ->repeticoes = 8;
        $novoExercicio190 ->descanso = 1;
        $novoExercicio190 ->tipoTempoDuracao = 'Min';
        $novoExercicio190 ->meta = 40;
        $novoExercicio190 ->intensidade = 'Leve';
        $novoExercicio190 ->save();
        //Exercicio 
        //Exercicio 
        $novoExercicio191 = new Exercicio;
        $novoExercicio191->exercicio = 'Flexão com elevação do quadril';
        $novoExercicio191->musculo = 'Abdomen';
        $novoExercicio191->serie = 2;
        $novoExercicio191->repeticoes = 8;
        $novoExercicio191->descanso = 1;
        $novoExercicio191->tipoTempoDuracao = 'Min';
        $novoExercicio191->meta = 40;
        $novoExercicio191->intensidade = 'Leve';
        $novoExercicio191->save();
        //Exercicio 
        //Exercicio 
        $novoExercicio192 = new Exercicio;
        $novoExercicio192->exercicio = 'Flexão com leve rotação do tronco';
        $novoExercicio192->musculo = 'Abdomen';
        $novoExercicio192->serie = 2;
        $novoExercicio192->repeticoes = 8;
        $novoExercicio192->descanso = 1;
        $novoExercicio192->tipoTempoDuracao = 'Min';
        $novoExercicio192->meta = 40;
        $novoExercicio192->intensidade = 'Leve';
        $novoExercicio192->save();
        //Exercicio  
        //Exercicio 
        $novoExercicio193 = new Exercicio;
        $novoExercicio193 ->exercicio = 'Pracha Ventral';
        $novoExercicio193 ->musculo = 'Abdomen';
        $novoExercicio193 ->serie = 2;
        $novoExercicio193 ->repeticoes = 8;
        $novoExercicio193 ->descanso = 1;
        $novoExercicio193 ->tipoTempoDuracao = 'Min';
        $novoExercicio193 ->meta = 40;
        $novoExercicio193 ->intensidade = 'Leve';
        $novoExercicio193 ->save();
        //Exercicio 
        //Exercicio 
        $novoExercicio194 = new Exercicio;
        $novoExercicio194->exercicio = 'Abdominal “canoa”';
        $novoExercicio194->musculo = 'Abdomen';
        $novoExercicio194->serie = 2;
        $novoExercicio194->repeticoes = 8;
        $novoExercicio194->descanso = 1;
        $novoExercicio194->tipoTempoDuracao = 'Min';
        $novoExercicio194->meta = 40;
        $novoExercicio194->intensidade = 'Leve';
        $novoExercicio194->save();
        //Exercicio 
        //Exercicio 
        $novoExercicio195 = new Exercicio;
        $novoExercicio195->exercicio = 'Abdominal “canivete”';
        $novoExercicio195->musculo = 'Abdomen';
        $novoExercicio195->serie = 2;
        $novoExercicio195->repeticoes = 8;
        $novoExercicio195->descanso = 1;
        $novoExercicio195->tipoTempoDuracao = 'Min';
        $novoExercicio195->meta = 40;
        $novoExercicio195->intensidade = 'Leve';
        $novoExercicio195->save();
        //Exercicio  
        //Exercicio  
        $novoExercicio177 = new Exercicio;
        $novoExercicio177->exercicio = 'Giro russo';
        $novoExercicio177->musculo = 'Abdomen';
        $novoExercicio177->serie = 2;
        $novoExercicio177->repeticoes = 8;
        $novoExercicio177->descanso = 1;
        $novoExercicio177->tipoTempoDuracao = 'Min';
        $novoExercicio177->meta = 40;
        $novoExercicio177->intensidade = 'Leve';
        $novoExercicio177->save();
        //Exercicio
//Fim criar Exercicio Leve  

//EXTRA PEITO 2
        //Alta 1
        $novoExercicio196 = new Exercicio;
        $novoExercicio196->exercicio = 'Crossover na polia alta';
        $novoExercicio196->musculo = 'Peito';
        $novoExercicio196->serie = 4;
        $novoExercicio196->repeticoes = 12;
        $novoExercicio196->descanso = 2;
        $novoExercicio196->tipoTempoDuracao = 'Min';
        $novoExercicio196->meta = 90;
        $novoExercicio196->intensidade = 'Alta';
        $novoExercicio196->save();

        //Moderada 1
        $novoExercicio197 = new Exercicio;
        $novoExercicio197->exercicio = 'Crossover na polia alta';
        $novoExercicio197->musculo = 'Peito';
        $novoExercicio197->serie = 3;
        $novoExercicio197->repeticoes = 12;
        $novoExercicio197->descanso = 1;
        $novoExercicio197->tipoTempoDuracao = 'Min';
        $novoExercicio197->meta = 60;
        $novoExercicio197->intensidade = 'Moderada';
        $novoExercicio197->save();

        //Leve 1
        $novoExercicio198 = new Exercicio;
        $novoExercicio198->exercicio = 'Crossover na polia alta';
        $novoExercicio198->musculo = 'Peito';
        $novoExercicio198->serie = 2;
        $novoExercicio198->repeticoes = 8;
        $novoExercicio198->descanso = 1;
        $novoExercicio198->tipoTempoDuracao = 'Min';
        $novoExercicio198->meta = 40;
        $novoExercicio198->intensidade = 'Leve';
        $novoExercicio198->save();

        //Alta 2
        $novoExercicio199 = new Exercicio;
        $novoExercicio199->exercicio = 'Crossover na polia baixa';
        $novoExercicio199->musculo = 'Peito';
        $novoExercicio199->serie = 4;
        $novoExercicio199->repeticoes = 12;
        $novoExercicio199->descanso = 2;
        $novoExercicio199->tipoTempoDuracao = 'Min';
        $novoExercicio199->meta = 90;
        $novoExercicio199->intensidade = 'Alta';
        $novoExercicio199->save();

        //Moderada 2
        $novoExercicio200 = new Exercicio;
        $novoExercicio200->exercicio = 'Crossover na polia baixa';
        $novoExercicio200->musculo = 'Peito';
        $novoExercicio200->serie = 3;
        $novoExercicio200->repeticoes = 12;
        $novoExercicio200->descanso = 1;
        $novoExercicio200->tipoTempoDuracao = 'Min';
        $novoExercicio200->meta = 60;
        $novoExercicio200->intensidade = 'Moderada';
        $novoExercicio200->save();

        //Leve 2
        $novoExercicio201 = new Exercicio;
        $novoExercicio201->exercicio = 'Crossover na polia baixa';
        $novoExercicio201->musculo = 'Peito';
        $novoExercicio201->serie = 2;
        $novoExercicio201->repeticoes = 8;
        $novoExercicio201->descanso = 1;
        $novoExercicio201->tipoTempoDuracao = 'Min';
        $novoExercicio201->meta = 40;
        $novoExercicio201->intensidade = 'Leve';
        $novoExercicio201->save();

        
//FIM EXTRA PEITO

//EXTRA PANTURRILHA 6
        //Alta 1
        $novoExercicio202 = new Exercicio;
        $novoExercicio202->exercicio = 'Panturrilha burrinho';
        $novoExercicio202->musculo = 'Panturrilha';
        $novoExercicio202->serie = 4;
        $novoExercicio202->repeticoes = 12;
        $novoExercicio202->descanso = 2;
        $novoExercicio202->tipoTempoDuracao = 'Min';
        $novoExercicio202->meta = 90;
        $novoExercicio202->intensidade = 'Alta';
        $novoExercicio202->save();

        //Moderada 1
        $novoExercicio203 = new Exercicio;
        $novoExercicio203->exercicio = 'Panturrilha burrinho';
        $novoExercicio203->musculo = 'Panturrilha';
        $novoExercicio203->serie = 3;
        $novoExercicio203->repeticoes = 12;
        $novoExercicio203->descanso = 1;
        $novoExercicio203->tipoTempoDuracao = 'Min';
        $novoExercicio203->meta = 60;
        $novoExercicio203->intensidade = 'Moderada';
        $novoExercicio203->save();

        //Leve 1
        $novoExercicio204 = new Exercicio;
        $novoExercicio204->exercicio = 'Panturrilha burrinho';
        $novoExercicio204->musculo = 'Panturrilha';
        $novoExercicio204->serie = 2;
        $novoExercicio204->repeticoes = 8;
        $novoExercicio204->descanso = 1;
        $novoExercicio204->tipoTempoDuracao = 'Min';
        $novoExercicio204->meta = 40;
        $novoExercicio204->intensidade = 'Leve';
        $novoExercicio204->save();

        //Alta 2
        $novoExercicio205 = new Exercicio;
        $novoExercicio205->exercicio = 'Panturrilha em pé unilateral';
        $novoExercicio205->musculo = 'Panturrilha';
        $novoExercicio205->serie = 4;
        $novoExercicio205->repeticoes = 12;
        $novoExercicio205->descanso = 2;
        $novoExercicio205->tipoTempoDuracao = 'Min';
        $novoExercicio205->meta = 90;
        $novoExercicio205->intensidade = 'Alta';
        $novoExercicio205->save();

        //Moderada 2
        $novoExercicio206 = new Exercicio;
        $novoExercicio206->exercicio = 'Panturrilha em pé unilateral';
        $novoExercicio206->musculo = 'Panturrilha';
        $novoExercicio206->serie = 3;
        $novoExercicio206->repeticoes = 12;
        $novoExercicio206->descanso = 1;
        $novoExercicio206->tipoTempoDuracao = 'Min';
        $novoExercicio206->meta = 60;
        $novoExercicio206->intensidade = 'Moderada';
        $novoExercicio206->save();

        //Leve 2
        $novoExercicio207 = new Exercicio;
        $novoExercicio207->exercicio = 'Panturrilha em pé unilateral';
        $novoExercicio207->musculo = 'Panturrilha';
        $novoExercicio207->serie = 2;
        $novoExercicio207->repeticoes = 8;
        $novoExercicio207->descanso = 1;
        $novoExercicio207->tipoTempoDuracao = 'Min';
        $novoExercicio207->meta = 40;
        $novoExercicio207->intensidade = 'Leve';
        $novoExercicio207->save();

        //Alta 3
        $novoExercicio208 = new Exercicio;
        $novoExercicio208->exercicio = 'Panturrilha em pé unilateral no smith';
        $novoExercicio208->musculo = 'Panturrilha';
        $novoExercicio208->serie = 4;
        $novoExercicio208->repeticoes = 12;
        $novoExercicio208->descanso = 2;
        $novoExercicio208->tipoTempoDuracao = 'Min';
        $novoExercicio208->meta = 90;
        $novoExercicio208->intensidade = 'Alta';
        $novoExercicio208->save();

        //Moderada 3
        $novoExercicio209 = new Exercicio;
        $novoExercicio209->exercicio = 'Panturrilha em pé unilateral no smith';
        $novoExercicio209->musculo = 'Panturrilha';
        $novoExercicio209->serie = 3;
        $novoExercicio209->repeticoes = 12;
        $novoExercicio209->descanso = 1;
        $novoExercicio209->tipoTempoDuracao = 'Min';
        $novoExercicio209->meta = 60;
        $novoExercicio209->intensidade = 'Moderada';
        $novoExercicio209->save();

        //Leve 3
        $novoExercicio210 = new Exercicio;
        $novoExercicio210->exercicio = 'Panturrilha em pé unilateral no smith';
        $novoExercicio210->musculo = 'Panturrilha';
        $novoExercicio210->serie = 2;
        $novoExercicio210->repeticoes = 8;
        $novoExercicio210->descanso = 1;
        $novoExercicio210->tipoTempoDuracao = 'Min';
        $novoExercicio210->meta = 40;
        $novoExercicio210->intensidade = 'Leve';
        $novoExercicio210->save();

        //Alta 4
        $novoExercicio211 = new Exercicio;
        $novoExercicio211->exercicio = 'Panturrilha em pé com barra';
        $novoExercicio211->musculo = 'Panturrilha';
        $novoExercicio211->serie = 4;
        $novoExercicio211->repeticoes = 12;
        $novoExercicio211->descanso = 2;
        $novoExercicio211->tipoTempoDuracao = 'Min';
        $novoExercicio211->meta = 90;
        $novoExercicio211->intensidade = 'Alta';
        $novoExercicio211->save();

        //Moderada 4
        $novoExercicio212 = new Exercicio;
        $novoExercicio212->exercicio = 'Panturrilha em pé com barra';
        $novoExercicio212->musculo = 'Panturrilha';
        $novoExercicio212->serie = 3;
        $novoExercicio212->repeticoes = 12;
        $novoExercicio212->descanso = 1;
        $novoExercicio212->tipoTempoDuracao = 'Min';
        $novoExercicio212->meta = 60;
        $novoExercicio212->intensidade = 'Moderada';
        $novoExercicio212->save();

        //Leve 4
        $novoExercicio213 = new Exercicio;
        $novoExercicio213->exercicio = 'Panturrilha em pé com barra';
        $novoExercicio213->musculo = 'Panturrilha';
        $novoExercicio213->serie = 2;
        $novoExercicio213->repeticoes = 8;
        $novoExercicio213->descanso = 1;
        $novoExercicio213->tipoTempoDuracao = 'Min';
        $novoExercicio213->meta = 40;
        $novoExercicio213->intensidade = 'Leve';
        $novoExercicio213->save();

        //Alta 5
        $novoExercicio214 = new Exercicio;
        $novoExercicio214->exercicio = 'Panturrilha em pé no smith';
        $novoExercicio214->musculo = 'Panturrilha';
        $novoExercicio214->serie = 4;
        $novoExercicio214->repeticoes = 12;
        $novoExercicio214->descanso = 2;
        $novoExercicio214->tipoTempoDuracao = 'Min';
        $novoExercicio214->meta = 90;
        $novoExercicio214->intensidade = 'Alta';
        $novoExercicio214->save();

        //Moderada 5
        $novoExercicio215 = new Exercicio;
        $novoExercicio215->exercicio = 'Panturrilha em pé no smith';
        $novoExercicio215->musculo = 'Panturrilha';
        $novoExercicio215->serie = 3;
        $novoExercicio215->repeticoes = 12;
        $novoExercicio215->descanso = 1;
        $novoExercicio215->tipoTempoDuracao = 'Min';
        $novoExercicio215->meta = 60;
        $novoExercicio215->intensidade = 'Moderada';
        $novoExercicio215->save();

        //Leve 5
        $novoExercicio216 = new Exercicio;
        $novoExercicio216->exercicio = 'Panturrilha em pé no smith';
        $novoExercicio216->musculo = 'Panturrilha';
        $novoExercicio216->serie = 2;
        $novoExercicio216->repeticoes = 8;
        $novoExercicio216->descanso = 1;
        $novoExercicio216->tipoTempoDuracao = 'Min';
        $novoExercicio216->meta = 40;
        $novoExercicio216->intensidade = 'Leve';
        $novoExercicio216->save();

        //Alta 6
        $novoExercicio217 = new Exercicio;
        $novoExercicio217->exercicio = 'Panturrilha em pé unilateral com barra';
        $novoExercicio217->musculo = 'Panturrilha';
        $novoExercicio217->serie = 4;
        $novoExercicio217->repeticoes = 12;
        $novoExercicio217->descanso = 2;
        $novoExercicio217->tipoTempoDuracao = 'Min';
        $novoExercicio217->meta = 90;
        $novoExercicio217->intensidade = 'Alta';
        $novoExercicio217->save();

        //Moderada 6
        $novoExercicio218 = new Exercicio;
        $novoExercicio218->exercicio = 'Panturrilha em pé unilateral com barra';
        $novoExercicio218->musculo = 'Panturrilha';
        $novoExercicio218->serie = 3;
        $novoExercicio218->repeticoes = 12;
        $novoExercicio218->descanso = 1;
        $novoExercicio218->tipoTempoDuracao = 'Min';
        $novoExercicio218->meta = 60;
        $novoExercicio218->intensidade = 'Moderada';
        $novoExercicio218->save();

        //Leve 6
        $novoExercicio219 = new Exercicio;
        $novoExercicio219->exercicio = 'Panturrilha em pé unilateral com barra';
        $novoExercicio219->musculo = 'Panturrilha';
        $novoExercicio219->serie = 2;
        $novoExercicio219->repeticoes = 8;
        $novoExercicio219->descanso = 1;
        $novoExercicio219->tipoTempoDuracao = 'Min';
        $novoExercicio219->meta = 40;
        $novoExercicio219->intensidade = 'Leve';
        $novoExercicio219->save();

//EXTRA ABDOMEN 1
        //Alta 1
        $novoExercicio220 = new Exercicio;
        $novoExercicio220->exercicio = 'Abdominal remador';
        $novoExercicio220->musculo = 'Abdomen';
        $novoExercicio220->serie = 4;
        $novoExercicio220->repeticoes = 12;
        $novoExercicio220->descanso = 2;
        $novoExercicio220->tipoTempoDuracao = 'Min';
        $novoExercicio220->meta = 90;
        $novoExercicio220->intensidade = 'Alta';
        $novoExercicio220->save();

        //Moderada 1
        $novoExercicio221 = new Exercicio;
        $novoExercicio221->exercicio = 'Abdominal remador';
        $novoExercicio221->musculo = 'Abdomen';
        $novoExercicio221->serie = 3;
        $novoExercicio221->repeticoes = 12;
        $novoExercicio221->descanso = 1;
        $novoExercicio221->tipoTempoDuracao = 'Min';
        $novoExercicio221->meta = 60;
        $novoExercicio221->intensidade = 'Moderada';
        $novoExercicio221->save();

        //Leve 1
        $novoExercicio222 = new Exercicio;
        $novoExercicio222->exercicio = 'Abdominal remador';
        $novoExercicio222->musculo = 'Abdomen';
        $novoExercicio222->serie = 2;
        $novoExercicio222->repeticoes = 8;
        $novoExercicio222->descanso = 1;
        $novoExercicio222->tipoTempoDuracao = 'Min';
        $novoExercicio222->meta = 40;
        $novoExercicio222->intensidade = 'Leve';
        $novoExercicio222->save();

        

//EXTRA TRÍCEPS 3
        //Alta 1
        $novoExercicio223 = new Exercicio;
        $novoExercicio223->exercicio = 'Tríceps fraces com halter';
        $novoExercicio223->musculo = 'Tríceps';
        $novoExercicio223->serie = 4;
        $novoExercicio223->repeticoes = 12;
        $novoExercicio223->descanso = 2;
        $novoExercicio223->tipoTempoDuracao = 'Min';
        $novoExercicio223->meta = 90;
        $novoExercicio223->intensidade = 'Alta';
        $novoExercicio223->save();

        //Moderada 1
        $novoExercicio224 = new Exercicio;
        $novoExercicio224->exercicio = 'Tríceps fraces com halter';
        $novoExercicio224->musculo = 'Tríceps';
        $novoExercicio224->serie = 3;
        $novoExercicio224->repeticoes = 12;
        $novoExercicio224->descanso = 1;
        $novoExercicio224->tipoTempoDuracao = 'Min';
        $novoExercicio224->meta = 60;
        $novoExercicio224->intensidade = 'Moderada';
        $novoExercicio224->save();

        //Leve 1
        $novoExercicio225 = new Exercicio;
        $novoExercicio225->exercicio = 'Tríceps fraces com halter';
        $novoExercicio225->musculo = 'Tríceps';
        $novoExercicio225->serie = 2;
        $novoExercicio225->repeticoes = 8;
        $novoExercicio225->descanso = 1;
        $novoExercicio225->tipoTempoDuracao = 'Min';
        $novoExercicio225->meta = 40;
        $novoExercicio225->intensidade = 'Leve';
        $novoExercicio225->save();

         //Alta 2
         $novoExercicio226 = new Exercicio;
         $novoExercicio226->exercicio = 'Tríceps testa com barra';
         $novoExercicio226->musculo = 'Tríceps';
         $novoExercicio226->serie = 4;
         $novoExercicio226->repeticoes = 12;
         $novoExercicio226->descanso = 2;
         $novoExercicio226->tipoTempoDuracao = 'Min';
         $novoExercicio226->meta = 90;
         $novoExercicio226->intensidade = 'Alta';
         $novoExercicio226->save();
 
         //Moderada 2
         $novoExercicio227 = new Exercicio;
         $novoExercicio227->exercicio = 'Tríceps testa com barra';
         $novoExercicio227->musculo = 'Tríceps';
         $novoExercicio227->serie = 3;
         $novoExercicio227->repeticoes = 12;
         $novoExercicio227->descanso = 1;
         $novoExercicio227->tipoTempoDuracao = 'Min';
         $novoExercicio227->meta = 60;
         $novoExercicio227->intensidade = 'Moderada';
         $novoExercicio227->save();
 
         //Leve 2
         $novoExercicio228 = new Exercicio;
         $novoExercicio228->exercicio = 'Tríceps testa com barra';
         $novoExercicio228->musculo = 'Tríceps';
         $novoExercicio228->serie = 2;
         $novoExercicio228->repeticoes = 8;
         $novoExercicio228->descanso = 1;
         $novoExercicio228->tipoTempoDuracao = 'Min';
         $novoExercicio228->meta = 40;
         $novoExercicio228->intensidade = 'Leve';
         $novoExercicio228->save();

          //Alta 3
        $novoExercicio229 = new Exercicio;
        $novoExercicio229->exercicio = 'Mergulho';
        $novoExercicio229->musculo = 'Tríceps';
        $novoExercicio229->serie = 4;
        $novoExercicio229->repeticoes = 12;
        $novoExercicio229->descanso = 2;
        $novoExercicio229->tipoTempoDuracao = 'Min';
        $novoExercicio229->meta = 90;
        $novoExercicio229->intensidade = 'Alta';
        $novoExercicio229->save();

        //Moderada 3
        $novoExercicio230 = new Exercicio;
        $novoExercicio230->exercicio = 'Mergulho';
        $novoExercicio230->musculo = 'Tríceps';
        $novoExercicio230->serie = 3;
        $novoExercicio230->repeticoes = 12;
        $novoExercicio230->descanso = 1;
        $novoExercicio230->tipoTempoDuracao = 'Min';
        $novoExercicio230->meta = 60;
        $novoExercicio230->intensidade = 'Moderada';
        $novoExercicio230->save();

        //Leve 3
        $novoExercicio231 = new Exercicio;
        $novoExercicio231->exercicio = 'Mergulho';
        $novoExercicio231->musculo = 'Tríceps';
        $novoExercicio231->serie = 2;
        $novoExercicio231->repeticoes = 8;
        $novoExercicio231->descanso = 1;
        $novoExercicio231->tipoTempoDuracao = 'Min';
        $novoExercicio231->meta = 40;
        $novoExercicio231->intensidade = 'Leve';
        $novoExercicio231->save();

//EXTRA OMBRO 2
        $novoExercicio232 = new Exercicio;
        $novoExercicio232->exercicio = 'Desenvolvimento A. halter';
        $novoExercicio232->musculo = 'Ombro';
        $novoExercicio232->serie = 4;
        $novoExercicio232->repeticoes = 12;
        $novoExercicio232->descanso = 2;
        $novoExercicio232->tipoTempoDuracao = 'Min';
        $novoExercicio232->meta = 90;
        $novoExercicio232->intensidade = 'Alta';
        $novoExercicio232->save();

        //Moderada 1
        $novoExercicio233 = new Exercicio;
        $novoExercicio233->exercicio = 'Desenvolvimento A. halter';
        $novoExercicio233->musculo = 'Ombro';
        $novoExercicio233->serie = 3;
        $novoExercicio233->repeticoes = 12;
        $novoExercicio233->descanso = 1;
        $novoExercicio233->tipoTempoDuracao = 'Min';
        $novoExercicio233->meta = 60;
        $novoExercicio233->intensidade = 'Moderada';
        $novoExercicio233->save();

        //Leve 1
        $novoExercicio234 = new Exercicio;
        $novoExercicio234->exercicio = 'Desenvolvimento A. halter';
        $novoExercicio234->musculo = 'Ombro';
        $novoExercicio234->serie = 2;
        $novoExercicio234->repeticoes = 8;
        $novoExercicio234->descanso = 1;
        $novoExercicio234->tipoTempoDuracao = 'Min';
        $novoExercicio234->meta = 40;
        $novoExercicio234->intensidade = 'Leve';
        $novoExercicio234->save();
        
        //Alta 2
        $novoExercicio235 = new Exercicio;
        $novoExercicio235->exercicio = 'Desenvolvimento A. unilateral com halter';
        $novoExercicio235->musculo = 'Ombro';
        $novoExercicio235->serie = 4;
        $novoExercicio235->repeticoes = 12;
        $novoExercicio235->descanso = 2;
        $novoExercicio235->tipoTempoDuracao = 'Min';
        $novoExercicio235->meta = 90;
        $novoExercicio235->intensidade = 'Alta';
        $novoExercicio235->save();

        //Moderada 2
        $novoExercicio236 = new Exercicio;
        $novoExercicio236->exercicio = 'Desenvolvimento A. unilateral com halter';
        $novoExercicio236->musculo = 'Ombro';
        $novoExercicio236->serie = 3;
        $novoExercicio236->repeticoes = 12;
        $novoExercicio236->descanso = 1;
        $novoExercicio236->tipoTempoDuracao = 'Min';
        $novoExercicio236->meta = 60;
        $novoExercicio236->intensidade = 'Moderada';
        $novoExercicio236->save();

        //Leve 2
        $novoExercicio237 = new Exercicio;
        $novoExercicio237->exercicio = 'Desenvolvimento A. unilateral com halter';
        $novoExercicio237->musculo = 'Ombro';
        $novoExercicio237->serie = 2;
        $novoExercicio237->repeticoes = 8;
        $novoExercicio237->descanso = 1;
        $novoExercicio237->tipoTempoDuracao = 'Min';
        $novoExercicio237->meta = 40;
        $novoExercicio237->intensidade = 'Leve';
        $novoExercicio237->save();

//EXTRA TRAPÉZIO 6
        //Alta 1
        $novoExercicio238 = new Exercicio;
        $novoExercicio238->exercicio = 'Encolhimento com barra por trás';
        $novoExercicio238->musculo = 'Trapézio';
        $novoExercicio238->serie = 4;
        $novoExercicio238->repeticoes = 12;
        $novoExercicio238->descanso = 2;
        $novoExercicio238->tipoTempoDuracao = 'Min';
        $novoExercicio238->meta = 90;
        $novoExercicio238->intensidade = 'Alta';
        $novoExercicio238->save();

        //Moderada 1
        $novoExercicio239 = new Exercicio;
        $novoExercicio239->exercicio = 'Encolhimento com barra por trás';
        $novoExercicio239->musculo = 'Trapézio';
        $novoExercicio239->serie = 3;
        $novoExercicio239->repeticoes = 12;
        $novoExercicio239->descanso = 1;
        $novoExercicio239->tipoTempoDuracao = 'Min';
        $novoExercicio239->meta = 60;
        $novoExercicio239->intensidade = 'Moderada';
        $novoExercicio239->save();

        //Leve 1
        $novoExercicio240 = new Exercicio;
        $novoExercicio240->exercicio = 'Encolhimento com barra por trás';
        $novoExercicio240->musculo = 'Trapézio';
        $novoExercicio240->serie = 2;
        $novoExercicio240->repeticoes = 8;
        $novoExercicio240->descanso = 1;
        $novoExercicio240->tipoTempoDuracao = 'Min';
        $novoExercicio240->meta = 40;
        $novoExercicio240->intensidade = 'Leve';
        $novoExercicio240->save();

        //Alta 2
        $novoExercicio241 = new Exercicio;
        $novoExercicio241->exercicio = 'Encolhimento com barra frontal';
        $novoExercicio241->musculo = 'Trapézio';
        $novoExercicio241->serie = 4;
        $novoExercicio241->repeticoes = 12;
        $novoExercicio241->descanso = 2;
        $novoExercicio241->tipoTempoDuracao = 'Min';
        $novoExercicio241->meta = 90;
        $novoExercicio241->intensidade = 'Alta';
        $novoExercicio241->save();

        //Moderada 2
        $novoExercicio242 = new Exercicio;
        $novoExercicio242->exercicio = 'Encolhimento com halter';
        $novoExercicio242->musculo = 'Trapézio';
        $novoExercicio242->serie = 3;
        $novoExercicio242->repeticoes = 12;
        $novoExercicio242->descanso = 1;
        $novoExercicio242->tipoTempoDuracao = 'Min';
        $novoExercicio242->meta = 60;
        $novoExercicio242->intensidade = 'Moderada';
        $novoExercicio242->save();

        //Leve 2
        $novoExercicio243 = new Exercicio;
        $novoExercicio243->exercicio = 'Encolhimento com halter';
        $novoExercicio243->musculo = 'Trapézio';
        $novoExercicio243->serie = 2;
        $novoExercicio243->repeticoes = 8;
        $novoExercicio243->descanso = 1;
        $novoExercicio243->tipoTempoDuracao = 'Min';
        $novoExercicio243->meta = 40;
        $novoExercicio243->intensidade = 'Leve';
        $novoExercicio243->save();
        

        //Alta 3
        $novoExercicio244 = new Exercicio;
        $novoExercicio244->exercicio = 'Encolhimento com halter por trás';
        $novoExercicio244->musculo = 'Trapézio';
        $novoExercicio244->serie = 4;
        $novoExercicio244->repeticoes = 12;
        $novoExercicio244->descanso = 2;
        $novoExercicio244->tipoTempoDuracao = 'Min';
        $novoExercicio244->meta = 90;
        $novoExercicio244->intensidade = 'Alta';
        $novoExercicio244->save();

        //Moderada 3
        $novoExercicio245 = new Exercicio;
        $novoExercicio245->exercicio = 'Encolhimento com halter por trás';
        $novoExercicio245->musculo = 'Trapézio';
        $novoExercicio245->serie = 3;
        $novoExercicio245->repeticoes = 12;
        $novoExercicio245->descanso = 1;
        $novoExercicio245->tipoTempoDuracao = 'Min';
        $novoExercicio245->meta = 60;
        $novoExercicio245->intensidade = 'Moderada';
        $novoExercicio245->save();

        //Leve 3
        $novoExercicio246 = new Exercicio;
        $novoExercicio246->exercicio = 'Encolhimento com halter por trás';
        $novoExercicio246->musculo = 'Trapézio';
        $novoExercicio246->serie = 2;
        $novoExercicio246->repeticoes = 8;
        $novoExercicio246->descanso = 1;
        $novoExercicio246->tipoTempoDuracao = 'Min';
        $novoExercicio246->meta = 40;
        $novoExercicio246->intensidade = 'Leve';
        $novoExercicio246->save();
        
        
        //Alta 4
        $novoExercicio247 = new Exercicio;
        $novoExercicio247->exercicio = 'Crucifixo inverso com halter';
        $novoExercicio247->musculo = 'Trapézio';
        $novoExercicio247->serie = 4;
        $novoExercicio247->repeticoes = 12;
        $novoExercicio247->descanso = 2;
        $novoExercicio247->tipoTempoDuracao = 'Min';
        $novoExercicio247->meta = 90;
        $novoExercicio247->intensidade = 'Alta';
        $novoExercicio247->save();

        //Moderada 4
        $novoExercicio248 = new Exercicio;
        $novoExercicio248->exercicio = 'Crucifixo inverso com halter';
        $novoExercicio248->musculo = 'Trapézio';
        $novoExercicio248->serie = 3;
        $novoExercicio248->repeticoes = 12;
        $novoExercicio248->descanso = 1;
        $novoExercicio248->tipoTempoDuracao = 'Min';
        $novoExercicio248->meta = 60;
        $novoExercicio248->intensidade = 'Moderada';
        $novoExercicio248->save();

        //Leve 4
        $novoExercicio249 = new Exercicio;
        $novoExercicio249->exercicio = 'Crucifixo inverso com halter';
        $novoExercicio249->musculo = 'Trapézio';
        $novoExercicio249->serie = 2;
        $novoExercicio249->repeticoes = 8;
        $novoExercicio249->descanso = 1;
        $novoExercicio249->tipoTempoDuracao = 'Min';
        $novoExercicio249->meta = 40;
        $novoExercicio249->intensidade = 'Leve';
        $novoExercicio249->save();
        

        //Alta 5
        $novoExercicio250 = new Exercicio;
        $novoExercicio250->exercicio = 'Remada alta';
        $novoExercicio250->musculo = 'Trapézio';
        $novoExercicio250->serie = 4;
        $novoExercicio250->repeticoes = 12;
        $novoExercicio250->descanso = 2;
        $novoExercicio250->tipoTempoDuracao = 'Min';
        $novoExercicio250->meta = 90;
        $novoExercicio250->intensidade = 'Alta';
        $novoExercicio250->save();

        //Moderada 5
        $novoExercicio251 = new Exercicio;
        $novoExercicio251->exercicio = 'Remada alta';
        $novoExercicio251->musculo = 'Trapézio';
        $novoExercicio251->serie = 3;
        $novoExercicio251->repeticoes = 12;
        $novoExercicio251->descanso = 1;
        $novoExercicio251->tipoTempoDuracao = 'Min';
        $novoExercicio251->meta = 60;
        $novoExercicio251->intensidade = 'Moderada';
        $novoExercicio251->save();

        //Leve 5
        $novoExercicio252 = new Exercicio;
        $novoExercicio252->exercicio = 'Remada alta';
        $novoExercicio252->musculo = 'Trapézio';
        $novoExercicio252->serie = 2;
        $novoExercicio252->repeticoes = 8;
        $novoExercicio252->descanso = 1;
        $novoExercicio252->tipoTempoDuracao = 'Min';
        $novoExercicio252->meta = 40;
        $novoExercicio252->intensidade = 'Leve';
        $novoExercicio252->save();
        
        
        //Alta 6
        $novoExercicio253 = new Exercicio;
        $novoExercicio253->exercicio = 'Crucifixo inverso na polia';
        $novoExercicio253->musculo = 'Trapézio';
        $novoExercicio253->serie = 4;
        $novoExercicio253->repeticoes = 12;
        $novoExercicio253->descanso = 2;
        $novoExercicio253->tipoTempoDuracao = 'Min';
        $novoExercicio253->meta = 90;
        $novoExercicio253->intensidade = 'Alta';
        $novoExercicio253->save();

        //Moderada 6
        $novoExercicio254 = new Exercicio;
        $novoExercicio254->exercicio = 'Crucifixo inverso na polia';
        $novoExercicio254->musculo = 'Trapézio';
        $novoExercicio254->serie = 3;
        $novoExercicio254->repeticoes = 12;
        $novoExercicio254->descanso = 1;
        $novoExercicio254->tipoTempoDuracao = 'Min';
        $novoExercicio254->meta = 60;
        $novoExercicio254->intensidade = 'Moderada';
        $novoExercicio254->save();

        //Leve 6
        $novoExercicio255 = new Exercicio;
        $novoExercicio255->exercicio = 'Crucifixo inverso na polia';
        $novoExercicio255->musculo = 'Trapézio';
        $novoExercicio255->serie = 2;
        $novoExercicio255->repeticoes = 8;
        $novoExercicio255->descanso = 1;
        $novoExercicio255->tipoTempoDuracao = 'Min';
        $novoExercicio255->meta = 40;
        $novoExercicio255->intensidade = 'Leve';
        $novoExercicio255->save();
        

//AJUSTANDO PROPORÇÃO
    //PEITO 
        //Alta 1
        $novoExercicio256 = new Exercicio;
        $novoExercicio256->exercicio = 'Supino reto articulado';
        $novoExercicio256->musculo = 'Peito';
        $novoExercicio256->serie = 4;
        $novoExercicio256->repeticoes = 12;
        $novoExercicio256->descanso = 2;
        $novoExercicio256->tipoTempoDuracao = 'Min';
        $novoExercicio256->meta = 90;
        $novoExercicio256->intensidade = 'Alta';
        $novoExercicio256->save();

        //Moderada  1
        $novoExercicio257 = new Exercicio;
        $novoExercicio257->exercicio = 'Supino reto articulado';
        $novoExercicio257->musculo = 'Peito';
        $novoExercicio257->serie = 3;
        $novoExercicio257->repeticoes = 12;
        $novoExercicio257->descanso = 1;
        $novoExercicio257->tipoTempoDuracao = 'Min';
        $novoExercicio257->meta = 60;
        $novoExercicio257->intensidade = 'Moderada';
        $novoExercicio257->save();

        //Leve  1
        $novoExercicio258 = new Exercicio;
        $novoExercicio258->exercicio = 'Supino reto articulado';
        $novoExercicio258->musculo = 'Peito';
        $novoExercicio258->serie = 2;
        $novoExercicio258->repeticoes = 8;
        $novoExercicio258->descanso = 1;
        $novoExercicio258->tipoTempoDuracao = 'Min';
        $novoExercicio258->meta = 40;
        $novoExercicio258->intensidade = 'Leve';
        $novoExercicio258->save();
        
        //Alta 2
        $novoExercicio259 = new Exercicio;
        $novoExercicio259->exercicio = 'Supino inclinado articulado';
        $novoExercicio259->musculo = 'Peito';
        $novoExercicio259->serie = 4;
        $novoExercicio259->repeticoes = 12;
        $novoExercicio259->descanso = 2;
        $novoExercicio259->tipoTempoDuracao = 'Min';
        $novoExercicio259->meta = 90;
        $novoExercicio259->intensidade = 'Alta';
        $novoExercicio259->save();

        //Moderada 2
        $novoExercicio260 = new Exercicio;
        $novoExercicio260->exercicio = 'Supino inclinado articulado';
        $novoExercicio260->musculo = 'Peito';
        $novoExercicio260->serie = 3;
        $novoExercicio260->repeticoes = 12;
        $novoExercicio260->descanso = 1;
        $novoExercicio260->tipoTempoDuracao = 'Min';
        $novoExercicio260->meta = 60;
        $novoExercicio260->intensidade = 'Moderada';
        $novoExercicio260->save();

        //Leve 2
        $novoExercicio261 = new Exercicio;
        $novoExercicio261->exercicio = 'Supino inclinado articulado';
        $novoExercicio261->musculo = 'Peito';
        $novoExercicio261->serie = 2;
        $novoExercicio261->repeticoes = 8;
        $novoExercicio261->descanso = 1;
        $novoExercicio261->tipoTempoDuracao = 'Min';
        $novoExercicio261->meta = 40;
        $novoExercicio261->intensidade = 'Leve';
        $novoExercicio261->save();
        
        //Alta 3
        $novoExercicio262 = new Exercicio;
        $novoExercicio262->exercicio = 'Flexão';
        $novoExercicio262->musculo = 'Peito';
        $novoExercicio262->serie = 4;
        $novoExercicio262->repeticoes = 12;
        $novoExercicio262->descanso = 2;
        $novoExercicio262->tipoTempoDuracao = 'Min';
        $novoExercicio262->meta = 90;
        $novoExercicio262->intensidade = 'Alta';
        $novoExercicio262->save();

        //Moderada 3
        $novoExercicio263 = new Exercicio;
        $novoExercicio263->exercicio = 'Flexão';
        $novoExercicio263->musculo = 'Peito';
        $novoExercicio263->serie = 3;
        $novoExercicio263->repeticoes = 12;
        $novoExercicio263->descanso = 1;
        $novoExercicio263->tipoTempoDuracao = 'Min';
        $novoExercicio263->meta = 60;
        $novoExercicio263->intensidade = 'Moderada';
        $novoExercicio263->save();

        //Leve 3
        $novoExercicio264 = new Exercicio;
        $novoExercicio264->exercicio = 'Flexão';
        $novoExercicio264->musculo = 'Peito';
        $novoExercicio264->serie = 2;
        $novoExercicio264->repeticoes = 8;
        $novoExercicio264->descanso = 1;
        $novoExercicio264->tipoTempoDuracao = 'Min';
        $novoExercicio264->meta = 40;
        $novoExercicio264->intensidade = 'Leve';
        $novoExercicio264->save();
        
        //Alta 4
        $novoExercicio265 = new Exercicio;
        $novoExercicio265->exercicio = 'Flexão Declinada';
        $novoExercicio265->musculo = 'Peito';
        $novoExercicio265->serie = 4;
        $novoExercicio265->repeticoes = 12;
        $novoExercicio265->descanso = 2;
        $novoExercicio265->tipoTempoDuracao = 'Min';
        $novoExercicio265->meta = 90;
        $novoExercicio265->intensidade = 'Alta';
        $novoExercicio265->save();

        //Moderada 4
        $novoExercicio266 = new Exercicio;
        $novoExercicio266->exercicio = 'Flexão Declinada';
        $novoExercicio266->musculo = 'Peito';
        $novoExercicio266->serie = 3;
        $novoExercicio266->repeticoes = 12;
        $novoExercicio266->descanso = 1;
        $novoExercicio266->tipoTempoDuracao = 'Min';
        $novoExercicio266->meta = 60;
        $novoExercicio266->intensidade = 'Moderada';
        $novoExercicio266->save();

        //Leve 4
        $novoExercicio267 = new Exercicio;
        $novoExercicio267->exercicio = 'Flexão Declinada';
        $novoExercicio267->musculo = 'Peito';
        $novoExercicio267->serie = 2;
        $novoExercicio267->repeticoes = 8;
        $novoExercicio267->descanso = 1;
        $novoExercicio267->tipoTempoDuracao = 'Min';
        $novoExercicio267->meta = 40;
        $novoExercicio267->intensidade = 'Leve';
        $novoExercicio267->save();
        
    //COSTAS
        //Alta 1
        $novoExercicio268 = new Exercicio;
        $novoExercicio268->exercicio = 'Puxada romana';
        $novoExercicio268->musculo = 'Costas';
        $novoExercicio268->serie = 4;
        $novoExercicio268->repeticoes = 12;
        $novoExercicio268->descanso = 2;
        $novoExercicio268->tipoTempoDuracao = 'Min';
        $novoExercicio268->meta = 90;
        $novoExercicio268->intensidade = 'Alta';
        $novoExercicio268->save();

        //Moderada  1
        $novoExercicio269 = new Exercicio;
        $novoExercicio269->exercicio = 'Puxada romana';
        $novoExercicio269->musculo = 'Costas';
        $novoExercicio269->serie = 3;
        $novoExercicio269->repeticoes = 12;
        $novoExercicio269->descanso = 1;
        $novoExercicio269->tipoTempoDuracao = 'Min';
        $novoExercicio269->meta = 60;
        $novoExercicio269->intensidade = 'Moderada';
        $novoExercicio269->save();

        //Leve  1
        $novoExercicio270 = new Exercicio;
        $novoExercicio270->exercicio = 'Puxada romana';
        $novoExercicio270->musculo = 'Costas';
        $novoExercicio270->serie = 2;
        $novoExercicio270->repeticoes = 8;
        $novoExercicio270->descanso = 1;
        $novoExercicio270->tipoTempoDuracao = 'Min';
        $novoExercicio270->meta = 40;
        $novoExercicio270->intensidade = 'Leve';
        $novoExercicio270->save();
        
        return redirect('/');
    }
}
