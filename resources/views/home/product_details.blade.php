<!DOCTYPE html>
<html>

<head>
  @include('home.css')
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('home.header')

  </div>
  <div style="display: flex; justify-content: center; align-items: center; height: 100vh;">
    <div style="display: flex; justify-content: center; align-items: center; width: 100%; max-width: 600px; margin: 10px;">
      <div style="display: flex; flex-direction: column; align-items: center; border: 1px solid #ccc; padding: 20px;">
        <div style="display: flex; justify-content: center; align-items: center; width: 100px; height: 100px;">
          <img style="max-width: 100%; max-height: 100%; object-fit: cover;" src="/products/{{$data->image}}" alt="{{ $data->title }}">
        </div>
        <div style="text-align: center; margin-top: 10px;">
          <h6>Title: {{ $data->title }}</h6>
          <h6>
            Price: <span>${{ $data->price }}</span>
          </h6>
        </div>
      </div>
    </div>
  </div>

  @include('home.footer')
</body>

</html>