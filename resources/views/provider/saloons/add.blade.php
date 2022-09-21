@extends('layouts.provider')

@section('content')
<div class="card">
  <div class="card-header">
    <h4>Add New Saloon</h4>
  </div>
  <div class="card-body">
    <form method="POST" action="">
      @csrf
      <div class="form-group">
        <label for="name">Saloon Name</label>
        <input type="text" id="name" class="btn ms-2 text-start border d-block" name="name" aria-describedby="emailHelp" placeholder="Beauty Care" required>
      </div>
      <div class="form-group">
        <label for="phone">Phone</label>
        <input type="tel" name="phone" class="btn ms-2 text-start border d-block" id="phone" placeholder="+962789652314" required>
      </div>
      <div class="form-group">
        <label for="location">Location</label>
        <input type="text" name="location" class="btn ms-2 text-start border d-block" id="location" placeholder="Zarqa, Batrawi" required>
      </div>
      <div class="form-group">
        <label for="profile_image">Profile Image (Link)</label>
        <input type="text" name="profile_image" class="btn ms-2 text-start border d-block" id="profile_image" placeholder="http://----">
      </div>
      <button type="submit" class="btn btn-info">Submit</button>
    </form>
  </div>
</div>
@endsection