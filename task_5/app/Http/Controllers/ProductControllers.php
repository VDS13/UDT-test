<?php
    namespace App\Http\Controllers;

    use App\Models\Product;
    use Illuminate\Http\Request;

    class ProductController extends Controller {
        public function index() {
            return Product::all();
            return view("products.index" , compact("product"));
        }

        public function store(Request $request) {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'art' => 'required|string|max:255',
                'price' => 'required|numeric|min:0',
                'quantity' => 'required|integer|min:0',
            ]);
            Product::create($validated);
            return redirect()->route('products.index');
        }

        public function update(Request $request, int $id) {
            $product = Product::findOrFail($id);
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'art' => 'required|string|max:255',
                'price' => 'required|numeric|min:0',
                'quantity' => 'required|integer|min:0',
            ]);
            $product->update($validated);
            return redirect()->route('products.index');
        }
        public function destroy($id) {
            $product = Product::findOrFail($id);
            $product->delete();
            return redirect()->route('products.index');
        }
    }