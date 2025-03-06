<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add SKU</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    {{-- <link href="{{ asset('css/add_region.css') }}" rel="stylesheet"> --}}
</head>
<body>
    <div class="form-container">
        {{-- @session('success')
            <div class="alert alert-success" role="alert"> {{ $value }} </div>
        @endsession --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div style="text-align:center">
            <h2>ADD SKU</h2>
        </div>

        {{-- <form action="process_sku.php" method="POST">
            <label>SKU ID</label>
            <input class="form-control" type="text" name="sku_id" placeholder="Automatically" readonly>

            <label>SKU Code *</label>
            <input type="text" name="sku_code" required>

            <label>SKU Name *</label>
            <input type="text" name="sku_name" required>

            <label>MRP *</label>
            <input type="number" name="mrp" required>

            <label>Distributor Price *</label>
            <input type="number" name="distributor_price" required>

            <label>Weight/Volume *</label>
            <select name="weight_volume" required>
                <option value="">Select</option>
                <option value="250g">250g</option>
                <option value="500g">500g</option>
                <option value="1kg">1kg</option>
            </select>

            <button type="submit">SAVE</button>
        </form> --}}

        <div style="text-align:center ">
            <form action="{{ route('sku.product_store') }}" method="POST">
                @csrf
                <div class="form-group row" style="margin-bottom: 2%">
                  <label for="sku_id" class="col-sm-2 col-form-label">SKU ID</label>
                  <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="sku_id" placeholder="Automatically">
                  </div>
                </div>
                <div class="form-group row" style="margin-bottom: 2%">
                  <label for="sku_code" class="col-sm-2 col-form-label">SKU Code *</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="sku_code" name="sku_code">
                  </div>
                </div>
                <div class="form-group row" style="margin-bottom: 2%">
                    <label for="sku_name" class="col-sm-2 col-form-label">SKU Name *</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="sku_name" name="sku_name">
                    </div>
                </div>
                <div class="form-group row" style="margin-bottom: 2%">
                    <label for="mrp" class="col-sm-2 col-form-label">MRP *</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="mrp" name="mrp">
                    </div>
                </div>
                <div class="form-group row" style="margin-bottom: 2%">
                    <label for="units" class="col-sm-2 col-form-label">Units Per Case *</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="units" name="units">
                    </div>
                </div>
                <div class="form-group row" style="margin-bottom: 2%">
                    <label for="distributor_price" class="col-sm-2 col-form-label">Distributor Price *</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="distributor_price" name="distributor_price">
                    </div>
                </div>
                <div class="form-group row" style="margin-bottom: 2%">
                    <label for="weight_volume" class="col-sm-2 col-form-label">Weight/Volume *</label>
                    <div class="col-sm-10">
                        <select class="form-select" aria-label="Default select example" id="weight_volume" name="weight_volume">
                            <option selected>Select</option>
                            <option value="250g">250g</option>
                            <option value="500g">500g</option>
                            <option value="1kg">1kg</option>
                          </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">SAVE</button>
              </form>
        </div>

    </div>

    <script src="{{ asset('js/product/add_product.js') }}"></script>
</body>
</html>
