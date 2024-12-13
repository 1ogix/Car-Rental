<aside class="w-64 text-white p-4 min-h-screen flex flex-col"
    style="background: #0960A8;">
    <div class="-mb-2 flex items-center justify-center">
        <!--<img src="{{ asset('build/assets/images/car-logo.png') }}" alt="Car Logo">-->
        <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
    </div>

    <div class="text-center">
            <h1 class=" mb-10 -mt-2 font-bold text-gray-800 dark:text-gray-200" style="font-family: 'Bricolage Grotesque'; font-size: 2.00rem; color: white;">DRIVE EASE</h1>
    </div>

    <nav class="flex-grow">
        <ul id="LIST" class="space-y-4">
            @auth
                @switch(Auth::user()->role)
                    {{-- Admin Menu --}}
                    @case('admin')
                        <li><a href="{{ route('home') }}" class="flex items-center space-x-3"><i
                                    class="bi bi-house-door-fill text-xl"></i><span>Home</span></a></li>
                        <li><a href="{{ route('cars.index') }}" class="flex items-center space-x-3"><i
                                    class="bi bi-car-front-fill text-xl"></i><span>Cars</span></a></li>
                        <li><a href="{{ route('calendar') }}" class="flex items-center space-x-3"><i
                                    class="bi bi-calendar-event-fill text-xl"></i><span>Calendar</span></a></li>
                        <li><a href="{{ route('reservations') }}" class="flex items-center space-x-3"><i
                                    class="bi bi-journal-bookmark-fill text-xl"></i><span>Reservations</span></a></li>
                        <li><a href="{{ route('transactions') }}" class="flex items-center space-x-3"><i
                                    class="bi bi-receipt-cutoff text-xl"></i><span>Transactions</span></a></li>
                        <li><a href="{{ route('users') }}" class="flex items-center space-x-3"><i
                                    class="bi bi-receipt-cutoff text-xl"></i><span>Users</span></a></li>
                    @break

                    {{-- Staff Menu --}}
                    @case('staff')
                        <li><a href="{{ route('calendar') }}" class="flex items-center space-x-3"><i
                                    class="bi bi-calendar-event-fill text-xl"></i><span>Calendar</span></a></li>
                        <li><a href="{{ route('reservations') }}" class="flex items-center space-x-3"><i
                                    class="bi bi-journal-bookmark-fill text-xl"></i><span>Reservations</span></a></li>
                        <li><a href="{{ route('transactions') }}" class="flex items-center space-x-3"><i
                                    class="bi bi-receipt-cutoff text-xl"></i><span>Transactions</span></a></li>
                    @break

                    {{-- User Menu --}}
                    @case('user')
                        <li><a href="{{ route('home') }}" class="flex items-center space-x-3"><i
                                    class="bi bi-house-door-fill text-xl"></i><span>Home</span></a></li>
                        <li><a href="{{ route('calendar') }}" class="flex items-center space-x-3"><i
                                    class="bi bi-calendar-event-fill text-xl"></i><span>Calendar</span></a></li>
                    @break
                @endswitch
            @else
                {{-- Guest Menu --}}
                <li><a href="{{ route('login') }}" class="flex items-center space-x-3"><i
                            class="bi bi-box-arrow-in-right text-xl"></i><span>Login</span></a></li>
                <li><a href="{{ route('register') }}" class="flex items-center space-x-3"><i
                            class="bi bi-person-plus-fill text-xl"></i><span>Register</span></a></li>
            @endauth
        </ul>
    </nav>
    {{-- Logout Button --}}
    @auth
        <div class="mt-auto">
            <form method="POST" action="{{ route('logout') }}" class="flex items-center space-x-3">
                @csrf
                <button type="submit" class="flex items-center space-x-3">
                    <i class="bi bi-box-arrow-right text-xl"></i>
                    <span>Logout</span>
                </button>
            </form>
        </div>
    @endauth
</aside>
