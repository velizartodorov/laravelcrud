<!DOCTYPE html>
<style type="text/css">
.panel-default{
width: 400px;
margin: auto;
}

.btn-wrapper{
 text-align: center;
}

#viewModal .modal-body, #editModal  .modal-body{
height: 500px;
overflow-y: auto;
}
</style>
<html>
   <header>
      <meta content="width=device-width, initial-scale=1" name="viewport">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
      </script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
      </script>
      <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
      <script src="{{ asset('js/app.js') }}?v={{time()}}" type="text/javascript">
      </script>
      <script src="{{ asset('js/script.js') }}" type="text/javascript">
      </script>
      <script src="{{ asset('js/validator.js') }}" type="text/javascript">
      </script>
      <script src="{{ asset('js/validator.min.js') }}" type="text/javascript">
      </script>
   </link>
   </meta>
</header>
<body>
   @extends('layouts.app')
   @section('content')
   <div class="container">
      <div class="row">
         <div class="col-md-12 col-md-offset">
            <div class="panel panel-default">
               <meta content="{{ csrf_token() }}" name="csrf-token">
               <div class="panel-heading">
                  Employees Dashboard
               </div>
               <div class="panel-body">
                  <p class="no-employees-text" hidden="">
                     Employees doesn't exist. Would you like to add a new one?
                  </p>
                  {{ csrf_field() }}
                  @if($employees->count())
                  <table class="table">
                     <tr id="table-heading">
                        <th>
                           First Name
                        </th>
                        <th>
                           Last Name
                        </th>
                        <th width="210">
                           Action
                        </th>
                     </tr>
                     <tbody id="employee-list" name="employee-list">
                        @foreach($employees as $employee)
                        <tr>
                           <tr data-id="{{$employee->id}}">
                              <td>
                                 {{$employee->first_name}}
                              </td>
                              <td>
                                 {{$employee->last_name}}
                              </td>
                              <td width="210">
                                 <button class="btn btn-warning view-employee-button" data-target="#viewModal" data-toggle="modal" value="{{$employee->id}}">
                                 View
                                 </button>
                                 <button class="btn btn-primary edit-employee-button" type="submit" value="{{$employee->id}}">
                                 Edit
                                 </button>
                                 <button class="btn btn-danger delete-modal" data-target="#deleteModal" data-toggle="modal" value="{{$employee->id}}">
                                 Delete
                                 </button>
                              </td>
                           </tr>
                        </tr>
                     </tbody>
                     @endforeach
                  </table>
                  @endif
               </div>
               </meta>
            </div>
            <div class='btn-wrapper'>
            <input type='button' class="btn btn-success add-employee-button newe" data-target="#editModal" value='Add new employee' data-toggle="modal">
            </div>
         </div>
      </div>
   </div>
   {{-- Edit Modal Form --}}
   <div class="modal fade" id="editModal" role="dialog" tabindex="-1">
      <div class="modal-dialog">
         <!-- Modal content-->
         <div class="modal-content">
            <div class="modal-header">
               <button class="close" data-dismiss="modal" type="button">
               ×
               </button>
               <h4 class="modal-title edit-employee-title">
               Edit Employee
               </h4>
            </div>
            @if(count($errors) > 0)
            <ul class="alert alert-danger">
               @foreach($errors->all() as $error)
               {{ $error }}
               <br>
               @endforeach
               </br>
            </ul>
            @endif
            <div class="modal-body">
               <form data-toggle="validator" id="edit-form" role="form">
                  <div class="form-group has-feedback">
                     <label class="control-label" for="first_name" name="first_name">
                        Enter first name:
                     </label>
                     <input class="form-control" id="first_name" maxlength="15" name="first_name" pattern="^[A-Z]{1}[a-z]+$" placeholder="Enter first name:" required="" type="text">
                     <div class="help-block with-errors">
                     </div>
                     </input>
                  </div>
                  <div class="form-group has-feedback">
                     <label class="control-label" for="last_name" name="last_name">
                        Enter last name:
                     </label>
                     <input class="form-control" id="last_name" maxlength="15" name="last_name" pattern="^[A-Z]{1}[a-z]+$" placeholder="Enter last name:" required="" type="text">
                     <div class="help-block with-errors">
                     </div>
                     </input>
                  </div>
                  <div class="form-group has feedback">
                     <label for="sex" name="sex">
                        Select gender:
                     </label>
                     <select class="form-control" id="sex" maxlength="15" name="sex" required="">
                        <option value="">
                           Select gender
                        </option>
                        <option value="0">
                           Male
                        </option>
                        <option value="1">
                           Female
                        </option>
                     </select>
                     <div class="help-block with-errors">
                     </div>
                  </div>
                  <div class="form-group has-feedback">
                     <label class="control-label" for="address" name="address">
                        Enter address:
                     </label>
                     <input class="form-control" id="address" maxlength="15" name="address" placeholder="Enter address:" required="" type="text">
                     <div class="help-block with-errors">
                     </div>
                     </input>
                  </div>
                  <div class="form-group">
                     <label class="control-label" for="email" name="email">
                        Enter email:
                     </label>
                     <input class="form-control" data-error="Bruh, that email address is invalid" id="email" maxlength="15" name="email" placeholder="Enter email" required="" type="email">
                     <div class="help-block with-errors">
                     </div>
                     </input>
                  </div>
                  <div class="form-group has-feedback">
                     <label class="control-label" for="phone" name="phone">
                        Enter phone:
                     </label>
                     <div class="input-group">
                        <span class="input-group-addon">
                           <span aria-hidden="true" class="glyphicon glyphicon-earphone">
                           </span>
                        </span>
                        <input class="form-control" id="phone" maxlength="15" name="phone" pattern="^\d+$" placeholder="Enter phone" required="" type="text">
                        </input>
                     </div>
                     <span aria-hidden="true" class="glyphicon form-control-feedback">
                     </span>
                     <div class="help-block with-errors">
                     </div>
                  </div>
                  <div class="form-group has-feedback">
                     <label class="control-label" for="department" name="department">
                        Enter department:
                     </label>
                     <input class="form-control" id="department" maxlength="15" name="department" placeholder="Enter department." required="" type="text">
                     <span aria-hidden="true" class="glyphicon form-control-feedback">
                     </span>
                     <div class="help-block with-errors">
                     </div>
                     </input>
                  </div>
                  <div class="form-group has-feedback">
                     <label class="control-label" for="job" name="job">
                        Enter job:
                     </label>
                     <input class="form-control" id="job" maxlength="15" name="job" placeholder="Enter job." required="" type="text">
                     <span aria-hidden="true" class="glyphicon form-control-feedback">
                     </span>
                     <div class="help-block with-errors">
                     </div>
                     </input>
                  </div>
                  <div class="form-group has-feedback">
                     <label class="control-label" for="salary" name="salary">
                        Enter salary:
                     </label>
                     <input class="form-control" id="salary" maxlength="15" name="salary" pattern="^\d+$" placeholder="Enter salary." required="" type="text">
                     <span aria-hidden="true" class="glyphicon form-control-feedback">
                     </span>
                     <div class="help-block with-errors">
                     </div>
                     </input>
                  </div>
                  <div class="form-group has-feedback">
                     <label class="control-label" for="job_description" name="job_description">
                        Enter job description:
                     </label>
                     <textarea class="form-control" id="job_description" maxlength="15" name="job_description" required="" type="text">
                     </textarea>
                     <div class="help-block with-errors">
                     </div>
                  </div>
                  <div class="form-group">
                     <button class="edit-modal btn btn-success update-employee-button" id="update-btn" type="submit">
                     Update Employee
                     </button>
                     <button class="btn btn-default" data-dismiss="modal" type="button">
                     Back
                     </button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
   {{-- Delete Modal Form --}}
   <div class="modal fade" id="deleteModal" role="dialog" tabindex="-1">
      <div class="modal-dialog">
         <!-- Modal content-->
         <div class="modal-content">
            <div class="modal-header">
               <button class="close" data-dismiss="modal" type="button">
               ×
               </button>
               <h4 class="modal-title edit-employee-title">
               Delete Employee
               </h4>
            </div>
            <div class="modal-body">
               <p>
                  Are you sure you want to delete this employee?
               </p>
            </div>
            <div class="modal-footer">
               <button class="btn btn-danger delete-button" data-dismiss="modal" type="button" value="">
               Delete
               </button>
               <button class="btn btn-primary" data-dismiss="modal" type="button">
               Cancel
               </button>
            </div>
         </div>
      </div>
   </div>
</body>
</html>
{{-- View Modal --}}
<div class="modal fade" id="viewModal" role="dialog" tabindex="-1">
<div class="modal-dialog">
   <!-- Modal content-->
   <div class="modal-content">
      <div class="modal-header">
         <button class="close" data-dismiss="modal" type="button">
         ×
         </button>
         <h4 class="modal-title">
         View Employee
         </h4>
      </div>
      <div class="modal-body">
         {{--
         <span class="move-left">
            --}}
            <div class="form-group">
               <button class="btn btn-primary" data-dismiss="modal" type="button">
               Back
               </button>
               {{--
            </div>
         </span>
         --}}
      </div>
      <form id="view-form">
         <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
         <div class="panel-sizing">
            <div class="form-group">
               <div class="panel panel-info">
                  <div class="panel-heading">
                     <b>
                     {{'First name'}}
                     </b>
                  </div>
                  <div class="panel-body">
                     <p id="view-first-name">
                     </p>
                  </div>
               </div>
            </div>
            <div class="form-group">
               <div class="panel panel-info">
                  <div class="panel-heading">
                     <b>
                     {{'Last name'}}
                     </b>
                  </div>
                  <div class="panel-body">
                     <p id="view-last-name">
                     </p>
                  </div>
               </div>
            </div>
            <div class="form-group">
               <div class="panel panel-info">
                  <div class="panel-heading">
                     <b>
                     {{'Gender'}}
                     </b>
                  </div>
                  <div class="panel-body">
                     <p id="view-sex">
                     </p>
                  </div>
               </div>
            </div>
            <div class="form-group">
               <div class="panel panel-info">
                  <div class="panel-heading">
                     <b>
                     {{'Address'}}
                     </b>
                  </div>
                  <div class="panel-body">
                     <p id="view-address">
                     </p>
                  </div>
               </div>
            </div>
            <div class="form-group">
               <div class="panel panel-info">
                  <div class="panel-heading">
                     <b>
                     {{'Email'}}
                     </b>
                  </div>
                  <div class="panel-body">
                     <p id="view-email">
                     </p>
                  </div>
               </div>
            </div>
            <div class="form-group">
               <div class="panel panel-info">
                  <div class="panel-heading">
                     <b>
                     {{'Phone'}}
                     </b>
                  </div>
                  <div class="panel-body">
                     <p id="view-phone">
                     </p>
                  </div>
               </div>
            </div>
            <div class="form-group">
               <div class="panel panel-info">
                  <div class="panel-heading">
                     <b>
                     {{'Department'}}
                     </b>
                  </div>
                  <div class="panel-body">
                     <p id="view-department">
                     </p>
                  </div>
               </div>
            </div>
            <div class="form-group">
               <div class="panel panel-info">
                  <div class="panel-heading">
                     <b>
                     {{'Job'}}
                     </b>
                  </div>
                  <div class="panel-body">
                     <p id="view-job">
                     </p>
                  </div>
               </div>
            </div>
            <div class="form-group">
               <div class="panel panel-info">
                  <div class="panel-heading">
                     <b>
                     {{'Salary'}}
                     </b>
                  </div>
                  <div class="panel-body">
                     <p id="view-salary">
                     </p>
                  </div>
               </div>
            </div>
            <div class="form-group">
               <div class="panel panel-info">
                  <div class="panel-heading">
                     <b>
                     {{'Job Descrption'}}
                     </b>
                  </div>
                  <div class="panel-body">
                     <p id="view-job-description">
                     </p>
                  </div>
               </div>
            </div>
         </div>
      </form>
      <div class="modal-footer">
         <span class="pull-left">
            <button class="btn btn-primary" data-dismiss="modal" type="button">
            Back
            </button>
         </span>
      </div>
   </div>
</div>
</div>
@endsection