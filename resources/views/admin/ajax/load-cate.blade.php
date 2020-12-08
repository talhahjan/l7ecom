<option value="">Top Level</option>
@foreach($categories as $category)
<option value="{{$category->id}}">{{$category->title}}</option>
@endforeach