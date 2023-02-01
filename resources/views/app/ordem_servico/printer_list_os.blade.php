<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório de serviços</title>
    <hr>
</head>
<style>
    body {
        text-align: center;
    }

    h3,
    h2 {
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }
</style>

<body>
    <h2>Relatório de serviços</h2>
    <hr>
    <h3>Sidinei da rosa</h3>
    <p></p>
    <h3>cel:(46)999842664 pix:95842896087 banco sicoob</h3>
    <p></p>
    <h3>Rua Luiz lovo 464 - Loteamento esplanada- Palmas-PR</h3>
    <p></p>
    <hr>

    @foreach($empresa as $empresas_f)

    @endforeach
    <h3>Nome fantasia:</h3>{{$empresas_f['nome_fantasia']}}
    <p>
    <h3>Razão social:</h3> {{$empresas_f['razao_social']}}
    <hr>

    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
    </style>
    <table id="customers">
        <thead>

            <tr>
                <th scope="col" class="">ID</th>
                <th scope="col" class="">Data</th>
                <th scope="col" class="">Descrição</th>
                <th scope="col" class="">Valor</th>

            </tr>
        </thead>
        @foreach($ordens_servicos as $ordens_servicos_f)
        <tbody>
            <tr>
                <td>{{$ordens_servicos_f['id']}}</td>
                <td>{{$ordens_servicos_f['data_emissao']}}</td>
                <td>{{$ordens_servicos_f['descricao']}}</td>
                <td>{{$ordens_servicos_f['valor']}}</td>
        </tbody>
        @endforeach
    </table>
    <h2>Valor total=R${{$valorTotal}}</h2><p></p>
    
    <input type=" button" value="Imprimir" onclick="window.print()">

</body>

</html>