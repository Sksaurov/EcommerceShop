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
           
      </div>
      <div class="container">
    <form action="{{url('admin/editing_product',$data->id)}}" method="post" enctype="multipart/form-data" >
        @csrf
        <div class="mb-1 w-25">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" required value="{{$data->title}}">
        </div>

        <div class="mb-1 w-25">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description" rows="3"  required  >{{$data->description}}</textarea>
        </div>

       

        <div class="mb-1 w-25">
            <label for="price" class="form-label">Price</label>
            <input type="text" class="form-control" id="price" name="price"required value="{{$data->price}}" >
        </div>

    

        <div class="mb-1 w-25">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" class="form-control" id="quantity" name="quantity" required value="{{$data->quantity}}" >
        </div>

        <div class="mb-1 w-25">
            <label for="category" class="form-label">Category</label>
            <select class="form-select" id="category" name="category"   required>
                <option value="{{$data->category}}"> 
                {{$data->category}}
                </option>
               
            </select>
        </div>
        <div class="mb-1 w-25">
            <label for="Current Image:" class="form-label">Current Image</label>
            <img style="width:30px; height:30px;" src="/products/{{$data->image}}" alt="">
            
            <input type="file" class="form-control-file" name="image" id="exampleFormControlFile1"  >
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
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