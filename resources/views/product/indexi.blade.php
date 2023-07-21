<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product indexi</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

    <table class="table table-bordered product-table" id="product-table" >
        <thead class="text-white">
        <tr>
          <th>Name</th>
          <th>Price</th>
        </tr>
        </thead>
        <tbody class="text-white" style="">
          @foreach ($products as $product)
          <li>
              <h3>{{ $product->name }}</h3>
              <p>{{ $product->price }}</p>
              <!-- Tampilkan informasi lainnya sesuai kebutuhan -->
          </li>
      @endforeach
        </tfoot>
      </table>



      <script>

      
      </script>
</body>
</html>