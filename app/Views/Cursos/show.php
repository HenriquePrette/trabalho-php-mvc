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
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; margin: 0; padding: 30px; background-color: #f4f6f9; color: #333; }
        h1 { color: #1e3a8a; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; background: white; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 6px rgba(0,0,0,0.05); }
        th, td { padding: 12px 15px; text-align: left; border-bottom: 1px solid #e5e7eb; }
        th { background-color: #1e3a8a; color: white; font-weight: 600; }
        tr:hover { background-color: #f8fafc; }
        .btn { padding: 8px 16px; text-decoration: none; background: #475569; color: white; border-radius: 6px; font-weight: 500; display: inline-block; margin-bottom: 20px; }
        .btn:hover { background: #334155; }
        .card { background: white; padding: 25px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); margin-bottom: 25px; border-left: 5px solid #ea580c; }
        .card h2 { margin-top: 0; color: #1e293b; }
        .card p { margin: 8px 0; color: #475569; }
        h3 { color: #1e293b; margin-top: 30px; }
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
                    <td><strong><?= htmlspecialchars($aluno['nome']) ?></strong></td>
                    <td><?= htmlspecialchars($aluno['email']) ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="3" style="text-align: center; color: #64748b; padding: 30px;">Nenhum aluno matriculado neste curso atualmente.</td>
            </tr>
        <?php endif; ?>
    </table>

</body>
</html>