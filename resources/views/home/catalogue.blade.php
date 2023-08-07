@extends('baseHome')

@section('showbook')
<div class="container mt-5">
    <div class="d-flex">
        <div class="list-group">
            @foreach ($category as $item)
                <a href="#" class="list-group-item list-group-item-action" aria-current="true">
                    {{$item->label}}
                </a>
            @endforeach
        </div>
        <div>
            ok
        </div>
    </div>
</div>
@endsection