<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Hero;
use App\Models\PortfolioCategory;
use App\Models\PortfolioItem;
use App\Models\PortfolioSettings;
use App\Models\Service;
use App\Models\TyperTitle;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    function index(){
        $hero = Hero::first();
        $typerTitles = TyperTitle::all();
        $services = Service::all();
        $about = About::first();
        $portfolioSettings = PortfolioSettings::first();
        $portfolioCategories = PortfolioCategory::whereHas('items', function($q){
            $q->where('status', 'published'); 
        })->with(['items' => function($q){
            $q->where('status', 'published');
        }])->get();
        
        $portfolioItems = PortfolioItem::where('status', 'published')->get();
        return view('frontend.home', 
                compact(
                    'hero', 
                    'typerTitles', 
                    'services', 
                    'about', 
                    'portfolioSettings', 
                    'portfolioCategories',
                    'portfolioItems'
                ));
    }

    function showPortfolio($id){
        $portfolioItem = PortfolioItem::findOrFail($id);
        return view('frontend.portfolio-details', compact('portfolioItem'));
    }
}
