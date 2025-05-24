<div id="sidebarMenu" class="sidepanel d-flex flex-column flex-shrink-0 p-3 border-end border-dark position-fixed w-100"  style=" max-width: 280px; height: 100%; background-color: white;">
    <a href="{{ route("dashboard") }}" wire:navigate class="d-flex align-items-center justify-content-center mb-md-0 link-dark text-decoration-none">
        <img src="{{asset('image/wmsu_logo.png')}}" class="me-2" alt="" width="50px" height="50px">
        <span class="fs-2 h1 m-0 brand-color ">Admin</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="{{ route("dashboard") }}" wire:navigate class="nav-link link-dark d-flex align-items-center mb-2 @if (request()->is('admin/dashboard*')) {{ 'active' }} @endif""
                aria-current="page">
                <svg viewBox="0 0 24 24" height="30px" width="30px" xmlns="http://www.w3.org/2000/svg" fill="none"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path stroke="currentColor" stroke-width="2" d="M4 5a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V5ZM14 5a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1V5ZM4 16a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3ZM14 13a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v6a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1v-6Z"></path> </g></svg>
                <span class="fs-6 ms-2">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route("student-lists") }}" wire:navigate
                class="nav-link link-dark d-flex align-items-center mb-2 @if (request()->is('admin/student*')) {{ 'active' }} @endif" >
                <svg fill="currentColor" height="30px" width="30px"viewBox="0 0 256 256" id="Flat" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M226.52979,56.41016l-96-32a8.00672,8.00672,0,0,0-5.05958,0L29.6239,56.35889l-.00976.00341-.14393.04786c-.02819.00927-.053.02465-.08105.03442a7.91407,7.91407,0,0,0-1.01074.42871c-.03748.019-.07642.03516-.11353.05469a7.97333,7.97333,0,0,0-.93139.58325c-.06543.04688-.129.09522-.19288.144a8.08459,8.08459,0,0,0-.81872.71119c-.0238.02416-.04443.05053-.06787.0747a8.0222,8.0222,0,0,0-.661.783c-.04163.05567-.08472.10986-.12476.16675a8.00177,8.00177,0,0,0-.56714.92993c-.02588.04981-.04809.10083-.073.15112a7.97024,7.97024,0,0,0-.40515.97608c-.01062.03149-.0238.06128-.03405.093a7.95058,7.95058,0,0,0-.26282,1.08544c-.01331.07666-.02405.15308-.035.23A8.02888,8.02888,0,0,0,24,64v80a8,8,0,0,0,16,0V75.09985L73.58521,86.29492a63.9717,63.9717,0,0,0,20.42944,87.89746,95.88087,95.88087,0,0,0-46.48389,37.4375,7.9997,7.9997,0,1,0,13.40235,8.73828,80.023,80.023,0,0,1,134.1333,0,7.99969,7.99969,0,1,0,13.40234-8.73828,95.87941,95.87941,0,0,0-46.4834-37.43725,63.972,63.972,0,0,0,20.42944-87.89771l44.115-14.70508a8.0005,8.0005,0,0,0,0-15.17968ZM128,168A47.99154,47.99154,0,0,1,89.34875,91.54932l36.12146,12.04052a8.00672,8.00672,0,0,0,5.05958,0l36.12146-12.04052A47.99154,47.99154,0,0,1,128,168Z"></path> </g></svg>
                <span class="fs-6 ms-2 text-start">Students</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route("faculty-lists") }}" wire:navigate
                class="nav-link link-dark d-flex align-items-center mb-2 @if (request()->is('admin/faculty*')) {{ 'active' }} @endif">
                <svg height="30px" width="30px" version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="currentColor"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <style type="text/css"> .st0{fill:currentColor;} </style> <g> <path class="st0" d="M116.738,231.551c0,23.245,14.15,43.315,34.513,49.107c15.262,42.368,55.574,70.776,100.582,70.776 s85.32-28.408,100.58-70.776c20.365-5.792,34.515-25.854,34.515-49.107c0-15.691-6.734-30.652-18.061-40.248l1.661-8.921 c0-3.323-0.229-6.568-0.491-9.821l-0.212-2.593l-2.213,1.374c-30.871,19.146-80.885,27.71-116.754,27.71 c-34.85,0-83.895-8.214-114.902-26.568l-2.259-0.59l-0.188,2.554c-0.192,2.632-0.384,5.256-0.357,8.23l1.632,8.649 C123.466,200.923,116.738,215.876,116.738,231.551z"></path> <path class="st0" d="M356.151,381.077c-9.635-5.97-18.734-11.607-26.102-17.43l-0.937-0.738l-0.972,0.691 c-6.887,4.914-31.204,30.17-51.023,51.172l-10.945-21.273l5.697-4.076v-20.854h-40.07v20.854l5.697,4.076l-10.949,21.281 c-19.825-21.009-44.154-46.265-51.034-51.18l-0.973-0.691l-0.937,0.738c-7.368,5.823-16.469,11.46-26.102,17.43 c-30.029,18.61-64.062,39.697-64.062,77.344c0,22.244,52.241,53.579,168.388,53.579c116.146,0,168.388-31.335,168.388-53.579 C420.213,420.774,386.178,399.687,356.151,381.077z"></path> <path class="st0" d="M131.67,131.824c0,18.649,56.118,42.306,119.188,42.306s119.188-23.656,119.188-42.306v-25.706l43.503-17.702 v55.962c-5.068,0.792-8.964,5.186-8.964,10.45c0,4.503,2.966,8.432,7.242,9.852l-8.653,57.111h40.704l-8.651-57.111 c4.27-1.421,7.232-5.35,7.232-9.852c0-5.295-3.919-9.697-9.014-10.466l-0.21-67.197c0.357-0.621,0.357-1.266,0.357-1.607 c0-0.342,0-0.978-0.149-0.978h-0.002c-0.262-2.446-2.011-4.612-4.56-5.652l-11.526-4.72L267.551,3.238 C262.361,1.118,256.59,0,250.858,0s-11.502,1.118-16.69,3.238L72.834,68.936c-2.863,1.172-4.713,3.773-4.713,6.622 c0,2.842,1.848,5.443,4.716,6.63l58.833,23.928V131.824z"></path> </g> </g></svg>
                <span class="fs-6 ms-2 text-start">Faculty</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route("subject-lists") }}" wire:navigate
                class="nav-link link-dark d-flex align-items-center mb-2 @if (request()->is('admin/subjects*')) {{ 'active' }} @endif">
                <svg version="1.1" height="25px" width="25px" id="FOLDERS" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1800 1800" enable-background="new 0 0 1800 1800" xml:space="preserve" fill="currentColor"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <g> <path fill="currentColor" d="M404.006,1798.767H88.317c-46.674,0-84.646-37.972-84.646-84.646V85.879 c0-46.674,37.972-84.646,84.646-84.646h315.688c46.669,0,84.637,37.972,84.637,84.646v1628.242 C488.643,1760.795,450.675,1798.767,404.006,1798.767z M88.317,64.304c-11.896,0-21.575,9.679-21.575,21.575v1628.242 c0,11.896,9.679,21.574,21.575,21.574h315.688c11.892,0,21.566-9.678,21.566-21.574V85.879c0-11.896-9.674-21.575-21.566-21.575 H88.317z"></path> </g> <g> <path fill="currentColor" d="M246.157,1623.078c-69.556,0-126.142-56.586-126.142-126.141c0-69.557,56.586-126.143,126.142-126.143 s126.142,56.586,126.142,126.143C372.299,1566.492,315.713,1623.078,246.157,1623.078z M246.157,1433.866 c-34.778,0-63.07,28.293-63.07,63.071c0,34.777,28.292,63.07,63.07,63.07s63.071-28.293,63.071-63.07 C309.228,1462.159,280.935,1433.866,246.157,1433.866z"></path> </g> <g> <path fill="currentColor" d="M335.149,726.573H157.165c-17.418,0-31.535-14.118-31.535-31.535c0-17.418,14.117-31.536,31.535-31.536 h177.984c17.418,0,31.536,14.118,31.536,31.536C366.685,712.455,352.567,726.573,335.149,726.573z"></path> </g> <g> <path fill="currentColor" d="M335.149,591.422H157.165c-17.418,0-31.535-14.118-31.535-31.536s14.117-31.536,31.535-31.536h177.984 c17.418,0,31.536,14.118,31.536,31.536S352.567,591.422,335.149,591.422z"></path> </g> <g> <path fill="currentColor" d="M335.149,456.27H157.165c-17.418,0-31.535-14.118-31.535-31.536c0-17.417,14.117-31.535,31.535-31.535 h177.984c17.418,0,31.536,14.118,31.536,31.535C366.685,442.152,352.567,456.27,335.149,456.27z"></path> </g> <g> <path fill="currentColor" d="M335.149,321.119H157.165c-17.418,0-31.535-14.118-31.535-31.536c0-17.417,14.117-31.535,31.535-31.535 h177.984c17.418,0,31.536,14.118,31.536,31.535C366.685,307.001,352.567,321.119,335.149,321.119z"></path> </g> </g> <g> <g> <path fill="currentColor" d="M1057.852,1798.767h-315.69c-46.674,0-84.646-37.972-84.646-84.646V85.879 c0-46.674,37.972-84.646,84.646-84.646h315.69c46.67,0,84.637,37.972,84.637,84.646v1628.242 C1142.488,1760.795,1104.521,1798.767,1057.852,1798.767z M742.162,64.304c-11.896,0-21.575,9.679-21.575,21.575v1628.242 c0,11.896,9.679,21.574,21.575,21.574h315.69c11.893,0,21.566-9.678,21.566-21.574V85.879c0-11.896-9.674-21.575-21.566-21.575 H742.162z"></path> </g> <g> <path fill="currentColor" d="M899.997,1623.078c-69.556,0-126.142-56.586-126.142-126.141c0-69.557,56.586-126.143,126.142-126.143 c69.558,0,126.144,56.586,126.144,126.143C1026.141,1566.492,969.555,1623.078,899.997,1623.078z M899.997,1433.866 c-34.778,0-63.071,28.293-63.071,63.071c0,34.777,28.293,63.07,63.071,63.07c34.78,0,63.073-28.293,63.073-63.07 C963.07,1462.159,934.777,1433.866,899.997,1433.866z"></path> </g> <g> <path fill="currentColor" d="M988.992,726.573H811.005c-17.418,0-31.536-14.118-31.536-31.535c0-17.418,14.118-31.536,31.536-31.536 h177.987c17.416,0,31.535,14.118,31.535,31.536C1020.527,712.455,1006.408,726.573,988.992,726.573z"></path> </g> <g> <path fill="currentColor" d="M988.992,591.422H811.005c-17.418,0-31.536-14.118-31.536-31.536s14.118-31.536,31.536-31.536h177.987 c17.416,0,31.535,14.118,31.535,31.536S1006.408,591.422,988.992,591.422z"></path> </g> <g> <path fill="currentColor" d="M988.992,456.27H811.005c-17.418,0-31.536-14.118-31.536-31.536c0-17.417,14.118-31.535,31.536-31.535 h177.987c17.416,0,31.535,14.118,31.535,31.535C1020.527,442.152,1006.408,456.27,988.992,456.27z"></path> </g> <g> <path fill="currentColor" d="M988.992,321.119H811.005c-17.418,0-31.536-14.118-31.536-31.536c0-17.417,14.118-31.535,31.536-31.535 h177.987c17.416,0,31.535,14.118,31.535,31.535C1020.527,307.001,1006.408,321.119,988.992,321.119z"></path> </g> </g> <g> <g> <path fill="currentColor" d="M1711.691,1798.767h-315.688c-46.674,0-84.646-37.972-84.646-84.646V85.879 c0-46.674,37.973-84.646,84.646-84.646h315.688c46.67,0,84.637,37.972,84.637,84.646v1628.242 C1796.328,1760.795,1758.361,1798.767,1711.691,1798.767z M1396.004,64.304c-11.896,0-21.575,9.679-21.575,21.575v1628.242 c0,11.896,9.679,21.574,21.575,21.574h315.688c11.892,0,21.566-9.678,21.566-21.574V85.879c0-11.896-9.675-21.575-21.566-21.575 H1396.004z"></path> </g> <g> <path fill="currentColor" d="M1553.839,1623.078c-69.556,0-126.142-56.586-126.142-126.141c0-69.557,56.586-126.143,126.142-126.143 s126.142,56.586,126.142,126.143C1679.98,1566.492,1623.395,1623.078,1553.839,1623.078z M1553.839,1433.866 c-34.778,0-63.071,28.293-63.071,63.071c0,34.777,28.293,63.07,63.071,63.07s63.07-28.293,63.07-63.07 C1616.909,1462.159,1588.617,1433.866,1553.839,1433.866z"></path> </g> <g> <path fill="currentColor" d="M1642.831,726.573h-177.985c-17.417,0-31.535-14.118-31.535-31.535c0-17.418,14.118-31.536,31.535-31.536 h177.985c17.417,0,31.535,14.118,31.535,31.536C1674.366,712.455,1660.248,726.573,1642.831,726.573z"></path> </g> <g> <path fill="currentColor" d="M1642.831,591.422h-177.985c-17.417,0-31.535-14.118-31.535-31.536s14.118-31.536,31.535-31.536h177.985 c17.417,0,31.535,14.118,31.535,31.536S1660.248,591.422,1642.831,591.422z"></path> </g> <g> <path fill="currentColor" d="M1642.831,456.27h-177.985c-17.417,0-31.535-14.118-31.535-31.536c0-17.417,14.118-31.535,31.535-31.535 h177.985c17.417,0,31.535,14.118,31.535,31.535C1674.366,442.152,1660.248,456.27,1642.831,456.27z"></path> </g> <g> <path fill="currentColor" d="M1642.831,321.119h-177.985c-17.417,0-31.535-14.118-31.535-31.536c0-17.417,14.118-31.535,31.535-31.535 h177.985c17.417,0,31.535,14.118,31.535,31.535C1674.366,307.001,1660.248,321.119,1642.831,321.119z"></path> </g> </g> </g> </g></svg>
                <span class="fs-6 ms-2 text-start">Subjects</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route("college-lists") }}" wire:navigate
                class="nav-link link-dark d-flex align-items-center mb-2 @if (request()->is('admin/college*')) {{ 'active' }} @endif">
                <svg fill="currentColor" height="30px" width="30px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="m21.857 8.485-3-5A.997.997 0 0 0 18 3h-4.586l-.707-.707a.999.999 0 0 0-1.414 0L10.586 3H6a.997.997 0 0 0-.857.485l-3 5A1.001 1.001 0 0 0 2.002 9H2v10a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1V9h-.002c0-.178-.046-.356-.141-.515zM20 18h-6v-4h-4v4H4v-8h2.414l.293-.293 2-2L12 4.414l4.293 4.293 1 1 .293.293H20v8z"></path><circle cx="11.895" cy="9.895" r="2.105"></circle><path d="M6 12h2v3H6zm10 0h2v3h-2z"></path></g></svg>
                <span class="fs-6 ms-2 text-start">Colleges</span>
            </a>
        </li>
        <li class="nav-item" style="hover:background:black;">
            <a href="{{ route("department-lists") }}" wire:navigate
                class="nav-link link-dark d-flex align-items-center mb-2 @if (request()->is('admin/department*')) {{ 'active' }} @endif">
                <svg viewBox="0 0 24 24" height="30px" width="30px" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="currentColor"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>group_fill</title> <g id="页面-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="Development" transform="translate(-768.000000, -48.000000)" fill-rule="nonzero"> <g id="group_fill" transform="translate(768.000000, 48.000000)"> <path d="M24,0 L24,24 L0,24 L0,0 L24,0 Z M12.5934901,23.257841 L12.5819402,23.2595131 L12.5108777,23.2950439 L12.4918791,23.2987469 L12.4918791,23.2987469 L12.4767152,23.2950439 L12.4056548,23.2595131 C12.3958229,23.2563662 12.3870493,23.2590235 12.3821421,23.2649074 L12.3780323,23.275831 L12.360941,23.7031097 L12.3658947,23.7234994 L12.3769048,23.7357139 L12.4804777,23.8096931 L12.4953491,23.8136134 L12.4953491,23.8136134 L12.5071152,23.8096931 L12.6106902,23.7357139 L12.6232938,23.7196733 L12.6232938,23.7196733 L12.6266527,23.7031097 L12.609561,23.275831 C12.6075724,23.2657013 12.6010112,23.2592993 12.5934901,23.257841 L12.5934901,23.257841 Z M12.8583906,23.1452862 L12.8445485,23.1473072 L12.6598443,23.2396597 L12.6498822,23.2499052 L12.6498822,23.2499052 L12.6471943,23.2611114 L12.6650943,23.6906389 L12.6699349,23.7034178 L12.6699349,23.7034178 L12.678386,23.7104931 L12.8793402,23.8032389 C12.8914285,23.8068999 12.9022333,23.8029875 12.9078286,23.7952264 L12.9118235,23.7811639 L12.8776777,23.1665331 C12.8752882,23.1545897 12.8674102,23.1470016 12.8583906,23.1452862 L12.8583906,23.1452862 Z M12.1430473,23.1473072 C12.1332178,23.1423925 12.1221763,23.1452606 12.1156365,23.1525954 L12.1099173,23.1665331 L12.0757714,23.7811639 C12.0751323,23.7926639 12.0828099,23.8018602 12.0926481,23.8045676 L12.108256,23.8032389 L12.3092106,23.7104931 L12.3186497,23.7024347 L12.3186497,23.7024347 L12.3225043,23.6906389 L12.340401,23.2611114 L12.337245,23.2485176 L12.337245,23.2485176 L12.3277531,23.2396597 L12.1430473,23.1473072 Z" id="MingCute" fill-rule="nonzero"> </path> <path d="M12,3 C10.3431,3 9,4.34315 9,6 C9,7.30622 9.83481,8.41746 11,8.82929 L11,11 L8,11 C6.34315,11 5,12.3431 5,14 L5,15.1707 C3.83481,15.5825 3,16.6938 3,18 C3,19.6569 4.34315,21 6,21 C7.65685,21 9,19.6569 9,18 C9,16.6938 8.16519,15.5825 7,15.1707 L7,14 C7,13.4477 7.44772,13 8,13 L16,13 C16.5523,13 17,13.4477 17,14 L17,15.1707 C15.8348,15.5825 15,16.6938 15,18 C15,19.6569 16.3431,21 18,21 C19.6569,21 21,19.6569 21,18 C21,16.6938 20.1652,15.5825 19,15.1707 L19,14 C19,12.3431 17.6569,11 16,11 L13,11 L13,8.82929 C14.1652,8.41746 15,7.30622 15,6 C15,4.34315 13.6569,3 12,3 Z" id="路径" fill="currentColor"> </path> </g> </g> </g> </g></svg>
                <span class="fs-6 ms-2 text-start">Departments</span>
            </a>
        </li>
        <li class="nav-item">
            <div class="btn btn-toggle link-dark align-items-center mb-2 nav-link d-flex justify-content-between 
                @if (request()->is('admin/school-year*')) {{ 'active' }} @endif
                @if (request()->is('admin/semester*')) {{ 'active' }} @endif
                @if (request()->is('admin/year-level*')) {{ 'active' }} @endif
                @if (request()->is('admin/rooms*')) {{ 'active' }} @endif
                "
                data-bs-toggle="collapse" data-bs-target="#dd1"
                aria-expanded="
                @if (request()->is('admin/school-year*')) {{ 'true' }} @endif
                @if (request()->is('admin/semester*')) {{ 'true' }} @endif
                @if (request()->is('admin/year-level*')) {{ 'true' }} @endif
                @if (request()->is('admin/rooms*')) {{ 'true' }} @endif
                ">
                    <div>
                        <svg viewBox="0 0 24 24" height="30px" width="30px" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path opacity="0.1" fill-rule="evenodd" clip-rule="evenodd" d="M7.71297 5.1753C8.68625 5.62451 9.84239 5.1775 10.2547 4.18801C10.901 2.63687 13.0984 2.63687 13.7447 4.18801C14.157 5.1775 15.3132 5.62451 16.2864 5.1753C17.8968 4.43205 19.5676 6.10283 18.8243 7.71321C18.3751 8.68649 18.8221 9.84263 19.8116 10.2549C21.3628 10.9012 21.3628 13.0987 19.8116 13.745C18.8221 14.1573 18.3751 15.3134 18.8243 16.2867C19.5676 17.8971 17.8968 19.5678 16.2864 18.8246C15.3132 18.3754 14.157 18.8224 13.7447 19.8119C13.0984 21.363 10.901 21.363 10.2547 19.8119C9.84239 18.8224 8.68625 18.3754 7.71297 18.8246C6.10259 19.5678 4.4318 17.8971 5.17505 16.2867C5.62426 15.3134 5.17725 14.1573 4.18776 13.745C2.63663 13.0987 2.63663 10.9012 4.18776 10.2549C5.17725 9.84263 5.62426 8.68649 5.17505 7.71321C4.4318 6.10283 6.10259 4.43205 7.71297 5.1753ZM11.9997 8.74994C10.2048 8.74994 8.7497 10.205 8.7497 11.9999C8.7497 13.7949 10.2048 15.2499 11.9997 15.2499C13.7946 15.2499 15.2497 13.7949 15.2497 11.9999C15.2497 10.205 13.7946 8.74994 11.9997 8.74994Z" fill="currentColor"></path> <path d="M10.255 4.18806C9.84269 5.17755 8.68655 5.62456 7.71327 5.17535C6.10289 4.4321 4.4321 6.10289 5.17535 7.71327C5.62456 8.68655 5.17755 9.84269 4.18806 10.255C2.63693 10.9013 2.63693 13.0987 4.18806 13.745C5.17755 14.1573 5.62456 15.3135 5.17535 16.2867C4.4321 17.8971 6.10289 19.5679 7.71327 18.8246C8.68655 18.3754 9.84269 18.8224 10.255 19.8119C10.9013 21.3631 13.0987 21.3631 13.745 19.8119C14.1573 18.8224 15.3135 18.3754 16.2867 18.8246C17.8971 19.5679 19.5679 17.8971 18.8246 16.2867C18.3754 15.3135 18.8224 14.1573 19.8119 13.745C21.3631 13.0987 21.3631 10.9013 19.8119 10.255C18.8224 9.84269 18.3754 8.68655 18.8246 7.71327C19.5679 6.10289 17.8971 4.4321 16.2867 5.17535C15.3135 5.62456 14.1573 5.17755 13.745 4.18806C13.0987 2.63693 10.9013 2.63693 10.255 4.18806Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M15 12C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12C9 10.3431 10.3431 9 12 9C13.6569 9 15 10.3431 15 12Z" stroke="currentColor" stroke-width="2"></path> </g></svg>
                        <span class="fs-6 ms-2 text-start">Settings</span>
                    </div>
                    <i class='bx bx-chevron-down fs-3'></i>
            </div>
            <div class="collapse
                @if (request()->is('admin/school-year*')) {{ 'show' }} @endif
                @if (request()->is('admin/semester*')) {{ 'show' }} @endif
                @if (request()->is('admin/year-level*')) {{ 'show' }} @endif
                @if (request()->is('admin/rooms*')) {{ 'show' }} @endif
                " id="dd1">
                <ul class="btn-toggle-nav ms-4 list-unstyled fw-normal pb-1 small">
                    <li class="mb-1 nav-item">
                        <a href="{{ route("school-year-lists") }}" wire:navigate
                            class="nav-link link-dark d-flex align-items-center @if (request()->is('admin/school-year*')) {{ 'active ' }} @endif">
                            <svg viewBox="0 0 24 24" height="30px" width="30px" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M7 10H17M7 14H12M7 3V5M17 3V5M6.2 21H17.8C18.9201 21 19.4802 21 19.908 20.782C20.2843 20.5903 20.5903 20.2843 20.782 19.908C21 19.4802 21 18.9201 21 17.8V8.2C21 7.07989 21 6.51984 20.782 6.09202C20.5903 5.71569 20.2843 5.40973 19.908 5.21799C19.4802 5 18.9201 5 17.8 5H6.2C5.0799 5 4.51984 5 4.09202 5.21799C3.71569 5.40973 3.40973 5.71569 3.21799 6.09202C3 6.51984 3 7.07989 3 8.2V17.8C3 18.9201 3 19.4802 3.21799 19.908C3.40973 20.2843 3.71569 20.5903 4.09202 20.782C4.51984 21 5.07989 21 6.2 21Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                            <span class="fs-6 ms-2 text-start">School Years</span>
                        </a>
                    </li>
                    <li class="mb-1 nav-item">
                        <a href="{{ route("semester-lists") }}" wire:navigate
                            class="nav-link link-dark d-flex align-items-center @if (request()->is('admin/semester*')) {{ 'active ' }} @endif">
                            <svg viewBox="0 0 24 24" height="30px" width="30px" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M7 12H17M8 8.5C8 8.5 9 9 10 9C11.5 9 12.5 8 14 8C15 8 16 8.5 16 8.5M8 15.5C8 15.5 9 16 10 16C11.5 16 12.5 15 14 15C15 15 16 15.5 16 15.5M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                            <span class="fs-6 ms-2 text-start">Semesters</span>
                        </a>
                    </li>
                    <li class="mb-1 nav-item">
                        <a href="{{ route("year-level-lists") }}" wire:navigate
                            class="nav-link link-dark d-flex align-items-center @if (request()->is('admin/year-level*')) {{ 'active ' }} @endif">
                            <svg viewBox="0 0 24 24" height="30px" width="30px" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="currentColor"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>list-order</title> <desc>Created with sketchtool.</desc> <g id="text-edit" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="list-order" fill="currentColor"> <path d="M10,4 L20,4 C20.5522847,4 21,4.44771525 21,5 C21,5.55228475 20.5522847,6 20,6 L10,6 C9.44771525,6 9,5.55228475 9,5 C9,4.44771525 9.44771525,4 10,4 Z M10,11 L20,11 C20.5522847,11 21,11.4477153 21,12 C21,12.5522847 20.5522847,13 20,13 L10,13 C9.44771525,13 9,12.5522847 9,12 C9,11.4477153 9.44771525,11 10,11 Z M10,18 L20,18 C20.5522847,18 21,18.4477153 21,19 C21,19.5522847 20.5522847,20 20,20 L10,20 C9.44771525,20 9,19.5522847 9,19 C9,18.4477153 9.44771525,18 10,18 Z M4.5,4 C4.22385763,4 4,3.77614237 4,3.5 C4,3.22385763 4.22385763,3 4.5,3 L5.5,3 C5.78000021,3 6,3.22000003 6,3.5 L6,6.5 C6,6.77614237 5.77614237,7 5.5,7 C5.22385763,7 5,6.77614237 5,6.5 L5,4.0148508 L4.5,4 Z M4.5,10 C4.5,10 6.5,10 6.5,10 C6.78000021,10 7,10.2200003 7,10.5 C7,10.5 7,10.6666667 7,11 L5.30000019,13 C6.10000006,13 6.5,13 6.5,13 C6.78000021,13 7,13.2200003 7,13.5 C7,13.7799997 6.77557563,14 6.5,14 C6.5,14 4.5,14 4.5,14 C4.21999979,14 4,13.7799997 4,13.5 C4,13.5 4,13.3333333 4,13 L5.69999981,11 C4.89999994,11 4.5,11 4.5,11 C4.21999979,11 4,10.7799997 4,10.5 C4,10.2200003 4.19889333,10 4.5,10 Z M6.5,21 L4.5,21 C4.22385763,21 4,20.7761424 4,20.5 C4,20.2238576 4.22385763,20 4.5,20 L6,20 L6,19.5 L4.5,19.5 C4.22385763,19.5 4,19.2761424 4,19 C4,18.7238576 4.22385763,18.5 4.5,18.5 L6,18.5 L6,18 L4.5,18 C4.22385763,18 4,17.7761424 4,17.5 C4,17.2238576 4.22385763,17 4.5,17 L6.5,17 C6.77614237,17 7,17.2238576 7,17.5 L7,20.5 C7,20.7761424 6.77614237,21 6.5,21 Z" id="Shape"> </path> </g> </g> </g></svg>
                            <span class="fs-6 ms-2 text-start">Year Levels</span>
                        </a>
                    </li>
                    <li class="mb-1 nav-item">
                        <a href="{{ route("room-lists") }}" wire:navigate
                            class="nav-link link-dark d-flex align-items-center @if (request()->is('admin/room*')) {{ 'active ' }} @endif">
                            <svg viewBox="0 0 512 512" height="30px" width="30px" xmlns="http://www.w3.org/2000/svg" fill="currentColor"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill="var(--ci-primary-color, currentColor)" d="M440,424V88H352V13.005L88,58.522V424H16v32h86.9L352,490.358V120h56V456h88V424ZM320,453.642,120,426.056V85.478L320,51Z" class="ci-primary"></path> <rect width="32" height="64" x="256" y="232" fill="var(--ci-primary-color, currentColor)" class="ci-primary"></rect> </g></svg>
                            <span class="fs-6 ms-2 text-start">Rooms</span>
                        </a>
                    </li>
                </ul>
                <hr>
            </div>
        </li>
        <li class="nav-item">
            <div class="btn btn-toggle link-dark align-items-center mb-2 nav-link d-flex justify-content-between 
                "
                data-bs-toggle="collapse" data-bs-target="#dd1"
                aria-expanded="
                ">
                    <div>
                        <svg viewBox="0 0 24 24" height="30px" width="30px" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M11.5528 1.10557C11.8343 0.964809 12.1657 0.964809 12.4472 1.10557L22.4472 6.10557C22.862 6.31298 23.0798 6.77838 22.9732 7.22975C22.8667 7.68112 22.4638 8 22 8H1.99998C1.5362 8 1.13328 7.68112 1.02673 7.22975C0.920172 6.77838 1.13795 6.31298 1.55276 6.10557L11.5528 1.10557ZM6.23604 6H17.7639L12 3.11803L6.23604 6ZM5.99998 9C6.55226 9 6.99998 9.44772 6.99998 10V15C6.99998 15.5523 6.55226 16 5.99998 16C5.44769 16 4.99998 15.5523 4.99998 15V10C4.99998 9.44772 5.44769 9 5.99998 9ZM9.99998 9C10.5523 9 11 9.44772 11 10V15C11 15.5523 10.5523 16 9.99998 16C9.44769 16 8.99998 15.5523 8.99998 15V10C8.99998 9.44772 9.44769 9 9.99998 9ZM14 9C14.5523 9 15 9.44772 15 10V15C15 15.5523 14.5523 16 14 16C13.4477 16 13 15.5523 13 15V10C13 9.44772 13.4477 9 14 9ZM18 9C18.5523 9 19 9.44772 19 10V15C19 15.5523 18.5523 16 18 16C17.4477 16 17 15.5523 17 15V10C17 9.44772 17.4477 9 18 9ZM2.99998 18C2.99998 17.4477 3.44769 17 3.99998 17H20C20.5523 17 21 17.4477 21 18C21 18.5523 20.5523 19 20 19H3.99998C3.44769 19 2.99998 18.5523 2.99998 18ZM0.999976 21C0.999976 20.4477 1.44769 20 1.99998 20H22C22.5523 20 23 20.4477 23 21C23 21.5523 22.5523 22 22 22H1.99998C1.44769 22 0.999976 21.5523 0.999976 21Z" fill="currentColor"></path> </g></svg>
                        <span class="fs-6 ms-2 text-start">Curriculum</span>
                    </div>
                    <i class='bx bx-chevron-down fs-3'></i>
            </div>
            <div class="collapse
                " id="dd1">
                <ul class="btn-toggle-nav ms-4 list-unstyled fw-normal pb-1 small">
                    <li class="mb-1 nav-item">
                        <a href="{{ route("school-year-lists") }}"
                            class="nav-link link-dark d-flex align-items-center @if (request()->is('admin/school-year*')) {{ 'active ' }} @endif">
                            <svg viewBox="0 0 24 24" height="30px" width="30px" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M11.5528 1.10557C11.8343 0.964809 12.1657 0.964809 12.4472 1.10557L22.4472 6.10557C22.862 6.31298 23.0798 6.77838 22.9732 7.22975C22.8667 7.68112 22.4638 8 22 8H1.99998C1.5362 8 1.13328 7.68112 1.02673 7.22975C0.920172 6.77838 1.13795 6.31298 1.55276 6.10557L11.5528 1.10557ZM6.23604 6H17.7639L12 3.11803L6.23604 6ZM5.99998 9C6.55226 9 6.99998 9.44772 6.99998 10V15C6.99998 15.5523 6.55226 16 5.99998 16C5.44769 16 4.99998 15.5523 4.99998 15V10C4.99998 9.44772 5.44769 9 5.99998 9ZM9.99998 9C10.5523 9 11 9.44772 11 10V15C11 15.5523 10.5523 16 9.99998 16C9.44769 16 8.99998 15.5523 8.99998 15V10C8.99998 9.44772 9.44769 9 9.99998 9ZM14 9C14.5523 9 15 9.44772 15 10V15C15 15.5523 14.5523 16 14 16C13.4477 16 13 15.5523 13 15V10C13 9.44772 13.4477 9 14 9ZM18 9C18.5523 9 19 9.44772 19 10V15C19 15.5523 18.5523 16 18 16C17.4477 16 17 15.5523 17 15V10C17 9.44772 17.4477 9 18 9ZM2.99998 18C2.99998 17.4477 3.44769 17 3.99998 17H20C20.5523 17 21 17.4477 21 18C21 18.5523 20.5523 19 20 19H3.99998C3.44769 19 2.99998 18.5523 2.99998 18ZM0.999976 21C0.999976 20.4477 1.44769 20 1.99998 20H22C22.5523 20 23 20.4477 23 21C23 21.5523 22.5523 22 22 22H1.99998C1.44769 22 0.999976 21.5523 0.999976 21Z" fill="currentColor"></path> </g></svg>
                            <span class="fs-6 ms-2 text-start">Colleges ...... etc</span>
                        </a>
                    </li>
                    </ul>
                <hr>
            </div>
        </li>
        <hr>
        <li class="nav-item">
            <a href="{{ route(name: "admin-profile") }}" wire:navigate
            class="nav-link link-dark d-flex align-items-center mb-2 @if (request()->is('admin/profile*')) {{ 'active' }} @endif">
            <svg viewBox="0 0 20 20" height="25px" width="25px" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="currentColor"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>profile [#1335]</title> <desc>Created with Sketch.</desc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="Dribbble-Light-Preview" transform="translate(-420.000000, -2159.000000)" fill="currentColor"> <g id="icons" transform="translate(56.000000, 160.000000)"> <path d="M374,2009 C371.794,2009 370,2007.206 370,2005 C370,2002.794 371.794,2001 374,2001 C376.206,2001 378,2002.794 378,2005 C378,2007.206 376.206,2009 374,2009 M377.758,2009.673 C379.124,2008.574 380,2006.89 380,2005 C380,2001.686 377.314,1999 374,1999 C370.686,1999 368,2001.686 368,2005 C368,2006.89 368.876,2008.574 370.242,2009.673 C366.583,2011.048 364,2014.445 364,2019 L366,2019 C366,2014 369.589,2011 374,2011 C378.411,2011 382,2014 382,2019 L384,2019 C384,2014.445 381.417,2011.048 377.758,2009.673" id="profile-[#1335]"> </path> </g> </g> </g> </g></svg>
                <span class="fs-6 ms-2 text-start">Profile</span>
            </a>
        </li>
        <!-- <li class="nav-item">
            <a href="./grade" class="nav-link link-dark d-flex align-items-center mb-2  ">
                <i class='bx bx-bar-chart-alt-2 fs-4'></i>
                <span class="fs-6 ms-2">Grades</span>
            </a>
        </li>
        <li class="nav-item">
            <div class="btn btn-toggle link-dark d-flex align-items-center mb-2 nav-link d-flex justify-between"
                data-bs-toggle="collapse" data-bs-target="#dd2"
                aria-expanded="">
                    <div>
                        <i class='bx bxs-group fs-4'></i>
                        <span class="fs-6 ms-2 text-start">Colleges</span>
                    </div>
                    <i class='bx bx-chevron-down'></i>
            </div>
            <div class="collapse" id="dd2">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li class="mb-1">
                        <a href="./manage_acc.php"
                        class="link-dark nav-link d-flex align-items-center">
                        <i class='bx bx-chevron-right'></i>
                        CCS
                        </a>
                    </li>
                    <li class="mb-1">
                        <a href="./profiling.php"
                        class="link-dark nav-link d-flex align-items-center">
                        <i class='bx bx-chevron-right'></i>
                        Profiling
                        </a>
                    </li>
                </ul>
                <hr>
            </div>
        </li>
        <li class="nav-item">
            <button class="btn btn-toggle link-dark d-flex align-items-center mb-2 nav-link"
                data-bs-toggle="collapse" data-bs-target="#userfaculty_toggle"
                aria-expanded="">
                <i class='bx bxs-group fs-4'></i>
                <span class="fs-6 ms-2 text-start">Users & Profiling</span>
                <i class='bx bx-chevron-down'></i>
            </button>
            <div class="collapse" id="userfaculty_toggle">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li class="mb-1">
                        <a href="./manage_acc.php"
                        class="link-dark nav-link d-flex align-items-center">
                        <i class='bx bx-chevron-right'></i>
                        <span>Manage User Accounts</span>
                        </a>
                    </li>
                    <li class="mb-1">
                        <a href="./profiling.php"
                        class="link-dark nav-link d-flex align-items-center">
                        <i class='bx bx-chevron-right'></i>
                        Profiling
                        </a>
                    </li>
                </ul>
                <hr>
            </div>
        </li> -->
    </ul>
    <div class="account dropdown">
        <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="{{ asset('image/wmsu_logo.png') }}" alt="" style="width: 32px; height: 32px; object-fit: cover; border-radius:50%;" class="me-2">
            <strong class="text-truncate" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; display: inline-block; max-width: calc(100% - 40px);"> Sairyl Test</strong>
        </a>
        <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
            <li><a class="dropdown-item" href="{{ route('logout') }}" wire:navigate >Sign out</a></li>
        </ul>
    </div>
    <script>
        $(document).ready(function () {
            $('.btn-toggle').click(function () {
                var collapseId = $(this).attr('data-bs-target');
                $(collapseId).collapse('toggle');
            });
            // $('.collapse').on('hidden.bs.collapse', function () {
            // var btn = $('button[data-bs-target="#' + this.id + '"]');
            // btn.find('.bx-chevron-down').removeClass('bx-rotate-180');
            // });
        });
    </script>
</div>

