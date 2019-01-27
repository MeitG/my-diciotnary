@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dictionary</div>


                    <div class="card-body">

                        <div class="row">
                            <div class="col">
                                <a class="btn btn-primary mb-2" href="{{ route('dictionary.create') }}">Create new Word</a>
                            </div>
                            <div class="col">
                                <form action="{{ route('dictionary.index') }}" method="get">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="q" id="Search" aria-describedby="englishHelp" placeholder="Search (persian or english)" value="{{request()->get('q')}}">
                                    </div>
                                </form>
                            </div>
                        </div>

                        @if(request()->has('q'))
                            <p class="text-right">
                                <a href="{{ route('dictionary.index') }}" class="mb-2 text-danger">remove search, show complete list</a>
                            </p>
                        @endif

                        @if(!$result->count())
                            There is no record <a href="{{ route('dictionary.create') }}">Create new Word</a>
                        @else
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">English</th>
                                    <th scope="col">Persian</th>
                                    <th>Control</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($result as $word)
                                    <tr>
                                        <td>{{ $word->english }}</td>
                                        <td>{{ $word->persian }}</td>
                                        <td>
                                            <a href="{{ route('dictionary.edit', $word) }}" class="btn btn-outline-dark">Edit</a>
                                            <a href="{{ route('dictionary.destroy', $word) }}"
                                               class="btn btn-outline-danger"
                                               onclick="event.preventDefault();
                                                       document.getElementById('{{ 'delete' . $word->id }}').submit();">Delete</a>
                                            <form id="{{ 'delete' . $word->id }}" action="{{ route('dictionary.destroy', $word) }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                                {{ method_field('delete') }}
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $result->links()  }}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
