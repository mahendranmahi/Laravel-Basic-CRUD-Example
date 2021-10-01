@extends('layout')

@section('content')
    
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>User Profile Registration</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('users.create') }}"> Create New Profile</a>
            </div>
        </div>
    </div>
{{-- {{ route('profile.create') }} --}}

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Profile</th>
            <th>Name</th>
            <th>Gender</th>
            <th>Date of Birth</th>
            <th>Position</th>
            <th>Mobile</th>
            <th>Email</th>
            <th>Address</th>
            <th width="280px">Action</th>
        </tr>
        @php $i=0 @endphp
        @foreach ($profiles as $profile)
            @if ($profile->gender ==1)  {@php $gen='Male'; @endphp}
            @else    {@php $gen='Female'; @endphp}
            @endif
                <tr>
                    <td>{{ ++$i }}</td>
                    <td><img class="tblprfimg" src="{{ $profile->profileimg }}" /></td>
                    <td>{{ $profile->name }}</td>
                    <td>{{ $gen }}</td>
                    <td>{{ date('d-m-Y', strtotime($profile->dob)) }}</td>
                    <td>{{ $profile->roles->userrole }}</td>
                    <td>{{ $profile->mobile }}</td>
                    <td>{{ $profile->email }}</td>
                    <td>{{ $profile->address }}</td>
                    <td>
                        <form action="{{ route('users.destroy',$profile->profileid) }}" method="POST">


                            <a class="btn btn-info" href="{{ route('users.show',$profile->profileid) }}">Show</a>
                            <a class="btn btn-primary" href="{{ route('users.edit',$profile->profileid) }}">Edit</a>

                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}">


                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
        @endforeach
    </table>
{{-- {{ route('profile.show',$profile->profileid) }}
{{ route('profile.edit',$profile->profileid) }} --}}
@endsection