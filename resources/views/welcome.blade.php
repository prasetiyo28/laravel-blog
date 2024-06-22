@extends('layouts.app')

@section('content')
    <div class="container mt-5" id="welcome-page">
        <div class="jumbotron text-center">
            <h1 class="display-4">Welcome to Blog</h1>
            <p class="lead">Welcome to our blog, where we share insights, stories, and updates about our journey. Whether you're a new visitor or a regular reader, we're thrilled to have you here.

                Exploring New Horizons
                
                Join us as we delve into topics that inspire us: from the latest trends in technology to profound discussions on societal issues. Our goal is to provide you with thought-provoking content that enriches your understanding and sparks meaningful conversations.
                
                Stay Connected
                
                We believe in the power of community and value your feedback. Feel free to engage with us through comments, shares, and likes. Together, let's create a space where ideas flourish and perspectives evolve.
                
                Discover More
                
                Curious to learn more? Browse through our articles below and discover a wealth of knowledge waiting to be explored. Whether you're seeking practical advice or simply browsing for inspiration, we're here to guide you on your journey.
                
                Thank you for visiting. Let's embark on this journey of discovery together.</p>
            <hr class="my-4">
            <p>Click below to view posts:</p>
            <a class="btn btn-primary btn-lg" href="{{ route('posts.index') }}" role="button">Discover More</a>
        </div>
    </div>
@endsection