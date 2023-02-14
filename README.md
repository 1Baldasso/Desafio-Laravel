### Como executar o programa

# Requisitos:

Git
PHP
Composer
MySQL

# Recomendações
Para uma melhor visualização e teste dos resultados você pode usar os seguintes programas:
- Postman
- Insomnia
- Json Formatter Chrome Extension

# Passos

- Crie uma pasta para receber o código fonte.
- No console, clone o repositório através do comando:
```git clone https://github.com/1Baldasso/Desafio-Laravel desafio-laravel```

- Ainda no console acesse a pasta através do comando: 
```cd desafio-laravel```

- Abra a pasta através de um editor de código e acesse o arquivo .env.example e substitua os dados:

*DB_CONNECTION=mysql*
*DB_HOST=127.0.0.1*
*DB_PORT=3306*
*DB_DATABASE=laravel*
*DB_USERNAME=root*
*DB_PASSWORD=*

pelos dados do seu banco MySQL e renomeie o arquivo para .env

- Baixe as dependências do projeto com o comando:
```composer compose```

- Gere um banco de dados e as tabelas através do comando:
```php artisan migrate```

- Após todos os passos, seu programa deve estar pronto para executar.

- Sempre que precisar executar o programa, use o comando:
```php artisan serve```

- Abra o seu HTTP Client e comece a utilizar as APIs

## Rotas

# Lojas
GET - /api/lojas
Output Exemplo:
[
    {
        "id": 1,
        "nome": "AlocaAlo",
        "email": "superpao52@gmail.com"
    },
    {
        "id": 24,
        "nome": "Aloca",
        "email": "superpao@gmail.com"
    },
    {
        "id": 25,
        "nome": "Lucas Baldasso",
        "email": "sup4erpao52@gmail.com"
    }
]
GET - /api/lojas/{id}
POST - /api/lojas 
body: 
{
    'nome' : 'Superpão',
    'email' : 'contato@superpao.com.br'
}
PUT - /api/lojas/{id}
body: 
{
    'nome' : 'Superpão Saldanha',
    'email' : 'contato@superpao.com.br'
}
DELETE - /api/lojas/{id}

# Produtos
GET - /api/produtos
Output exemplo:
[
    {
        "id": 6,
        "nome": "Milho",
        "valor": 2,
        "ativo": 1,
        "estoque": 10000,
        "data": "14/02/2023"
    },
    {
        "id": 7,
        "nome": "Pepino",
        "valor": 50,
        "ativo": 1,
        "estoque": 10000,
        "data": "14/02/2023"
    }
]
GET - /api/produtos/{id}
POST - /api/produtos 
body: 
{
    'nome' : 'Pão',
    'valor' : '50',
    'ativo' : '1',
    'estoque' : '1000',
    'loja_id' : '1'

}
PUT - /api/produtos/{id}
body: 
{
    'nome' : 'Leite',
    'valor' : '538',
    'ativo' : '1',
    'estoque' : '512',
    'loja_id' : '1'
}
DELETE - /api/produtos/{id}