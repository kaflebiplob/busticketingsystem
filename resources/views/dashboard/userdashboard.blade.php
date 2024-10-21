<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/files.css')}}">

    <title>Ticketly</title>
</head>

<body>
    <nav>
        <div class="navbar">
            <div class="logo">
                Ticketing system
            </div>
            <div class="links">
                <ul>
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li><a href="{{route('tours')}}">Tours</a></li>
                    <li><a href="">Reservation</a></li>
                    <li><a href="">Blogs</a></li>
                    <li><a href="{{route('contactus')}}">Contact us</a></li>
                    @if (Session::has('user_id'))
                    <li><a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    @else
                    <li><a href="{{route('userlogin')}}">login</a></li>
                    @endif
                </ul>
            </div>
        </div>

    </nav>
    <main>
        <div class="container">
            @if(session('success'))
            <div class="alert alert-success" style="color:red;" style="margin:1rem">
                {{ session('success') }}
            </div>
            @endif
            @if (session('error'))
            <div style="color:red">
                {{session('error')}}
            </div>

            @endif
            <h2>Your Bookings</h2>

            @if($bookings->isEmpty())
            <div class="alert">
                You have not booked any tickets yet.
            </div>
            @else
            <table>
                <thead>
                    <tr>
                        <th>Bus</th>
                        <th>Seat(s)</th>
                        <th>Departure Date</th>
                        <th>Departure Time</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bookings as $booking)
                    <tr>
                        <td>{{ $booking->bus->bus_name }}</td>
                        <td>{{ $booking->seat }}</td>
                        <td>{{ \Carbon\Carbon::parse($booking->bus->date)->format('d M Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($booking->bus->time)->format('h:i A') }}</td>
                        <td>
                            <a href="{{ route('editbooking', $booking->id) }}" class="btn btn-edit">Edit</a>

                            <form action="{{ route('cancelbooking', $booking->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-cancel">Cancel</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>

        <style>
            .container {
                width: 80%;
                margin: 0 auto;
                padding: 20px;
                margin-top: 6rem;
                background-color: #fff;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                border-radius: 8px;
                margin-bottom: 3rem;
            }

            h2 {
                font-size: 28px;
                font-weight: bold;
                margin-bottom: 20px;
                text-align: center;
                color: #333;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 20px;
            }

            th,
            td {
                padding: 12px;
                text-align: left;
                border-bottom: 1px solid #ddd;
                font-size: 16px;
            }

            th {
                background-color: #f4f4f4;
                font-weight: bold;
            }

            tr:hover {
                background-color: #f9f9f9;
            }

            .alert {
                background-color: #f8d7da;
                color: #721c24;
                padding: 15px;
                border: 1px solid #f5c6cb;
                border-radius: 4px;
                margin-bottom: 20px;
                text-align: center;
            }

            .btn {
                padding: 10px 15px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                margin-right: 5px;
                font-size: 14px;
                text-decoration: none;
            }

            .btn-edit {
                background-color: #28a745;
                color: white;
                width: 100%;
                display: inline-block;
                text-align: center;
            }

            .btn-edit:hover {
                background-color: #218838;
            }

            .btn-cancel {
                background-color: #dc3545;
                color: white;
            }

            .btn-cancel:hover {
                background-color: #c82333;
            }
        </style>
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


</body>

</html>