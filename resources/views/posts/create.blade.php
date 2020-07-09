@extends('layouts.app')

@section('content')
<div class="card card-default">
    <div class="card-header">
        {{ isset($post) ? 'Edit Post' : 'Create a Post' }}
    </div>
    <div class="card-body">
        @include('partials.errors')
        <form action="{{ isset($post) ? route('posts.update', $post->id) : route('posts.store') }}" method="POST"
            enctype="multipart/form-data">
            @csrf

            @if(isset($post))
            @method('PUT')
            @endif

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" class="form-control"
                    value="{{ isset($post) ? $post->title : ''}}">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" id="description" name="description" class="form-control"
                    value="{{ isset($post) ? $post->description : ''}}">
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <!-- <textarea name="content" id="content" cols="30" rows="5" class="form-control"></textarea> -->
                <input id="content" type="hidden" name="content" value="{{ isset($post) ? $post->content : ''}}">
                <trix-editor input="content"></trix-editor>
            </div>
            <div class="form-group">
                <label for="published_at">Published At</label>
                <input type="text" id="published_at" name="published_at" class="form-control"
                    value="{{ isset($post) ? $post->published_at : ''}}">
            </div>
            @if(isset($post))
            <div class="form-group">
                <img src="{{ asset($post->image) }}" alt="Post image" style="width: 100%">
            </div>
            @endif
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" id="image" name="image" class="form-control">
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <select name="category" id="category" class="form-control">
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" @if(isset($post)) @if($category->id === $post->category_id)
                        selected
                        @endif
                        @endif
                        >
                        {{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            @if($tags->count() > 0)
            <div class="form-group">
                <label for="tags[]">Tags</label>
                <select name="tags" id="tags" class="form-control tags-selector" multiple>
                    @foreach($tags as $tag)
                    <option value="{{ $tag->id }}"
                    @if(isset($post))
                    @if($post->hasTag($tag->id))
                    selected
                    @endif
                    @endif
                    >{{ $tag->name }}</option>
                    @endforeach
                </select>
            </div>
            @endif
            <div class="form-group">
                <button type="submit" class="btn btn-success">
                    {{ isset($post) ? 'Update Post' : 'Create a Post' }}</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>
flatpickr('#published_at', {
    enableTime: true
})

$(document).ready(function() {
    $('.tags-selector').select2();
});
</script>
@endsection

@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection
