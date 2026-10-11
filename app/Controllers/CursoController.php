<?php

class CursoController {

    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['cursos'])) {
            $_SESSION['cursos'] = [];
        }
        if (!isset($_SESSION['alunos'])) {
            $_SESSION['alunos'] = [];
        }
    }

    public function index() {
        $cursos = $_SESSION['cursos'];
        $alunos = $_SESSION['alunos'];

        $termoBusca = $_GET['busca'] ?? '';
        if (!empty($termoBusca)) {
            $cursos = array_filter($cursos, function($curso) use ($termoBusca) {
                return stripos($curso['nome'], $termoBusca) !== false;
            });
        }

        require_once __DIR__ . '/../Views/Cursos/index.php';
    }

    public function create() {
        require_once __DIR__ . '/../Views/Cursos/create.php';
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = trim($_POST['nome'] ?? '');
            $cargaHoraria = trim($_POST['carga_horaria'] ?? '');

            if (empty($nome) || empty($cargaHoraria)) {
                header('Location: index.php?route=curso/create&erro=Preencha todos os campos do curso!');
                exit;
            }

            $novoId = count($_SESSION['cursos']) > 0 ? end($_SESSION['cursos'])['id'] + 1 : 1;

            $_SESSION['cursos'][] = [
                'id' => $novoId,
                'nome' => $nome,
                'carga_horaria' => $cargaHoraria
            ];

            header('Location: index.php?route=curso/index&sucesso=Curso cadastrado com sucesso!');
            exit;
        }
    }

    public function show() {
        $id = $_GET['id'] ?? null;
        $curso = null;

        foreach ($_SESSION['cursos'] as $c) {
            if ($c['id'] == $id) {
                $curso = $c;
                break;
            }
        }

        if (!$curso) {
            header('Location: index.php?route=curso/index&erro=Curso não encontrado!');
            exit;
        }

        $alunosDoCurso = array_filter($_SESSION['alunos'], function($aluno) use ($id) {
            return $aluno['curso_id'] == $id;
        });

        require_once __DIR__ . '/../Views/Cursos/show.php';
    }

    public function delete() {
        $id = $_GET['id'] ?? null;

        if ($id !== null) {
            $_SESSION['cursos'] = array_filter($_SESSION['cursos'], function($curso) use ($id) {
                return $curso['id'] != $id;
            });
            $_SESSION['cursos'] = array_values($_SESSION['cursos']);

            foreach ($_SESSION['alunos'] as &$aluno) {
                if ($aluno['curso_id'] == $id) {
                    $aluno['curso_id'] = null;
                }
            }
        }

        header('Location: index.php?route=curso/index&sucesso=Curso excluído com sucesso!');
        exit;
    }
}