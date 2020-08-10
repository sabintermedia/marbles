@extends ('layout')
@section ('title','Settings')
@section ('settings')
<div class="flex-top position-ref full-height">
  <div class="masthead-brand h5">Settings</div>
  <div class="lead">
    <table class="table table-striped table-dark table-md-12">
      <thead class="thead-dark">
          <tr>
            <td>ID</td>
            <td>Setting</td>
            <td>Value</td>
            <td>Action</td>
          </tr>
      </thead>
      <tbody class="table-striped">
        @foreach($data as $setting)
        <tr>
          <td>{{ $setting->id }}</td>
          <td>{{ $setting->name }}</td>
          <td>{{ $setting->content }}</td>
          <td><a href="{{ route('setting.edit',$setting->id) }}" class="btn btn-primary">Edit</td>
        </tr>
        @endforeach
      <tbody>
    </table>
  </div>
</div>
@endsection
