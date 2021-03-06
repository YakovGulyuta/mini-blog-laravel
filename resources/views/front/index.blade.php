@extends('layouts.front.default')
@section('title', 'Тестовый блог')
@section('header')

    <section id="cta" class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 align-self-center">
                    <h2>A digital marketing blog</h2>
                    <p class="lead"> Aenean ut hendrerit nibh. Duis non nibh id tortor consequat cursus at mattis felis. Praesent sed lectus et neque auctor dapibus in non velit. Donec faucibus odio semper risus rhoncus rutrum. Integer et ornare mauris.</p>

                </div>
            </div>
        </div>
    </section>

@endsection

@section('content')

    <div class="page-wrapper">
        @foreach($articles as $article)
            <div class="blog-custom-build">
                <div class="blog-box wow fadeIn">
                    <div class="post-media">
                        <a href="{{ route('article.show' , ['slug' => $article->slug ]) }}" title="">
                            <img src="{{ $article->getImage() }}" alt="" class="img-fluid">
                            <div class="hovereffect">
                                <span></span>
                            </div>
                            <!-- end hover -->
                        </a>
                    </div>
                    <!-- end media -->
                    <div class="blog-meta big-meta text-center">
                        <h4><a href="{{ route('article.show' , ['slug' => $article->slug ]) }}" title="">{!! $article->description !!}</a>
                        </h4>
                        {!! $article->content !!}
                        <small><a href="{{ route('category.show' , ['slug' => $article->category->slug ]) }}" title="">{{ $article->category->title }}</a></small>
                        <small><a href="#" title=""><i class="fa fa-eye"></i> {{ $article->views }}</a></small>
                    </div><!-- end meta -->
                </div><!-- end blog-box -->
                <hr class="invis">
            </div>
        @endforeach

    </div>

    <hr class="invis">

    <div class="row">
        <div class="col-md-12">
            {{ $articles->links() }}
        </div><!-- end col -->
    </div><!-- end row -->

@endsection

