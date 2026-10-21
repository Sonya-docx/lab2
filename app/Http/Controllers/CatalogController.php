<?php

namespace App\Http\Controllers;

use App\Services\CatalogService;
use Illuminate\View\View;

class CatalogController extends Controller
{
    public function __construct(
        private readonly CatalogService $catalogService
    ) {}

    public function index(): View {
        $items = $this->catalogService->all();
        return view('catalog.index', [
            'items' => $items,
        ]);
    }

    public function show(string $slug): View
    {
        $item = $this->catalogService->findBySlug($slug);

        if ($item === null) {
            abort(404);
        }

        return view('catalog.show', [
            'item' => $item,
        ]);
    }
}
