@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create news</div>
                <div class="card-body">
                    <form action="{{ route('news.store') }}" method="POST">
                        @csrf
                        
                        <div class="form-group">
                            <input
                                type="text"
                                class="form-control"
                                id="title"
                                name="title"
                                placeholder="Title..."
                                value="{{ old('title') }}">
                            @if($errors->has('title'))
                                <label class="text-danger">{{ $errors->first('title') }}</label>
                            @endif
                        </div>
        
                        <div class="form-group">
                            <textarea
                                class="form-control"
                                id="description"
                                name="description"
                                rows="5"
                                placeholder="Description...">{{ old('description') }}</textarea>
                            @if($errors->has('description'))
                                <label class="text-danger">{{ $errors->first('description') }}</label>
                            @endif
                        </div>
        
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="{{ route('news.index') }}" class="btn btn-secondary float-right">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
