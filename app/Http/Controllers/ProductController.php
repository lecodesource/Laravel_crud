<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create()
    {
        return view("product.create");
    }
    public function store(Request $request)
    {

        $validated = $request->validate(
            [
                "name" => "required|string",
                "quantity" => "required|numeric",
                "description" => "required|string",
                "price" => "required|numeric",
            ],
            [
                "name.required" => "le nom est obligatoire imbécile",
                "quantity.required" => " la quantité est obligatoire merci ",
                "quantity.numeric" => "la quantité est un nombre",
                "description.required" => "met moi la description  pardon",
                "price.required" => "le prix est obligatoire",
                "price.numeric" => "le prix doit être un nombre merci ",

            ]
        );

        $product = Product::create($validated);
        return redirect()->route('Products.show')->with('success', 'produit enregistré avec succés');
    }

    public function show()
    {
        $produits = Product::get();
        return view('product.get', compact('produits'));
    }

    public function edit(Request $request, $id)
    {
        $produits = Product::find($id);

        return view('product.edit', compact('produits'));
    }
    public function update(Request $request, $id)
    {

        $validated = $request->validate(
            [
                "name" => "required|string",
                "quantity" => "required|numeric",
                "description" => "required|string",
                "price" => "required|numeric",
            ],
            [
                "name.required" => "le nom est obligatoire imbécile",
                "quantity.required" => " la quantité est obligatoire merci ",
                "quantity.numeric" => "la quantité est un nombre",
                "description.required" => "met moi la description  pardon",
                "price.required" => "le prix est obligatoire",
                "price.numeric" => "le prix doit être un nombre merci ",

            ]
        );

        $product = Product::find($id);
        $product->update($validated);
        return redirect()->route('Products.show')->with('success', 'produit Modifié  avec succés');
    }
    public function destroy(Request $request, $id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('Products.show')->with('success', 'produit supprimé avec succés');
    }
}
