<section class="content-header">
    <h1>
        Discounts
        <small>Updated</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i>Home</a>
        <li><a href="{{url('/diskons')}}"><i class="fa fa-tag"></i>Discounts</a>
        <li class="active"><i class="fa fa-plus"></i>Create New</a>
    </ol>
</section>

<!-- {{-- main content --}} -->
<section>

    <!-- {{-- default box --}} -->
    <section class="content">

            <!-- Default box -->
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Update Discounts</h3> 
                <button type="button" class="btn btn-info btn-xs pull-right" data-toggle="modal" data-target="#myModal">Delete</button>
              </div>
              <div class="box-body">
                {{ Form::open(array('url' => 'diskons/update/'.$diskons->iddiskons, 'class' => 'form-horizontal', 'files' => 'true')) }}
                <div class="form-group">
                  <label class="col-sm-2 control-label">Name</label>
                  <div class="col-sm-5">
                    <!-- {{-- name:name untuk melempar controller ke database --}} -->
                    <input type="text" class="form-control" value="{{$diskons->name}}" name="name" required>
                  </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Images<span class="required">*</span>
                    </label>
                    <div class="col-sm-5">
                      <input type="file" id="images" name="images" class="form-control col-md-7 col-xs-12">
                      {{-- <img class="img-rounded zoom" id="img-upload" width="50"> --}}
                      <img class="img-rounded zoom" id="img-upload" src="{{asset('images/diskons')}}/{{$diskons->images}}" width="50">
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
                        <input type="text" class="form-control datepicker pull-right" name="start_date" id="date" data-date-format='yyyy-mm-dd' value="{{$diskons->start_date}}" autocomplete="off">
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
                        <input type="text" class="form-control datepicker pull-right" name="end_date" id="date" data-date-format='yyyy-mm-dd' value="{{$diskons->end_date}}" autocomplete="off">
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Description</label>
                    </label>
                    <div class="col-sm-5">
                    <textarea name="description" rows="3"  class="form-control" required>{{$diskons->description}}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Status</label>
                    <div class="col-sm-10">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" name="active" checked> Active
                        </label>
                      </div>
                    </div>
                </div>

                <hr>
                <div class="form-group">
                  <label class="col-sm-2 control-label"></label>
                  <div class="col-sm-5">
                    <a href="{{url('diskons')}}" class="btn btn-warning pull-right">Back</a>
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
        <h4 class="modal-title">Delete Diskon</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure delete Diskons ?</p>
      </div>
      <div class="modal-footer">
          {{Form::open(array('url' => 'diskons/delete/'.$diskons->iddiskons,'method'=>'delete','class' => 'form-horizontal'))}}
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        <input type="submit" class="btn btn-danger" value="Yes">
        {{Form::close()}}
      </div>
    </div>
    
  </div>
</div>

