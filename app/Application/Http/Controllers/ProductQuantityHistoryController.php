<?php

namespace App\Application\Http\Controllers;

use App\Domain\Repositories\ProductQuantityHistoryRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class ProductQuantityHistoryController extends Controller
{
    private ProductQuantityHistoryRepositoryInterface $productQuantityHistoryRepositoryInterface;

    public function __construct(ProductQuantityHistoryRepositoryInterface $productQuantityHistoryRepositoryInterface)
    {
        $this->productQuantityHistoryRepositoryInterface = $productQuantityHistoryRepositoryInterface;
    }

    public function index() : Collection
    {
        return $this->productQuantityHistoryRepositoryInterface->index();
    }
}
