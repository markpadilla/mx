@extends("layouts.default")
@section('title')
{{$title}} (Edit)
@endsection
@section("content")
<div class="row columns">
    <form data-abide novalidate method="POST" action="{{route($route, $row->id)}}">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        
		@foreach($columns as $column)

		@php
		    $field_conf = $row->{$column['name'].'conf'};
		@endphp 
		    
		@if (!$field_conf)
		    @php continue @endphp
		@endif
		
		<div class="row">
    	<div class="small-10 small-centered columns">
        <label>
            {{$column['label']}}
            
            @if (array_key_exists('required', $field_conf['attributes']))
            *
            @else
            ({{__('labels.optional')}})
            @endif

        	@if ($field_conf['tag'] == 'input')
            	<input @php echo \App\Mark\Utils::htmlAttributes($field_conf['attributes']) @endphp />
        
            @elseif ($field_conf['tag'] == 'textarea')
                <textarea @php echo \App\Mark\Utils::htmlAttributes($field_conf['attributes']) @endphp >
                    {{$field_conf['attributes']['value']}}
                </textarea>
            @endif
            <span class="form-error">
              {{$field_conf['error_msg']}}
            </span>
        </label>
    </div>
</div>

		@endforeach

        <div class="row">
            <fieldset class="small-12 columns">
                <button class="button" type="submit">{{__('labels.submit')}}</button>
            </fieldset>
        </div>
    </form>
</div>
@endsection