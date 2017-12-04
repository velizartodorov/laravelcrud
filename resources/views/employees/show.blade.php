@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row">
      <div class="col-md col-md-offset">
         <div class="panel-group">
            <div class="form-group">
               <div class="panel panel-default">
                  <div class="panel-heading">
                     <h3>View Employee</h3>
                  </div>
                  <div class = "form-group">
                     <div class = "back-button">     
                        {!! Form::open(array('route'=>['employees.destroy', $employee->id], 'method'=>'DELETE')) !!} 
                        {{link_to_route('employee.index', 'Back', null, ['class' =>'btn btn-success'])}} 
                        {{link_to_route('employee.edit', 'Edit', [$employee->id], ['class' =>'btn btn-primary'])}} 
                        {!! Form::button('Delete', ['class' => 'btn btn-danger', 'type'=>'submit'])!!} 
                        {!! Form::close() !!}
                     </div>
                  </div>
                  <div class="panel-sizing">
                     <div class="form-group">
                        <div class="panel panel-info">
                           <div class="panel-heading"><b>{{'First name'}}</b></div>
                           <div class="panel-body">
                              {{$employee->first_name}}
                           </div>
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="panel panel-info">
                           <div class="panel-heading"><b>{{'Last name'}}</b></div>
                           <div class="panel-body">
                              {{$employee->last_name}}
                           </div>
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="panel panel-info">
                           <div class="panel-heading"><b>{{'Gender'}}</b></div>
                           <div class="panel-body">
                              @if($employee->sex == 0)
                              Male
                              @else
                              Female
                              @endif
                           </div>
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="panel panel-info">
                           <div class="panel-heading"><b>{{'Address'}}</b></div>
                           <div class="panel-body">
                              {{$employee->address}}
                           </div>
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="panel panel-info">
                           <div class="panel-heading"><b>{{'Email'}}</b></div>
                           <div class="panel-body">
                              {{$employee->email}}
                           </div>
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="panel panel-info">
                           <div class="panel-heading"><b>{{'Phone'}}</b></div>
                           <div class="panel-body">
                              {{$employee->phone}}
                           </div>
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="panel panel-info">
                           <div class="panel-heading"><b>{{'Department'}}</b></div>
                           <div class="panel-body">
                              {{$employee->department}}
                           </div>
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="panel panel-info">
                           <div class="panel-heading"><b>{{'Job'}}</b></div>
                           <div class="panel-body">
                              {{$employee->job}}
                           </div>
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="panel panel-info">
                           <div class="panel-heading"><b>{{'Salary'}}</b></div>
                           <div class="panel-body">
                              {{'$ '.$employee->salary}}
                           </div>
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="panel panel-info">
                           <div class="panel-heading"><b>{{'Job Descrption'}}</b></div>
                           <div class="panel-body">
                              {{$employee->job}}
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class = "form-group">
                     <div class = "back-button">     
                        {!! Form::open(array('route'=>['employee.destroy', $employee->id], 'method'=>'DELETE')) !!} 
                        {{link_to_route('employee.index', 'Back', null, ['class' =>'btn btn-success'])}} 
                        {{link_to_route('employee.edit', 'Edit', [$employee->id], ['class' =>'btn btn-primary'])}} 
                        {!! Form::button('Delete', ['class' => 'btn btn-danger', 'type'=>'submit'])!!} 
                        {!! Form::close() !!}                   
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
</body>
@endsection