@extends('layouts.layout')
@section('content')
    <section id="search_result" class="pb-5">
        <div class="container">
            <hgroup class="mb20">
                <h1 class="section-title-search h1">Search Results</h1>
                <h2 class="section-title-search h5"><strong class="text-danger">{{$events->count()}}</strong> results were found for the search
                    for <strong class="text-danger">{{request()->get('keyword')}}</strong></h2>
            </hgroup>

            <section class="col-xs-12 col-sm-6 col-md-12">
                @foreach($events as $item)
                    <article class="search-result row">
                        <div class="col-xs-12 col-sm-12 col-md-3">
                            <a href="#" title="Lorem ipsum" class="thumbnail"><img src="http://lorempixel.com/250/140/people"
                                                                                   alt="Lorem ipsum"/></a>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-2">
                            <ul class="meta-search">
                                <li><i class="glyphicon glyphicon-calendar"></i> <span>Date: {{$item->eventDate}}</span></li>
                                <li><i class="glyphicon glyphicon-tags"></i> <span>Category: {{$item->category}}</span></li>
                                <button type="button" class="btn btn-outline-success">Buy Ticket!</button>
                            </ul>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-7 excerpet">
                            <h4><a href="#" title="">{{$item->eventName}}</a></h4>
                            <p>{{$item->description}}</p>
                        </div>
                    </article>
                @endforeach
            </section>
        </div>
    </section>
@endsection