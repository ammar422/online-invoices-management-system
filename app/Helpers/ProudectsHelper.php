<?php

use App\Models\Product;

function getProductsName()
{
    return Product::products();
}
