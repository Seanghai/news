@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8">News listing</div>
                        <div class="col-md-4">
                            <a href="{{ route('news.create') }}" class="btn btn-primary float-right">Create</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Title</th>
                                    <th scope="col">Description</th>
                                    <th scope="col" class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!is_null($news))
                                    @foreach($news as $item)
                                        <tr>
                                            <td scope="col">{{ $item->title }}</td>
                                            <td scope="col">{{ $item->description }}</td>
                                            <td scope="col" class="text-right">
                                                <button type="button" class="btn btn-danger" onclick="deleteItem({{ $item->id }})">Delete</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="" method="POST" id="delete-form">
                @csrf
                @method('delete')
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <p>Are you sure to delete?</p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Ok</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>

    function deleteItem( id )
    {
        $('#delete-form').attr('action', "{{ URL('news/') }}/" + id);
        $('#modal-delete').modal('show');
    }
</script>
@endsection
