<?php
/** @var array $cursos */
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Aluno</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input, select { width: 100%; padding: 8px; box-sizing: border-box; }
        .btn { padding: 10px 15px; background: #28a745; color: white; border: none; border-radius: 4px; cursor: pointer; text-decoration: none; display: inline-block; }
        .btn-secondary { background: #6c757d; }
        .alert { padding: 10px; margin-bottom: 15px; border-radius: 4px; background: #f8d7da; color: #721c24; }
    </style>
</head>
<body>

    <h1>Cadastrar Novo Aluno</h1>

    <?php if (isset($_GET['erro'])): ?>
        <div class="alert"><?= htmlspecialchars($_GET['erro']) ?></div>
    <?php endif; ?>

    <form action="index.php?route=aluno/store" method="POST">
        <div class="form-group">
            <label for="nome">Nome Completo:</label>
            <input type="text" id="nome" name="nome" required>
        </div>

        <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" required>
        </div>

        <div class="form-group">
            <label for="curso_id">Curso Matriculado:</label>
            <select id="curso_id" name="curso_id" required>
                <option value="">Selecione um curso...</option>
                <?php foreach ($cursos as $curso): ?>
                    <option value="<?= $curso['id'] ?>"><?= htmlspecialchars($curso['nome']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <button type="submit" class="btn">Salvar Aluno</button>
        <a href="index.php?route=aluno/index" class="btn btn-secondary">Voltar</a>
    </form>

</body>
</html>