@extends('admin.layouts.main')
@section('content')
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Usuarios
            {{-- <small>Control panel</small> --}}
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard active"></i> Usuarios</a></li>
            
          </ol>
        </section>
    
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
                {!! $show !!}
            </div>
            <div class="col-md-1">
                    <input type="hidden" id="tokenUser" value="{{csrf_token()}}">
                          <div class="row">
                              <div class="col-md-12">
                                {!! $new !!}
                              </div>
                              <div class="div-edit">
              
                              </div>
                              <div class="div-showInformation">
              
                              </div>
              
                          </div>
                  <!-- .row -->
              
                    </div>
          </div>
        </section>
        <!-- /.content -->
      </div>
@endsection



