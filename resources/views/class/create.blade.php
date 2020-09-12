<section class="content-header">
    <h1>
        class
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i>Home</a>
        <li class="active"><i class="fa fa-database"></i>Mater</a>
        <li><a href="{{url('/class')}}"><i class="fa fa-cubes"></i>Class</a>
        <li class="active"><i class="fa fa-plus"></i>Create New</a>
    </ol>
</section>

<!-- {{-- main content --}} -->
<section>

    <!-- {{-- default box --}} -->
    <section class="content">

            <!-- Default box -->
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Create New</h3> 
              </div>
              <div class="box-body">
                {{ Form::open(array('url' => 'classes/create-new', 'class' => 'form-horizontal', 'files' => 'true')) }}
                <div class="form-group">
                    <div class="col-sm-2 control-label">
                      <label class="">Name</label>
                    </div>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" placeholder="Name" name="name" required>
                    </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Category</label>
                  <div class="col-sm-5">
                    <select class="form-control" name="idcategories">
                      <option value="">-- select categories -- </option>
                      @foreach ($categories as $cat)
                        <option value="{{$cat->idcategories}}">{{$cat->name}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Images</label>
                    </label>
                    <div class="col-sm-5">
                        <input type="file" id="images" name="images" class="form-control col-md-7 col-xs-12">
                      <small class="text-danger">size image max 5 mb</small>
                    </div>
                </div>  

              </div>
                    <!-- SELECT2 EXAMPLE -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Upload Materi</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        
        <a class="pull-left btn btn-primary btn-xs" id="addRow"> <i class="fa fa-plus"></i> Add</a>
        <br>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Bab Materi Kelas</label>
                <input type="text" class="form-control" placeholder="Name" name="namemateri" required>
              </div>
            </div>
          </div>



                <div class="form-group">
                  <label class="col-sm-2 control-label"></label>
                  <div class="col-sm-5">
                    <a href="{{url('classes')}}" class="btn btn-warning pull-right">Back</a>
                    <input type="submit" value="Save" class="btn btn-primary">
                  </div>
                </div>
                {{ Form::close() }}
              {{-- </div> --}}
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          
          </section>
        </section>

