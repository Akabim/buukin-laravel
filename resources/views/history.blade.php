@extends('templates.app')

@section('content')
    <section class="pt-36 pb-20 px-4 lg:px-14">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($bookings as $booking)
                <div class=" hover:bg-primary bg-[#EDEDED] transition py-3 px-3 rounded-xl">
                    <a href="./detail-resto.html" class="group block rounded-lg">
                        <img src="{{ asset('storage/' . $booking->restaurant->photo_1) }}" alt=""
                            class="h-full w-full object-cover rounded-lg" />
                        <div class="mt-3">
                            <h3 class="text-gray-900 group-hover:text-white lg:text-2xl font-semibold">
                                {{ $booking->restaurant->name }}
                            </h3>
                            <p class="text-xs text-gray-900 group-hover:text-white">
                                {{ $booking->restaurant->address }}
                            </p>
                            <p class="text-xs group-hover:text-white text-gray-900 mt-2">
                                <span class="font-thin">Kursi Dipilih:</span>
                                @php
                                    $selectedSeats = explode(',', $booking->selected_seats);
                                    $formattedSeats = [];

                                    foreach ($selectedSeats as $seat) {
                                        $formattedSeat = trim($seat);

                                        // Hanya tambahkan "Kursi" jika nomor kursi tidak kosong
                                        if (!empty($formattedSeat)) {
                                            $formattedSeats[] = $formattedSeat;
                                        }
                                    }

                                    echo implode(', ', $formattedSeats);
                                @endphp
                            </p>
                            <p class="text-xs group-hover:text-white text-gray-900">
                                <span class="font-thin">Tanggal Pemesanan:</span>
                                {{ \Carbon\Carbon::parse($booking->booking_date)->format('d F Y') }}
                            </p>
                            <p class="text-xs group-hover:text-white text-gray-900">
                                <span class="font-thin">Status:</span> {{$booking->status}}
                            </p>
                            <button type="submit" id="sweetalert"
                                class="group-hover:border-white group-hover:border-2 cursor-pointer mt-3 w-full py-3 px-2 rounded-lg bg-primary text-white lg:text-lg">
                                Details
                            </button>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </section>
@endsection
