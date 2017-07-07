@extends('../layouts/master')
<!--title -->
@section('title')
Create Student
@stop

@section('content')

<div class="row main">
    <div class="panel-heading ">
        <div class="panel-title text-center">
            <h1 class="title">Add Student</h1>
            <hr/>
        </div>
    </div>
    <div class="main-login main-center">
        <img class="profile-img" src="{{URL::asset('images/192837-200.png')}}" alt="">

        <form class="form-horizontal" method="post" action="{{route('students.store')}}" autocomplete="off" enctype="multipart/form-data">
            <!-- Firstname .................................-->
            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>

            <div class="form-group">
                <label for="first" class="cols-sm-2 control-label">First Name</label>

                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                        <input value="{{ old('firstname') }}" type="text" class="form-control"
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
                        <input type="text" class="form-control" value="{{ old('lastname') }}"
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
                            <option  value="" class="emptyselect">Please select your gender</option>
                            <option value="Male" @if(old('gender') == 'Male') {{ 'selected' }} @endif  >Male</option>
                            <option value="Female" @if(old('gender')== 'Female') {{ 'selected' }} @endif >Female</option>
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
                        <input type="email" value="{{ old('email') }}" class="form-control" autocomplete="new-email"
                               name="email" id="email" placeholder="Enter your email"/>
                    </div>
                    @if($errors->has('email'))
                    <span class="error">{{ $errors->first('email') }}</span>
                    @endif
                </div>

            </div>

            <!-- Password .....................................-->
            <div class="form-group">
                <label for="password" class="cols-sm-2 control-label">Password</label>

                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                        <input type="password" class="form-control" name="password" id="password"
                               autocomplete="new-password" value=""
                               placeholder="Enter your password"/>
                    </div>
                    @if($errors->has('password'))
                    <span class="error">{{ $errors->first('password') }}</span>
                    @endif
                </div>
            </div>

            <!-- Password confirmation.....................................-->
            <div class="form-group">
                <label for="password" class="cols-sm-2 control-label">Confirm Password</label>

                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                        <input type="password" class="form-control" name="password_confirmation" id="password"
                               autocomplete="new-password" value=""
                               placeholder="Confirm your password"/>
                    </div>
                    @if($errors->has('password_confirmation'))
                    <span class="error">{{ $errors->first('password_confirmation') }}</span>
                    @endif
                </div>
            </div>

            <!-- Password confirmation.....................................-->
            <div class="form-group">
                <label for="password" class="cols-sm-2 control-label">Upload Image</label>

                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                        <input type="file" name="image" />
                    </div>

                </div>
            </div>



            <div class="form-group ">
                <div class="col-md-8 col-md-offset-3 col-xs-8 col-xs-offset-3">
                    <button id="send" type="submit" class="btn btn-primary"><span
                            class="glyphicon glyphicon-floppy-disk glyphicon-white"></span>&nbsp;Save
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

