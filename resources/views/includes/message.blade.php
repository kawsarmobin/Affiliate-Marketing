@if (Session::has('success'))
  <div class="alert alert-success">
    <li>{{ Session::get('success') }}</li>
  </div>
@endif
