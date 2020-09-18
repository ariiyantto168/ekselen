<section class="content-header">
    <h1>
        Highlights
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i>Home</a>
        <li><a href="{{url('/highlights')}}"><i class="fa fa-clone"></i>Highlights</a>
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
                <h3 class="box-title">Create New</h3> 
              </div>
              <div class="box-body">
                {{ Form::open(array('url' => 'highlights/create-new', 'class' => 'form-horizontal')) }}
                <div class="form-group">
                  <label class="col-sm-2 control-label">Name</label>
                  <div class="col-sm-5">
                    <!-- {{-- name:name untuk melempar controller ke database --}} -->
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
                  <label class="col-sm-2 control-label">Class</label>
                  <div class="col-sm-5">
                    <select class="form-control" name="idclass">
                      <option value="">-- select Class -- </option>
                      @foreach ($classes as $class)
                        <option value="{{$class->idclass}}">{{$class->name}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <hr>
                <div class="form-group">
                  <label class="col-sm-2 control-label"></label>
                  <div class="col-sm-5">
                    <a href="{{url('highlights')}}" class="btn btn-warning pull-right">Back</a>
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
            {{-- <script type="text/javascript">
            $(document).ready(function() {
             $('.datepicker').datepicker();
            });
          </script> --}}
