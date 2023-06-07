@extends('layouts.admin')

@section('content')
    <h1>Edit Project: {{ $project->title }}</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('admin.projects.update', $project->slug) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" id="title" value="{{ old('title', $project->title) }}">
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            {{-- <label for="image">Image</label>
            <input type="file" class="form-control" name="image" id="image" value="{{ old('image', $project->image) }}"">
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror --}}
        </div>
        <div class="mb-3">
            <label for="description">Description</label>
            <textarea name="description" id="description" rows="10" class="form-control">{{ old('description', $project->description) }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Save</button>
        <button type="reset" class="btn btn-primary">Reset</button>
    </form>
@endsection
