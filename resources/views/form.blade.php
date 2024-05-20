<!DOCTYPE html>
<html>
<head>
    <title>Product Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1>Product Form</h1>
    <form id="productForm">
        @csrf
        <div class="mb-3">
            <label for="product_name" class="form-label">Product Name</label>
            <input type="text" class="form-control" id="product_name" name="product_name" required>
        </div>
        <div class="mb-3">
            <label for="quantity_in_stock" class="form-label">Quantity in Stock</label>
            <input type="number" class="form-control" id="quantity_in_stock" name="quantity_in_stock" required>
        </div>
        <div class="mb-3">
            <label for="price_per_item" class="form-label">Price per Item</label>
            <input type="number" step="0.01" class="form-control" id="price_per_item" name="price_per_item" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <div id="responseMessage" class="mt-3"></div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#productForm').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                url: '/submit',
                method: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    $('#responseMessage').html('<div>' + response.success + '</div>');
                    $('#productForm')[0].reset();
                },
                error: function(response) {
                    $('#responseMessage').html('<div>Error saving data</div>');
                }
            });
        });
    });
</script>
</body>
</html>
