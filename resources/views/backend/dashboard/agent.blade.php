@extends('backend.layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Dashboard</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="panel-body">
    <div class="row"> 
    
        <div class="col-md-12"> 
            <div class="page-header">
                <h4> Inquiries </h4>
            </div>
            <div class="table-responsive">
                <table class="table  table-bordered table-hover">
                    <thead>
                        <tr>

                            <th>Name</th>
                            <th>Option</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($data['customer_requets'] as $row)
                        <tr id="">

                            <td>{{$row->name}}</td>
                            <td>{{$row->email}}</td>
                            <td>{{$row->phone}}</td>

                        </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection
