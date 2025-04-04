<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Blog;
use App\Models\BlogSettings;
use App\Models\Experience;
use App\Models\Feedback;
use App\Models\FeedbackSettings;
use App\Models\Hero;
use App\Models\PortfolioCategory;
use App\Models\PortfolioItem;
use App\Models\PortfolioSettings;
use App\Models\Service;
use App\Models\SkillsItem;
use App\Models\SkillsSettings;
use App\Models\TyperTitle;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    function index()
    {
        $hero = Hero::first();
        $typerTitles = TyperTitle::all();
        $services = Service::all();
        $about = About::first();
        $portfolioSettings = PortfolioSettings::first();
        $portfolioCategories = PortfolioCategory::whereHas('items', function ($q) {
            $q->where('status', 'published');
        })->with(['items' => function ($q) {
            $q->where('status', 'published');
        }])->get();

        $portfolioItems = PortfolioItem::where('status', 'published')->get();
        $skillsSettings = SkillsSettings::first();
        $skillsItems = SkillsItem::all();
        $experience = Experience::first();
        $feedbacks = Feedback::all();
        $feedbackSettings = FeedbackSettings::first();
        $blogSettings = BlogSettings::first();
        $blogs = Blog::where('status', 'published')->get();

        return view(
            'frontend.home',
            compact(
                'hero',
                'typerTitles',
                'services',
                'about',
                'portfolioSettings',
                'portfolioCategories',
                'portfolioItems',
                'skillsSettings',
                'skillsItems',
                'experience',
                'feedbacks',
                'feedbackSettings',
                'blogSettings',
                'blogs',
            )
        );
    }

    function showPortfolio($id)
    {
        $portfolioItem = PortfolioItem::findOrFail($id);
        return view('frontend.portfolio-details', compact('portfolioItem'));
    }

    public function showBlog($id)
    {
        $blog = Blog::where('id', $id)->where('status', 'published')->first();
        if (!$blog) {
            return redirect('/');
        }

        $blogs = Blog::where('status', 'published')->get();
        if ($blogs->isEmpty()) {
            return redirect('/');
        }
    
        $previousPost = Blog::where('status', 'published')
            ->where('id', '<', $blog->id)
            ->orderBy('id', 'desc')
            ->first();
    
        $nextPost = Blog::where('status', 'published')
            ->where('id', '>', $blog->id)
            ->orderBy('id', 'asc')
            ->first();
    
        return view('frontend.blog-details', compact('blog', 'blogs', 'previousPost', 'nextPost'));
    }
    

    function blog()
    {
        $blogs = Blog::where('status', 'published')->latest()->paginate(9);
        if ($blogs->isEmpty()) {
            return redirect('/');
        }
        return view('frontend.blog', compact('blogs'));
    }
}
