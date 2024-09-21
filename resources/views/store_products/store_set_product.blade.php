<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
            <form action="/editar-produto-estabelecimento" method="post">
                @csrf
                <div class="row">
                        <img src="/storage/images/{{$product->product_img}}" style="width: 200px" alt="">
                    <div class="col">
                        <h3>{{$product->product_name}} {{$product->brand_name}} {{$product->product_description}} 
                        {{$product->package_name}} {{$product->product_measurement}} {{$product->product_unity_measurement}} 
                        {{$product->section_name}}</h3>
                    </div>
                        <div class="col">
                            <label for="price">R$
                                <input type="number" name="price" id="price" value="{{$product->product_price}}" min="0" step="0.01">
                                <input type="hidden" name="storeProductId" value="{{$product->id}}">
                                <input type="hidden" name="storeId" value="{{$product->store_id}}">
                            </label>
                        </div>
                </div>
                <div>
                    <button class="btn btn-warning">Salvar alterações</button>
            </form>
                    <a href="/remover-produto-estoque/{{$product->store_id}}/{{$product->id}}" class="btn btn-danger">Remover do estoque</a>
                    <a href="/editar-produto-estabelecimento/{{$product->store_id}}" class="btn btn-danger">Voltar</a>
                </div>
    </div>
</body>
</html>