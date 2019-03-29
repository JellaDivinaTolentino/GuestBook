@extends('layouts.default')
@section('content')
    <div class="content col-4">
        <div class="card">
            <div class="card-header text-white bg-dark">
                <div class="pt-1 float-left">Add Guest</div>
                <a href="{{ url('guests') }}">
                    <button class="btn btn-success btn-sm float-right" type="submit">Guest List</button>
                </a>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="px-2 mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form role="form" method="post" action="{{url('guests')}}">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="inputFirstName">First Name</label>
                        <input type="text" class="form-control" name="first_name" id="inputFirstName" required>
                    </div>
                    <div class="form-group">
                        <label for="inputLastName">Last Name</label>
                        <input type="text" class="form-control" name="last_name" id="inputLastName" required>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail">Email</label>
                        <input type="email" class="form-control" name="email" id="inputEmail" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputPhoneNumber">Phone number</label>
                        <input type="text" class="form-control" name="phone_number" id="inputPhoneNumber">
                    </div>
                    <div class="form-group">
                        <label for="inputGender">Gender</label>
                        <select name="gender" id="inputGender" class="form-control col-6" required>
                            <option value="Male" selected>Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Address</label>
                        <textarea name="address" id="inputAddress" class="form-control" cols="30" rows="3" placeholder="1234 Main St" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection