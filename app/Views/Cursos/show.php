<?php
/** @var array $curso */
/** @var array $alunosDoCurso */
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Detalhes do Curso</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: #f4f4f4; }
        .btn { padding: 8px 12px; text-decoration: none; background: #6c757d; color: white; border-radius: 4px; display: inline-block; margin-bottom: 15px; }
        .card { background: #f9f9f9; padding: 15px; border: 1px solid #ddd; border-radius: 4px; margin-bottom: 20px; }
    </style>
</head>
<body>

    <h1>Detalhes do Curso</h1>

    <a href="index.php?route=curso/index" class="btn">← Voltar para Lista de Cursos</a>

    <div class="card">
        <h2><?= htmlspecialchars($curso['nome']) ?></h2>
        <p><strong>ID do Curso:</strong> <?= htmlspecialchars($curso['id']) ?></p>
        <p><strong>Carga Horária:</strong> <?= htmlspecialchars($curso['carga_horaria']) ?></p>
    </div>

    <h3>Alunos Matriculados neste Curso:</h3>
    <table>
        <tr>
            <th>ID</th>
            <th>Nome do Aluno</th>
            <th>E-mail</th>
        </tr>
        <?php if (!empty($alunosDoCurso)): ?>
            <?php foreach ($alunosDoCurso as $aluno): ?>
                <tr>
                    <td><?= htmlspecialchars($aluno['id']) ?></td>
                    <td><?= htmlspecialchars($aluno['nome']) ?></td>
                    <td><?= htmlspecialchars($aluno['email']) ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="3" style="text-align: center;">Nenhum aluno matriculado neste curso atualmente.</td>
            </tr>
        <?php endif; ?>
    </table>

</body>
</html>