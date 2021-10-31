<?php
namespace App\Dao\Products;

use App\Contracts\Dao\Products\ProductDaoInterface;
use App\Models\Product;

class ProductDao implements ProductDaoInterface
{
    /**
     * To get products
     * @return $products
     */
    public function getProducts()
    {
        $products = Product::latest()->paginate(10);
        return $products;
    }

    /**
     * To get trashproducts
     * @return $products
     */
    public function getTrashProducts()
    {
        $products = Product::onlyTrashed()->get();
        return $products;
    }

    /**
     * Add new product
     * @param $request
     */
    public function addProduct($request)
    {
        Product::create($request->all());
    }

    /**
     * update
     * @param $request, $product
     */
    public function updateProduct($request, $product)
    {
        $product->update($request->all());
    }

    /**
     * delete
     * @param $product
     */
    public function deleteProduct($product)
    {
        $product->delete();
    }
}
