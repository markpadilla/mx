@extends("layouts.default")
@section('title')
{{$title}} (Import)
@endsection
@section("content")
<div class="row columns">
    <form data-abide novalidate method="POST" action="{{route($route)}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('POST') }}
        <label for="fileUpload" class="button">Upload File</label>
		<input type="file" id="fileUpload" name="fileUpload">
        <div class="row">
            <fieldset class="small-12 columns">
                <button class="button" type="submit">{{__('labels.submit')}}</button>
            </fieldset>
        </div>
    </form>
</div>
@endsection