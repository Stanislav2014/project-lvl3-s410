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
      @if (isset($moreInfo))
      <th scope="col">h1</th>
      <th scope="col">keywords</th>
      <th scope="col">description</th>
      @endif
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
      @if (isset($moreInfo))
      <td>{{ $domain->h1 }}</td>
      <td>{{ $domain->keywords }}</td>
      <td>{{ $domain->description }}</td>
      @endif
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