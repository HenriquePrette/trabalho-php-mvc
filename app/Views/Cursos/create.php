<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Curso</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input { width: 100%; padding: 8px; box-sizing: border-box; }
        .btn { padding: 10px 15px; background: #28a745; color: white; border: none; border-radius: 4px; cursor: pointer; text-decoration: none; display: inline-block; }
        .btn-secondary { background: #6c757d; }
        .alert { padding: 10px; margin-bottom: 15px; border-radius: 4px; background: #f8d7da; color: #721c24; }
    </style>
</head>
<body>

    <h1>Cadastrar Novo Curso</h1>

    <?php if (isset($_GET['erro'])): ?>
        <div class="alert"><?= htmlspecialchars($_GET['erro']) ?></div>
    <?php endif; ?>

    <form action="index.php?route=curso/store" method="POST">
        <div class="form-group">
            <label for="nome">Nome do Curso:</label>
            <input type="text" id="nome" name="nome" required>
        </div>

        <div class="form-group">
            <label for="carga_horaria">Carga Horária:</label>
            <input type="text" id="carga_horaria" name="carga_horaria" placeholder="Ex: 80h" required>
        </div>

        <button type="submit" class="btn">Salvar Curso</button>
        <a href="index.php?route=curso/index" class="btn btn-secondary">Voltar</a>
    </form>

</body>
</html>