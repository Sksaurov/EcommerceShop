<!DOCTYPE html>
<html>

<head>
  @include('home.css')
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('home.header')

   

    <table class="table table-striped">
  <thead>
    <tr>
      
      <th scope="col">Title</th>
      <th scope="col">price</th>
      <th scope="col">image</th>
      <th scope="col">Remove</th>

    </tr>
  </thead>
  <tbody>
<?php
$value= 0;
?>

   @foreach ($cart as $carts )
   <tr>
       <td>{{ $carts->product->title }}</td>
       <td>{{ $carts->product->price }}</td>
      <td>
        <img style="width:80px;" src="/products/{{$carts->product->image}}" alt="">
      </td>
      <td><a class="btn btn-warning" href="{{url('cart_delete',$carts->id)}}">Remove</a></td>
    </tr>
    <?php
     $value= $value+$carts->product->price;
    ?>

   @endforeach
   

    
  </tbody>
</table>
<form action="{{url('confirm_order')}}" method="post">
        @csrf
        <div class="mb-1 w-25">
            <label for="title" class="form-label">Name:</label>
            <input type="text" class="form-control" id="title" name="name" value="{{Auth::user()->name}}" required >
        </div>

        <div class="mb-1 w-25">
            <label for="description" class="form-label">Address</label>
            <textarea class="form-control" name="address" rows="3" required >{{Auth::user()->address}}</textarea>
        </div>
        <div class="mb-1 w-25">
            <label for="title" class="form-label">Phone:</label>
            <input type="text" class="form-control" id="title" name="phone" required value="{{Auth::user()->phone}}" >
        </div>
        <input class="btn btn-primary" type="submit" value="Cash on delivery" >
        <a href="{{url('stripe',$value)}}" class="btn btn-success" >Pay via card</a>
    </form>

<div>
    Total Price: <?php echo $value ?>
</div>
    
 

  
  @include('home.footer')

</body>

</html>