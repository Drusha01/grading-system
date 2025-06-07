<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" >
    <head>
        <style>
            #backToTop {
                z-index: 99;
                position: fixed;
                bottom: 20px;
                right: 20px;
                background-color: #2c0268;
                color: white;
                border: none;
                border-radius: 50%;
                padding: 10px;
                font-size: 18px;
                width: 50px;
                height: 50px;
                cursor: pointer;
                display: none;
            }
            #backToTop:hover {
                background-color: #00bad1;
            }
            /* Spinner container (optional) */
            .form-loader {
                text-align: center;
                font-weight: bold;
                font-size: 1.25rem;
            }

            /* Wave spinner */
            .sk-wave {
                display: flex;
                justify-content: center;
                align-items: center;
                gap: 4px;
            }

            .sk-wave-rect {
                background-color: #0d6efd; /* Bootstrap primary */
                height: 40px;
                width: 6px;
                animation: sk-wave 1.2s infinite ease-in-out;
            }

            .select2-results__option[aria-disabled="true"] {
                background-color: #f2f2f2;
                color: #999;
                cursor: not-allowed;
            }

            .sk-wave-rect:nth-child(1) { animation-delay: -1.2s; }
            .sk-wave-rect:nth-child(2) { animation-delay: -1.1s; }
            .sk-wave-rect:nth-child(3) { animation-delay: -1.0s; }
            .sk-wave-rect:nth-child(4) { animation-delay: -0.9s; }
            .sk-wave-rect:nth-child(5) { animation-delay: -0.8s; }

            @keyframes sk-wave {
                0%, 40%, 100% { transform: scaleY(0.4); }
                20% { transform: scaleY(1.0); }
            }

        </style>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $title ?? 'Dashboard' }}@if(strtolower($title) != strtolower('Faculty')){{'s'}} @endif | GRADING SYSTEM </title>

        <link rel="icon" href="{{asset('image/wmsu_logo.webp')}}">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        <script src="{{ asset('js/main.js') }}"></script>

        <!-- boxicon -->
        <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

        <!-- bootstrap-5 -->
         <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.min.js" integrity="sha384-RuyvpeZCxMJCqVUGFI0Do1mQrods/hhxYlcVfGPOfQtPJh0JCw12tUAZ/Mv10S7D" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <link rel="stylesheet" href="{{ asset('bootstrap/bootstrap-5.0.2/css/bootstrap.min.css')}}">
        <script src="{{ asset('bootstrap/bootstrap-5.0.2/js/bootstrap.min.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="{{ asset('jquery/jquery-3.7.1/jquery.min.js')}}" ></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
        <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

        <!-- <link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/core.css') }}" class="template-customizer-core-css" />
        <link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/theme-default.css') }}" class="template-customizer-theme-css" />
        <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" /> -->

        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        <link rel="stylesheet" href="{{ asset("assets/vendor/libs/flatpickr/flatpickr.css")}}" />
        <script src="{{ asset("assets/vendor/libs/flatpickr/flatpickr.js")}}"></script>
        <!-- <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
        <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script> -->


        @livewireStyles
    </head>
    <body>
        <div class="home">
            <div class="side">
                <livewire:Admin.SideNav.SideNav/>
            </div>
            <main>
            <div class="header">
                <livewire:Admin.Header.Header/>
            </div>
            {{ $slot }}
        </div>
        <button id="backToTop" class="back-to-top">
            <i class="ti ti-arrow-up "></i>
        </button>
        <script>
            let backToTopButton = document.getElementById("backToTop");
            window.onscroll = function() {
                if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
                    backToTopButton.style.display = "block";
                } else {
                    backToTopButton.style.display = "none";
                }
            };
            backToTopButton.onclick = function() {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            };
        </script>
        @livewireScripts
        @stack('footer-scripts')

        <script>
            Livewire.on('notifySuccess', message => {
                const notyf = new Notyf({
                    position: {
                        x: 'center',
                        y: 'center',
                    },
                    types: [
                        {
                            type: 'success',
                            background: 'green',
                            icon: false
                        },
                        {
                            type: 'success',
                            background: 'green',
                            icon: false
                        }
                    ]
                });
                notyf.success(message[0]);
                if (message[1]) {
                    setTimeout(() => {
                        window.location.href = message[1];
                    }, 1500); // delay in milliseconds, e.g. 2000 = 2 seconds
                }
            });
            Livewire.on('notifyWarning', message => {
                const notyf = new Notyf({
                    position: {
                        x: 'center',
                        y: 'center',
                    },
                    types: [
                        {
                            type: 'success',
                            background: 'red',
                            icon: false
                        },
                        {
                            type: 'success',
                            background: 'red',
                            icon: false
                        }
                    ]
                });
                notyf.success(message[0]);
                if (message[1]) {
                    setTimeout(() => {
                        window.location.href = message[1];
                    }, 1500); // delay in milliseconds, e.g. 2000 = 2 seconds
                }
            });
            @if (request()->is('admin/schedule*')) 
                document.addEventListener('DOMContentLoaded', function () {
                    setTimeout(()=>{
                        $('#day').trigger('change');
                    },100)
                });
            @endif
            Livewire.on('navigateTo', ({ url }) => {
                Livewire.navigate(url);
            });
            Livewire.on('openModal', ({ modal_id }) => {
                console.log(modal_id);
                var myModal = new bootstrap.Modal(document.getElementById(modal_id));
                myModal.show();
            }); 
            Livewire.on('closeModal', ({ modal_id }) => {
                var myModal = document.getElementById(modal_id+'close');
                myModal.click();
            }); 
        </script>

    </body>
</html>
