<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Faq;
use App\Models\Team;
use App\Models\Client;
use App\Models\Product;
use App\Models\Portfolio;
use App\Models\PortfolioGallery;
use App\Models\Testimonial;
use App\Models\Article;
use App\Models\Setting;
use App\Models\Header;
use App\Models\Skill;
use App\Models\Reason;
use App\Models\Subscriber;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    private $company_setting;
    private $header_setting;
    private $services;

    public function __construct()
    {
        $this->company_setting = Setting::orderBy('id', 'desc')->first();
        $this->header_setting  = Header::orderBy('id', 'desc')->first();
        $this->services        = Service::all();
        View::share('company_setting', $this->company_setting);
        View::share('header_setting', $this->header_setting);
        View::share('services', $this->services);
    }

    public function index()
    {   
        $faqs         = Faq::all();
        $teams        = Team::all();
        $clients      = Client::all();
        $products     = Product::all();
        $testimonials = Testimonial::all();
        $articles     = Article::take(3)->get();
        $skills       = Skill::all();
        $reasons      = Reason::all();

        $portfolio_categories   =   Portfolio::distinct()->get(['category']);
        $default_galleries      =   PortfolioGallery::whereIn('id', function($query){
                                    $query->selectRaw('MAX(id)')
                                        ->from(with(new PortfolioGallery)->getTable())
                                        ->where('defaultYN', '1')
                                        ->where('deleted_at', NULL)
                                        ->groupBy('portfolio_id');
                                    })->get();

    	return view('index')->with([
            'faqs' => $faqs,
            'teams' => $teams,
            'clients' => $clients,
            'products' => $products,
            'portfolio_categories' => $portfolio_categories,
            'default_galleries' => $default_galleries,
            'testimonials' => $testimonials,
            'articles' => $articles,
            'skills' => $skills,
            'reasons' => $reasons,
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

    public function article(){
        $articles = Article::paginate(9);

        return view('article')->with([
            'articles' => $articles,
        ]);
    }

    public function article_details($id)
    {
        $article = Article::findOrFail($id);

        return view('article-details')->with([
            'article' => $article,
        ]);
    }

    public function send_mail_contact(Request $request){
    	$v_company_setting = Setting::orderBy('id', 'desc')->first();

        $data = [
            'name'=>$request->name,
            'email'=>$request->email,
            'subject'=>$request->subject,
            'bodyMessage'=>$request->message
        ];

        $request['to'] = $this->company_setting->company_email;

        try {
            Mail::send('emails.contact-email', $data, function($message) use ($request){
                $message->from($request->email);
                $message->to($request->to);
                $message->subject($request->subject);
            });

            return 'OK';
        } catch (Exception $ex) {
            return "We've got errors! ".$ex->getMessage();
        }
    }
}