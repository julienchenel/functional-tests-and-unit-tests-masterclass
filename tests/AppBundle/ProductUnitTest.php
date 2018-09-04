<?php


use AppBundle\Entity\Product;
use PHPUnit\Framework\TestCase;

class ProductUnitTest extends TestCase
{
    protected $product;

//    /**
//     * @dataProvider pricesForFoodProduct
//     */
    public function testComputeTVAFoodProduct()
    {
        $this->product = new Product('Un produit', Product::FOOD_PRODUCT, 20);

        $this->assertSame(1.1, $this->product->computeTVA());
    }

    public function XXXXXXXXXXXXXXX()
    {
        /**
         * TRAINING 1
         * En se basant sur la fonction de test ci-dessus,
         * créez un test qui permette de tester si le montant
         * de la TVA est celui qu'on attend bien pour un produit
         * NON alimentaire. Définissez d'abord le prix que vous voulez
         * en 3ème argument et calculez la valeur attendue
         * A vos calculette ! Et, pensez à bien nommer votre fonction de test.
         */
    }

    public function testNegativePriceComputeTVA()
    {
        $this->product = new Product('Un produit', Product::FOOD_PRODUCT, -20);

        $this->expectException('LogicException');

        $this->product->computeTVA();
    }

//    public function pricesForFoodProduct()
//    {
//        return [
//            [0, 0.0],
//            [20, 1.1],
//            [100, 5.5]
//        ];
//    }
}