<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between align-items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Here you can see all your post And check your profile.') }}

            </h2>
            @if(Count($ads) > 0)

            <a href="{{ url('/newpost') }}" class="border p-2 rounded font-semibold text-gray-600 hover:text-white hover:bg-gray-600 transition-colors duration-300 hover:border-none dark:text-gray-400 dark:hover:text-green">Add Post</a>

            @endif
        </div>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <div class="max-w-7xl mx-auto p-6 lg:p-8">

                        <div class="mt-16">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                @if(Count($ads) > 0)
                                @foreach($ads as $ad)
                                @if($userId == $ad->author_id)



                                <div class="card" style="width: 18rem; height: 388.2px">
                                    <a href="{{ route('show', $ad) }}" style="height:75%;">

                                        <div class="" style="height:100%;">
                                            <img style="width:100%;height:100%;" class="card-img-top " src="{{asset('/storage/adsImages/' . $ad->image)}}" alt="Card image cap">
                                        </div>
                                        <div class=" card-body" style="height:25%;padding:10px">
                                            <div class="détail" style="margin-bottom:5px;">
                                                <h5 class="card-title"><b>{{strtoupper($ad->title)}}</b></h5>
                                                <p class="card-text"><b>Price</b>: {{number_format($ad->price,0,',',' ')}} FCFA</p>
                                            </div>
                                            <div style="display:flex;justify-content:space-between;position:relative;margin-bottom:5px;">
                                                <div style="position:absolute;left:0;background-color:#3366FF;padding-inline:10px;border-radius:6px;color:white;">
                                                    <a href="{{route('edit',$ad->id)}}">EDIT</a>
                                                </div>
                                                <div style="background-color:#FF3333;padding-inline:10px;border-radius:6px;color:white;">
                                                    <a href="{{route('delete',$ad->id)}}">DELETE</a>
                                                </div>
                                            </div>
                                        </div>

                                    </a>
                                </div>


                                <!-- <div style="padding: 1em;" class="card shadow-md hover:shadow-xl">
                                
                                    <img src="{{asset('/storage/adsImages/' . $ad->image)}}" alt="{{$ad->image}}" style="width:100%">
                                    <div class="container">
                                        <h4><b>{{strtoupper($ad->title)}}</b></h4>
                                        <p><b>Price:</b> {{number_format($ad->price,0,',',' ')}} FCFA</p>
                                        <p><b>Description:</b></p>
                                        <p style="overflow-wrap: break-word;" >{{$ad->description}}</p>
                                        <p><b>Location </b>: {{$ad->location}}</p>
                                        <small><i>Added by {{$user->name}}</i></small>
                                        @endif
                                    </div>
                                    <div class="flex w-100 justify-between">

                                        <a class="font-semibold rounded-lg bg-indigo-500 hover:bg-indigo-600 px-6 py-1 text-white" href="{{route('edit',$ad->id)}}" class="btn btn-primary">EDIT</a>
                                        <a class="font-semibold rounded-lg bg-red-500 hover:bg-red-600 px-6 py-1 text-white" href="{{route('delete',$ad->id)}}" class="btn btn-primary">DELETE</a>


                                    </div>
                                </div> -->
                                @endforeach
                                @else
                                <h1>You don't have any post yet. </h1><br>
                                <a href="{{ url('/newpost') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-green focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"> Click here to add a new post</a>

                                @endif
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>