<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
    <div class="max-w-7xl mx-auto p-6 lg:p-8">

        <div class="mt-16">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach($ads as $ad)
                <div class="card">
                    <img src="{{asset('/logo/car.jpeg')}}" alt="Avatar" style="width:100%">
                    <div class="container">
                        <h4><b>{{strtoupper($ad->title)}}</b></h4>
                        <p><b>Prix:</b> {{number_format($ad->price,0,',',' ')}} FCFA</p>
                        <p><b>Description:</b></p>
                        <p>{{$ad->description}}</p>
                        @foreach($users as $user)
                        @if($user->id == $ad->author_id)
                        <small><i>Added by {{$user->name}}</i></small>
                        @endif
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>
        </div>


    </div>
</div>