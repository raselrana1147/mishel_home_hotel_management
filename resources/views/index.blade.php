@extends('layouts.app')
@section('title',config('constant.company_name'))
@section('main')
 <!-- Start Ecorik Slider Area -->
 @include('front.files.slider')
 <!-- End Ecorik Slider Area -->

 <!-- Start Our Rooms Area -->
@include('front.files.room')
 <!-- End Our Rooms Area -->

 <!-- Start Explore Area -->
@include('front.files.explore')
 <!-- End Explore Area -->

 <!-- Start Booking Area -->
@include('front.files.booking')
 <!-- End Booking Area -->

 <!-- Start Restaurant Item Area -->
 @include('front.files.restaurant')
 <!-- End Restaurent Item Area -->

 <!-- End Facilities Area -->
@include('front.files.facilities')
 <!-- End Facilities Area -->

 <!-- Start Exclusive Area -->
@include('front.files.exclusive')
 <!-- End Exclusive Area -->

 <!-- Start City View Area -->
 @include('front.files.city_view')
 <!-- End City View Area -->

 <!-- Start Customer Area -->
@include('front.files.customer_area')
 <!-- End Customer Area -->

 <!-- Start Contact Us Area -->
 @include('front.files.contact_us')
 <!-- End Contact Us Area -->

 <!-- End News Area -->
 @include('front.files.news')
 <!-- End News Area -->

 <!-- Start Slider Gallery Area -->
 @include('front.files.slider_gallery')
 <!-- End Slider Gallery Area -->
@endsection