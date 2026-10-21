<?php

namespace App\Http\Controllers;

use App\Services\CatalogService;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __construct(
        private readonly CatalogService $catalogService
    ) {}

    public function index(): View {
        $items = $this->catalogService->featured();
        return view('home', [
            'items' => $items,
        ]);
    }
}
