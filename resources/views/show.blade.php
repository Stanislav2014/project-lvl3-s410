@extends('layouts.app')

@section('content')
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">name</th>
      <th scope="col">created_at</th>
      <th scope="col">updated_at</th>
      <th scope="col">content_length</th>
      <th scope="col">response_code</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($domains as $domain)
    <tr>
      <th scope="row">{{ $domain->id }}</th>
      <td><a href="{{ route('domains.show', ['id' => $domain->id]) }}">{{ $domain->name }}</a></td>
      <td>{{ $domain->created_at }}</td>
      <td>{{ $domain->updated_at }}</td>
      <td>{{ $domain->content_length }}</td>
      <td>{{ $domain->response_code }}</td>
    </tr>
    @endforeach
  </tbody>
</table>
@if (isset($paginate))
    {{ $domains->links() }}
@endif
    </body>
</html>
@endsection