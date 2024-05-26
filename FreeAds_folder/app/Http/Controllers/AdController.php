<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ad;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AdController extends Controller
{
    //
    public function index()
    {
        $ads = Ad::orderBy('created_at', 'desc')->paginate(8);

        $user = User::All();
        return view('welcome', [
            'ads' => $ads,
            'users' => $user,
        ]);
    }

    public function showUserPost()
    {
        // $ads = Ad::all();
        // $userId = Auth::user('id');
        // return view("dashboard",[
        //     'ads' => $ads,
        //     'users' => $userId,
        // ]);

        $userId = Auth::id();
        $ads = Ad::where('author_id', $userId)->get();
        $user = User::find($userId);
        return view('dashboard', [
            'userId' => $userId,
            'ads' => $ads,
            'user' => $user,
        ]);
    }

    public function addPost()
    {
        $ads = Ad::select('category')->distinct()->get();
        $locations = Ad::select('location')->distinct()->get();
        $userId = Auth::id();
        return view('newpost', [
            'userId' => $userId,
            'ads' => $ads,
            'locations' => $locations
         ]);
    }


    public function show($id)
    {
        $unipost = Ad::find($id);

        return view('show', ['ad' => $unipost]);
    }

    public function create(Request $request)
    {

        //dd($request);
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'image' => ['image', 'max:2000'],
            'price' => ['required', 'numeric', 'min:1000'],
            'location' => ['required', 'string'],
        ]);
        $filename = time() . '.' . $request->image->extension();
        $request->image->storeAs(
            '/public/adsImages',
            $filename
        );
        // dd($filename);

        Ad::create([
            'title' => $request->title,
            'category' => $request->category,
            'description' => $request->description,
            'image' => $filename,
            'price' => $request->price,
            'location' => $request->location,
            'author_id' => $request->get('userid'),
        ]);
        return redirect()->route('dashboard')->with('success', 'Post created succesfully');
    }


    public function edit($id)
    {
        $unipost = Ad::find($id);
        $userId = Auth::id();

        return view('edit', [
            'id' => $unipost,
            'userId' => $userId,
        ]);
    }


    public function update(Request $request, $ad)
    {
        if ($request->file('image')) {
            $filename = time() . '.' . $request->image->extension();
            $request->image->storeAs(
                '/public/adsImages',
                $filename
            );



            $request->validate([
                'title' => 'required',
                'category' => 'required',
                'description' => 'required',
                'price' => 'required',
                'location' => 'required',
            ]);

            $product = Ad::where('id', $ad)->update([
                'title' => $request['title'],
                'category' => $request['category'],
                'description' => $request['description'],
                'image' => $filename,
                'price' => $request['price'],
                'location' => $request['location'],
            ]);
        } else {
            $request->validate([
                'title' => 'required',
                'category' => 'required',
                'description' => 'required',
                'price' => 'required',
                'location' => 'required',
            ]);

            $product = Ad::where('id', $ad)->update([
                'title' => $request['title'],
                'category' => $request['category'],
                'description' => $request['description'],
                'price' => $request['price'],
                'location' => $request['location'],
            ]);

            //  Ad::update($request->all());

        }
        return redirect()->route('dashboard')
            ->with('succes', ' modification de posts reussir .');
    }

    public function delete($id)
    {
        $ad = Ad::find($id);
        $ad->delete();
        return redirect()->route('dashboard')->with('success', 'Post deleted succesfully');
    }


    public function search(Request $request)
    {
        $search = $request->input('search');
        $keywords = explode(' ', $search);

        //dd($keywords);
        // $query = Ad::query();

        $query = "select * from ads where ";
        $query .= "concat(title,category,price,location) like '%" . $keywords[0] . "%' OR";

        if (count($keywords) > 1) {
            for ($i = 1; $i < count($keywords); $i++) {
                $query .= " concat(title,category,price,location) like '%" . $keywords[$i] . "%' OR";
            }
        }

        $query = rtrim($query, ' OR');

        $results = DB::select($query);
        // $results = DB::select('');

        //dd($results);

        $ads = Ad::paginate(4);
        // $results = $query->where(function ($query) use ($search) {
        //     $query->where('title', 'LIKE', "%{$search}%")
        //         ->orWhere('price', 'LIKE', "%{$search}%")
        //         ->orWhere('description', 'LIKE', "%{$search}%")
        //         ->orWhere('location', 'LIKE', "%{$search}%")
        //         ->orWhere('category', 'LIKE', "%{$search}%");
        // })->get();

        return view('search', ['results' => $results, 'ads' => $ads]);
    }
}
