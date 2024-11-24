<x-app-layout>
    <p>Hello World</p>
    <div>
        <header>{{$product->name}}</header>
        <p>{{$product->category->name}}</p>
    </div>
</x-app-layout>