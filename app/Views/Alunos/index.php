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
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; margin: 0; padding: 30px; background-color: #f4f6f9; color: #333; }
        h1 { color: #1e3a8a; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; background: white; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 6px rgba(0,0,0,0.05); }
        th, td { padding: 12px 15px; text-align: left; border-bottom: 1px solid #e5e7eb; }
        th { background-color: #1e3a8a; color: white; font-weight: 600; }
        tr:hover { background-color: #f8fafc; }
        .btn { padding: 8px 16px; text-decoration: none; background: #ea580c; color: white; border-radius: 6px; font-weight: 500; display: inline-block; transition: background 0.2s; border: none; cursor: pointer; }
        .btn:hover { background: #c2410c; }
        .btn-secondary { background: #475569; }
        .btn-secondary:hover { background: #334155; }
        .btn-danger { background: #dc2626; }
        .btn-danger:hover { background: #b91c1c; }
        .nav-buttons { margin-bottom: 20px; display: flex; gap: 10px; }
        .search-box { margin-bottom: 20px; background: white; padding: 15px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.02); display: flex; gap: 10px; align-items: center; }
        .search-box input[type="text"] { padding: 8px 12px; width: 300px; border: 1px solid #cbd5e1; border-radius: 6px; outline: none; }
        .search-box input[type="text"]:focus { border-color: #1e3a8a; }
        .alert { padding: 12px 15px; margin-bottom: 20px; border-radius: 6px; font-weight: 500; }
        .alert-success { background: #d1fae5; color: #065f46; border: 1px solid #a7f3d0; }
        .alert-danger { background: #fee2e2; color: #991b1b; border: 1px solid #fecaca; }
    </style>
</head>
<body>

    <h1>Gestão de Alunos</h1>
    
    <div class="nav-buttons">
        <a href="index.php?route=aluno/create" class="btn">Cadastrar Novo Aluno</a>
        <a href="index.php?route=curso/index" class="btn btn-secondary">Ir para Cursos</a>
    </div>

    <?php if (isset($_GET['sucesso'])): ?>
        <div class="alert alert-success"><?= htmlspecialchars($_GET['sucesso']) ?></div>
    <?php endif; ?>
    <?php if (isset($_GET['erro'])): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($_GET['erro']) ?></div>
    <?php endif; ?>

    <div class="search-box">
        <form action="index.php" method="GET" style="display: flex; gap: 10px; align-items: center; margin: 0;">
            <input type="hidden" name="route" value="aluno/index">
            <input type="text" name="busca" placeholder="Pesquisar aluno por nome..." value="<?= htmlspecialchars($_GET['busca'] ?? '') ?>">
            <button type="submit" class="btn" style="padding: 8px 16px;">Buscar</button>
            <?php if (!empty($_GET['busca'])): ?>
                <a href="index.php?route=aluno/index" style="color: #475569; text-decoration: none; font-weight: 500;">Limpar</a>
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
                    <td><strong><?= htmlspecialchars($aluno['nome']) ?></strong></td>
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
                <td colspan="5" style="text-align: center; color: #64748b; padding: 30px;">Nenhum aluno cadastrado.</td>
            </tr>
        <?php endif; ?>
    </table>

</body>
</html>