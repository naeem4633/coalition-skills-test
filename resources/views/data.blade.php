<!DOCTYPE html>
<html>
<head>
    <title>Submitted Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1>Submitted Data</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Quantity in Stock</th>
                <th>Price per Item</th>
                <th>Total Value</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
                <tr>
                    <td>{{ $item['product_name'] }}</td>
                    <td>{{ $item['quantity_in_stock'] }}</td>
                    <td>{{ $item['price_per_item'] }}</td>
                    <td>{{ $item['total_value'] }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3">Sum Total</td>
                <td>{{ array_sum(array_column($data, 'total_value')) }}</td>
            </tr>
        </tfoot>
    </table>
</div>
</body>
</html>
