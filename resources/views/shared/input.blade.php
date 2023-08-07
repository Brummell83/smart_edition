@php
    $label ??= ucfirst($name);
    $type ??= 'text';
    $name ??= '';
    $class ??= null;
    $value ??= '';
@endphp

<div @class(["form-group",$class])>
    <label for="{{$name}}">{{$label}}</label>
    @if ($type=='textarea')
        <textarea name="{{$name}}" class="form-control @error($name) is-invalid @enderror">{{old($name,$value)}}</textarea>
    @else
        <input type="{{$type}}" name="{{$name}}" class="form-control @error($name) is-invalid @enderror" value="{{old($name,$value)}}" >
    @endif
    @error($name)
        <div class="invalid-freedback">
            {{$message}}
        </div>
    @enderror
</div>