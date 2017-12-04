@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md col-md-offset">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Edit Employee</h3></div>

                {{-- displaying errors --}}

                 @if(count($errors) > 0)
                        <ul class = 'alert alert-danger'>
                            @foreach($errors->all() as $error)
                                {{ $error }} <br>
                            @endforeach
                        </ul>
                @endif

                <div class="panel-body">
                    {!! Form::model($employee, array('route'=>['employees.update', $employee->id], 'method'=>'PUT'))!!}

                        <div class = "form-group">
                            {!! Form::button('Update Employee', ['type'=>'submit', 'class'=>'btn btn-success'])!!}
                            {{link_to_route('employees.index', 'Back', null, ['class' =>'btn btn-success'])}} 
                        </div>
                        
                        <div class = "form-group">
                            {!! Form::label('first_name', 'Enter first name:') !!}
                            {!! Form::text('first_name', null, ['class'=>'form-control']) !!}
                        </div>

                        <div class = "form-group">
                            {!! Form::label('last_name', 'Enter last name:') !!}
                            {!! Form::text('last_name', null, ['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('sex', 'Select gender:') !!}
                            {!! Form::select('sex', ['0' => 'Male', '1' => 'Female'], null, ['class'=>'form-control']) !!}
                        </div>

                        <div class = "form-group">
                            {!! Form::label('address', 'Enter address:') !!}
                            {!! Form::text('address', null, ['class'=>'form-control']) !!}
                        </div>

                         <div class = "form-group">
                            {!! Form::label('email', 'Enter e-mail:') !!}
                            {!! Form::text('email', null, ['class'=>'form-control']) !!}
                        </div>

                        <div class = "form-group">
                            {!! Form::label('phone', 'Enter phone:') !!}
                            {!! Form::text('phone', null, ['class'=>'form-control']) !!}
                        </div>

                        <div class = "form-group">
                            {!! Form::label('department', 'Enter department:') !!}
                            {!! Form::text('department', null, ['class'=>'form-control']) !!}
                        </div>

                        <div class = "form-group">
                            {!! Form::label('job', 'Enter job:') !!}
                            {!! Form::text('job', null, ['class'=>'form-control']) !!}
                        </div>

                        <div class = "form-group">
                            {!! Form::label('salary', 'Enter salary:') !!}
                            {!! Form::text('salary', null, ['class'=>'form-control']) !!}
                        </div>

                        <div class = "form-group">
                            {!! Form::label('job_description', 'Enter job description:') !!}
                            {!! Form::textarea('job_description', null, ['class'=>'form-control']) !!}
                        </div>

                        <div class = "form-group">
                            {!! Form::button('Update Employee', ['type'=>'submit', 'class'=>'btn btn-success'])!!}
                            {{link_to_route('employees.index', 'Back', null, ['class' =>'btn btn-success'])}} 
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection