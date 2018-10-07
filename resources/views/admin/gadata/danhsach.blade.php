@extends('admin.layout.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Google Analytics Data
                        <small>Danh sách</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr align="center">
                        <th>Date</th>
                        <th>PageTitle</th>
                        <th>Visitors</th>
                        <th>pageViews</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($VisitorsAndPageViews as $dt1)
                        <tr class="odd gradeX" align="center">
                            <td>{{$dt1['date']}}</td>
                            <td>{{$dt1['pageTitle']}}</td>
                            <td>{{$dt1['visitors']}}</td>
                            <td>{{$dt1['pageViews']}}</td>
                            {{--<td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href=""> Delete</a></td>--}}
                            {{--<td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="">Edit</a></td>--}}
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <h1>
                        <small>Most vivited pages</small>
                    </h1>
                </div>
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr align="center">
                        <th>PageTitle</th>
                        <th>PageViews</th>
                        <th>Url</th>
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
            <div class="row">
                <div class="col-lg-12">
                    <h1>
                        <small>Top browsers</small>
                    </h1>
                </div>
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr align="center">
                        <th>Browser</th>
                        <th>Sessions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($TopBrowsers as $dt3)
                        <tr class="odd gradeX" align="center">
                            <td>{{$dt3['browser']}}</td>
                            <td>{{$dt3['sessions']}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <h1>
                        <small>User Types</small>
                    </h1>
                </div>
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr align="center">
                        <th>Type</th>
                        <th>Sessions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($UserTypes as $dt4)
                        <tr class="odd gradeX" align="center">
                            <td>{{$dt4['type']}}</td>
                            <td>{{$dt4['sessions']}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection