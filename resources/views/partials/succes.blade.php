{{-- Check for success --}}
@if (Session::has('succes'))
<div class="alert alert-success">
  <strong>Success:</strong>
  {{ Session::get('succes')}}
</div>
@endif