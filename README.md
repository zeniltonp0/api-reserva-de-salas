# API de reserva de salas 

API para gerenciamento e agendamento de salas de reunião, com controle de inventário de equipamentos e automação de limpeza de dados.

## 🛠️ Tecnologias e Ferramentas

- Framework: Laravel 12

- Linguagem: PHP 8.3+

- Autenticação: Laravel Sanctum (Abilities para Admin/User)

- Banco de Dados: MySQL

- Arquitetura: Single Action Controllers (invokable) e API Resources

- Padronização: Form Requests para validação de dados

## ⚙️ Funcionalidades Principais

- Autenticação de Usuários: Registro e login com emissão de tokens via Sanctum.

- Gestão de Salas: CRUD completo de salas com controle de capacidade e disponibilidade.

### Sistema de Agendamentos:

- Criação de reservas com validação de conflito de horários.

- Fluxo de aprovação/cancelamento.

### Inventário de Equipamentos:

- Catálogo global de equipamentos.

- Vínculo Many-to-Many entre salas e equipamentos, permitindo definir quantidade e status (ativo/inativo) de cada item por sala.

- Lógica de Desativação: Ao desativar uma sala, o sistema cancela automaticamente todos os agendamentos futuros pendentes ou aprovados.

- Notificações: Envio de alertas aos usuários (ex: quando um agendamento é cancelado por manutenção da sala).

## 🧹 Comandos Customizados

```bash
php artisan app:clean-old-bookings
```
Este comando remove do banco de dados todos os agendamentos com status "cancelado" que foram atualizados há mais de 30 dias. Está configurado para rodar diariamente via Task Scheduler.

## 🚀 Como Instalar

1. Clone o repositório:

   ```bash
   git clone git@github.com:zeniltonp0/api-reserva-de-salas.git
   ```

2. Instale as dependências:

    ```bash
   composer install
   ```
3. Configure o .env:

   ```bash
    cp .env.example .envGET
    php artisan key:generate
   ```

## Principais Endpoints

| Método | Endpoint | Descrição |
|:-------- |:--------:|:--------:|
| POST     | /api/login | Autenticação e geração de token |
| GET      | /api/salas | Listagem de salas com filtros de equipamentos. |
| POST     | /api/agendamentos | Realiza uma nova reserva de sala. |
| POST     | /api/admin/salas/{id}/equipamentos | Sincroniza o inventário de uma sala (Admin). |
| DELETE   | /api/admin/equipamentos/{id} | Remove equipamento do catálogo (com trava de segurança). |
   
