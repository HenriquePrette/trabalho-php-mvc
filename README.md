# Sistema Acadêmico - Gestão de Cursos e Alunos (MVC)

Projeto desenvolvido no âmbito da unidade curricular de tecnologias web, implementando um sistema em **PHP 8+** estruturado sob o padrão arquitetural **MVC (Model-View-Controller)**, utilizando sessões (`$_SESSION`) para persistência de dados.

##  Funcionalidades Implementadas
- **Arquitetura MVC:** Separação clara de responsabilidades entre rotas, controladores, modelos e vistas.
- **CRUD de Cursos:** Registo, listagem com contador de alunos matriculados, filtros de pesquisa e exclusão.
- **CRUD de Alunos:** Registo com associação a cursos existentes, listagem detalhada e exclusão.
- **Relacionamento Entidade-Relacional:** Associações visíveis entre Aluno e Curso, incluindo ecrã de detalhes dedicados.
- **Interface Moderna:** Tema visual personalizado com paleta corporativa em azul escuro e laranja vibrante.

## Tecnologias Utilizadas
- **PHP 8+** (com promoção de propriedades e programação orientada a objetos)
- **HTML5 & CSS3** (Design customizado e responsivo)
- **XAMPP / Apache** (Ambiente de execução local)
- **Git & GitHub** (Controlo de versões)

## Como Executar o Projeto Localmente

1. Certifica-te de que tens o **XAMPP** (ou um servidor web compatível com PHP 8) instalado no teu computador.
2. Clona ou copia os ficheiros do projeto para dentro da pasta raiz do teu servidor local (ex: `C:/xampp/htdocs/TrabalhoProjeto/`).
3. Inicia o serviço **Apache** através do painel de controlo do XAMPP.
4. Abre o teu navegador e acede ao seguinte endereço:
   ```text
   http://localhost/TrabalhoProjeto/index.php