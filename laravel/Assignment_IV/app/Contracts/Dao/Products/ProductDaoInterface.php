<?php

namespace App\Contracts\Dao\Products;

interface ProductDaoInterface
{
    /**
     * To get products
     * @return $products
     */
    public function getProducts();

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
