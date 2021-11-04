<!-- index.blade.php -->

@extends('template')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div><br />
  @endif
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Naam</td>
          <td>Email</td>
          <td>Rol</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $key => $value)
         <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $value->name }}</td>
            <td>{{ $value->email }}</td>
            <td>{{ $value->role }}</td>

        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection
