<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar produto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <form action="/admin/cadastrar-marca" method="post">
        @csrf
        <input type="hidden" name="id" value="{{$brand->id}}">

        @if ($brand->brand_img != "")
            <img src="/storage/images/{{$brand->brand_img}}" style="width: 70px" alt="">
        @endif

        <label for="name">Marca</label>
        <input type="text" name="name" id="name" value="{{$brand->brand_name}}">

        <label for="brand_image">Imagem</label>
        <input type="file" name="brand_image" accept="image/*" id="">

        @if ($brand->id != 0)
        <button class="btn btn-primary">Salvar alterações</button>
        @else
        <button class="btn btn-primary">Cadastrar</button>
        @endif
    </form>
    <a class="btn btn-primary" href="/admin/marcas">Voltar</a>
</body>
</html>