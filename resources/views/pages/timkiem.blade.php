@extends('layout.index')
@section('content')
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            @include('layout.menu')

            <div class="col-md-9 ">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color:#16a085; color:white; padding: 1px 15px;">
                        <h4>Tìm kiếm: {{$tukhoa}} </h4>
                    </div>
                    @foreach($tintuc as $tt)
                        <div class="row-item row">
                            <div class="col-md-3">
                                <a href="tintuc/{{$tt->id}}/{{$tt->TieuDeKhongDau}}.html">
                                    <br>
                                    <img width="200px" height="200px" class="img-responsive" src="upload/tintuc/{{$tt->Hinh}}" alt="">
                                </a>
                            </div>

                            <div class="col-md-9">
                                <h3>{{$tt->TieuDe}}</h3>
                                <p>{{$tt->TomTat}}</p>
                                <a class="btn" style="background-color:#16a085; color: white;" href="tintuc/{{$tt->id}}/{{$tt->TieuDeKhongDau}}.html">Xem thêm <span class="glyphicon glyphicon-chevron-right"></span></a>
                            </div>
                            <div class="break"></div>
                        </div>
                    @endforeach
                    <div style="text-align: center;">
                        {{$tintuc->links()}}
                    </div>
                    <!-- /.row -->

                </div>
            </div>

        </div>

    </div>
    <!-- end Page Content -->
@endsection