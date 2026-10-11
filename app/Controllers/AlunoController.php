<?php

class AlunoController {

    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['alunos'])) {
            $_SESSION['alunos'] = [];
        }
        if (!isset($_SESSION['cursos'])) {
            $_SESSION['cursos'] = [];
        }
    }

    public function index() {
        $alunos = $_SESSION['alunos'];
        $cursos = $_SESSION['cursos'];

        $termoBusca = $_GET['busca'] ?? '';
        if (!empty($termoBusca)) {
            $alunos = array_filter($alunos, function($aluno) use ($termoBusca) {
                return stripos($aluno['nome'], $termoBusca) !== false;
            });
        }

        require_once __DIR__ . '/../Views/Alunos/index.php';
    }

    public function create() {
        $cursos = $_SESSION['cursos'];
        require_once __DIR__ . '/../Views/Alunos/create.php';
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = trim($_POST['nome'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $cursoId = $_POST['curso_id'] ?? '';

            if (empty($nome) || empty($email) || empty($cursoId)) {
                header('Location: index.php?route=aluno/create&erro=Preencha todos os campos!');
                exit;
            }

            $novoId = count($_SESSION['alunos']) > 0 ? end($_SESSION['alunos'])['id'] + 1 : 1;

            $_SESSION['alunos'][] = [
                'id' => $novoId,
                'nome' => $nome,
                'email' => $email,
                'curso_id' => $cursoId
            ];

            header('Location: index.php?route=aluno/index&sucesso=Aluno cadastrado com sucesso!');
            exit;
        }
    }

    public function delete() {
        $id = $_GET['id'] ?? null;

        if ($id !== null) {
            $_SESSION['alunos'] = array_filter($_SESSION['alunos'], function($aluno) use ($id) {
                return $aluno['id'] != $id;
            });
            $_SESSION['alunos'] = array_values($_SESSION['alunos']);
        }

        header('Location: index.php?route=aluno/index&sucesso=Aluno excluído com sucesso!');
        exit;
    }
}