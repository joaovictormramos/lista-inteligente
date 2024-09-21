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
                    <th></th>
                    <th>Estabelecimento</th>
                    @can('isSuperadmin')
                    <th>Ações</th>
                    @endcan
                </tr>
            </thead>
            @foreach ($stores as $store)
            <tbody>
                <tr>
                    <td style="text-align: center; vertical-align: middle;">
                        @if ($store->store_img != "")
                        <a href="">
                            <img src="/storage/images/{{$store->store_img}}" style="max-height: 25px; width: auto;" alt="">
                        </a>
                        @endif
                        </td>
                        <td>
                            <input type="hidden" name="store_id" value="{{$store->id}}">
                            <p>{{$store->store_name}} - {{$store->store_address}}</p>
                        </td>
                    @can('isSuperadmin')
                    <td>
                        <a href="/admin/gerenciar-estoque/{{$store->id}}" class="btn btn-success">Gerenciar estoque</a>
                        <a href="/admin/editar-estabelecimento/{{$store->id}}" class="btn btn-warning">Editar dados do
                            estabelecimento</a>
                        <a href="/admin/excluir-estabelecimento/{{$store->id}}" class="btn btn-danger">Excluir estabelecimento</a>
                    </td>
                    @endcan
                </tr>
                @endforeach
            </tbody>
        </table>
        <a class="btn btn-primary" href="/admin/cadastrar-estabelecimento">Cadastrar estabelecimento</a>
        <a class="btn btn-danger" href="/admin/gerenciar">Voltar</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>
</html>