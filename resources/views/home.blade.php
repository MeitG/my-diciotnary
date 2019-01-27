@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Email: {{ auth()->user()->email }} <br>
                    Register At: {{ auth()->user()->created_at }}
                    <p>
                        <a href="{{ route('dictionary.create') }}">Create new Word</a> OR <a href="{{ route('dictionary.index') }}">See All Words</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
