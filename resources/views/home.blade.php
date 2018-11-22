@extends('layouts.app')

@section('content')
<section class="content-header">
        
        
    </section>
<div class="content">
    <div class="row">


        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-dollar"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Dollar</span>
              <span class="info-box-number">{{$usd->price}}<small> Bs.S</small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-dollar"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Sol</span>
              <span class="info-box-number">{{$sol->price}}<small> Bs.S</small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

       
        
          
        </div>
        <!-- /.col -->
      </div>

</div>
@endsection
