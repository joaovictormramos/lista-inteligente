<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <table class="table">
        <thead>
            <tr>
                <th></th>
                <th>Marca</th>
                <th>Ações</th>
            </tr>
        </thead>
    @foreach ($brands as $brand)
        <tr>
            <td>
            @if($brand->brand_img != "")
                <img src="/storage/images/{{$brand->brand_img}}" width="200px" alt="não achado">
            @endif
            </td>
            <td>
                <p>{{$brand->brand_name}}</p>
            </td>
            <td>
                <a href="/admin/editar-marca/{{$brand->id}}" class="btn btn-warning">Editar</a>
                <a href="/admin/excluir-marca/{{$brand->id}}" class="btn btn-danger">Excluir</a>
            </td>
        </tr>
    @endforeach
    </table>

    <a class="btn btn-primary" href="/admin/cadastrar-marca">Cadastrar marca</a>
    <a class="btn btn-danger" href="/admin/gerenciar">Voltar</a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>