@php
    $label ??= ucfirst($name);
    $type ??= 'text';
    $name ??= '';
    $class ??= null;
    $value ??= '';
    $multiple ??= false;
@endphp

<div @class(["form-group",$class])>
    <label for="{{$name}}">{{$label}}</label>
    <select name="{{$name}}" id="{{$name}}" class="form-control" >
        <option value="" disabled>Selectionner une catégorie</option>
        @foreach ($categories as $category)
            <option @selected(old('category_id',$value->category_id) == $category->id) value="{{$category->id}}">{{$category->label}}</option>
        @endforeach
    </select>
    @error($name)
        <div class="invalid-freedback">
            {{$message}}
        </div>
    @enderror
</div>