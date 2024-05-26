<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset('/logo/Logo.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('style.css')}}">
    <title>Add a new Post</title>

</head>

<body> -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit your Post') }}
        </h2>
    </x-slot>
    <!-- component -->
    <div class="mt-10 flex justify-center items-center w-screen h-100 bg-gray">
        <!-- COMPONENT CODE -->
        <form action="{{route('edit',$id->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="container h-100 w-100 my-1 px-4 lg:px-20">
                <div class="row h-100 justify-content-center align-items-center">
                    <div class="col-12 col-md-8 col-lg-6">
                        <div class="card p-3 text-white">


                            <div class="my-2 grid grid-cols-1 gap-5 md:grid-cols-2 mt-5">
                                <input class=" w-full bg-gray-100 text-gray-900 mt-2 p-3 rounded-lg focus:outline-none focus:shadow-outline" type="text" placeholder="Title*" name="title" value="{{$id->title}}" />
                                <input class="w-full bg-gray-100 text-gray-900 mt-2 p-3 rounded-lg focus:outline-none focus:shadow-outline" type="number" placeholder="Price*" name="price" value="{{$id->price}}" />
                                <input class="w-full bg-gray-100 text-gray-900 mt-2 p-3 rounded-lg focus:outline-none focus:shadow-outline" type="text" placeholder="Location*" name="location" value="{{$id->location}}" />
                                <input class="w-full bg-gray-100 text-gray-900 mt-2 p-3 rounded-lg focus:outline-none focus:shadow-outline" type="text" name="category" placeholder="Category*" value="{{$id->category}}">
                                <input type="hidden" name="userid" value="{{$userId}}">
                            </div>
                            <div class="my-4">
                                <textarea placeholder="Description*" class="w-full h-32 bg-gray-100 text-gray-900 mt-2 p-3 rounded-lg focus:outline-none focus:shadow-outline" name="description">{{$id->description}}</textarea>

                                <label class="text-gray-500" for="image">Image*</label>
                                <input class="w-full bg-gray-100 text-gray-900 mt-2 p-3 rounded-lg focus:outline-none focus:shadow-outline" type="file" placeholder="Image*" name="image" id="image" />

                            </div>
                            <div class="my-2 py-2 w-full lg:w-4/4">
                                <button class="uppercase text-sm font-bold tracking-wide bg-indigo-500 text-gray-100 p-3 py-2 rounded-lg w-full 
                      focus:outline-none focus:shadow-outline">
                                    Update
                                </button>
                            </div>
                        </div>
                    </div>
                </div>




            </div>

        </form>

    </div>
    <!-- COMPONENT CODE -->
    </div>

</x-app-layout>

<!-- </body>

</html> -->