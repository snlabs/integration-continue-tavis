<?php
/**
 * Created by PhpStorm.
 * User: Saidi Nizar
 * Date: 10/03/2019
 * Time: 19:16
 */
namespace App\Tests;

use App\Entity\Product;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    /**
     * @dataProvider pricesForFoodProduct
     */
    public function testcomputeTVAFoodProduct($price, $expectedTva)
    {

        $product = new Product();
        $product->setName('Un produit');
        $product->setType(Product::FOOD_PRODUCT);
        $product->setPrice($price);

        $this->assertSame($expectedTva, $product->computeTVA());
    }
    public function pricesForFoodProduct()
    {
        return [
            [0, 0.0],
            [20, 1.1],
            [100, 5.5]
        ];
    }
  /*  public function testComputeTVAOtherProduct()
    {
        $product = new Product();
        $product->setName('Un autre produit');
        $product->setType('Un autre type de produit');
        $product->setPrice(20);
        $this->assertSame(3.92, $product->computeTVA());
    }
    public function testNegativePriceComputeTVA()
    {
        $product = new Product();
        $product->setName('Un produit');
        $product->setType(Product::FOOD_PRODUCT);
        $product->setPrice(-20);
        $this->expectException('LogicException');

        $product->computeTVA();
    }*/

}