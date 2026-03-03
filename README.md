# Sistema de Controle de Patrimônio - IFPR

Sistema web para gestão e controle de patrimônio do Instituto Federal do Paraná (IFPR), desenvolvido com foco na utilização de etiquetas RFID para inventário.

## 📋 Funcionalidades

*   **Autenticação e Controle de Acesso**: Sistema de login seguro para administradores.
*   **Gestão de Bens**: Cadastro completo de bens patrimoniais, incluindo código de etiqueta visual e código RFID.
*   **Gestão de Localizações**: Cadastro de salas, laboratórios e outros locais.
*   **Gestão de Responsáveis**: Cadastro de servidores responsáveis pela carga dos bens.
*   **Grupos de Bens**: Categorização dos itens (ex: Mobiliário, Informática).
*   **Movimentações**: Registro histórico de transferências de bens entre locais e responsáveis.
*   **Relatórios**: Geração de relatórios por grupo, local e responsável, prontos para impressão.
*   **Dashboard**: Visão geral com estatísticas do sistema.

## 🚀 Tecnologias Utilizadas

*   **PHP** (Moderno, MVC)
*   **MySQL** (Banco de dados relacional)
*   **Bootstrap 5** (Interface responsiva)
*   **AltoRouter** (Roteamento de URLs amigáveis)
*   **Composer** (Gerenciamento de dependências)

## ⚙️ Pré-requisitos

*   PHP 7.4 ou superior
*   MySQL 5.7 ou superior
*   Composer
*   Servidor web (Apache, Nginx ou PHP Built-in Server)

## 🔧 Instalação

1.  **Clone o repositório**
    ```bash
    git clone https://github.com/seu-usuario/patrimonio-ifpr.git
    cd patrimonio-ifpr
    ```

2.  **Instale as dependências**
    ```bash
    composer install
    ```

3.  **Configure o Banco de Dados**
    *   Crie um banco de dados MySQL (ex: `patrimonio_ifpr`).
    *   Copie o arquivo de configuração de exemplo:
        ```bash
        cp config/config.example.php config/config.php
        ```
    *   Edite `config/config.php` com suas credenciais do banco de dados:
        ```php
        return [
            'db_host' => 'localhost',
            'db_name' => 'patrimonio_ifpr',
            'db_user' => 'seu_usuario',
            'db_pass' => 'sua_senha',
            // ...
        ];
        ```

4.  **Crie as Tabelas**
    *   Você pode executar o script de instalação automática:
        ```bash
        php install_db.php
        ```
    *   Ou importar manualmente o arquivo `database/schema.sql` no seu banco de dados.

## ▶️ Como Executar

Para ambiente de desenvolvimento, você pode usar o servidor embutido do PHP:

```bash
php -S localhost:8000 -t public
```

Acesse **http://localhost:8000** no seu navegador.

## 👤 Acesso Padrão

*   **Email**: `admin@ifpr.edu.br`
*   **Senha**: `admin123`

> **Nota**: Altere a senha do administrador logo após o primeiro acesso.

## 🤝 Créditos e Apoio

Desenvolvido com apoio de:
*   **Instituto Federal do Paraná (IFPR)**
*   **Itaipu Parquetec**
