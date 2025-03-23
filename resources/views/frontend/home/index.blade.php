@extends('frontend.layouts.master')

@section('contents')

    <!-- hero section starts-->
    @include('frontend.home.sections.hero-section')
    <!-- hero section ends-->

    <div class="mt-100"></div>

    <!-- category section starts-->
    @include('frontend.home.sections.category-section')
    <!-- category section ends-->

    <!-- featured job section starts-->
    @include('frontend.home.sections.featured-job-section')
    <!-- featured job section ends-->

    <!-- Why Choose us section starts-->
    @include('frontend.home.sections.why-choose-us-section')
    <!-- Why Choose us section ends-->


    <!-- learn more section starts-->
    @include('frontend.home.sections.learn-more-section')
    <!-- Learn more section ends-->

    <!-- counter section starts-->
    @include('frontend.home.sections.counter-section')
    <!-- counter section ends-->

    <!-- top recruiters section starts-->
    @include('frontend.home.sections.top-recruiters-section')
    <!-- top recruiters section ends-->


    <!-- Price Plan Section Start -->
    @if (auth()->user()?->role != 'candidate')
    @include('frontend.home.sections.price-plan-section')
    @endif
    <!-- Price Plan Section End -->

    <!-- Job By Location section starts-->
    @include('frontend.home.sections.job-by-location-section')
    <!-- Job By Location section ends-->

    <!-- Review section starts-->
    @include('frontend.home.sections.review-section')
    <!-- Review section ends-->

    <!-- Blog section starts-->
    @include('frontend.home.sections.blog-section')
    <!-- Blog section ends-->
@endsection
