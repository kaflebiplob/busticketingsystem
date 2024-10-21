<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/files.css') }}">
    <link rel="stylesheet" href="{{ asset('css/buses.css') }}">
    <title>Available Buses</title>
</head>

<body>
    <nav>
        <div class="navbar">
            <div class="logo">Ticketing system</div>
            <div class="links">
                <ul>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('tours') }}">Tours</a></li>
                    <li><a href="#">Reservation</a></li>
                    <li><a href="#">Blogs</a></li>
                    <li><a href="{{ route('contactus') }}">Contact us</a></li>
                    @if (Session::has('user_id'))
                    <li><a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    @else
                    <li><a href="{{ route('userlogin') }}">Login</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <main class="available-buses-main">
        <div class="container">
            <h2 class="title">Available Buses</h2>

            @if(session('message'))
            <p class="message">{{ session('message') }}</p>
            @endif

            @if($buses->isEmpty())
            <p class="no-buses-message" style="color:black">No buses available for the selected date and route.</p>
            @else
            <table class="buses-table">
                <thead>
                    <tr class="table-header">
                        <th>Bus Name</th>
                        <th>Seats</th>
                        <th>Price</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($buses as $bus)
                    <tr class="table-row">
                        <td class="bus-name">{{ $bus->bus_name }}</td>
                        <td class="bus-seats">{{ $bus->seat }}</td>
                        <td class="bus-price">Rs{{ $bus->price }}</td>
                        <td class="bus-date">{{ $bus->date }}</td>
                        <td class="bus-time">{{ $bus->time }}</td>
                        <td>
                            <a href="{{ route('bookticket', ['bus' => $bus->id]) }}" class="btn btn-primary">Book Now</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
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
                        <li><a href="">Reservation</a></li>
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

</body>

</html>