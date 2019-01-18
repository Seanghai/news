@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="list-group" id="listing"></div>
        </div>
    </div>
</div>
@endsection


@section('scripts')
<script>
$(document).ready(function(){
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "{{ route('api.news.index') }}",
        type: "GET",
        dataType: "JSON",
        success: function(res) {
            if(res.length > 0) {
                var html = '';

                $.each(res, function( index, item ) {
                    html += '<a href="{{ URL("detail") }}/' + item.id + '" class="list-group-item list-group-item-action">' + item.title + '</a>';
                });

                $('#listing').append(html);
            }
        }
    });
});
</script>
@endsection