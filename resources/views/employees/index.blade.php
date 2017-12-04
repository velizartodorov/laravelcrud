@extends('layouts.app')

@section('content')

<div class="container">
   <div class="row">
      <div class="col-md col-md-offset">
         <div class="panel panel-default">
            <div class="panel-heading">
               <h3>Employees</h3>
            </div>
            {{-- Displaying message when editing employee --}}
            @if(Session::has('message-create'))
            <div class="alert alert-success">{{Session::get('message-create')}}</div>
            @endif
            @if(Session::has('message-update'))
            <div class="alert alert-info">{{Session::get('message-update')}}</div>
            @endif
            @if(Session::has('message-delete'))
            <div class="alert alert-danger">{{Session::get('message-delete')}}</div>
            @endif
            <div class="panel-body">
               @if(count($employees)) 
                   <table class = "table">
                      <tr>
                         <th>First Name</th>
                         <th>Last Name</th>
                         <th>Action</th>
                      </tr>
                      @foreach ($employees as $employee)
                      <tr>
                         <td>{{link_to_route('employees.show',  $employee->first_name, [$employee->id] )}}</td>
                         <td>{{link_to_route('employees.show',  $employee->last_name, [$employee->id] )}}</td>
                         <td>
                            {{-- edit button --}}
                            {!! Form::open(array('route'=>['employee.destroy', $employee->id], 'method'=>'DELETE')) !!}
                            {{link_to_route('employees.show', 'View', [$employee->id], ['class' =>'btn btn-warning'])}}
                            {{link_to_route('employees.edit', 'Edit', [$employee->id], ['class' =>'btn btn-primary'])}}
                            {{-- delete button --}}
                            {!! Form::button('Delete', ['class' => 'btn btn-danger', 'type'=>'submit'])!!}
                            {!! Form::close() !!}
                         </td>
                      </tr>
                      @endforeach
                   </table>
               @else
                    Employee doesn't exist. Would you like to add a new one?
               @endif
            </div>
         </div>

         {{link_to_route('employees.create', 'Add new employee', null, ['class' =>'btn btn-success'])}}
      </div>
   </div>
</div>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">

</script>

@endsection