<?php

namespace App\Services\Products;

use App\Contracts\Dao\Products\ProductDaoInterface;
use App\Contracts\Services\Products\ProductServiceInterface;

class ProductService implements ProductServiceInterface
{

    /**
     * product dao
     */
    private $productDao;
    /**
     * Class Constructor
     * @param ProductDaoInterface
     * @return
     */
    public function __construct(ProductDaoInterface $productDao)
    {
        $this->productDao = $productDao;
    }

    /**
     * To get products
     * @return $products
     */
    public function getProducts()
    {
        return $this->productDao->getProducts();
    }

    /**
     * Add new product
     * @param $request
     */
    public function addProduct($request)
    {
        $this->productDao->addProduct($request);
    }


    /**
     * update
     * @param $request, $product
     */
    public function updateProduct($request, $product)
    {
        $this->productDao->updateProduct($request, $product);
    }


    /**
     * delete
     * @param $product
     */
    public function deleteProduct($product)
    {
        $this->productDao->deleteProduct($product);
    }
}
