<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>Produto</th>
                    <th class="d-flex justify-content-center">Imagem</th>
                    <th>Ações</th>
                </tr>
            </thead>
            @foreach ($products as $product)
            <tr>
                <td>
                    <p>{{$product->product_name}}</p>
                </td>
                <td style="text-align: center; vertical-align: middle;">
                    @if($product->product_img != "")
                    <img src="/storage/images/{{$product->product_img}}" style="max-height: 150px; width: auto;"
                        alt="não achado">
                    @endif
                </td>
                <td>
                    <a href="/admin/editar-produto/{{$product->id}}" class="btn btn-warning">Editar</a>
                    <a href="/admin/excluir-produto/{{$product->id}}" class="btn btn-danger">Excluir</a>
                </td>
            </tr>
            @endforeach
        </table>
        <a class="btn btn-primary" href="/admin/cadastrar-produto">Cadastrar produto</a>
        <a class="btn btn-danger" href="/admin/gerenciar">Voltar</a>
    </div>
</body>

</html>