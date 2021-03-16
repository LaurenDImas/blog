@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 mb-3">
            <div class="pull-left">
                <h2>Edit Article</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('articles.index') }}"> Back</a>
            </div>
        </div>
    </div>


    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route('articles.update',$article->id) }}" method="POST">
    	@csrf
        @method('PUT')


         <div class="row">
             <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Judul:</strong>
		            <input type="text" name="judul" class="form-control" value="{{ $article->judul }}" placeholder="Judul">
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Tanggal:</strong>
		            <input type="date" name="tanggal" class="form-control" value="{{ $article->tanggal }}" placeholder="Tanggal">
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>isi:</strong>
		            <textarea class="form-control" value="{{ $article->isi }}" name="isi" style="height:150px" placeholder="Isi"></textarea>
		        </div>
		    </div>
            
		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		      <button type="submit" class="btn btn-primary">Submit</button>
		    </div>
		</div>


    </form>


<p class="text-center text-primary"><small>Tutorial by ItSolutionStuff.com</small></p>
@endsection