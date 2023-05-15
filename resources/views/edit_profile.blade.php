@extends('layouts.template')

@section('title')
    Edit Profile
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center m-3">
            <div class="card">
                <div class="card-header">Edit Profile</div>
                <div class="card-body">
                <form class="row g-3" @if ($user->role == 'teacher')
                    action="{{ route('change_teacher_data',$details->id) }}"
                @else
                    action="{{ route('change_student_data',$details->id) }}"
                @endif method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-6">
                      <label for="email" class="form-label">Email ( Can`t change email )</label>
                      <input type="email" class="form-control" id="email" value="{{$user->email}}" disabled>
                    </div>
                    <div class="col-md-6">
                        <label for="city" class="form-label">City</label>
                        <select class="form-control mb-3 w-100" name="city" required>
                          @foreach ($cities as $city)
                          <option value="{{$city}}" @if ($details->city == $city)
                              @selected(true)
                          @endif>
                          {{$city}}
                          </option>
                          @endforeach
                      </select>
                    </div> 
                    @if ($user->role == 'teacher')   
                    <div class="col-6">
                        <label for="major" class="form-label">Major</label>
                        <select class="form-control mb-3 w-100" name="major" required>
                            @if ($details->major)
                                @foreach ($majors as $major)
                                <option value="{{$major}}" @if ($details->major == $major)
                                    @selected(true)
                                    @endif>
                                    {{$major}}
                                </option>
                                @endforeach
                            @else
                            <option>Not Selected</option>
                            @foreach ($majors as $major)
                                <option value="{{$major}}">
                                    {{$major}}
                                </option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" min="0" class="form-control" name="price" id="price" @if ($details->price)
                              value="{{$details->price}}"
                        @endif>
                      </div>
                    @endif
                    <div class="col-6">
                      <label for="university" class="form-label">University</label>
                      <input type="text" class="form-control" id="university" name="university" placeholder="Jordan University of Science and Technology" @if ($details->university)
                          value="{{$details->university}}"
                      @endif>
                    </div>
                    @if ($user->role == 'student')
                    <div class="col-6">
                      <label for="major" class="form-label">Major</label>
                      <input type="text" class="form-control" id="major" name="major" placeholder="Computer Information Systems" @if ($details->major)
                          value="{{$details->major}}"
                      @endif>
                    </div>
                    @endif
                    <div class="col-md-6">
                      <label for="gpa" class="form-label">GPA</label>
                      <input type="text" class="form-control" name="gpa" id="gpa" @if ($details->gpa)
                            value="{{$details->gpa}}"
                      @endif>
                    </div>
                    <div class="col-md-6">
                      <label for="phone" class="form-label">Phone</label>
                      <input type="tel" class="form-control" name="phone" id="phone" @if ($details->phone)
                            value="{{$details->phone}}"
                      @endif>
                    </div>
                    <div class="col-md-6">
                      <label for="facebook" class="form-label">Facebook Link</label>
                      <input type="text" class="form-control" name="facebook" id="facebook" placeholder="https://www.facebook.com/USERNAME" @if ($details->facebook)
                            value="{{$details->facebook}}"
                      @endif>
                    </div>
                    <div class="col-md-6">
                      <label for="instagram" class="form-label">Instagram Link</label>
                      <input type="text" class="form-control" name="instagram" id="instagram" placeholder="https://www.instagram.com/USERNAME/" @if ($details->instagram)
                            value="{{$details->instagram}}"
                      @endif>
                    </div>
                    <div class="col-md-6">
                      <label for="linkedin" class="form-label">Linkedin Link</label>
                      <input type="text" class="form-control" name="linkedin" id="linkedin" placeholder="https://www.linkedin.com/in/USERNAME" @if ($details->linkedin)
                            value="{{$details->linkedin}}"
                      @endif>
                    </div>
                    <div class="col-md-6">
                      <label for="photo" class="form-label">Change Profile Photo</label>
                      <input type="file" class="form-control" name="photo" id="photo">
                    </div>
                    <div class="col-12 mt-2">
                          <a class="text-primary" href="{{ route('change_password') }}">Change Password</a>
                      </div>
                    <div class="col-12 mt-3">
                      <button type="submit" class="btn btn-primary">Change Data</button>
                    </div>
                  </form>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection