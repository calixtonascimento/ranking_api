# Ranking API - Coding Challenge

Este projeto é uma API RESTful em Laravel que retorna o ranking de um determinado movimento, com base nos recordes pessoais dos usuários. A API permite consultar o nome do movimento e uma lista de usuários ordenados pelos seus maiores recordes, exibindo também a posição e a data.
Caso um usuário tenha a mesma nota a posição do ranking será a mesma.
Utilizei a versão do PHP e Laravel abaixo por questões de configuração de ambiente e etc.

## Tecnologias Utilizadas

- PHP 5.6.40
- Laravel Framework 5.4.36
- MySQL
- Composer

## Requisitos

- PHP 5.6.40
- Composer
- MySQL

## Instalação

1. **Clone o repositório**

   ```bash
   git clone git@github.com:calixtonascimento/ranking_api.git
   cd ranking_api
   ```

2. **Instale as dependências**

   ```bash
   composer install
   ```

3. **Crie o arquivo .env**

   Copie o arquivo de exemplo .env.example para .env e configure as variáveis de ambiente, especialmente as de conexão com o banco de dados:

   ```bash
   cp .env.example .env
   ```

4. **Configure o banco de dados**

   No arquivo .env, configure a conexão com seu banco de dados MySQL:

   ```bash
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=ranking_db
   DB_USERNAME=teste
   DB_PASSWORD=teste
   ```

5. **Rode as migrações e insira os dados**
   ```bash
   php artisan migrate --seed
   ```

## Subindo o projeto

1. **Inicie o servidor**

   Após configurar tudo, inicie o servidor de desenvolvimento do Laravel:

   ```bash
   php artisan serve
   ```

   O projeto estará disponível em: http://localhost:8000

## Endpoints da API

### GET /api/ranking/{movementId}

Retorna o ranking de um movimento específico.

Parâmetros:

- movementId: ID do movimento.

```bash
{
	"movement": "Back Squat",
	"ranking": [
		{
			"position": 1,
			"user": "Joao",
			"highest_value": 130,
			"date": "2021-01-05 00:00:00"
		},
		{
			"position": 1,
			"user": "Jose",
			"highest_value": 130,
			"date": "2021-01-03 00:00:00"
		},
		{
			"position": 2,
			"user": "Paulo",
			"highest_value": 125,
			"date": "2021-01-03 00:00:00"
		}
	]
}
```