<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Here you can see the result of your search.') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <div class="max-w-7xl mx-auto p-6 lg:p-8">

                        <div class="mt-16">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                @if(Count($results) > 0)
                                @foreach($results as $ad)

                                <div class="card" style="width: 18rem; height: 381.2px">
                                    <a href="{{ route('show', $ad->id) }}" style="height:100%;">

                                        <div class="" style="height:70%;">
                                            <img style="width:100%;height:100%;" class="card-img-top " src="{{asset('/storage/adsImages/' . $ad->image)}}" alt="Card image cap">
                                        </div>
                                        <div class=" card-body" style="display:flex; flex-direction:column; justify-content:space-between ;height:30%;padding:10px">
                                            <h5 class="card-title"><b>{{strtoupper($ad->title)}}</b></h5>
                                            <p class="card-text"><b>Price</b>: {{number_format($ad->price,0,',',' ')}} FCFA</p>
                                            <p class="card-text"><b>Category</b>: {{$ad->category}}</p>
                                            
                                            <small><i>Locate at {{$ad->location}}</i></small>
                                        </div>
                                    </a>
                                </div>
                                @endforeach

                                @else
                                <h1>No results found.</h1><br>
                                @endif

                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>