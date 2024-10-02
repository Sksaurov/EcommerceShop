<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <center>
      Name    : {{$data->name}}
      Address : {{$data->rec_address}}
      Phone   : {{$data->phone}}
 Product title: {{$data->product->title}}
 Product Price: {{$data->product->price}}
      Image   :
      <img width:50px src="products/{{$data->product->image}}" alt="">

    </center>
</body>
</html>