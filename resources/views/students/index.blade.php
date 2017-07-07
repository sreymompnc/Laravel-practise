
@extends('../layouts.app')
<!--title -->
@section('title')
Student Management
@stop

@section('content')

<div class="content">
    <div class="row">
        <div class="col-md-6 col-md-offset-3" >
            <h1 class="text-center ">Student Management</h1>
        </div>
    </div>

        <form action="{{url('/search')}}" method="post">
            <label>
                <input id="searchinput" name="search_stu" type="search" placeholder="First Name" class="form-control input-md">
            </label>
            <button class="btn btn-primary" type="submit">Search</button>
            <a href="{{URL('students')}}" class="btn btn-danger">Cancel</a>

        </form>

    <a href="{{route('students.create')}}" class="btn btn-success" style="margin-bottom: 10px;"><i class="glyphicon glyphicon-plus-sign"></i>&nbsp;&nbsp;Add Student</a>

    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr class="bg-info">
            <th class="text-center">Id</th>
            <th class="text-center">Photo</th>
            <th class="text-center">First Name</th>
            <th class="text-center">Last Name</th>
            <th class="text-center">Email</th>
            <th class="text-center" colspan="3">Actions</th>
        </tr>
        </thead>
        <tbody style="background: white;">

        @foreach ($students as $student)
        <tr>

            <td>{{ $student->id }}</td>
            <td class="text-center"><img src="{{url('images/'.$student->Image)}}" style="width:100px;height: 100px;" class="img-circle "></td>
            <td>{{ $student->FirstName }}</td>
            <td>{{ $student->LastName }}</td>
            <td>{{ $student->Email }}</td>

            <td><a href="{{route('students.show',$student->id)}}" class="btn btn-primary"><span class="glyphicon glyphicon-eye-open"></span>&nbsp;&nbsp;Read</a></td>
            <td><a href="{{route('students.edit',$student->id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span>&nbsp;&nbsp;Update</a></td>
            <td>
                {!! Form::open(['method' => 'DELETE', 'route'=>['students.destroy', $student->id], 'onsubmit' => 'return ConfirmDelete()']) !!}
<!--                <span class="glyphicon glyphicon-floppy-remove"></span>-->
                {!! Form::submit('Delete', ['class' => 'btn btn-danger ']) !!}
                {!! Form::close() !!}
            </td>
        </tr>

        @endforeach


        </tbody>
    </table>
    <!-- display number items of $students that it posted-->
    <div class="text-center">
       {!! $students->links(); !!}
    </div>
</div>
@stop
<script type="text/javascript">
    function ConfirmDelete()
    {
        var sms = confirm("Are you sure you want to delete this student?");
        if (sms)
            return true;
        else
            return false;
    }
</script>



