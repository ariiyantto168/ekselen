<section class="content-header">
    <h1>Kupons</h1>
    <ol class="breadcrumb">
      <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><i class="fa fa-ticket"></i>Kupons</li>
    </ol>
</section>

<section class="content">
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Index</h3>
        <div class="box-tools pull-right">
            <a href="{{url('kupons/create-new')}}" class="btn btn-box-tool" title="Create New"><i class="fa fa-plus"></i>create New</a>
        </div>
     </div>
</div>
<div class="box-body table-responsive">
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kupons as $number => $kupon)
                <tr>
                    <td>{{$number+1}}</td>
                    <td>{{$kupon->name}}</td>
                    <td>{{date('d M Y' , strtotime($kupon->start_date))}}</td>
                    <td>{{date('d M Y' , strtotime($kupon->end_date))}}</td>

                    <td>
                        <center>
                            <a href="{{url('/kupons/update/'.$kupon->idkupons)}}"><i class="fa fa-pencil-square-o"></i></a>
                        </center>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
</section>     