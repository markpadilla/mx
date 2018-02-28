@extends("layouts.default")
@section('title')
{{$title}}
@endsection
@section('content')

<ul class="menu">
    @auth
      <li><a href="{{ route('vacancies.import') }}">Import</a></li>
    @endauth
      <li><a href="{{ route('vacancies.export') }}">Export</a></li>
</ul>
    <table class="hover">
        <thead>
        <tr>
            @foreach($columns as $column)
                <th>{{ $column['label'] }}</th>
            @endforeach
            <th></th>
        </tr>
        </thead>
        <tbody>
            @foreach ($data as $row)
            <tr>
                @foreach($columns as $column)
                <td>
                {{ $row->{$column['name']} }}
                </td>
                @endforeach
                <td>
                    <a href="{{ route('vacancies.edit', $row['id']) }}">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
@endsection
