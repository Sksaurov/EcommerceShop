<!DOCTYPE html>
<html>

<head>
  @include('home.css')
</head>

<body>
  <div class="hero_area">

    @include('home.header')
  
  </div>

  <table class="table">
  <thead>
    <tr>
      <th scope="col">Product title</th>
      <th scope="col">Product Price</th>
      <th scope="col">Delivery Status</th>
      <th scope="col">Product Image</th>
      

   
    </tr>
  </thead>
  <tbody>
    @foreach ( $maindata as $main )
    <tr>
     <td>{{$main->product->title}}</td>
     <td>{{$main->product->price}}</td>
     <td>{{$main->status}}</td>
     <td>
      <img width="70px;" src="products/{{$main->product->image}}" alt="">
     </td>
   </tr>
    @endforeach
   
   
  </tbody>
</table>




  @include('home.footer')

</body>

</html>