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
      
           </div>
           <h5 >Add category</h5>
           <form action="{{url('admin/add_category')}}" method="post" >
           @csrf
                <div>
                <input type="text" name="category" >
                <button class="btn btn-success" >submit</button>
                </div>
                
            </form>
           
      </div>
      <div class=" bordered" >
      <table class="table table-dark table-bordered">
  <thead>
    <tr class="table-bordered" >
      <th scope="col">Category No</th>
      <th scope="col">Category name</th>
      <th scope="col">Delete</th>
      <th scope="col">Edit</th>
    </tr>
  </thead>
  <tbody>
    
        @foreach ($data as $item )
        <th scope="row">{{$item->id}}</th>
      <td>{{$item->category_name}}</td>
      <td>
        <a href="{{url('admin/delete_category',$item->id)}}">
            <button class="btn btn-warning" type="submit" >delete</button>
        </a>
      </td>
      <td>
        <a href="{{url('admin/edit_category',$item->id)}}">
            <button class="btn btn-primary" type="submit">Edit</button>
        </a>
      </td>
     </tr>
        @endforeach
        <tr>
     
   </tbody>
</table>
      </div>
      
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