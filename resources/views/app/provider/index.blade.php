Provider blade
@if(count($providers) > 0 && count($providers) < 10)
    <h2>Existem alguns fornecedores</h2>
@else
    <h2>Não há fornecedores</h2>
@endif
@dd($providers)


<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h2>{{$name}}</h2>
@if($name != 'Fornecedor 5')
    <h2>Sim</h2>
@else
    <h2>Não<h2>
@endif
</body>
</html>
 -->


