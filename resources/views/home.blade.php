@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row">
      <div class="col-md-12 col-md-offset">
         <div class="panel panel-default">
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <div class="panel-heading">Employees Dashboard</div>
            <div class="panel-body">
               <p hidden class="no-employees-text"> Employees doesn't exist. Would you like to add a new one? </p>
               {{ csrf_field() }}
               @if($employees->count())
               <table class = "table">
                  <tr id="table-heading">
                     <th>First Name</th>
                     <th>Last Name</th>
                     <th>Gender</th>
                     <th>Address</th>
                     <th>Email</th>
                     <th>Phone</th>
                     <th>Department</th>
                     <th>Job</th>
                     <th>Salary</th>
                     <th>Job Description</th>
                     <th width="210">Action</th>
                  </tr>
                  <tbody id="employee-list" name="employee-list">
                     @foreach($employees as $employee)
                     <tr>
                        <tr data-id="{{$employee->id}}">
                           <td>{{$employee->first_name}}</td>
                           <td>{{$employee->last_name}}</td>
                           @if($employee->sex == 0)
                           <td>Male</td>
                           @elseif($employee->sex == 1)
                           <td>Female</td>
                           @endif
                           <td>{{$employee->address}}</td>
                           <td>{{$employee->email}}</td>
                           <td>{{$employee->phone}}</td>
                           <td>{{$employee->department}}</td>
                           <td>{{$employee->job}}</td>
                           <td>{{$employee->salary}}</td>
                           <td>{{$employee->job_description}}</td>
                           <td width="210">
                              <button class="btn btn-warning view-employee-button" data-toggle="modal" data-target="#viewModal" value="{{$employee->id}}">
                              View
                              </button>
                              <button class="btn btn-primary edit-employee-button" value="{{$employee->id}}">
                              Edit
                              </button>
                              <button class="btn btn-danger delete-modal" value="{{$employee->id}}">
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
         </div>
         <button class="btn btn-success add-employee-button" data-toggle="modal" data-target="#editModal">
         Add new employee
         </button>
      </div>
   </div>
</div>
{{-- Edit Modal --}}
<div class="modal fade" id="editModal" role="dialog" tabindex='-1'>
   <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title edit-employee-title">Edit Employee</h4>
            
         </div>
         <div class="modal-body">
            <span class="move-left">
               <div class = "form-group">
                  <button class="edit-modal btn btn-success update-employee-button" data-toggle="modal" data-target="#editModal">
                  Update Employee
                  </button>
                  <button class="btn btn-primary" type="button" class="btn btn-default" data-dismiss="modal">
                  Back
                  </button>
               </span>
            </div>
            <form id="edit-form" data-toggle="validator" role="form">
               <input name="_token" type="hidden" value="{{ csrf_token() }}" />
               <div class="form-group has-feedback">
                  <label name="first_name" for="first_name" class="control-label">Enter first name:</label>
                  <div class="input-group">
                     <input name="first_name" type="text" pattern="^[_A-z0-9]{1,}$" maxlength="15" class="form-control" id="first_name" placeholder="Enter first name." required>
                  </div>
                  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                  <div class="help-block with-errors">First name required.</div>
               </div>
               <div class="form-group has-feedback">
                  <label name="last_name" for="last_name" class="control-label">Enter last name:</label>
                  <div class="input-group">
                     <input name="last_name" type="text" pattern="^[_A-z0-9]{1,}$" maxlength="15" class="form-control" id="last_name" placeholder="Enter last name." required>
                  </div>
                  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                  <div class="help-block with-errors">Last name required.</div>
               </div>
               <div class="input-group">
                  {!! Form::label('sex', 'Select gender:', ['id'=>'sex_label', 'for'=>'sex']) !!}
                  {!! Form::select('sex', ['0' => 'Male', '1' => 'Female'], null, ['class'=>'form-control', 'id'=>'sex']) !!}
               </div>
               <div class="form-group has-feedback">
                  <label name="address" for="address" class="control-label">Enter address:</label>
                  <div class="input-group">
                     {{-- <span class="input-group-addon">@</span> --}}
                     <input name="address" type="text" pattern="^[_A-z0-9]{1,}$" maxlength="15" class="form-control" id="address" placeholder="Enter address." required>
                  </div>
                  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                  <div class="help-block with-errors">Address required.</div>
               </div>
               <div class="form-group">
                  {{-- <span class="form-group-addon">@</span> --}}
                  <label name="email" for="email" class="control-label">Enter email:</label>
                  <input   name="email" type="email" class="form-control" id="email" placeholder="Email" data-error="Bruh, that email address is invalid" required>
                  <div class="help-block with-errors"></div>
               </div>
               <div class="form-group has-feedback">
                  <label name="phone" for="phone" class="control-label">Enter phone:</label>
                  <div class="input-group">
                     <input name="phone" type="number" pattern="\d" maxlength="10" class="form-control" id="phone" placeholder="Enter phone." required>
                  </div>
                  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                  <div class="help-block with-errors">Phone required.</div>
               </div>
               <div class="form-group has-feedback">
                  <label name="department" for="department" class="control-label">Enter department:</label>
                  <div class="input-group">
                     <input name="department" type="text" pattern="^[_A-z0-9]{1,}$" maxlength="15" class="form-control" id="department" placeholder="Enter department." required>
                  </div>
                  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                  <div class="help-block with-errors">Department required.</div>
               </div>
               <div class="form-group has-feedback">
                  <label name="job" for="job" class="control-label">Enter job:</label>
                  <div class="input-group">
                     <input name="job" type="text" pattern="^[_A-z0-9]{1,}$" maxlength="15" class="form-control" id="job" placeholder="Enter job." required>
                  </div>
                  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                  <div class="help-block with-errors">Job required.</div>
               </div>
               <div class="form-group has-feedback">
                  <label name="salary" for="salary" class="control-label">Enter salary:</label>
                  <div class="input-group">
                     <span class="input-group-addon">$</span>
                     <input name="salary" type="text" pattern="^[_A-z0-9]{1,}$" maxlength="15" class="form-control" id="salary" placeholder="Enter salary." required>
                  </div>
                  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                  <div class="help-block with-errors">Salary required.</div>
               </div>
               <div class="form-group has-feedback">
                  <label name="job_description" for="job_description" class="control-label">Enter job description:</label>
                  <div class="input-group">
                     <input name="job_description" type="text" pattern="^[_A-z0-9]{1,}$" maxlength="300" class="form-control" id="job_description" placeholder="Enter job description." required>
                  </div>
                  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                  <div class="help-block with-errors">Job description required.</div>
               </div>
            </div>
         </form>
         <div class="modal-footer">
            <span class="pull-left">
               <button class="edit-modal btn btn-success update-employee-button" data-toggle="modal" value=""  data-target="#editModal">
               Update Employee
               </button>
               <button class="btn btn-primary" type="button" class="btn btn-default" data-dismiss="modal">
               Back
               </button>
            </span>
         </div>
      </div>
   </div>
</div>
<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" role="dialog" tabindex='-1'>
   <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Delete Employee</h4>
         </div>
         <div class="modal-body">
            <p>Are you sure you want to delete this employee?</p>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-danger delete-button" value="" data-dismiss="modal" >Delete</button>
            <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
         </div>
      </div>
   </div>
</div>
{{-- View Modal --}}
<div class="modal fade" id="viewModal" role="dialog" tabindex='-1'>
   <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">View Employee</h4>
         </div>
         <div class="modal-body">
            {{-- <span class="move-left"> --}}
               <div class = "form-group">
                  <button class="btn btn-primary" type="button" class="btn btn-default" data-dismiss="modal">
                  Back
                  </button>
               {{-- </span> --}}
            </div>
            <form id="view-form">
               <input name="_token" type="hidden" value="{{ csrf_token() }}" />
               <div class="panel-sizing">
                  <div class="form-group">
                     <div class="panel panel-info">
                        <div class="panel-heading"><b>{{'First name'}}</b></div>
                        <div class="panel-body">
                           <p id="view-first-name"></p>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="panel panel-info">
                        <div class="panel-heading"><b>{{'Last name'}}</b></div>
                        <div class="panel-body">
                           <p id="view-last-name"></p>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="panel panel-info">
                        <div class="panel-heading"><b>{{'Gender'}}</b></div>
                        <div class="panel-body">
                           <p id="view-sex"></p>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="panel panel-info">
                        <div class="panel-heading"><b>{{'Address'}}</b></div>
                        <div class="panel-body">
                           <p id="view-address"></p>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="panel panel-info">
                        <div class="panel-heading"><b>{{'Email'}}</b></div>
                        <div class="panel-body">
                           <p id="view-email"></p>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="panel panel-info">
                        <div class="panel-heading"><b>{{'Phone'}}</b></div>
                        <div class="panel-body">
                           <p id="view-phone"></p>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="panel panel-info">
                        <div class="panel-heading"><b>{{'Department'}}</b></div>
                        <div class="panel-body">
                           <p id="view-department"></p>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="panel panel-info">
                        <div class="panel-heading"><b>{{'Job'}}</b></div>
                        <div class="panel-body">
                           <p id="view-job"></p>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="panel panel-info">
                        <div class="panel-heading"><b>{{'Salary'}}</b></div>
                        <div class="panel-body">
                           <p id="view-salary"></p>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="panel panel-info">
                        <div class="panel-heading"><b>{{'Job Descrption'}}</b></div>
                        <div class="panel-body">
                           <p id="view-job-description"></p>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
            <div class="modal-footer">
               <span class="pull-left">
                  <button class="btn btn-primary" type="button" class="btn btn-default" data-dismiss="modal">
                  Back
                  </button>
               </span>
            </div>
         </div>
      </div>
   </div>
   @endsection
   <script type="text/javascript" src="{{ asset('js/app.js') }}?v={{time()}}"></script>
   <script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js" integrity="sha256-dHf/YjH1A4tewEsKUSmNnV05DDbfGN3g7NMq86xgGh8=" crossorigin="anonymous"></script>
   <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">