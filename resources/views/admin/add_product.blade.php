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
           <h3 class="text-white" >Add product</h3>
      </div>
      <div class="container">
    <form action="{{url('admin/upload_product')}}" method="post" enctype="multipart/form-data" >
        @csrf
        <div class="mb-1 w-25">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" required >
        </div>

        <div class="mb-1 w-25">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description" rows="3" required ></textarea>
        </div>

        <div class="mb-1 w-25">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control-file" name="image" id="exampleFormControlFile1"  >
        </div>

        <div class="mb-1 w-25">
            <label for="price" class="form-label">Price</label>
            <input type="text" class="form-control" id="price" name="price"required >
        </div>

        <div class="mb-1 w-25">
            <label for="category" class="form-label">Category</label>
            <select class="form-select" id="category" name="category"   required>
                <option>Select an option</option>
               
                @foreach ($data as $data)
                <option value="{{$data->category_name}}">
                {{$data->category_name}}
                </option>
                @endforeach
            </select>
        </div>

        <div class="mb-1 w-25">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="text" class="form-control" id="quantity" name="quantity" required >
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