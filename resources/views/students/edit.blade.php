@extends('../layouts/master')
<!--title -->
@section('title')
Update Student
@stop

@section('content')

<div class="row main">
    <div class="panel-heading ">
        <div class="panel-title text-center">
            <h1 class="title">Update Student</h1>
            <hr/>
        </div>
    </div>
    <div class="main-login main-center">
        <img class="profile-img"  src="{{url('images/'.$student_data->Image)}}" alt="">

        <form class="form-horizontal" method="post" action="{{route('students.update',$student_data->id)}}" autocomplete="off">
            <!-- First name .................................-->
            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
            <input type="hidden" name="_method" value="put" />

            <div class="form-group">
                <label for="first" class="cols-sm-2 control-label">First Name</label>

                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                        <input value="{{$student_data->FirstName }}" type="text" class="form-control"
                               name="firstname" id="first" placeholder="Enter your first name"/>
                    </div>
                    @if($errors->has('firstname'))
                    <span class="error">{{ $errors->first('firstname') }}</span>
                    @endif
                </div>
            </div>

            <!-- Last Name ...............................-->
            <div class="form-group">
                <label for="lastname" class="cols-sm-2 control-label">Last Name</label>

                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user fa"></i></span>
                        <input type="text" class="form-control" value="{{$student_data->LastName }}"
                               name="lastname" id="lastname" placeholder="Enter your last name"/>
                    </div>
                    @if($errors->has('lastname'))
                    <span class="error">{{ $errors->first('lastname') }}</span>
                    @endif
                </div>
            </div>

            <!-- Gender ....................................-->
            <div class="form-group">
                <label for="sex" class="cols-sm-2 control-label">Gender</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user fa"></i></span>
                        <select class="form-control" name="gender" >
                            <option value="Male" @if($student_data->Gender  == 'Male') {{ 'selected' }} @endif  >Male</option>
                            <option value="Female" @if($student_data->Gender == 'Female') {{ 'selected' }} @endif >Female</option>
                        </select>
                    </div>
                    @if($errors->has('gender'))
                    <span class="error">{{ $errors->first('gender') }}</span>
                    @endif
                </div>
            </div>

            <!-- Email ..........................-->
            <div class="form-group">
                <label for="email" class="cols-sm-2 control-label">Your Email</label>

                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                        <input type="email" value="{{$student_data->Email }}" class="form-control" autocomplete="new-email"
                               name="email" id="email" placeholder="Enter your email"/>
                    </div>
                    @if($errors->has('email'))
                    <span class="error">{{ $errors->first('email') }}</span>
                    @endif
                </div>

            </div>



            <div class="form-group ">
                <div class="col-md-8 col-md-offset-3 col-xs-8 col-xs-offset-3">
                    <button id="send" type="submit" class="btn btn-primary"><span
                            class="glyphicon glyphicon-pencil"></span>&nbsp;&nbsp;Update
                    </button>
                    &nbsp;
                    <a href="{{url('students')}}" class="btn btn-danger"><span
                            class="glyphicon glyphicon-floppy-remove glyphicon-white"></span>&nbsp;Cancel</a>
                </div>
            </div>
            <div class="login-register" style="display: block;text-align: center;">
            </div>
        </form>
    </div>
</div>
@stop

