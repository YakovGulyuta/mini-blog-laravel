@extends('layouts.front.default')

@section('title', 'Markedia - Marketing Blog Template :: Search')

@section('page-title')
    <div class="page-title db">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <h2>Search: {{ $s }}</h2>
                </div><!-- end col -->
                <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Search</li>
                    </ol>
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end page-title -->
@endsection

@section('content')

    <div class="page-wrapper">
        <div class="blog-custom-build">

            @if($articles->count())
                @foreach($articles as $article)
                    <div class="blog-box wow fadeIn">
                        <div class="post-media">
                            <a href="{{ route('article.show', ['slug' => $article->slug]) }}" title="">
                                <img src="{{ $article->getImage() }}" alt="" class="img-fluid">
                                <div class="hovereffect">
                                    <span></span>
                                </div>
                                <!-- end hover -->
                            </a>
                        </div>
                        <!-- end media -->
                        <div class="blog-meta big-meta text-center">

                            <h4><a href="{{ route('article.show', ['slug' => $article->slug]) }}"
                                   title="">{{ $article->title }}</a></h4>
                            {!! $article->description !!}
                            <small><a href="{{ route('category.show', ['slug' => $article->category->slug]) }}"
                                      title="">{{ $article->category->title }}</a></small>
                            <small>{{ $article->getArticleDate() }}</small>
                            <small><i class="fa fa-eye"></i> {{ $article->views }}</small>
                        </div><!-- end meta -->
                    </div><!-- end blog-box -->

                    <hr class="invis">
                @endforeach
            @else
                По вашему запросу ничего не найдено...
            @endif

        </div>
    </div>

    <hr class="invis">

    <div class="row">
        <div class="col-md-12">
            <nav aria-label="Page navigation">
                {{ $articles->appends(['s' => request()->s])->links() }}
            </nav>
        </div><!-- end col -->
    </div><!-- end row -->

@endsection
