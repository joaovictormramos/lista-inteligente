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
    <form action="/adicionar-produto" method="post">
        <input type="hidden" name="store_id value="id">
    @csrf
    @foreach ($productsToRegisterAtStore as $product)
        <div class="row">
            <div class="col">
                <h3>{{$product->product_name}} {{$product->brand_name}} {{$product->product_description}} {{$product->package_name}} {{$product->product_measurement}} {{$product->product_unity_measurement}} {{$product->section_name}}</h3>
            </div>
            <div class="col">
                <input type="checkbox" name="addProducts[{{$product->id}}][selected]" value="{{$product->id}}">
                <label for="price">R$
                    <input type="number" name="addProducts[{{$product->id }}][price]" id="price" min="0" step="0.01">
                </label>
            </div>
        </div>
    @endforeach
    <input type="hidden" name="store_id" value="{{$id}}">
    <button class="btn btn-primary">Cadastrar</button>
    <a href="/gerenciar-estoque/{{$id}}" class="btn btn-danger">Voltar</a>
    </form>
</body>
</html>