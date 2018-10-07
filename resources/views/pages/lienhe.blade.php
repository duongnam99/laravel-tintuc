@extends('layout.index')
@section('title')
    Liên hệ
@endsection
@section('content')
<div class="container">

    @include('layout.slide')

    <div class="space20"></div>


    <div class="row main-left">
        @include('layout.menu')

        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color:#16a085; color:white;" >
                    <h2 style="margin-top:0px; margin-bottom:0px;">Liên hệ</h2>
                </div>

                <div class="panel-body">
                    <!-- item -->
                    <h3><span class="glyphicon glyphicon-align-left"></span> Thông tin liên hệ</h3>

                    <div class="break"></div>
                    <h4><span class= "glyphicon glyphicon-home "></span> Địa chỉ : </h4>
                    <p> 102 Thái Thịnh, Đống Đa, Hà Nội   </p>

                    <h4><span class="glyphicon glyphicon-envelope"></span> Email : </h4>
                    <p> duongminhnam99@gmail.com </p>

                    <h4><span class="glyphicon glyphicon-phone-alt"></span> Điện thoại : </h4>
                    <p> 0964 765 727</p>



                    <br><br>
                    <h3><span class="glyphicon glyphicon-globe"></span> Bản đồ</h3>
                    <div class="break"></div><br>
                    {{--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.5201952559787!2d106.68891131458902!3d10.771412992324944!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f3c586421ef%3A0xb606461dc7627921!2zVHJ1bmcgVMOibSDEkMOgbyBU4bqhbyBUaW4gSOG7jWMgS2hvYSBQaOG6oW0!5e0!3m2!1svi!2s!4v1465285414810" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>--}}
                    <div class="mapouter"><div class="gmap_canvas"><iframe width="600" height="470" id="gmap_canvas" src="https://maps.google.com/maps?q=102%20Th%C3%A1i%20Th%E1%BB%8Bnh%2C%20%C4%90%E1%BB%91ng%20%C4%90a%2C%20H%C3%A0%20N%E1%BB%99i&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.pureblack.de"></a></div><style>.mapouter{text-align:right;height:470px;width:600px;}.gmap_canvas {overflow:hidden;background:none!important;height:450px;width:600px;}</style></div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
</div>
<!-- end Page Content -->
@endsection