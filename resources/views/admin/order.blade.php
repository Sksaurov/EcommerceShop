<!DOCTYPE html>
<html>
  <head> 
   @include('admin.css')
  </head>
  <body>
    @include('admin.header')
    @include('admin.sidebar')
    
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
          Orders:
           </div>
           
      </div>
      <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Customer Name</th>
      <th scope="col">Address</th>
      <th scope="col">Phone</th>
      <th scope="col">Product Title</th>
      <th scope="col">Price</th>
      <th scope="col">Image</th>
      <th scope="col">Status</th>
      <th scope="col">Change Status</th>
      

    
    </tr>
  </thead>
  <tbody>
    @foreach ($data as $datas )
    <tr>
      
      <td>{{$datas->name}}</td>
      <td>{{$datas->rec_address}}</td>
      <td>{{$datas->phone}}</td>
      <td>{{$datas->product->title}}</td>
      <td>{{$datas->product->price}}</td>
      <td>
        <img style="width:80px; height:50px; " src="/products/{{$datas->product->image}}" alt="">
      </td>
      <td>{{$datas->status}}</td>
      <td>
        <a class="btn btn-primary" href="{{url('admin/ontheway',$datas->id)}}">On the way</a>
        <a class="btn btn-success" href="{{url('admin/delivered',$datas->id)}}">Delivered</a>
      </td>
    </tr>


    @endforeach
   
   
  </tbody>
</table>
    </div>
    <!-- JavaScript files-->
    <script src="{{asset('admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('admincss/js/front.js')}}"></script>
  </body>
</html>