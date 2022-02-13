<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>
<p>
- Essa aplicação foi feita utilizando o framework Laravel.
</p>
<p>
- Para rodar a aplicação é necessário criar o arquivo .env e depois rodar o comando 
    php artisan migrate para gerar o banco de dados.
</p>
<p>
- Comando para rodar os testes automatizados: php artisan test
</p>
<p>
- Essa aplicação foi desenvolvida com base na Clean Architecture, na imagem
 abaixo é possível visualizar onde cada parte do código se encontra nessa implementação.
<p>
<p align="center">
    <img src="https://user-images.githubusercontent.com/3608047/153760458-9b54984c-861e-42f1-ac95-9f6efecf54e8.png"> 
</p>
<p>
    Essa aplicação disponibiliza três serviços RESTFul:
    <ol>
        <li> 
            Cadastrar novo usuário comum, que pode ser feita atravez do payload:
            {
                "nome_completo": "Fulano",
                "email": "meuemail@exemplpe.com",
                "senha" : 1234,
                "cpf": "000.000.000.00"
            }
        </li>
        <li>
            Cadastrar novo usuário lojista, que pode ser feita atravez do payload:
            {
                "nome_completo": "Fulano",
                "email": "meuemail@exemplpe.com",
                "senha" : 1234,
                "cnpj": "00.000.000/0000-00"
            }
        </li>
        <li>
            Efetuar transação financeiras, que pode ser feita atravez do payload:
            {
                "value" : 100.00,
                "payer_id" : 2,
                "payee_id" : 1
            }
        </li>
    </ol>    
</p>