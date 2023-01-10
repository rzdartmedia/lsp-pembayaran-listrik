<!DOCTYPE html>
<html lang="en">
@include('template.head')

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        @include('template.sidebar')


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">

                @include('template.topbar')

                @yield('content')

            </div>
            <!-- End of Page Wrapper -->

            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>
            <!-- Scroll to Top Button End-->
        </div>
    </div>

    @include('template.footer')
</body>

</html>
