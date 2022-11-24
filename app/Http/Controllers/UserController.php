<?php

namespace App\Http\Controllers;


use App\Models\Fiche;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function accueil(Request $request){
        if ($request->session()->has('level')) {
            return redirect('index');
        } else{
            return view('connexion');
        }
         
    }

    public function check(Request $request)
    {
        //validate the input
        $request->validate([
            "email" => 'required',
            "password" => 'required|min:8|max:16', 
        ]);

        $field = filter_var($request->input('email'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $user = User::where($field, $request->email)->first();
        if ($user) {
            if ($request->password == $user->password) {
                $request->session()->put('id', $user->id);
                $request->session()->put('name', $user->name);
                $request->session()->put('username', $user->username);
                $request->session()->put('level', $user->level);
                return redirect('index');
            } else {
                return back()->with('fail', 'Mot de passe incorrect');
            }
        } else {
            return back()->with('fail', 'Pas de compte trouvé pour cet email');
        }
    }

    public function logout()
    {
        session()->flush();
        return redirect('/'); 
    }



    public function index(Request $request)
    {
        $level = session('level');
        $url = $level . '.index2';
        $search = $request['search'] ?? "";
        if ($request->has('search')) {
            $search = $request['search'];
            $fiches = Fiche::where(function ($query) use ($search) {
                $query->where('id',  $search)
                    ->orWhere('num_facture', 'Like', '%' . $search . '%')
                    ->orWhere('nom_client', 'Like', '%' . $search . '%')
                    ->orWhere('num_compte', 'Like', '%' . $search . '%')
                    ->orWhere('type', 'Like', '%' . $search . '%')
                    ->orWhere('service', 'Like', '%' . $search . '%');
            })->orderBy('created_at', 'desc')->paginate(10);
        } else {
            $fiches = Fiche::orderBy('id', 'desc')->paginate(10);
        }

        return view($url, compact('fiches', 'search'));
    }

    public function profile()
    {
        $user = User::where('id', session('id'))->first();

        return view('profile', compact('user'));
    }

    public function change_infos(Request $request, User $user)
    {
        $user->update($request->all());
        return back()->with('success', 'Changement réussi avec succès');
    }

    public function change_pass(Request $request, User $user)
    {
        if ($request->current_password == $user->password) {
            $user->update(['password' => $request->new_password]);
            return back()->with('success', 'Changement réussi avec succès');
        } else {
            return back()->with('fail', 'Le mot de passe que vous avez taper ne correspond pas au mot de passe actuel!');
        }
    }

    public function dash()
    {
        /* $sites = Site::all();
        return $sites; */
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
