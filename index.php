<?php
session_start();

require_once __DIR__ . '/app/Controllers/AlunoController.php';
require_once __DIR__ . '/app/Controllers/CursoController.php';

$route = $_GET['route'] ?? 'curso/index'; 

$alunoController = new AlunoController();
$cursoController = new CursoController();

switch ($route) {
    case 'curso/index':
        $cursoController->index();
        break;
    case 'curso/create':
        $cursoController->create();
        break;
    case 'curso/store':
        $cursoController->store();
        break;
    case 'curso/show':
        $cursoController->show();
        break;
    case 'curso/delete':
        $cursoController->delete();
        break;

    case 'aluno/index':
        $alunoController->index();
        break;
    case 'aluno/create':
        $alunoController->create();
        break;
    case 'aluno/store':
        $alunoController->store();
        break;
    case 'aluno/delete':
        $alunoController->delete();
        break;

    default:
        echo "<h1>Erro 404</h1><p>Página não encontrada.</p>";
        break;
}