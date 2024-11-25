<x-app-layout>
        <div class="max-w-sm mx-auto mt-10 bg-white shadow-lg rounded-lg overflow-hidden">
            <img class="w-full h-48 object-cover" src="https://images.pexels.com/photos/1306548/pexels-photo-1306548.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="{{$product->name}}">
            <div class="p-4">
                <h1 class="text-gray-800 font-bold text-xl">{{$product->name}}</h1>
                <p class="mt-2 text-gray-600 text-sm">{{$product->description}}</p>
                <p class="mt-2 text-gray-600 text-sm">Category: {{$product->category->name}}</p>
                <p class="mt-2 text-gray-800 font-bold text-lg">Price: ${{number_format($product->price, 2)}}</p>
                <div class="mt-4">
                    <a href="{{url("/products")}}" class="px-4 py-2 bg-blue-500 text-white text-sm font-medium rounded hover:bg-blue-700">
                        Back
                    </a>
                </div>
            </div>
        </div>
</x-app-layout>