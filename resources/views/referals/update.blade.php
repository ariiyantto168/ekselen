<section class="content-header">
    <h1>Refereals
        <small>Update Your Referals</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><i class="fa fa-database"></i>Master</li>
      <li><a href="{{url('/referals')}}"><i class="fa fa-user-plus"></i>Referals</a></li>
      <li class="active"><i class="fa fa-plus">Update</i></li>
    </ol>
</section>

{{-- main content --}}
<section>
    {{-- default box --}}
    <section class="content">
            {{-- default box --}}
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Update</h3>
                    <button type="button" class="btn btn-info btn-xs pull-right" data-toggle="modal" data-target="#myModal">Delete</button>
                </div>
                <div class="box-body">
                    {{Form::open(array('url' => 'referals/update/'.$referals->idreferals, 'class' => 'form-horizontal'))}}
                    <div class="form-group">
                            <label class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-5">
                              <!-- {{-- name:name untuk melempar controller ke database --}} -->
                            <input type="text" class="form-control" value="{{$referals->name}}" name="name" required>
                            </div>
                          </div>
                          <hr>
                          <div class="form-group">
                            <label class="col-sm-2 control-label"></label>
                            <div class="col-sm-5">
                              <a href="{{url('referals')}}" class="btn btn-warning pull-right">Back</a>
                              <input type="submit" value="Save" class="btn btn-primary">
                            </div>
                    </div>
                    {{Form::close()}}

                </div>
            </div>
    </section>
</section>

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">
  
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Delete Referals</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure delete Referals ?</p>
      </div>
      <div class="modal-footer">
          {{Form::open(array('url' => 'referals/delete/'.$referals->idreferals,'method'=>'delete','class' => 'form-horizontal'))}}
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        <input type="submit" class="btn btn-danger" value="Yes">
        {{Form::close()}}
      </div>
    </div>
    
  </div>
</div>