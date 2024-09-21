<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <h1>Produtos</h1>
    @foreach ($storeProducts as $product)
    <div class="row">
        <div>
            <a href="/editar-produto-estabelecimento/{{$id}}/{{$product->product_id}}">
                <h3>{{$product->product_name}} {{$product->brand_name}} {{$product->product_description}} 
                {{$product->package_name}} {{$product->product_measurement}} {{$product->product_unity_measurement}} 
                {{$product->section_name}} R${{$product->product_price}}</h3>
            </a>
        </div>
        <div>
        </div>
    </div>
    @endforeach
    <a href="/gerenciar-estoque/{{$id}}" class="btn btn-danger">Voltar</a>
</body>
</html>