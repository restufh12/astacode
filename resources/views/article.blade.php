@extends('layouts.frontend')
@section('title', 'Astacode - Article')
@section('class-header', 'header-inner-pages')

@section('hero-section')
    
@endsection

@section('content-main')
  <!-- ======= Breadcrumbs ======= -->
  <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <ol>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li>Inner Page</li>
      </ol>
      <h2>Inner Page</h2>

    </div>
  </section><!-- End Breadcrumbs -->

  <section class="inner-page">
    <div class="container">
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
      </div>

      {{ $articles->links() }}
      
    </div>
  </section>
@endsection

@push('after-style')
<style>
  .img-articles{
    height: 125px !important;
    width: auto !important;
  }
</style>
@endpush

@push('after-script')
@endpush