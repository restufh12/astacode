<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Faq;
use App\Models\Team;
use App\Models\Client;
use App\Models\Product;
use App\Models\Portfolio;
use App\Models\portfolioGallery;
use App\Models\Testimonial;
use App\Models\Article;

class HomeController extends Controller
{

    public function index()
    {   
        $services = Service::all();
        $faqs     = Faq::all();
        $teams    = Team::all();
        $clients  = Client::all();
        $products = Product::all();
        $testimonials = Testimonial::all();
        $articles = Article::take(3)->get();

        $portfolio_categories   =   Portfolio::distinct()->get(['category']);
        $default_galleries      =   portfolioGallery::whereIn('id', function($query){
                                    $query->selectRaw('MAX(id)')
                                        ->from(with(new portfolioGallery)->getTable())
                                        ->where('defaultYN', '1')
                                        ->where('deleted_at', NULL)
                                        ->groupBy('portfolio_id');
                                    })->get();

    	return view('index')->with([
            'services' => $services,
            'faqs' => $faqs,
            'teams' => $teams,
            'clients' => $clients,
            'products' => $products,
            'portfolio_categories' => $portfolio_categories,
            'default_galleries' => $default_galleries,
            'testimonials' => $testimonials,
            'articles' => $articles,
        ]);
    }

    public function portfolio_details($id)
    {
        $portfolio           = Portfolio::findOrFail($id);
        $portfolio_galleries = PortfolioGallery::with('portfolio')->where('portfolio_id', $id)->get();

        return view('portfolio-details')->with([
            'portfolio' => $portfolio,
            'portfolio_galleries' => $portfolio_galleries
        ]);
    }

    public function article_details($id)
    {
        $article = Article::findOrFail($id);

        return view('article-details')->with([
            'article' => $article,
        ]);
    }
}