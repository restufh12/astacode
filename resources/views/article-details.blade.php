@extends('layouts.frontend')
@section('title', 'Astacode - Article Details')
@section('class-header', 'header-inner-pages')

@section('hero-section')
    
@endsection

@section('content-main')
  <!-- ======= Breadcrumbs ======= -->
  <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <ol>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li>Article Details</li>
      </ol>
      <h2>Article Details</h2>

    </div>
  </section><!-- End Breadcrumbs -->

  <!-- ======= Article Details Section ======= -->
  <section id="article-details" class="article-details">
    <div class="container">

      <div class="article-details-container">

        <div class="owl-carousel article-details-carousel">
            <img src="{{ $article->photo }}" class="img-fluid img-detail-article">
        </div>

        <div class="article-info">
          <h5>Article information</h5>
          <ul>
            <li><strong>Date</strong>: {{ date('d/m/Y', strtotime($article->d_ate))}}</li>
          </ul>
        </div>

      </div>

      <div class="article-description">
        <h2>{{$article->title}}</h2>
        <p>
          {!! nl2br($article->description) !!}
        </p>
      </div>

    </div>
  </section><!-- End article Details Section -->
@endsection

@push('after-style')
<style>
  .img-detail-article{
    max-height: 400px !important;width:auto !important;
  }
</style>
@endpush

@push('after-script')
@endpush