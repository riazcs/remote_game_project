<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GameController extends Controller
{
    public function index()
    {
        $contents = Game::get();
        return view('content.dashboard.index', compact('contents'));
    }

    public function home()
    {
        $contents = Game::paginate(100);
        return view('home.home', compact('contents'));
    }


    public function create()
    {
        return view('content.create');
    }


    public function store(Request $request)
    {

        $request->validate([
            'list' => 'required'
        ]);
        $addedCount = 0;
        $lines = explode("*", $request->list);

        foreach ($lines as $line) {
            $datas = explode("|", $line);
            if (count($datas) >= 4) {
                Game::updateOrCreate([
                    'link' => $datas[1]
                ], [
                    'title' => $datas[0],
                    'link' => $datas[1],
                    'image' => $datas[2],
                    'description' => $datas[3],
                    'slug' => Str::slug($datas[0]),
                ]);
                $addedCount++;
            } else {
                return back()->withErrors(['Invalid data format.']);
            }
        }

        return redirect()->route('contents.index')->with('success', 'added')->with('addedCount', $addedCount);
    }



    public function show(Game $content, $slug)
    {
        $content = Game::where('slug', 'like', '%' . $slug . '%')->first();
        return view('home.show', compact('content'));
    }


    public function edit(Game $Content)
    {
        return view('backend.Content.edit', compact('Content'));
    }


    public function update(Request $request, Game $content)
    {
        $content->name = $request->name;
        $content->amount = $request->amount;
        $content->days = $request->days;
        $content->gift = $request->gift;
        $content->save();
        return redirect()->route('Contents.index');
    }


    public function destroy(Game $content, $id)
    {
        $content = Game::find($id);
        $content->delete();
        return redirect('contents.index');
    }
}
