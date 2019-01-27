@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create New Word</div>

                    <div class="card-body">
                        <form action="{{ route('dictionary.store') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="English">English Word</label>
                                <input type="text" class="form-control" name="english" id="English" aria-describedby="englishHelp" placeholder="English">
                                <small id="englishHelp" class="form-text text-muted">don't worry about casing, we're uppercase it for you</small>
                                @if ($errors->has('english'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('english') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="Persian">Persian</label>
                                <input type="text" class="form-control" name="persian" id="Persian" placeholder="Persian (type in farsi)">
                                @if ($errors->has('persian'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('persian') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <input type="submit" value="Save and New" class="btn btn-primary" name="save_new" />
                            <input type="submit" value="Save and Back" class="btn btn-success" name="save_back" />
                            <a href="{{ route('dictionary.index') }}" class="btn btn-danger">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
