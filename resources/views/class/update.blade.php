<section class="content-header">
    <h1>
        class
        <small>update class</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i>Home</a>
        <li><a href="{{url('/classes')}}"><i class="fa fa-cubes"></i>Class</a>
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
                <h3 class="box-title"> Update</h3> 
                <button type="button" class="btn btn-info btn-xs pull-right" data-toggle="modal" data-target="#myModal">Delete</button>
              </div>
              <div class="box-body">
                {{ Form::open(array('url' => 'classes/update/'.$classes->idclass, 'class' => 'form-horizontal', 'files' => 'true')) }}
                <div class="form-group">
                    <div class="col-sm-2 control-label">
                      <label class="">Name</label>
                    </div>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" value="{{$classes->name}}" name="name" required>
                    </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Images<span class="required">*</span>
                  </label>
                  <div class="col-sm-5">
                    <input type="file" id="images" name="images" class="form-control col-md-7 col-xs-12">
                    {{-- <img class="img-rounded zoom" id="img-upload" width="50"> --}}
                    <img class="img-rounded zoom" id="img-upload" src="{{asset('images/class/images')}}/{{$classes->images}}" width="50">
                  </div>
              </div>

                <hr>
                <div class="form-group">
                  <label class="col-sm-2 control-label"></label>
                  <div class="col-sm-5">
                    <a href="{{url('classes')}}" class="btn btn-warning pull-right">Back</a>
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
        <p>Are you sure delete Class ?</p>
      </div>
      <div class="modal-footer">
          {{Form::open(array('url' => 'classes/delete/'.$classes->idclass,'method'=>'delete','class' => 'form-horizontal'))}}
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        <input type="submit" class="btn btn-danger" value="Yes">
        {{Form::close()}}
      </div>
    </div>
    
  </div>
</div>