<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

use \App\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource for User.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){

        $requested_items = $request->request->all();

        $items = User::query();

        if($request->has('name_query') && !empty($request->input('name_query')))
            $items = $items->where('name', 'LIKE', '%'.$requested_items['name_query'].'%');
        
        if($request->has('StatusType') && !empty($request->input('StatusType')))
            $items = $items->where('role_id', '=', $request->StatusType);
        
        if($request->has('StartDate')  && !empty($request->input('StartDate')))
            $items = $items->where('created_at', '>=', $request->StartDate);
            
        if($request->has('EndDate')  && !empty($request->input('EndDate')))
            $items = $items->where('created_at', '<=', $request->EndDate);
            
        $items = $items->join('roles', 'roles.id', '=', 'users.role_id');

        $items = $items->select(['users.*', 'roles.title as role_name']);


        $items = $items->paginate(10);
        // dd($items);
        
        return  view('users.list')->with([
            'items' => $items,
            'requested_items' => $requested_items
        ]);
    }

    public function search($col, $query){
        $items = User::where($col, 'LIKE', '$'.$query.'%')->paginate(10);
        return  view('users.list')->with(['items' => $items]);
    }
    
    public function fromNow(){
        $now = date("Y-m-d");
        $items = User::where('created_at', '>=', $now)->get();

        return view('users.list')->with('items', $items);
    }

    public function betweenDate($start, $end){
        $items = User::whereBetween('created_at', array($from, $to) )->get();
        
        return view('users.list')->with('items', $items);
    }

    public function byDate($start){
        $items = User::whereBetween('created_at', array($from, $to) )->get();
        
        return view('users.list')->with('items', $items);
    }

    public function today(){
        $items =  User::whereBetween('created_at',
        [  date('Y-m-d').' 00:00:00',
           date('Y-m-d').' 23:59:59'
        ])->get();

        return $items;
    }

    public function create(){
        return view('users.create');
    }
    
    public function store(Request $request){

        
        $item = new User();

      
        
        $requested_items = $request->request->all();

        $rules = array(
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'role_id' => ['required', 'numeric', 'digits_between:0,1']
        );

        $messages = array(
            'name.required' => 'É necessário informar o campo nome',
            'email.required' => 'É necessário informar o campo e-mail',
            'email.email' => 'É necessário um e-mail válido',
            'password.required' => 'É necessário informar o campo de senha',
            'password.min' => 'A senha deve ter mais de 6 dígitos',
            'password.confirmed' => 'As senhas não conferem!',
        );

        $val = Validator::make($requested_items, $rules, $messages);

        if ($val->passes()) 
        {

            $item->name = $request->name;
            $item->email = $request->email;
            $item->password =  bcrypt($request['password']);
            $item->role_id = $request->role_id;

            $item->save();
        
            return redirect()->back()->withInput();
        }else{
            $messages = $val->messages();
            // dd($messages);
            return redirect()->back()->withInput()->with('errors', $messages);

        }
    }
    
    public function show($id){

        return User::where('$id', '=', $id)->get();
    }

    public function edit($id){ 
        $item = User::find($id);

        return view('users.edit')->with([ 'item' => $item ]);
    }
    
    public function update(Request $request, $id){ 
        
        $item =  User::find($id);

        $requested_items = $request->request->all();

        $rules = array(
            'name' => [ 'string', 'max:255'],
            'email' => ['email', 'max:255', 
                Rule::unique('users')->ignore($id)
            ],
            'password' => [ 'string', 'min:6', 'confirmed'],
            'role_id' => [ 'numeric', 'digits_between:0,1']
        );

        $messages = array(
            'name.required' => 'É necessário informar o campo nome',
            'email.required' => 'É necessário informar o campo e-mail',
            'email.email' => 'É necessário um e-mail válido',
            'password.required' => 'É necessário informar o campo de senha',
            'password.min' => 'A senha deve ter mais de 6 dígitos',
            'password.confirmed' => 'As senhas não conferem!',
        );

        $val = Validator::make($requested_items, $rules, $messages);
        if ($val->passes()) 
        {

            $item->name = $request->name;

            if ($request->email !== $item->email)
                $item->email = $request->email;
            
            if (!empty($request->password) && $request->password!== $item->password )
                $item->password =  bcrypt($request['password']);

            $item->role_id = $request->role_id;

            $item->save();
        
            $request->session()->flash('message.level', 'success');
            $request->session()->flash('message.content', 'Item atualizado com sucesso!');
            return redirect()->route('users.edit', $item->id)->with([ 'item' => $item ]);
        }else{
            $messages = $val->messages();
            // dd($messages);
            return redirect()->back()->withInput()->with('errors', $messages);

        }
    }
    
    public function destroy(Request $request, $id){
        try{
            $item =  User::findOrFail($request->id);
        }
        catch(\Exception $exception){
            return redirect()->back()->with('errors', $exception);
        }
        try{
            $item->delete(); 
            $request->session()->flash('message.level', 'success');
            $request->session()->flash('message.content', 'Item foi removido com sucesso!');
            return redirect()->route('users.index');
        } catch (\Exception $exception) {
            return redirect()->back()->with('errors', $exception);
        }
    }
}
