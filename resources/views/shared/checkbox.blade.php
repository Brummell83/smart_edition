@php
    $class ??= null;
@endphp
<div @class(['form-check form-switch',$class])>
    <input type="hidden" name="{{$name}}" value="0">
    <input @checked(old($name,$value ?? false)) type="checkbox" name="{{$name}}" class="form-check-input @error($name) is-invalid @enderror" value="1" role="switch" >
    <label class="form-check-label" for="{{$name}}">{{$label}}</label>
    @error($name)
        <div class="invalid-freedback">
            {{$message}}
        </div>
    @enderror
</div>