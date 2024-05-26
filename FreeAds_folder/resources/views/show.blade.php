<x-app-layout>
    <div class="container min-vh-100 d-flex justify-content-center align-items-center">
        <div class="bg-white w-50 rounded row p-2">
            <div class="col-lg-8 w-50 p-2">
                <img class="w-100" src="{{asset('/storage/adsImages/' . $ad->image)}}" alt="{{$ad->name}}">
            </div>
            <div class="col-lg-4 w-50">

                <div class="p-5 h-100 d-flex flex-column justify-content-between" >
                    <h1><strong>Title</strong>: {{$ad->title}}</h1>
                    <p><strong>Description</strong>: {{$ad->description}}</p>
                    <p><strong>Price</strong>: {{number_format($ad->price,0,'.',' ')}} FCFA</p>
                    <p><strong>Location</strong>: {{$ad->location}}</p>
                    <p><strong>Category</strong>: {{$ad->category}}</p>
                    <p><strong>Created at</strong>: {{$ad->created_at}}</p>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>