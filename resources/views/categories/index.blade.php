@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-end mb-2">
    <a href="{{ route('categories.create')}}" class="btn btn-success float-right">Add Category</a>
</div>
<div class="card card-default">
    <div class="card-header">
        Category List
    </div>
    <div class="card-body">
    @if($categories->count() > 0)
        <table class="table">
            <thead>
                <th>Name</th>
                <th>Posts count</th>
                <th></th>
            </thead>
            <tbody>
                @Foreach($categories as $category)
                <tr>
                    <td>
                        {{$category->name}}
                    </td>
                    <td>
                    {{ $category->posts->count()}}
                    </td>
                    <td>
                    <button class="btn btn-danger btn-sm float-right" onclick="handleDelete({{ $category->id }})">Delete</button>
                    </td>
                    <td>
                        <a class="btn btn-warning btn-sm"
                            href="{{ route('categories.edit', $category->id) }}">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <h3 class="text-center">No categories yet.</h3>
        @endif
        <form action="" method="POST" id="deleteCategoryForm">
        @csrf
        @method('DELETE')
        <div class="modal-content">
        <div id="deleteModal" class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete the category.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">No, Go Back</button>
                        <button type="submit" class="btn btn-danger">Yes Delete</button>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </form>
    </div>
</div>
@endsection
@section('scripts')

<script>
function handleDelete(id) {
        var form = document.getElementById('deleteCategoryForm');
        form.action = `categories/${id}/delete`;
        $('#deleteModal').modal('show');
    }
</script>

@endsection

