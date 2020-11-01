@extends('layouts.frontend')
@section('title', 'Astacode - Portfolio Details')
@section('class-header', 'header-inner-pages')

@section('hero-section')
    
@endsection

@section('content-main')
  <!-- ======= Breadcrumbs ======= -->
  <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <ol>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li>Portfolio Details</li>
      </ol>
      <h2>Portfolio Details</h2>

    </div>
  </section><!-- End Breadcrumbs -->

  <!-- ======= Portfolio Details Section ======= -->
  <section id="portfolio-details" class="portfolio-details">
    <div class="container">

      <div class="portfolio-details-container">

        <div class="owl-carousel portfolio-details-carousel">
          @foreach($portfolio_galleries as $portfolio_gallery)
            <img src="{{ $portfolio_gallery->photo }}" class="img-fluid img-detail-portfolio">
          @endforeach
        </div>

        <div class="portfolio-info">
          <h3>Project information</h3>
          <ul>
            <li><strong>Category</strong>: {{$portfolio->category}}</li>
            <li><strong>Client</strong>: {{$portfolio->client->name}}</li>
            <li><strong>Project date</strong>: {{ date('d/m/Y', strtotime($portfolio->project_date))}}</li>
            <li><strong>Project URL</strong>: <a href="{{$portfolio->project_url}}">{{$portfolio->project_url}}</a></li>
          </ul>
        </div>

      </div>

      <div class="portfolio-description">
        <h2>{{$portfolio->project_name}}</h2>
        <p>
          {!! nl2br($portfolio->project_desc) !!}
        </p>
      </div>

    </div>
  </section><!-- End Portfolio Details Section -->
@endsection

@push('after-style')
<style>
  .img-detail-portfolio{
    max-height: 400px !important;width:auto !important;
  }
</style>
@endpush

@push('after-script')
@endpush