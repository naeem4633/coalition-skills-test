<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function showForm()
    {
        return view('form');
    }

    public function submitForm(Request $request)
    {
        $validated = $request->validate([
            'product_name' => 'required|string|max:255',
            'quantity_in_stock' => 'required|integer|min:0',
            'price_per_item' => 'required|numeric|min:0',
        ]);

        $data = [
            'product_name' => $validated['product_name'],
            'quantity_in_stock' => $validated['quantity_in_stock'],
            'price_per_item' => $validated['price_per_item'],
            'datetime_submitted' => now()->toDateTimeString(),
            'total_value' => $validated['quantity_in_stock'] * $validated['price_per_item'],
        ];

        $filePath = storage_path('app/data.json');
        $existingData = file_exists($filePath) ? json_decode(file_get_contents($filePath), true) : [];

        $existingData[] = $data;

        file_put_contents($filePath, json_encode($existingData, JSON_PRETTY_PRINT));

        return response()->json(['success' => 'Data saved successfully']);
    }

    public function showData()
    {
        $filePath = storage_path('app/data.json');
        $data = file_exists($filePath) ? json_decode(file_get_contents($filePath), true) : [];

        return view('data', ['data' => $data]);
    }
}
