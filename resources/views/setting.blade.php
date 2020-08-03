@extends ('layout')
@section ('title','Game settings')
@section ('setting')
<div class="card mt-10">
  <div class="card-header">
      Settings
  </div>
  <div class="card-body">
    <table class=border="table table-hover">
      <thead>
          <tr>
            <td>ID</td>
            <td>Setting</td>
            <td>Value</td>
            <td>Action</td>
          </tr>
      </thead>
      <tbody>
        @foreach($data as $setting)
        <tr>
          <td>{{ $setting->id }}</td>
          <td>{{ $setting->name }}</td>
          <td>{{ $setting->content }}</td>
          <td><a href="{{ route('setting.edit',$setting->id) }}" class="btn btn-primary">Edit</td>
        </tr>
        @endforeach
      <tbody>

  </div>
</div>
@endsection
