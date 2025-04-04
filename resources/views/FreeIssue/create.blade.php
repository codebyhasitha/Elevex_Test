<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Free Issue</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="form-container">
        <div class="row" style="margin-top:5%">
            <div class="col-6" style="text-align:right">
                <h4>FREE ISSUE LABEL</h4>
            </div>
            <div class="col-6">
                <input class="form-control-md" name="label" id="label" placeholder="Enter the free issue label" style="width:50%">
            </div>
        </div>
        <div class="row">
            <div class="col-6" style="text-align:right">
                <h4>TYPE</h4>
            </div>
            <div class="col-6">
                <select class="form-select" name="type" id="type" style="width:50%">
                    <option selected>Select the type</option>
                    <option value="Flat">Flat</option>
                    <option value="Multiple">Multiple</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-6" style="text-align:right">
                <h4>PURCHASE PRODUCT</h4>
            </div>
            <div class="col-6">
                <select class="form-select" name="product_id" id="productSelect" style="width:50%">
                    <option selected>Select the product</option>
                    @foreach($products as $product)
                    <option value="{{$product->id}}">{{$product->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-6" style="text-align:right">
                <h4>FREE PRODUCT</h4>
            </div>
            <div class="col-6">
                <input type="text" class="form-control-md" name="free_product" id="free_product"  style="width:50%" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col-6" style="text-align:right">
                <h4>PURCHASE QUANTITY</h4>
            </div>
            <div class="col-6">
                <input type="text" class="form-control-md" name="purchase_quantity" id="purchase_quantity"  style="width:50%" placeholder="Enter the purchase quantity">
            </div>
        </div>
        <div class="row">
            <div class="col-6" style="text-align:right">
                <h4>FREE QUANTITY</h4>
            </div>
            <div class="col-6">
                <input type="text" class="form-control-md" name="free_quantity" id="free_quantity"  style="width:50%" placeholder="Enter the free quantity">
            </div>
        </div>
       
        <div class="row">
            <div class="col-12" style="text-align:center">
                <button data-bs-toggle="modal" data-bs-target="#save" class="btn btn-primary" type="button" style="margin-top:2%;">ADD</button>
            </div>
        </div>

        <div class="row">
            <div class="col-12" style="text-align:center">
                <a class="btn btn-success" type="button" href="{{route('freeIssues.index')}}" style="margin-top:2%;">FREE ISSUES LIST</a>
            </div>
        </div>

        <div class="modal fade" style="font-family:poppins" id="save" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">

                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h5 style="color:#000000">Are you sure to create?</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-bs-dismiss="modal">No</button>
                        <button class="btn btn-danger" type="submit" style="font-family: Poppins;border-width:0px;">Yes</button>
                    </div>
                </div>
            </div>
        </div>
            </form>
        </div>
    </div>

    <script src="{{ asset('js/product/add_product.js') }}"></script>
</body>
</html>
