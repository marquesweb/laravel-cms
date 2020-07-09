@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-end mb-2">
    <a href="{{ route('tags.create')}}" class="btn btn-success float-right">Add Tag</a>
</div>
<div class="card card-default">
    <div class="card-header">
        Tag List
    </div>
    <div class="card-body">
    @if($tags->count() > 0)
        <table class="table">
            <thead>
                <th>Name</th>
                <th>Posts count</th>
                <th></th>
            </thead>
            <tbody>
                @Foreach($tags as $tag)
                <tr>
                    <td>
                        {{$tag->name}}
                    </td>
                    <td>
                   {{ $tag->posts->count() }}
                    </td>
                    <td>
                    <button class="btn btn-danger btn-sm float-right" onclick="handleDelete({{ $tag->id }})">Delete</button>
                    </td>
                    <td>
                        <a class="btn btn-warning btn-sm"
                            href="{{ route('tags.edit', $tag->id) }}">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <h3 class="text-center">No tags yet.</h3>
        @endif
        <form action="" method="POST" id="deleteTagForm">
        @csrf
        @method('DELETE')
        <div class="modal-content">
        <div id="deleteModal" class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete Tag</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete the tag.</p>
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
        var form = document.getElementById('deleteTagForm');
        form.action = `tags/${id}/delete`;
        $('#deleteModal').modal('show');
    }
</script>

@endsection

