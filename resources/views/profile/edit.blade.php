@extends('layout')

{{-- @php dd($profiles); @endphp --}}
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Update Profile</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
            </div>
        </div>
    </div>


    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
{{-- @php dd($profiles); @endphp --}}

    <form action="{{ route('users.update',$data['profiles']->profileid) }}" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="PATCH">
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}">

         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{ $data['profiles']->name }}" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Gender:</strong>
                    <select name="gender" class="form-control">
                        @if ($data['profiles']->gender==1)
                        <option value="1" selected>Male</option><option value="0">Female</option>
                        @else
                        <option value="1">Male</option><option selected value="0">Female</option>
                        @endif
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Role:</strong>
                    <select name="roleid" class="form-control">
                        @foreach ($data['roles'] as $rol)
                            @if($rol->roleid==$data['profiles']->roleid)
                                <option selected value="{{ $rol->roleid }}" selected>{{ $rol->userrole }}</option>
                            
                            @else 
                                <option value="{{ $rol->roleid }}">{{ $rol->userrole }}</option>      
                            @endif     
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Date of birth:</strong>
                    <input type="text" name="dob" value="{{ $data['profiles']->dob }}" class="form-control" placeholder="DD-MM-YYYY">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email:</strong>
                    <input type="email" name="email" value="{{ $data['profiles']->email }}" class="form-control" placeholder="Email">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Phone:</strong>
                    <input type="text" name="mobile" value="{{ $data['profiles']->mobile }}" class="form-control" placeholder="Mobile No.">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Address:</strong>
                    <textarea class="form-control" style="height:150px" name="address" placeholder="Address">{{ $data['profiles']->address }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Profile Photo:</strong>
                    <input type="file" name="profileimg" class="form-control" >
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>


    </form>


@endsection