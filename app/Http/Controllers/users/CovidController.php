<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Models\users\Covid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class CovidController extends Controller
{
    public const LOCAL_STORAGE_FOLDER = "Vcard/";
    public const LOCAL_STORAGE_FOLDER_DELETE = "/public/Vcard/";
    private $covid;

    public function __construct(Covid $covid)
    {
        $this->covid = $covid;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $covid = Covid::where('user_id', Auth::user()->id)->first();
        return view('users.Files.covid')->with('covid', $covid);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'booster' => 'required',
            'photo' => 'required',
        ]);

        $this->covid->user_id = Auth::user()->id;
        $this->covid->booster = $request->booster;
        $this->covid->photo = $this->saveFile($request->photo);

        if ($this->covid->save()) {
            Session::flash('alert', 'success|Account has been Updated');
            return redirect()->route('users.covid.index');
        } else {
            Session::flash('alert', 'danger|Account not Updated');
            return redirect()->route('users.covid.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'booster' => 'required',
        ]);

        $covid = $this->covid->findOrFail($id);
        $covid->booster = $request->booster;
        if ($request->photo) {
            $this->deleteFile($covid->photo);
            $covid->photo = $this->saveFile($request->photo);
        }

        if ($covid->save()) {
            Session::flash('alert', 'success|Account has been Updated');
            return redirect()->route('users.covid.index');
        } else {
            Session::flash('alert', 'danger|Account not Updated');
            return redirect()->route('users.covid.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //s
    }

    public function saveFile($file)
    {

        // getting original name
        $filenameWithExt = $file->getClientOriginalName();

        //Get just the file name
        $filenameWithoutExy = pathinfo( $filenameWithExt, PATHINFO_FILENAME );

        // creating new name
        $filename = $filenameWithoutExy."-".time()."-".".". $file->extension();

        // getting file path
        $filename_path = self::LOCAL_STORAGE_FOLDER_DELETE . $filename;
        while (Storage::disk('local')->exists($filename_path)) {
            // creating new name while exist
            $filename = $filenameWithoutExy."-".time()."-".".". $file->extension();
        }

        $file->storeAs(self::LOCAL_STORAGE_FOLDER, $filename);

        return $filename;

    }

    public function deleteFile($filename)
    {
        $filename_path = self::LOCAL_STORAGE_FOLDER_DELETE . $filename;

        if (Storage::disk('local')->exists($filename_path)) {
            Storage::disk('local')->delete($filename_path);
        }
    }
}
