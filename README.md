## APLICAÇÃO DE CADASTRO DE CLIENTE

1º ETAPA 

    - Instalar PHP
    - Instalar composer
    - Instalar Mysql 

    * Recomendo utilizar o XAMPP, COM O PACOTE DO MYSQL E PHP JÁ INSTALADO.

<!-- Conexão ao banco de dados -->
2° ETAPA 
    
    - CONFIGURAR O .ENV

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=registerCustomer
    DB_USERNAME=root
    DB_PASSWORD=

3º ETAPA

    - RODAR AS MIGRATIONS PARA CRIAR A ESTRUTURA DA BASE DE DADOS

    COMANDO (PHP ARTISAN MIGRATE)

4º ETAPA

    RODAR AS SEEDERS

    SUGESTÃO:

    php artisan db:seed --class=StatesCitiesSeeder 
        - Popular as tabelas de estados e cidades na base de dados

    php artisan db:seed --class=SexSeeder
        - Popular a tabela de sexo na base de dados

5º ETAPA

    ENDPOINT PARA BUSCAR OS ESTADOS: http://127.0.0.1:8000/api/state
    ENDPOINT PARA BUSCAR AS CIDADES: http://127.0.0.1:8000/api/cities

    -----

    CADASTRAR O CLIENTE

    ENDPOINT: http://127.0.0.1:8000/api/customer/register

    JSON PARA REQUEST:
    {
        "name": "NOME COMPLETO",
        "cpf": "000.000.000-00",
        "dateOfBirth": "2024-01-01",
        "sex": 1,
        "cep": "00000-000",
        "address": "example",
        "number": "5",
        "state": 20, (Existe Endpoint que retorna todos os estados que estão na base de dados)
        "city": 3830, (Existe Endpoint que retorna todas as cidades que estão na base de dados)
        "representative": 1 (Objetivo em saber se é representante da cidade cadastrar ao perfil, 0 não é representante e 1 é representante)
    }

    JSON DE RESPONSE:
    {
        "message": "customer registration completed successfully"
    }

6º ETAPA

    ENDPOINT DE CLIENTES: http://127.0.0.1:8000/api/customer

    REPRESENTATE DE CIDADE POR CLIENTE

    ENDPOINT: http://127.0.0.1:8000/api/customer/representative/{ID-DO-CLIENTE}

    JSON DE RESPONSE:
    {
        "message": [
            {
                "representative": "nome do representante",
                "city": "São Paulo"
            }
        ]
    }

7º ETAPA

    REPRESENTANTES POR CIDADE

    ENDPOINT: http://127.0.0.1:8000/api/customer/representativeCity/{ID-DA-CIDADE}

    JSON DE RESPONSE:
    {
        "message": [
            {
                "representative": "ione Maciel",
                "city": "São Pedro"
            }
        ]
    }