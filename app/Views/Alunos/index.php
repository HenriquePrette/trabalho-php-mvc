<h2>Lista de Alunos</h2>
<a href="index.php?route=aluno/create">Cadastrar Novo Aluno</a>

<table border="1" cellpadding="10">
    <tr>
        <th>Nome do Aluno</th>
        <th>E-mail</th>
        <th>Curso Matriculado</th> 
        <th>Ações</th>
    </tr>

    <?php if (!empty($alunos)): ?>
        <?php foreach ($alunos as $aluno): ?>
            <tr>
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
                    <a href="index.php?route=aluno/edit&id=<?= $aluno['id'] ?>">Editar</a> | 
                    <a href="index.php?route=aluno/delete&id=<?= $aluno['id'] ?>">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="4">Nenhum aluno cadastrado.</td>
        </tr>
    <?php endif; ?>
</table>