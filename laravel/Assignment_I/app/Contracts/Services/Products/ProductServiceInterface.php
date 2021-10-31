<?php

namespace App\Contracts\Services\Products;

use Illuminate\Http\Request;

interface ProductServiceInterface
{
    /**
     * To get products
     * @return $products
     */
    public function getProducts();

    /**
     * To get trashproducts
     * @return $products
     */
    public function getTrashProducts();

    /**
     * Add new product
     * @param $request
     */
    public function addProduct($request);

    /**
     * update
     * @param $request, $product
     */
    public function updateProduct($request, $product);

    /**
     * delete
     * @param $product
     */
    public function deleteProduct($product);
}
