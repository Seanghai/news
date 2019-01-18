@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" id="news-detail"></div>
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
        url: "{{ route('api.news.show', ['news' => Route::current()->parameter('id')]) }}",
        type: "GET",
        dataType: "JSON",
        success: function(res) {
            console.log( res );
            if(res) {
                var html = '<div class="card-header">' + res.title + '</div>';
                html += '<div class="card-body">' + res.description + '</div>';

                $('#news-detail').append(html);
            }
        }
    });
});
</script>
@endsection