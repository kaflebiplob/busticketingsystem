<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/42b863db93.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">


    <title>home</title>
</head>

<body>
    <header>
        <div class="upper-header">
            <div class="sociallinks">
                <p><a href="https://www.facebook.com/biplop.kafle"><i class="fa-brands fa-facebook"></i> </a></p>
                <p><a href="https://github.com/kaflebiplob"><i class="fa-brands fa-github"></i></a></p>
                <p><a href="https://www.linkedin.com/in/biplob-kafle-56b16925a/"><i class="fa-brands fa-linkedin"></i></a></p>

            </div>
            <div class="contactinfo">
                <p><i class="fa-solid fa-phone"></i>01-1234567</p>
                <p> <i class="fa-solid fa-phone"></i>9869050407</p>
                <p><i class="fa-solid fa-envelope"></i>biplobkafle21@gmail.com</p>
            </div>
            <div class="authentication">

                @if (Session::has('user_id'))
                <p><a href="{{route('ownerdashboard')}}"><i class="fa-solid fa-user"></i>agent</a></p>

                <p><a href="{{route('userdashboard')}}"><i class="fa-solid fa-user"></i>dashboard</a></p>
                <p><a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa-solid fa-right-from-bracket"></i> Logout</a></p>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                @else
                <p><a href="{{route('ownerdashboard')}}"><i class="fa-solid fa-user"></i>agent</a></p>
                <p><a href="{{route('userlogin')}}"><i class="fa-solid fa-right-to-bracket"></i>Login</a></p>
                <p><a href="{{route('usersignup')}}"><i class="fa-solid fa-user-plus"></i>Signup</a></p>

                @endif

            </div>

        </div>
        <nav>
            <div class="navbar">
                <div class="logo">
                    Ticketing system
                </div>
                <div class="links">
                    <ul>
                        <li><a href="{{route('tours')}}">Tours</a></li>
                        <li><a href="{{route('reservation')}}">Reservation</a></li>
                        <li><a href="">Blogs</a></li>
                        <li><a href="{{route('contactus')}}">Contact us</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main>

        <div class="bodypart">

            <div class="heading">
                Enjoy your holidays
            </div>
            <div class="locationbar">
                <form action="{{route('availablebussubmit')}}" method="POST" class="bookings">
                    @csrf
                    <select name="pickup" id="pickup" class="select-location" required>
                        <option value="" disabled selected>Select Pickup location...</option>

                        <option value="Kathmandu">Kathmandu</option>
                        <option value="chitwan">Chitwan</option>
                        <option value="Hetauda">Hetauda</option>
                        <option value="Pokhara">Pokhara</option>
                        <option value="Jhapa">Ilam</option>
                        <option value="Dharan">Dharan</option>
                    </select>

                    <select name="destination" id="destination" required>
                        <option value="" disabled selected>destination...</option>
                        <option value="Chitwan">Chitwan</option>
                        <option value="Kathmandu">Kathmandu</option>
                        <option value="Hetauda">Hetauda</option>
                        <option value="Pokhara">Pokhara</option>
                        <option value="Jhapa">Ilam</option>
                        <option value="Dharan">Dharan</option>
                    </select>
                    <input type="date" name="travledate" id="travle-date" value="{{ request('travledate', \Carbon\Carbon::now()->format('d-m-Y')) }}" required>
                    @php
                    $startDate = \Carbon\Carbon::now();
                    $endDate = \Carbon\Carbon::now()->addDays(30);
                    @endphp

                    <div class="date-selector" required>
                        @for ($date = $startDate; $date->lte($endDate); $date->addDay())
                        <div class="date-item" data-date="{{ $date->format('Y-m-d') }}">
                            <span class="day-number">{{ $date->format('d') }}</span>
                            <span class="day-name">{{ $date->format('D') }}</span>
                        </div>
                        @endfor
                        <button class="search-btn" type="submit">Search</button>
                    </div>

                    <!-- <div class="date-selector" required>

                        <div class="date-item" data-date="2024-10-04">
                            <span class="day-number">04</span>
                            <span class="day-name">Fri</span>
                        </div>
                        <div class="date-item" data-date="2024-10-05">
                            <span class="day-number">05</span>
                            <span class="day-name">Sat</span>
                        </div>
                        <div class="date-item" data-date="2024-10-06">
                            <span class="day-number">06</span>
                            <span class="day-name">Sun</span>
                        </div>
                        <div class="date-item" data-date="2024-10-07">
                            <span class="day-number">07</span>
                            <span class="day-name">Mon</span>
                        </div>
                        <div class="date-item" data-date="2024-10-08">
                            <span class="day-number">08</span>
                            <span class="day-name">Tue</span>
                        </div>
                        <div class="date-item" data-date="2024-10-09">
                            <span class="day-number">09</span>
                            <span class="day-name">wed</span>
                        </div> <div class="date-item" data-date="2024-10-10">
                            <span class="day-number">10</span>
                            <span class="day-name">Thu</span>
                        </div>

                        <button class="search-btn" type="submit">Search</button>
                    </div> -->
                </form>
            </div>
        </div>
        <div class="tourpackage">
            <div class="intro">
                <p>Book Bus Ticket on Busly with super fast booking process and no service charge.

                </p>
                <ul class="lists">
                    <li><i class="fa-solid fa-bus"></i>Unique Package</li>
                    <li><i class="fa-solid fa-truck-fast"></i>Comfortable Package</li>
                    <li><i class="fa-solid fa-location-dot"></i>Popular Destination</li>
                </ul>
                <button class="buttonpart"><a href="{{route('tours')}}">Book tour Package</a></button>
            </div>
        </div>

    </main>
    <footer>
        <div class="mainfooterpart">

            <div class="footerpart">
                <div class="footerlogo">
                    <h2 class="footerheading">Ticketly</h2>
                    <p class="footerintro">Ticketly is one of the best ticket booking system of the nepal. it was introduced to improve the online ticketing system of our country.</p>
                </div>
                <div class="webpages">
                    <h3>Useful links</h3>
                    <ul class="footerlinks">
                        <li><a href="{{route('tours')}}">Tours</a></li>
                        <li><a href="{{route('reservation')}}">Reservation</a></li>
                        <li><a href="{{route('userlogin')}}">Login</a></li>
                        <li><a href="{{route('usersignup')}}">register</a></li>
                        <li><a href="{{route('contactus')}}">Contact</a></li>
                    </ul>
                </div>
                <div class="contactlinks">
                    <h3>Contact</h3>
                    <ul class="footerlinks">
                        <li><i class="fa-solid fa-phone"></i> <a href="">9869050407</a></li>
                        <li> <i class="fa-solid fa-envelope"></i><a href="">biplobkafle21@gmail.com</a></li>
                    </ul>

                </div>
            </div>
            <div class="copyright">&copy;All rights reserved 2024</div>
        </div>
    </footer>

    <script>
        function getCurrentDate() {
            const today = new Date();
            const year = today.getFullYear();
            const month = String(today.getMonth() + 1).padStart(2, '0');
            const day = String(today.getDate()).padStart(2, '0');
            return `${year}-${month}-${day}`;



        }

        function setcurrentDate() {
            const currentDate = getCurrentDate();
            const dateitems = document.querySelectorAll('.date-item');
            dateitems.forEach(item => {
                const itemdate = item.getAttribute('data-date');
                if (itemdate === currentDate) {
                    document.getElementById('travle-date').value = currentDate;
                    item.classList.add('selected');

                } else {
                    item.classList.remove('selected');
                }
            })
        }
        window.onload = setcurrentDate;

        document.querySelectorAll('.date-item').forEach(item => {
            item.addEventListener('click', function() {
                const SelectDate = this.getAttribute('data-date');
                document.getElementById('travle-date').value = SelectDate;

                document.querySelectorAll('.date-item').forEach(i => i.classList.remove('selected'));
                this.classList.add('selected');
            })
        })
    </script>
    <style>
        .date-item.selected {
            background-color: #007bff;
            color: white;
        }

        .date-item {
            cursor: pointer;

        }
    </style>

</body>

</html>