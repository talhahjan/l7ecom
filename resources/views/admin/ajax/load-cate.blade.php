<option value="0">Top Level</option>
@foreach($categories as $category)
<option value="{{$category->id}}">{{$category->title}}</option>
@endforeach