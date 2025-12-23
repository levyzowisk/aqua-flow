# aqua-flow

## Visão Geral
Soluções Completas em Saneamento  
A AquaFlow Saneamento Integrado é uma empresa especializada em soluções completas para abastecimento de água, tratamento, monitoramento e distribuição. Atuamos desde pequenas instalações residenciais até grandes redes de saneamento urbano e industrial.  
Nosso compromisso é garantir segurança hídrica, eficiência operacional e inovação em todas as etapas do processo. Trabalhamos com tecnologias modernas, equipamentos certificados e equipes altamente qualificadas.  

Em nosso sistema interno, realizamos todo o controle de estoque de materiais hidráulicos, gerenciamento de metas e desempenho de equipes de campo, além do controle avançado de usuários, técnicos e operações registradas.

## Estrutura de Pastas
- `src/`: Contém os arquivos principais da aplicação.
  - `dashboard.php`: Página principal do dashboard.
  - `funcionarios.php`: Módulo de funcionários.
  - `login.php`: Página de login.
  - `metas.php`: Módulo de metas.
  - `produtos.php`: Módulo de produtos.
  - `usuarios.php`: Módulo de usuários.
  - `vendas.php`: Módulo de vendas.
  - `models/`: Classes de modelo para interação com o banco de dados.
    - `conexao.php`: Configuração da conexão PDO com MySQL.
    - `funcionarioModel.php`: Funções para CRUD de funcionários.
    - `homeModel.php`: Funções para dados do dashboard.
    - `metaModel.php`: Funções para metas.
    - `produtoModel.php`: Funções para produtos.
    - `usuarioModel.php`: Funções para usuários.
    - `vendaModel.php`: Funções para vendas.
    - `vendaProdutoModel.php`: Funções para produtos em vendas.
  - `actions/`: Scripts de ação para operações CRUD.
    - `autenticacao/`: Login e logout.
    - `funcionarios/`: Ações para funcionários (inserir, atualizar, demitir, etc.).
    - `metas/`: Ações para metas.
    - `produtos/`: Ações para produtos.
    - `usuarios/`: Ações para usuários.
    - `vendas/`: Ações para vendas.
  - `utils/`: Utilitários.
    - `auth.php`: Funções de autenticação.
    - `sessionsFeedbacks.php`: Gerenciamento de sessões e feedbacks.
    - `validations.php`: Validações.
  - `views/`: Templates de visualização.
    - `home.php`: Dashboard.
    - `layouts/`: Header e footer.
    - `funcionarios/`: Views para funcionários.
    - `metas/`: Views para metas.
    - `produtos/`: Views para produtos.
    - `usuarios/`: Views para usuários.
    - `vendas/`: Views para vendas.
- `sql.sql`: Script SQL para criação do banco de dados e tabelas.

## Módulos
- **Dashboard**: Exibe métricas gerais como total de produtos, faturamento total, funcionários ativos e vendas recentes.
- **Funcionários**: Gerenciamento de funcionários, incluindo cadastro, listagem, demissão e ativação. Funcionários têm CPF, nome, data de contratação e status (ativo/demitido).
- **Produtos**: CRUD de produtos, com nome, valor e estoque.
- **Metas**: Definição de metas mensais para funcionários, com valor alvo.
- **Vendas**: Registro de vendas associadas a funcionários, incluindo produtos vendidos e quantidades.
- **Usuários**: Gerenciamento de usuários para login, com email e senha.
- **Login**: Autenticação de usuários para acesso ao sistema.

## Regras Implementadas
- **Autenticação**: Todas as páginas exigem login. Usuários devem estar logados para acessar o sistema.
- **Funcionários**: 
  - Só é possível cadastrar meta se houver funcionário ativo.
  - Funcionários podem ser demitidos (data_admissao definida) ou ativados (data_admissao nula).
  - CPF único por funcionário.
- **Vendas**: 
  - Só é possível cadastrar venda se houver funcionários ativos e produtos com estoque > 0.
  - Vendas incluem funcionário responsável, data e produtos com quantidades.
- **Produtos**: Estoque pode ser zerado, mas botão desabilitado se estoque for zero.
- **Validações**: Uso de htmlspecialchars para prevenir XSS. Validações de entrada de dados.
- **Feedbacks**: Sistema de notificações via Toastify para ações realizadas.

