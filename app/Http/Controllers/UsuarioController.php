<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Usuario;

class UsuarioController extends Controller
{

	        public function __construct()
		    {
		        //$this->middleware('auth');
	        }

                /**
                * Display a listing of the resource.
                *
                * @return \Illuminate\Http\Response
                */
		    public function index()
		    {
		        // 		Aqui ta acessando a pasta de views e entrando na pasta usuarios
				        // 		onde se encontra o arquivo index.blade.php
				        $usuarios=Usuario::all()->reverse();
		        // 		"with" significa passa a view "com" a variavel inserida dentro
				        return view("usuarios.index")->with(["usuarios"=>$usuarios]);
	        }

            /**
                * Show the form for creating a new resource.
                *
                * @return \Illuminate\Http\Response
                */
		    public function create()
		    {
		         return view("usuarios.create");
            }

            /**
            * Store a newly created resource in storage.
		     *
		     * @param  \Illuminate\Http\Request  $request
		     * @return \Illuminate\Http\Response
		     */
		    public function store(Request $request, Usuario $usuario)
		    {

		        // 	Verifica se informou o arquivo e se é válido
				    if ($request->hasFile('foto') && $request->file('foto')->isValid()) {

						$fileTempOrigem = $_FILES['foto']['tmp_name']; // coloca arquivo temporario no servidor

						$file= $_FILES['foto']['name']; // pega o arquivo em si

						mkdir( "img/",0777,true); // criar diretorio da pasta

						$arquivoDestino= "img/".$file; // o destino do arquivo onde vai ser enviado

						if (!move_uploaded_file($fileTempOrigem, $arquivoDestino)) // retorna true ou false
						{
							return redirect()
						                    ->back()
						                    ->with('error', 'Falha ao salvar imagem')
											->withInput();
						}

                    }

                $usuario->nome=$request->nome;
                $usuario->email=$request->email;
                $usuario->senha=$request->senha;
                $usuario->foto=$arquivoDestino;
                $salvou=$usuario->save();

                // Verifica se NÃO deu certo para salvar (Redireciona de volta)
						        if ( !$salvou )
						            return redirect()
						                        ->back()
						                        ->with('error', 'Falha ao salvar usuario')
                                                ->withInput();

                // Exemplo abaixo é de salvar tudo de uma vez , porque pode conter diversos
                // campos, com isso agiliza a aplicação de a tabela tiver muitas colunas
                //Usuario::create($request->all());

                    return view("welcome")->with("usuario",$usuario);
            }

            /**
            * Display the specified resource.
		     *
		     * @param  int  $id
		     * @return \Illuminate\Http\Response
		     */
		    public function show($id)
		    {
                $usuario=Usuario::find($id);
		        return view("usuarios.show")->with("usuario",$usuario);
	        }

            /**
            * Show the form for editing the specified resource.
		     *
		     * @param  int  $id
		     * @return \Illuminate\Http\Response
		     */
		    public function edit($id)
		    {
		        $usuario=Usuario::find($id);
		        return view("usuarios.edit")->with("usuario",$usuario);
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
                $usuario=Usuario::find($id);
                $fotoOriginalUsuario=$usuario->foto;

                if(trim($request->foto)!="")
                {
                    $fotoUsuario="img/".$_FILES['foto']['name'];

                    if ($fotoOriginalUsuario!=$fotoUsuario)
                    {
                        $fileTempOrigem = $_FILES['foto']['tmp_name'];

						if (!move_uploaded_file($fileTempOrigem, $fotoUsuario))
						{
							return redirect()
						                    ->back()
						                    ->with('error', 'Falha ao salvar imagem')
											->withInput();
                        }
                        $fotoOriginalUsuario=$fotoUsuario;
                    }
                }

                // Exemplo abaixo é de salvar tudo de uma vez , porque pode conter diversos
                // campos, com isso agiliza a aplicação de a tabela tiver muitas colunas
                //$usuario->update($request->all());


                $updat=Usuario::find($id)->update(["nome"=>$request->nome,"email"=>$request->email,
                "senha"=>$request->senha,"foto"=>$fotoOriginalUsuario]);

                // Verifica se NÃO deu certo para atualizar (Redireciona de volta)
						        if ( !$updat )
						            return redirect()
						                        ->back()
						                        ->with('error', 'Falha ao atualizar usuario')
                                                ->withInput();


                return $this->index();
	        }

            /**
            * Remove the specified resource from storage.
		     *
		     * @param  int  $id
		     * @return \Illuminate\Http\Response
		     */
		    public function destroy($id)
		    {
                $removeUsuario=Usuario::find($id)->delete();
                    // Verifica se NÃO deu certo para deletar (Redireciona de volta)
						        if ( !$removeUsuario )
						            return redirect()
						                        ->back()
						                        ->with('error', 'Falha ao atualizar usuario')
                                                ->withInput();

                    return $this->index();
	        }
}
