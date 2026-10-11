<?php
/** @var array $cursos */
/** @var array $alunos */
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Lista de Alunos</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: #f4f4f4; }
        .btn { padding: 8px 12px; text-decoration: none; background: #007BFF; color: white; border-radius: 4px; display: inline-block; margin-bottom: 10px; }
        .btn-danger { background: #dc3545; }
        .search-box { margin-bottom: 15px; }
        .alert { padding: 10px; margin-bottom: 15px; border-radius: 4px; }
        .alert-success { background: #d4edda; color: #155724; }
        .alert-danger { background: #f8d7da; color: #721c24; }
    </style>
</head>
<body>

    <h1>Gestão de Alunos</h1>
    
    <a href="index.php?route=aluno/create" class="btn">Cadastrar Novo Aluno</a>
    <a href="index.php?route=curso/index" class="btn" style="background: #6c757d;">Ir para Cursos</a>

    <?php if (isset($_GET['sucesso'])): ?>
        <div class="alert alert-success"><?= htmlspecialchars($_GET['sucesso']) ?></div>
    <?php endif; ?>
    <?php if (isset($_GET['erro'])): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($_GET['erro']) ?></div>
    <?php endif; ?>

    <div class="search-box">
        <form action="index.php" method="GET">
            <input type="hidden" name="route" value="aluno/index">
            <input type="text" name="busca" placeholder="Pesquisar aluno por nome..." value="<?= htmlspecialchars($_GET['busca'] ?? '') ?>" style="padding: 6px; width: 250px;">
            <button type="submit" style="padding: 6px 12px;">Buscar</button>
            <?php if (!empty($_GET['busca'])): ?>
                <a href="index.php?route=aluno/index" style="margin-left: 10px;">Limpar</a>
            <?php endif; ?>
        </form>
    </div>

    <table>
        <tr>
            <th>ID</th>
            <th>Nome do Aluno</th>
            <th>E-mail</th>
            <th>Curso Matriculado (Relacionamento)</th>
            <th>Ações</th>
        </tr>

        <?php if (!empty($alunos)): ?>
            <?php foreach ($alunos as $aluno): ?>
                <tr>
                    <td><?= htmlspecialchars($aluno['id']) ?></td>
                    <td><?= htmlspecialchars($aluno['nome']) ?></td>
                    <td><?= htmlspecialchars($aluno['email']) ?></td>
                    <td>
                        <?php 
                            $nomeCurso = "Curso não encontrado";
                            foreach ($cursos as $curso) {
                                if ($curso['id'] == $aluno['curso_id']) {
                                    $nomeCurso = $curso['nome'];
                                    break;
                                }
                            }
                            echo htmlspecialchars($nomeCurso);
                        ?>
                    </td>
                    <td>
                        <a href="index.php?route=aluno/delete&id=<?= $aluno['id'] ?>" class="btn btn-danger" onclick="return confirm('Tens a certeza que pretendes excluir este aluno?')">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="5" style="text-align: center;">Nenhum aluno cadastrado.</td>
            </tr>
        <?php endif; ?>
    </table>

</body>
</html>