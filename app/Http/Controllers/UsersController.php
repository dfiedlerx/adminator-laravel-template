<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use \App\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource for User.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){

        $name_query = $request->input('name_query') ;

        $items = 
        User::
        where('name', 'LIKE', '%'.$name_query.'%')
        ->paginate(10);
        // dd($items);
        
        return  view('users.list')->with(['items' => $items]);
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

        // dd($request);
        
        $requested_items = $request->request->all();


        // Para mais regras e suas formatações especiais, veja a documentação
        // https://laravel.com/docs/5.7/validation#rule-email
        $rules = array(
            'name'     => 'required|max:255',
            'email'     => 'required|email|unique:users|max:255',
            'Sexo'     => 'required',
            'Numero'=>'required|numeric',
        );

        $messages = array(
            'Name.required' => 'É necessário informar o campo Nome',
            'Email.required' => 'É necessário informar o campo E-mail',
            'Sexo.required' => 'É necessário informar o campo Sexo',
            'Numero.required' => 'É necessário informar o campo Número',
        );

        $val = Validator::make($requested_items, $rules, $messages);

        // $data = $this->validate($request, [
        //     'Sexo'=>'required'
            // 'TelefonePrincipal'=>'required',
            // 'TelefoneSecundário'=>'required',
            // 'Rua'=>'required',
            // 'Numero'=>'required',
            // 'Bairro'=>'required',
            // 'StateId'=>'required',
            // 'Role'=>'required',
            // 'Ativo'=>'required',
            // ]);
        
        if ($val->passes()) 
        {

            if($request->hasfile('filename'))
            {

                $file = $request->file('filename');
                $name=time().$file->getClientOriginalName();
                // Utiliza-se o 'move' para imagens públicas
                $file->move(public_path().'/images/', $name);

                $user_pic = new \App\Models\Common\UserPic;
                $user_pic->Path = $name;
                $user_pic->save();

                $item->UserPicId = $user_pic.id;
            }

            $item->name = $request->name;
            $item->email = $request->email;
            $item->password =  bcrypt($request['password']);
            $item->Sexo = $request->Sexo;
            $item->TelefonePrincipal = $request->TelefonePrincipal;
            $item->TelefoneSecundario = $request->TelefoneSecundario;
            $item->Rua = $request->Rua;
            $item->Numero = $request->Numero;
            $item->Bairro = $request->Bairro;
            $item->Cidade = 1100072;
            $item->Role = $request->Role;
            $item->Ativo = $request->Ativo;
    
            
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
    
    //?page=2
    public function API_list(){
        $items = User::paginate(2)->toJson();
        return $items;
    }

    public function API_show($id){
        
        return User::where('id', $id)->get();
    }

    public function API_fromNow(){
        $now = date("Y-m-d");
        $items = User::where('created_at', '>=', $now)->get();

        return $items;
    }

    public function API_betweenDate($start, $end){
        $items = User::whereBetween('created_at', array($start, $end) )->get();
        
        return $items;
    }

    public function API_byDate($start){
        $items = User::where('created_at', '>=', $start.' 00:00:00' )->get();
        
        return $items;
    }

    public function API_today(){
        $items =  User::whereBetween('created_at',
        [  date('Y-m-d').' 00:00:00',
           date('Y-m-d').' 23:59:59'
        ])->get();

        return $items;
    }

    public function edit($id){ 
        //
    }
    
    public function update(Request $request, $id){ 
        //
    }
    
    public function destroy($id){
        //
    }
}
