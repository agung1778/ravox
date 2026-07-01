@extends('layouts.app')

@section('title','RAVØX | Portfolio • Game Studio • Software Development')

@section('description',
'Official website of RAVØX. Explore games, portfolio, blog, and digital products.')
@section('content')

@include('components.home.hero')

@include('components.home.stats')

@include('components.home.about')

@include('components.home.services')

@include('components.home.projects')

@include('components.home.games')

@include('components.home.blog')

@include('components.home.tech-stack')

@include('components.home.testimonials')

@include('components.home.contact-cta')

@endsection