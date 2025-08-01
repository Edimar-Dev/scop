# 📊 SCOP – Sistema de Controle e Organização de Planilhas

O **SCOP** é um sistema web desenvolvido em **Laravel + Filament** para gerenciamento de servidores e geração automatizada de planilhas institucionais. Permite criar, editar, transferir e excluir servidores vinculados a unidades e perfis, com exportação de dados em formatos compatíveis com **LibreOffice**.

---

## ⚙️ Funcionalidades

- ✅ Cadastro de servidores com vínculo a unidade e perfil;
- ✅ Edição de dados (nome, e-mail, matrícula, vínculo e órgão de origem);
- ✅ Alteração de perfil sem troca de unidade;
- ✅ Transferência entre unidades com revisão e confirmação de dados;
- ✅ Exclusão definitiva de cadastros (hard delete);
- ✅ Geração automática de planilhas atualizadas;
- ✅ Visualização das planilhas no sistema;
- ✅ Exportação compatível com LibreOffice (`.ods`).

---

## 🧑‍💻 Tecnologias Utilizadas

- **Framework Backend:** [Laravel](https://laravel.com/)
- **Admin Panel / UI:** [Filament](https://filamentphp.com/)
- **Banco de Dados:** MySQL / MariaDB / PostgreSQL
- **Exportação de Planilhas:** PhpSpreadsheet ou alternativa compatível com `.ods`
- **Visualização de Planilhas:** Visualização embutida no painel Filament (custom widget/component)

---

## 🚀 Instalação

```bash
# Clone o repositório
git clone https://github.com/Edimar-Dev/scop
cd scop

# Instale as dependências do Laravel
composer install

# Copie o arquivo de ambiente
cp .env.example .env

# Gere a chave da aplicação
php artisan key:generate

# Configure o banco de dados no .env e rode as migrations
php artisan migrate

# Rode o servidor local
php artisan serve

