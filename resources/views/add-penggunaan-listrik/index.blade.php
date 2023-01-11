@extends('template.index')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Content Row -->
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-lg-4 col-sm-12">
                        @include('add-penggunaan-listrik.forms')
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- End of Content Wrapper -->
@endsection
