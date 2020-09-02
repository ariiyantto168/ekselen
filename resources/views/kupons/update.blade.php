<section class="content-header">
    <h1>
        Kupons
        <small>Update</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i>Home</a>
        <li class="active"><i class="fa fa-database"></i>Mater</a>
        <li><a href="{{url('/kupons')}}"><i class="fa fa-ticket"></i>Kupons</a>
        <li class="active"><i class="fa fa-plus"></i>Update</a>
    </ol>
</section>

<!-- {{-- main content --}} -->
<section>

    <!-- {{-- default box --}} -->
    <section class="content">

            <!-- Default box -->
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Update</h3>
                <button type="button" class="btn btn-info btn-xs pull-right" data-toggle="modal" data-target="#myModal">Delete</button> 
              </div>
              <div class="box-body">
                {{ Form::open(array('url' => 'kupons/update/'.$kupons->idkupons, 'class' => 'form-horizontal')) }}
                <div class="form-group">
                  <label class="col-sm-2 control-label">Name</label>
                  <div class="col-sm-5">
                    <!-- {{-- name:name untuk melempar controller ke database --}} -->
                    <input type="text" class="form-control" value="{{$kupons->name}}" name="name" required>
                  </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-2 control-label">
                      <label class="">Start Date</label>
                    </div>
                    <div class="col-sm-5">
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control datepicker pull-right" name="start_date" id="date" data-date-format='yyyy-mm-dd' value="{{$kupons->start_date}}" autocomplete="off">
                      </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-2 control-label">
                      <label class="">End Date</label>
                    </div>
                    <div class="col-sm-5">
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control datepicker pull-right" name="end_date" id="date" data-date-format='yyyy-mm-dd' value="{{$kupons->end_date}}" autocomplete="off">
                      </div>
                    </div>
                  </div>

                <hr>
                <div class="form-group">
                  <label class="col-sm-2 control-label"></label>
                  <div class="col-sm-5">
                    <a href="{{url('kupons')}}" class="btn btn-warning pull-right">Back</a>
                    <input type="submit" value="Save" class="btn btn-primary">
                  </div>
                </div>
                {{ Form::close() }}
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          
          </section>
        </section>

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">
  
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Delete Kupons</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure delete Kupons ?</p>
      </div>
      <div class="modal-footer">
          {{Form::open(array('url' => 'kupons/delete/'.$kupons->idkupons,'method'=>'delete','class' => 'form-horizontal'))}}
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        <input type="submit" class="btn btn-danger" value="Yes">
        {{Form::close()}}
      </div>
    </div>
    
  </div>
</div>