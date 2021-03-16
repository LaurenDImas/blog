@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 mb-3">
            <div class="pull-left">
                <h2>Articles</h2>
            </div>
            <div class="pull-right">
                @can('article-create')
                <a class="btn btn-success" href="{{ route('articles.create') }}"> Create New Article</a>
                @endcan
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Tanggal</th>
            <th>Deskripsi</th>
            <th width="280px">Action</th>
        </tr>
	    @foreach ($articles as $article)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $article->judul }}</td>
	        <td>{{ $article->tanggal }}</td>
	        <td>{{ $article->isi }}</td>
	        <td>
                <form action="{{ route('articles.destroy',$article->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('articles.show',$article->id) }}">Show</a>
                    @can('article-edit')
                    <a class="btn btn-primary" href="{{ route('articles.edit',$article->id) }}">Edit</a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('article-delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>


    {!! $articles->links() !!}


<p class="text-center text-primary"><small>Tutorial by ItSolutionStuff.com</small></p>
@endsection