@extends('admin.layout.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <h1>
                        <small>Most vivited pages</small>
                    </h1>
                </div>
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr align="center">
                        <th>Url</th>
                        <th>PageTitle</th>
                        <th>PageViews</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($MostVisitedPages as $dt2)
                        <tr class="odd gradeX" align="center">
                            <td>{{$dt2['url']}}</td>
                            <td>{{$dt2['pageTitle']}}</td>
                            <td>{{$dt2['pageViews']}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->
    </div>
@endsection