@extends('layouts.frontend')
@section('title', 'Astacode')
@section('class-header', '')

@section('hero-section')
    <section id="hero" class="d-flex align-items-center">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
              <h1>{{ $company_setting->slogan }}</h1>
              <h2>{{ $company_setting->sub_slogan }}</h2>
              <div class="d-lg-flex">
                <a href="#about" class="btn-get-started scrollto">Get Started</a>
                <a href="{{ $company_setting->video_url }}" class="venobox btn-watch-video" data-vbtype="video" data-autoplay="true"> Watch Video <i class="icofont-play-alt-2"></i></a>
              </div>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
              <img src="assets/img/hero-img.png" class="img-fluid animated" alt="">
            </div>
          </div>
        </div>
    </section>
@endsection

@section('content-main')
	  <!-- ======= Cliens Section ======= -->
    <section id="cliens" class="cliens section-bg">
      <div class="container">

        <div class="row" data-aos="zoom-in">

          @forelse($clients as $client)
          @php
            $photosrc = ( $client->logo == url('/storage') ? asset('admin/images/default.png') : url($client->logo) );
          @endphp

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <a href="{{ $client->url }}" target="_blank"><img src="{{ $photosrc }}" class="img-fluid" alt="{{ $client->name }}"></a>
          </div>

          @empty
            <div class="col-xl-12 col-md-12 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
              <div class="icon-box no-service">
                <div class="icon"><i class="fa fa-ban"></i></div>
                <h4>No Client</h4>
              </div>
            </div>
          @endforelse

        </div>

      </div>
    </section><!-- End Cliens Section -->

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>About Us</h2>
          <p>{{ $header_setting->about_us }}</p>
        </div>

        <div class="row content">
          {!! $company_setting->about_us !!}
        </div>

      </div>
    </section><!-- End About Us Section -->

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us section-bg">
      <div class="container-fluid" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">

            <div class="content">
              <h3>Why <strong>Us</strong></h3>
              <p>
                {{ $header_setting->why_us }}
              </p>
            </div>

            <div class="accordion-list">
              <ul>


                @forelse($reasons as $reason)
                  <li>
                    <a data-toggle="collapse" class="collapse" href="#accordion-list-{{$loop->index+1}}"><span>0{{$loop->index+1}}</span> {{$reason->reason}}<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                    <div id="accordion-list-{{$loop->index+1}}" class="collapse {{ ($loop->index+1) == '1' ? 'show' : '' }}" data-parent=".accordion-list">
                      <p>
                        {!! nl2br($reason->description) !!}
                      </p>
                    </div>
                  </li>
                @empty
                  <div class="col-lg-12 col-md-12 portfolio-item text-center">
                    No Reason
                  </div>
                @endforelse
              </ul>
            </div>

          </div>

          <div class="col-lg-5 align-items-stretch order-1 order-lg-2 img" style='background-image: url("assets/img/why-us.png");' data-aos="zoom-in" data-aos-delay="150">&nbsp;</div>
        </div>

      </div>
    </section><!-- End Why Us Section -->

    <!-- ======= Skills Section ======= -->
    <section id="skills" class="skills">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6 d-flex align-items-center" data-aos="fade-right" data-aos-delay="100">
            <img src="assets/img/skills.png" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 content" data-aos="fade-left" data-aos-delay="100">
            <h3>Skills</h3>
            <p class="font-italic">
              {{ $header_setting->skills }}
            </p>

            <div class="skills-content">

              @forelse($skills as $skill)
                <div class="progress">
                  <span class="skill">{{$skill->skill_name}} <i class="val">{{$skill->skill_score}}%</i></span>
                  <div class="progress-bar-wrap">
                    <div class="progress-bar" role="progressbar" aria-valuenow="{{$skill->skill_score}}" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              @empty
                <div class="col-lg-12 col-md-12 portfolio-item text-center">
                  No Skill
                </div>
              @endforelse
            </div>

          </div>
        </div>

      </div>
    </section><!-- End Skills Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Services</h2>
          <p>{{ $header_setting->services }}</p>
        </div>

        <div class="row">
          @forelse($services as $service)
          <div class="col-xl-3 col-md-6 d-flex align-items-stretch mb-5" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box width100">
              <div class="icon"><i class="{{ ($service->service_icon == '' ? 'fa fa-ban' : $service->service_icon) }}"></i></div>
              <h4><a href="">{{ $service->service_name }}</a></h4>
              <p>{{ nl2br($service->description) }}</p>
            </div>
          </div>
          @empty
            <div class="col-xl-12 col-md-12 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
              <div class="icon-box no-service">
                <div class="icon"><i class="fa fa-ban"></i></div>
                <h4>Service Not Available</h4>
              </div>
            </div>
          @endforelse
        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container" data-aos="zoom-in">

        <div class="row">
          <div class="col-lg-9 text-center text-lg-left">
            <h3>Call To Action</h3>
            <p>{{ $header_setting->call_to_action }}</p>
          </div>
          <div class="col-lg-3 cta-btn-container text-center">
            <a class="cta-btn align-middle" href="https://api.whatsapp.com/send?phone={{$company_setting->company_wa}}&text=Hallo%20{{$company_setting->company_name}}" class="float" target="_blank">Call To Action</a>
          </div>
        </div>

      </div>
    </section><!-- End Cta Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Portfolio</h2>
          <p>{{ $header_setting->portfolios }}</p>
        </div>


        <ul id="portfolio-flters" class="d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
          <li data-filter="*" class="filter-active">All</li>
          @foreach($portfolio_categories as $portfolio_category)
            <li data-filter=".{{cleanString($portfolio_category->category)}}">{{$portfolio_category->category}}</li>
          @endforeach
        </ul>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
          @forelse($default_galleries as $default_gallery)
            <div class="col-lg-4 col-md-6 portfolio-item {{cleanString($default_gallery->portfolio->category)}}">
              <div class="portfolio-img"><img src="{{$default_gallery->photo}}" class="img-fluid"></div>
              <div class="portfolio-info">
                <h4>{{$default_gallery->portfolio->project_name}}</h4>
                <p>{{$default_gallery->portfolio->category}}</p>
                <a href="{{$default_gallery->photo}}" data-gall="portfolioGallery" class="venobox preview-link" title="{{$default_gallery->portfolio->project_name}}"><i class="fa fa-image"></i></a>
                <a href="{{ route('portfolio.details', $default_gallery->portfolio->id) }}" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>
          @empty
            <div class="col-lg-12 col-md-12 portfolio-item text-center">
              Empty Portfolio
            </div>
          @endforelse
        </div>

      </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Team</h2>
          <p>{{ $header_setting->teams }}</p>
        </div>

        <div class="row">

          @forelse($teams as $team)
          @php
            $delaytime = 100 * ($loop->index+1);
            $photosrc = ( $team->photo == url('/storage') ? asset('admin/images/default.png') : url($team->photo) );
          @endphp
          <div class="col-lg-6 mt-4 mt-lg-0 mb-4">
            <div class="member d-flex align-items-start custom-h-250" data-aos="zoom-in" data-aos-delay="{{ $delaytime }}">
              <div class="pic"><img src="{{ $photosrc }}" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>{{ $team->name }}</h4>
                <span>{{ $team->position }}</span>
                <p>{!! nl2br($team->notes) !!}</p>
                <div class="social">
                  <a class="{{ $team->link_twitter == "" ? "d-none" : "" }}" href="{{ $team->link_twitter }}" target="_blink"><i class="ri-twitter-fill"></i></a>
                  <a class="{{ $team->link_facebook == "" ? "d-none" : "" }}" href="{{ $team->link_facebook }}" target="_blink"><i class="ri-facebook-fill"></i></a>
                  <a class="{{ $team->link_instagram == "" ? "d-none" : "" }}" href="{{ $team->link_instagram }}" target="_blink"><i class="ri-instagram-fill"></i></a>
                  <a class="{{ $team->link_linkedin == "" ? "d-none" : "" }}" href="{{ $team->link_linkedin }}" target="_blink"> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>
          @empty
            <div class="col-xl-12 col-md-12 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
              <div class="icon-box no-service">
                <div class="icon"><i class="fa fa-ban"></i></div>
                <h4>No Team</h4>
              </div>
            </div>
          @endforelse

        </div>

      </div>
    </section><!-- End Team Section -->

    <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Pricing</h2>
          <p>{{ $header_setting->pricing }}</p>
        </div>

        <div class="row">

          @forelse($products as $product)
          @php
            $delaytime = 100 * ($loop->index+1);
            $price = number_format($product->price,0);
            if(strpos($price, ',') !== false){
              $price = substr($price, 0, -4) . 'K';
            }
          @endphp
          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="{{ $delaytime }}">
            <div class="box {{ $product->best_priceYN == '1' ? 'featured' : '' }}">
              <h3>{{ $product->name }}</h3>
              <h4><sup>{{ $product->currency_code }}</sup>{{ $price }}<span>{{ $product->UOM }}</span></h4>
              {!! str_replace('<li>','<li><i class="bx bx-check"></i>', $product->description) !!}
              <a href="https://api.whatsapp.com/send?phone={{$company_setting->company_wa}}&text=About%20Product%20{{$product->name}}" class="buy-btn" target="_blank">Get Started</a>
            </div>
          </div>
          @empty
            <div class="col-xl-12 col-md-12 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
              <div class="icon-box no-service">
                <div class="icon"><i class="fa fa-ban"></i></div>
                <h4>No Product</h4>
              </div>
            </div>
          @endforelse
        </div>

      </div>
    </section><!-- End Pricing Section -->

    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Frequently Asked Questions</h2>
          <p>{{ $header_setting->faqs }}</p>
        </div>

        <div class="faq-list">
          <ul>
            @forelse($faqs as $faq)
            @php
            $delaytime = 100 * ($loop->index+1);
            @endphp

            <li data-aos="fade-up" data-aos-delay="{{$delaytime}}">
              <i class="bx bx-help-circle icon-help"></i> 
              <a data-toggle="collapse" href="#faq-list-{{$loop->index+1}}" class="collapsed">{!! nl2br($faq->question) !!}
                <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i>
              </a>
              <div id="faq-list-{{$loop->index+1}}" class="collapse" data-parent=".faq-list">
                <p>
                  {!! nl2br($faq->answer) !!}
                </p>
              </div>
            </li>
            @empty
              <li data-aos="fade-up" data-aos-delay="100">
                <i class="bx bx-help-circle icon-help"></i> 
                <a data-toggle="collapse" class="collapse" href="#faq-list-1">No Question 
                  <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i>
                </a>
                <div id="faq-list-1" class="collapse show" data-parent=".faq-list">
                  <p>
                    No Answer
                  </p>
                </div>
              </li>
            @endforelse
          </ul>
        </div>

      </div>
    </section><!-- End Frequently Asked Questions Section -->

    <!-- ======= Testimonial Section ======= -->
    <section class="testimonials-one" id="testimonials">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>TESTIMONIAL</h2>
          <p>{{ $header_setting->testimonials }}</p>
        </div>
          <div class="testimonials-one__carousel-outer">
              <div class="testimonials-one__carousel owl-carousel owl-theme">
                
                @forelse($testimonials as $testimonial)
                  @php
                    $photosrc = ( $testimonial->photo == url('/storage') ? asset('admin/images/default.png') : url($testimonial->photo) );
                  @endphp
                  <div class="item">
                      <div class="testimonials-one__single">
                          <div class="testimonials-one__inner testimonial-inner-height">
                              <p>{!! nl2br($testimonial->notes) !!}</p>
                              <h3>{{$testimonial->name}}</h3>
                              <span>Our Customers</span>
                              <img src="{{$photosrc}}" class="img-testimonial" />
                          </div>
                      </div>
                  </div>
                @empty
                  <div class="item">
                      <div class="testimonials-one__single">
                          <div class="testimonials-one__inner">
                              <p>No Testimonial</p>
                          </div>
                      </div>
                  </div>
                @endforelse
              </div>
              <div class="testimonials-one__carousel__shape-one"></div>
              <div class="testimonials-one__carousel__shape-two"></div>
              <div class="testimonials-one__nav">
                  <a class="testimonials-one__nav-left" href="#"><i class="fa fa-arrow-left"></i></a>
                  <a class="testimonials-one__nav-right" href="#"><i class="fa fa-arrow-right"></i></a>
              </div>
          </div>
      </div>
    </section><!-- /.End testimonials -->

    <!-- ======= Article Section ======= -->
    <section class="blog-one blog-one__home section-bg" id="news">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
              <h2>NEWS AND ARTICLE</h2>
              <p>{{ $header_setting->articles }}</p>
            </div>
            <div class="row">

                @forelse($articles as $article)
                  @php
                    $photosrc = ( $article->photo == url('/storage') ? asset('admin/images/default.png') : url($article->photo) );
                  @endphp
                  <div class="col-lg-4 col-md-12 col-sm-12 wow fadeInUp" data-wow-duration="1500ms">
                    <div class="blog-one__single">
                        <div class="blog-one__image text-center">
                            <img src="{{$photosrc}}" class="img-articles">
                            <a class="blog-one__more-link" href="{{ route('article.details', $article->id) }}"><i class="fa fa-link"></i></a>
                        </div>
                        <div class="blog-one__content">
                            <ul class="list-unstyled blog-one__meta">
                                <li>22 Oct, 2019</li>
                            </ul>
                            <h3 class="blog-one__title">
                                <a href="{{ route('article.details', $article->id) }}">{{$article->title}}</a>
                            </h3>
                            <a href="{{ route('article.details', $article->id) }}" class="blog-one__link">Read More</a>
                        </div>
                    </div>
                </div>
                @empty
                  <div class="col-lg-12 col-md-12 col-sm-12 wow fadeInUp text-center" data-wow-duration="1500ms">
                    <div class="blog-one__single">
                        No Article
                    </div>
                  </div>
                @endforelse

                @if(!empty($articles))
                  <div class="col-lg-12 col-md-12 col-sm-12 wow fadeInUp text-center" data-wow-duration="1500ms">
                    <div class="blog-one__single">
                        <a href="{{ route('article.index') }}" class="btn-more">Read More</a>
                    </div>
                  </div>
                @endif
            </div>
        </div>
    </section>

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact</h2>
          <p>{{ $header_setting->contact }}</p>
        </div>

        <div class="row">

          <div class="col-lg-5 d-flex align-items-stretch">
            <div class="info">
              <div class="address">
                <i class="icofont-google-map"></i>
                <h4>Location:</h4>
                <p>{{ $company_setting->company_address }}</p>
              </div>

              <div class="email">
                <i class="icofont-envelope"></i>
                <h4>Email:</h4>
                <p>{{ $company_setting->company_email }}</p>
              </div>

              <div class="phone">
                <i class="icofont-phone"></i>
                <h4>Call:</h4>
                <p>{{ $company_setting->company_tel }}</p>
              </div>

              @if($company_setting->google_maps_iframe=="")
              {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe> --}}
              @else
                {!! $company_setting->google_maps_iframe !!}
              @endif
            </div>

          </div>

          <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
            <form action="{{ route('send.mail.contact') }}" method="post" role="form" class="php-email-form">
              @csrf
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="name">Your Name</label>
                  <input type="text" name="name" class="form-control" id="name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validate"></div>
                </div>
                <div class="form-group col-md-6">
                  <label for="name">Your Email</label>
                  <input type="email" class="form-control" name="email" id="email" data-rule="email" data-msg="Please enter a valid email" />
                  <div class="validate"></div>
                </div>
              </div>
              <div class="form-group">
                <label for="name">Subject</label>
                <input type="text" class="form-control" name="subject" id="subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <label for="name">Message</label>
                <textarea class="form-control" name="message" rows="10" data-rule="required" data-msg="Please write something for us"></textarea>
                <div class="validate"></div>
              </div>
              <div class="mb-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->
@endsection

@push('after-style')
<style>
  .img-testimonial{
    height: 75px !important;
  }
  .testimonial-inner-height{
    height: 326px !important;
  }
  .img-articles{
    height: 125px !important;
    width: auto !important;
  }
</style>
@endpush

@push('after-script')
<script>
  if ($('.testimonials-one__carousel').length) {
        $('.testimonials-one__carousel').owlCarousel({
            loop: true,
            margin: 0,
            nav: false,
            dots: false,
            autoWidth: false,
            autoplay: true,
            smartSpeed: 700,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
            items: 1
        });

        $('.testimonials-one__nav-left').on('click', function() {
            $('.testimonials-one__carousel').trigger('next.owl.carousel');
            return false;
        });
        $('.testimonials-one__nav-right').on('click', function() {
            $('.testimonials-one__carousel').trigger('prev.owl.carousel');
            return false;
        });
    }
</script>
@endpush