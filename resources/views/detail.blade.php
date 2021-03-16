@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Detail Artikel') }}</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <h4>{{$article->judul}}</h4>
                            <small>{{date('d-m-Y', strtotime($article->tanggal))}}</small>
                            <p class="mt-4">
                                {{$article->isi}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
