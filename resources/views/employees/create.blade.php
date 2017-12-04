@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row">
      <div class="col-md col-md-offset">
         <div class="panel panel-default">
            <div class="panel-heading">
               <h3>Add Employees</h3>
            </div>
            {{-- displaying errors --}}
            @if(count($errors))
            <ul class = 'alert alert-danger'>
               @foreach($errors->all() as $error)
               {{ $error }} <br>
               @endforeach
            </ul>
            @endif
            <div class="panel-body">
               {!! Form::open(array('route'=>'employee.store')) !!}
               <div class = "form-group">
                  {!! Form::button('Add Employee', ['type'=>'submit', 'class'=>'btn btn-success', 'id'=>'modal-save'])!!}
                  {{link_to_route('employee.index', 'Back', null, ['class' =>'btn btn-success'])}} 
               </div>
               <div class = "form-group">
                  {!! Form::label('first_name', 'Enter first name:') !!}
                  {!! Form::text('first_name', null, ['id'=>'first_name', 'class'=>'form-control']) !!}
               </div>
               <div class = "form-group">
                  {!! Form::label('last_name', 'Enter last name:') !!}
                  {!! Form::text('last_name', null, ['id'=>'last_name', 'class'=>'form-control']) !!}
               </div>
               <div class="form-group">
                  {!! Form::label('sex', 'Select gender:') !!}
                  {!! Form::select('sex', ['' => 'Select gender', '0' => 'Male', '1' => 'Female'], null, ['id'=>'sex',
                  'class'=>'form-control']) !!}
               </div>
               <div class = "form-group">
                  {!! Form::label('address', 'Enter address:') !!}
                  {!! Form::text('address', null, ['id'=>'address', 'class'=>'form-control']) !!}
               </div>
               <div class = "form-group">
                  {!! Form::label('email', 'Enter e-mail:') !!}
                  {!! Form::text('email', null, ['id'=>'email', 'class'=>'form-control']) !!}
               </div>
               <div class = "form-group">
                  {!! Form::label('phone', 'Enter phone:') !!}
                  {!! Form::text('phone', null, ['id'=>'phone', 'class'=>'form-control']) !!}
               </div>
               <div class = "form-group">
                  {!! Form::label('department', 'Enter department:') !!}
                  {!! Form::text('department', null, ['id'=>'department', 'class'=>'form-control']) !!}
               </div>
               <div class = "form-group">
                  {!! Form::label('job', 'Enter job:') !!}
                  {!! Form::text('job', null, ['id'=>'job', 'class'=>'form-control']) !!}
               </div>
               <div class = "form-group">
                  {!! Form::label('salary', 'Enter salary:') !!}
                  {!! Form::text('salary', null, ['id'=>'salary', 'class'=>'form-control']) !!}
               </div>
               <div class = "form-group">
                  {!! Form::label('job_description', 'Enter job description:') !!}
                  {!! Form::textarea('job_description', null, ['id'=>'job_description', 'class'=>'form-control']) !!}
               </div>
               <div class = "form-group">
                  {!! Form::button('Add Employee', ['type'=>'submit', 'class'=>'btn btn-success'])!!}
                  {{link_to_route('employee.index', 'Back', null, ['class' =>'btn btn-success'])}} 
               </div>
               {!! Form::close() !!}
            </div>
         </div>
      </div>
   </div>
</div>

{{--     <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript">
    alert('test')
    </script> --}}
@endsection