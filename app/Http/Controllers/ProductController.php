<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //
    public function index(){
        $product = Product::all();
        return view('index', ['product' => $product]);
    }

    // Display the specified product
    public function show($id){
        $product = Product::findOrFail($id);
        return view('show', ['product' => $product]);
    }

    // Show the form for creating a new product
    public function create()
    {
        // Add any additional logic needed for the create form
        return view('create');
    }

    // Store a newly created product in the database
    public function store(Request $request){
        // Validate the request data
        $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'details' => 'required|string',
            'publish' => 'required|boolean',
        ]);

        // Create and save the new product
        $product = new Product();
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->details = $request->input('details');
        $product->publish = $request->input('publish');
        $product->save();

        // Redirect to the index page with a success message
        return redirect()->route('product.index');
    }

    // Delete Product
    public function destroy(Product $product){
        $product->delete();

        return redirect()->route('product.index')->with('success', 'Product deleted successfully.');
    }

    public function edit(Product $product)
    {
        return view('edit', compact('product'));
    }

    public function update(Request $request, Product $product){
        // Validate the request data
        $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'details' => 'required|string',
            'publish' => 'required|boolean',
        ]);

        // Update the product with the new values
        $product->update([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'details' => $request->input('details'),
            'publish' => $request->input('publish'),
        ]);

        // Redirect to the index page with a success message
        return redirect()->route('product.index')->with('success', 'Product updated successfully.');
    }


    public function search(Request $request){
        $query = $request->input('query');

        // Convert the query to lowercase for case-insensitive search
        $query = strtolower($query);

        $product = Product::where('name', 'LIKE', "%$query%")
            ->orWhere('price', 'LIKE', "%$query%")
            ->orWhere('details', 'LIKE', "%$query%")
            ->orWhere('publish', $query === 'yes' ? 1 : ($query === 'no' ? 0 : null))
            ->get();

        return view('index', compact('product'));
    }
}
