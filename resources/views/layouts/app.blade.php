<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}"> 
    <link rel="stylesheet" type="text/css" href="{{ asset('css/lib/jquery.datetimepicker.min.css') }}" />
    <link href="{{ asset('css/global.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/lib/bootstrap-datepicker.min.css') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />
    <link  rel="stylesheet" type="text/css" href="{{ asset('css/lib/toastr.css') }}"/>
    <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
    crossorigin="anonymous"
  />
    <link
      href="{{ asset('css/lib/dataTables.dataTables.css') }}"
      rel="stylesheet"
    />
    <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"
  ></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
 
<script
  src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
  integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
  crossorigin="anonymous"
></script>
    <!-- <script src="{{ asset('js/lib/bootstrap.bundle.min.js') }}" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
    <script src="{{ asset('js/lib/dataTables.js') }}"></script>
    <script src="{{ asset('js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/validation.js') }}"></script>

</head>

<body>


    <script src="{{ asset('js/lib/popper.min.js') }}"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/lib/bootstrap.min.js') }}"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/lib/bootstrap-datepicker.min.js') }}"></script>
    <script>
        function showToast() {
            var toast = new bootstrap.Toast(document.getElementById("myToast"));
            toast.show();
        }

        function hideToast() {
            var toast = new bootstrap.Toast(document.getElementById("myToast"));
            toast.hide();
        }

        window.addEventListener("load", function() {
            showToast();
        });

        setTimeout(function() {
            var toastElement = document.getElementById("myToast");
            var toast = bootstrap.Toast.getInstance(toastElement);
            toast.hide();
        }, 3000);
    </script>
    <main>
        <div class="container-fluid">
            <!-- Sidebar -->
            <div class="sidebar-column">
                <nav id="sidebarMenu" class="collapse d-block sidebar collapse">
                    <div class="sidebar-list">
                        <a href="#" class="" aria-current="true">
                            <i class="icon icon-logo"></i><span></span>
                        </a>
                        <a href="{{ route('staffs') }}" class="{{ request()->is('thhs/app/staffs') ? 'active' : '' }}" aria-current="true">
                            <i class="icon icon-staffs-logo"></i>
                            <p>Staff Manager</p>
                        </a>
                        <a href="{{ route('prospects') }}" class="{{ request()->is('thhs/app/prospects/*') ? 'active' : '' }}" aria-current="true">
                            <i class="icon icon-prospects-logo"></i>
                            <p>Prospect Manager</p>
                        </a>


                    </div>
                </nav>
            </div>

            <!-- Dashboard layout -->
            <div class="main-layout" style="background-color: #e5edf9">
                <section class="dashboard-header-wrapper">
                    <div class="d-flex justify-content-end">
                        <div></div>
                        <div class="dashboard-header-section">
                            <input type="text" placeholder="Search" />
                            <a href="javascript:;"><i class="icon icon-search"></i></a>
                        </div>
                        <div class="dashboard-header-activity-wrapper d-flex justify-content-center align-items-center">
                            <i class="icon icon-bell with-red"></i>
                            <i class="icon icon-message"></i>
                            <div class="header-profile-wrapper d-flex justify-content-between align-items-center">
                                <img src="{{ asset('images/user.png') }}" />
                                <p class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    @php
                                        $current_user = Auth()->user()->name;
                                    @endphp
                                    {{ $current_user }}
                                    <i class="icon icon-arrow-down"></i>
                                </p>
                                <ul class="dropdown-menu">
                                    <!-- <li><p class="dropdown-item" href="#">View profile</p></li> -->
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="dashboard-heading-section">
                    <div class="d-block d-lg-flex justify-content-between align-items-center">
                        <div class="content">
                            <h1>Welcome to Trend Home Health Services Team</h1>
                            <p>We've Custom Healthcare HR Software Services</p>
                        </div>
                        <div class="dashboard-tabs-wrapper d-flex justify-content-end">
                            <div class="dashboard-tabs">
                                <i class="icon icon-teams"></i>
                                <p class="mt-1">HR management</p>
                            </div>
                            <div class="dashboard-tabs green">
                                <i class="icon icon-settings"></i>

                                <p class="mt-1">System application</p>
                            </div>
                            <div class="dashboard-tabs yellow">
                                <i class="icon icon-file-logo"></i>
                                <p class="mt-1">EHR</p>
                            </div>
                            <div class="dashboard-tabs purple">
                                <i class="icon icon-settings-rotate"></i>
                                <p class="mt-1">Settings</p>
                            </div>
                        </div>
                    </div>
                </section>
                @yield('content')
            </div>
        </div>

        <!-- Modal -->


    </main>
    <!--Main layout-->
    <!-- Confirm dailog-->

    <div class="modal fade" id="ConfirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">
                        Confirm
                    </h5>
                </div>
                <div class="modal-body">
                    <p id="modal_msg"></p>
                    <input type="hidden" id="function_name" value="">
                </div>
                <div class="cta_wrapper d-flex justify-content-center gap-5">
                    <button class="danger" data-dismiss="modal">Clear</button>
                    <button class="success" id="confirm_btn">Confirm</button>
                </div>

            </div>
        </div>
      </div>
  </body>
  <script type="text/javascript" src="{{ asset('js/lib/jquery.datetimepicker.full.min.js') }}"></script>
  <!-- <script src="{{ asset('js/jquery.min.js') }}"></script> -->
  <script src="{{ asset('js/lib/moment.js') }}" ></script>
  <script src="{{ asset('js/common.js') }}"></script>
   <script type="text/javascript" src="{{ asset('js/lib/toastr.min.js') }}"></script> 
   <script src="{{ asset('js/helper.js') }}"></script>
  <script type="text/javascript"> 
      toastr.options = {
      "closeButton": false,
      "debug": false,
      "newestOnTop": false,
      "progressBar": false,
      "positionClass": "toast-top-center",
      "preventDuplicates": false,
      "onclick": null,
      "showDuration": "300",
      "hideDuration": "1000",
      "timeOut": "5000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    }
  </script>  
  {{  moduleJs() }}
  <script type="text/javascript"> 
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

</html>
