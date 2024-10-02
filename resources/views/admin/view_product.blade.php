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
          <form class="d-flex my-2" action="{{url('admin/search_product')}}" method="get" >
            @csrf
            <input  class="form-control me-4 w-25" type="search" placeholder="Search product" name="search">
            <button class="btn btn-outline-success mx-2" type="submit">Search</button>
        </form>
           </div>
           <h3 class="text-white" >Product Table</h3>
      </div>

      <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Category</th>
      <th scope="col">Price</th>
      <th scope="col">Quantity</th>
      <th scope="col">Image</th>
      <th scope="col">Update</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($data as $datas)
    <tr>
      <th scope="row">{{$datas->id}}</th>
      <td>{{$datas->title}}</td>
      <td>{!!Str::limit($datas->description,50)!!}</td>
      <td>{{$datas->category}}</td>
      <td>{{$datas->price}}</td>
      <td>{{$datas->quantity}}</td>
     
      <td>
      <img style="width: 70px; height: 50px;" src="/products/{{$datas->image}}" alt="image">
      </td>
      <td>
        <a href="{{url('admin/product_update', $datas->id)}}"><button type="submit" class="btn btn-danger" >Update</button></a>
        
      </td>
      <td>
        <a href="{{url('admin/product_delete', $datas->id)}}"><button type="submit" class="btn btn-danger" >Delete</button></a>
        
      </td>
    </tr>
    @endforeach
    
    
    
    
  </tbody>
</table>
{{$data->onEachside(1)->links()}}
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