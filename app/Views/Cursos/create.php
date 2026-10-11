<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Curso</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; margin: 0; padding: 30px; background-color: #f4f6f9; color: #333; }
        h1 { color: #1e3a8a; margin-bottom: 20px; }
        .card { background: white; padding: 25px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); max-width: 600px; }
        .form-group { margin-bottom: 20px; }
        label { display: block; margin-bottom: 8px; font-weight: 600; color: #1e293b; }
        input { width: 100%; padding: 10px 12px; box-sizing: border-box; border: 1px solid #cbd5e1; border-radius: 6px; outline: none; font-size: 14px; }
        input:focus { border-color: #1e3a8a; }
        .btn { padding: 10px 20px; background: #ea580c; color: white; border: none; border-radius: 6px; cursor: pointer; text-decoration: none; display: inline-block; font-weight: 500; }
        .btn:hover { background: #c2410c; }
        .btn-secondary { background: #475569; margin-left: 10px; }
        .btn-secondary:hover { background: #334155; }
        .alert { padding: 12px 15px; margin-bottom: 20px; border-radius: 6px; background: #fee2e2; color: #991b1b; border: 1px solid #fecaca; font-weight: 500; }
    </style>
</head>
<body>

    <h1>Cadastrar Novo Curso</h1>

    <div class="card">
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
    </div>

</body>
</html>