@extends('../layouts/master')
<!--title -->
@section('title')
Update Student
@stop

@section('content')

<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" style="margin-top: 10px;">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <span class="panel-title" class="center">View Detail</span>
                    <a href="{{URL('students')}}" style="color:red;font-size:28px;" class="close"
                       id="close"><span
                            aria-hidden="true">&times;</span></a>
                </div>

                <div class="panel-body">

                    <div class="row">
                        <div class="col-md-3 col-lg-3 " align="center"><img alt="User Pic"
                                                                            src="{{url('images/'.$students_detail->Image)}}"
                                                                            class="img-circle img-responsive"></div>
                        <div class=" col-md-9 col-lg-9 ">
                            <table class="table table-user-information">
                                <tbody>
                                <tr>
                                    <td>First Name:</td>
                                    <td>{{$students_detail->FirstName}}</td>
                                </tr>
                                <tr>
                                    <td>Last Name:</td>
                                    <td>{{$students_detail->LastName}}</td>
                                </tr>
                                <tr>
                                    <td>Email:</td>
                                    <td>{{$students_detail->Email}}</td>
                                </tr>

                                <tr>
                                <tr>
                                    <td>Gender:</td>
                                    <td>{{$students_detail->Gender}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                    </div
                </div>

            </div>
        </div>
    </div>
</div>
@stop

