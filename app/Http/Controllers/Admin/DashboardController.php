<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\CatalogItem;
use App\Models\Client;
use App\Models\Product;
use App\Models\Project;
use App\Models\Service;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'employees'     => Admin::where('is_super', false)->count(),
            'services'      => Service::count(),
            'products'      => Product::count(),
            'catalog_items' => CatalogItem::count(),
            'projects'      => Project::count(),
            'clients'       => Client::count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}
