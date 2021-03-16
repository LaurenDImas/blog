@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('List Artikel') }}</div>

                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($article as $item)
                            <a href="{{route('detail', $item->id)}}" class="list-group-item">{{$item->judul}}</a>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
