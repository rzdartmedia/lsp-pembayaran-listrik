@extends('template.index')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid position-relative" style="height: 90vh;">
        <!-- Content Row -->
        <div class="position-absolute" style="right: 0; bottom: 0;">
            <svg xmlns="http://www.w3.org/2000/svg" width="500" height="500" fill="#4e73df" class="bi bi-plugin"
                viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M1 8a7 7 0 1 1 2.898 5.673c-.167-.121-.216-.406-.002-.62l1.8-1.8a3.5 3.5 0 0 0 4.572-.328l1.414-1.415a.5.5 0 0 0 0-.707l-.707-.707 1.559-1.563a.5.5 0 1 0-.708-.706l-1.559 1.562-1.414-1.414 1.56-1.562a.5.5 0 1 0-.707-.706l-1.56 1.56-.707-.706a.5.5 0 0 0-.707 0L5.318 5.975a3.5 3.5 0 0 0-.328 4.571l-1.8 1.8c-.58.58-.62 1.6.121 2.137A8 8 0 1 0 0 8a.5.5 0 0 0 1 0Z" />
            </svg>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="row justify-content-center mt-5">
                    <div class="col-lg-4 col-sm-12">
                        @include('edit-penggunaan-listrik.forms')
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- End of Content Wrapper -->
@endsection
