<?php

namespace App\Http\Controllers;

use App\Models\AboutPill;
use App\Models\AboutSection;
use App\Models\AboutStat;
use App\Models\CatalogItem;
use App\Models\Client;
use App\Models\ContactInfo;
use App\Models\Hero;
use App\Models\HeroStat;
use App\Models\Product;
use App\Models\Project;
use App\Models\Service;
use App\Models\Video;

class HomeController extends Controller
{
    public function index()
    {
        $hero         = Hero::first();
        $heroStats    = HeroStat::orderBy('order_index')->get();
        $about        = AboutSection::first();
        $aboutPills   = AboutPill::orderBy('order_index')->get();
        $aboutStats   = AboutStat::orderBy('order_index')->get();
        $services     = Service::where('is_active', true)->orderBy('order_index')->get();
        $products     = Product::where('is_active', true)->orderBy('order_index')->get();
        $catalogItems = CatalogItem::where('is_active', true)->orderBy('order_index')->get();
        $projects     = Project::where('is_active', true)->orderBy('order_index')->get();
        $clients      = Client::where('is_active', true)->orderBy('order_index')->get();
        $videos       = Video::where('is_active', true)->orderBy('order_index')->get();
        $contactInfo  = ContactInfo::first();

        return view('front.home', compact(
            'hero', 'heroStats', 'about', 'aboutPills', 'aboutStats',
            'services', 'products', 'catalogItems', 'projects', 'clients', 'videos', 'contactInfo'
        ));
    }
}
