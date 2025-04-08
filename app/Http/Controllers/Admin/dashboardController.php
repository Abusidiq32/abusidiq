<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Feedback;
use App\Models\PortfolioItem;
use App\Models\SkillsItem;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    //
    function index(){
        $blogCount = Blog::count();
        $portfolioCount = PortfolioItem::count();
        $feedbackCount = Feedback::count();
        $skillsCount = SkillsItem::count();
        return view('admin.dashboard', compact(
            'blogCount',
            'portfolioCount',
            'feedbackCount',
            'skillsCount'
        ));
    }
}
