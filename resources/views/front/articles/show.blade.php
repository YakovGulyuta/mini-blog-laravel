@extends('layouts.front.categories.category_layout')

@section('content')

    <div class="page-wrapper">
        <div class="blog-title-area">
            <ol class="breadcrumb hidden-xs-down">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a
                        href="{{ route('category.show', ['slug' => $article->category->slug]) }}">{{ $article->category->title }}</a>
                </li>
                <li class="breadcrumb-item active">{{ $article->title }}</li>
            </ol>

            <span class="color-yellow"><a href="{{ route('category.show', ['slug' => $article->category->slug]) }}"
                                          title="">{{ $article->category->title }}</a></span>

            <h3>{{ $article->title }}</h3>

            <div class="blog-meta big-meta">
                <small>{{ $article->getArticleDate() }}</small>
                <small><i class="fa fa-eye"></i> {{ $article->views }}</small>
            </div><!-- end meta -->
        </div><!-- end title -->

        <div class="single-post-media">
{{--            <img src="{{ $article->getImage() }}" alt="" class="img-fluid">--}}
        </div><!-- end media -->

        <div class="blog-content">
            {!! $article->content !!}
        </div><!-- end content -->

        <div class="blog-title-area">
{{--            @if($article->tags->count())--}}
{{--                <div class="tag-cloud-single">--}}
{{--                    <span>Tags</span>--}}
{{--                    @foreach($article->tags as $tag)--}}
{{--                        <small><a href="{{ route('tags.show', ['slug' => $tag->slug]) }}" title="">{{ $tag->title }}</a></small>--}}
{{--                    @endforeach--}}
{{--                </div><!-- end meta -->--}}
{{--            @endif--}}

        </div><!-- end title -->

    </div><!-- end page-wrapper -->

@endsection
