


@extends('public-layouts.app')

@section('title', 'Home Page')

@section('content')
    

            <!-- Product Display Section -->
            <section class="py-20 w-full">
                <div class="container mx-auto text-center">
                    <h2 class="text-3xl font-semibold mb-10" >LoopGoods</h2>
                    <ul>

                    <div class="mt-10 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10">
                        @foreach ($items as $item)
                        
                            <li> 
                                        <div class="bg-white text-black p-6 rounded-lg shadow-lg hover:scale-105 transform transition">
                                            <img src="{{ asset('storage/' . str_replace('public/', '', $item->image_path)) }}" alt="Product 1" class="w-full h-48 object-cover rounded-md mb-4">
                                            <h3 class="text-xl font-semibold">{{ $item->name }}</h3>
                                            <p class="text-lg font-bold text-[#FF2D20]"> {{ $item->location }}</p>
                                            <a href="{{ route('item.show', $item->item_id) }}" class="mt-4 inline-block px-4 py-2 bg-[#FF2D20] text-white rounded-full">details</a>
                                        </div>
                            </li>
                        @endforeach
                                    

                      
                    </div>
    </ul>

                </div>
            </section>
@endsection
