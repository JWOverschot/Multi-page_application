<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\CategoryProduct;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('product_name', 'asc')->get();
        return view('products.index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('category_name', 'asc')->get();
        return view('products.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'media' => 'required',
            'category' => 'required',
            'specifications' => 'required'
        ]);

        // Create product
        $post = new Product;
        $post->product_name = $request->input('name');
        $post->product_price = $request->input('price');
        $post->product_discount_percentage = $request->input('discount-percentage');
        $post->product_description = $request->input('description');
        $post->save();
        // Handle categories
        foreach($request->input('category') as $selectedCategory){
            $category = new CategoryProduct;
            $category->category_id_fk = $selectedCategory;
            $category->product_id_fk = $product->product_id;
            $category->save();
        }

        return redirect('/products')->with('success', 'Product Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::where('product_id', $id)->first();
        return view('products.show')->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::orderBy('category_name', 'asc')->get();
        $selectedOptionsArray = CategoryProduct::select('category_id_fk')->where('product_id_fk', $id)->get()->toArray();
        $product = Product::where('product_id', $id)->first();
        return view('products.edit')->with(['product' => $product, 'categories' => $categories]);
        $options = [];
        $selectedOptions = [];

        foreach ($selectedOptionsArray as $selectedOption) {
            array_push($selectedOptions, $selectedOption['category_id_fk']);
        }

        foreach ($categories as $category) {
            $options[$category->category_id] = $category->category_name;
        }

        return view('products.edit')->with(['product' => $product, 'categories' => $categories, 'medias' => $medias, 'specifications' => $specifications, 'options' => $options, 'selectedOptions' => $selectedOptions]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'media' => 'required',
            'category' => 'required',
            'specifications' => 'required'
        ]);

        // Create product
        $post = Product::where('product_id', $id);
        $post->product_name = $request->input('name');
        $post->product_price = $request->input('price');
        $post->product_discount_percentage = $request->input('discount-percentage');
        $post->product_description = $request->input('description');
        $post->save();
        //delete exsisting categories for this product
        $delCat = CategoryProduct::where('product_id_fk', $id)->delete();

        // Handle categories
        foreach($request->input('category') as $selectedCategory){
            $category = new CategoryProduct;
            $category->category_id_fk = $selectedCategory;
            $category->product_id_fk = $product->product_id;
            $category->save();
        }

        return redirect('/products')->with('success', 'Product Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
