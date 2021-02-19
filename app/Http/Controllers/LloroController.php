<?php

namespace App\Http\Controllers;

use App\Models\Lloro;
use Illuminate\Http\Request;



class LloroController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {

        $lloros = Lloro::all();
        return view('lloro.index', compact('lloros'));
        
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
    public function store($update)
    {
        $this->update = $update;

        $update_id = $this->update['update_id'];
        $message_id = $this->update['message']['message_id'];
        $from_id = $this->update['message']['from']['id'];
        $from_username = $this->update['message']['from']['username'];
        //$chat_id = $this->update['message']['chat']['id'];

        if (isset($this->update['message'])){

            $chatId = $this->update["message"]["chat"]["id"];
            $message = $this->update["message"]["text"];

        } elseif(isset($this->update['edited_message'])){

            $chatId = $this->update["edited_message"]["chat"]["id"];
            $message = $this->update["edited_message"]["text"];
        }

        if (strpos($message, "/lloro") === 0) {
            $comando = "/lloro";
            $text_lloro = substr($message, 7);
        }

        //dd($update_id);

        if (isset($this->update['message']['text'])){

            $text = $this->update['message']['text'];

            Lloro::create(array(
                'update_id'     => $update_id,
                'message_id'    => $message_id,
                'from_id'    => $from_id,
                'from_username'    => $from_username,
                'chat_id'    => $chatId,
                'command'    => $comando,
                'text'      => $text_lloro
            ));

        } else {

            Lloro::create(array(
                'update_id'     => $update_id,
                'message_id'    => $message_id,
                'from_id'    => $from_id,
                'from_username'    => $from_username,
                'chat_id'    => $chatId
            ));

        }

        $respuestas = array(
            "Llorando como una Charo no vamos a ninguna parte. \n", 
            "Un puto mar de lágrimas es lo que eres, maricón. \n", 
            "Isqui in li nis dijin a nistri suirti. \n", 
            "Busca en Google, coño. \n", 
            "He perdido la cuenta de la cantidad de lágrimas que has tirado a la basura. \n",
            "Vete a dar un paseo, pastel. \n",
            "Cierra al salir, llorica. \n",
            "He guardado tus lloros de gaylord. \n",
            "Más mierda para la base de datos. \n",
            "Lloros guardados, triste que eres un triste. \n",
            "Guardado en la base de datos, que ya es como tu puto cubo de lágrimas. \n",
            "Seguro que te falta un punto y coma \n",
            "En la modalidad Pay2Win no tendrías estos problemas. \n",
            "No vas a llegar a la entrega y lo sabes. \n",
            "Déjalo como está y entrégalo. \n",
            "Cuando todo esto acabe, podrás bañarte en tus lágrimas. \n",
            "Busca en StackOverflow, como hace todo el mundo. \n",
            "Pregunta en el chat de Telegram a ver si alguien es tan MARICA como tú. \n",
            "Cúentale tus fatigas al profe. \n",
            "Menudo pastanaga. \n",
            "Vaya un mierda de hackerman. \n"
        );
            
        $claves_aleatorias = array_rand($respuestas, 1);

        $mensaje = "\u{1F62D} \n\n";
        $mensaje .= $respuestas[$claves_aleatorias];
        $mensaje .= "<i>Todos los lloros https://telegram.jordiwp.es/lloros</i>";

        return $mensaje;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lloro  $lloro
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

        

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lloro  $lloro
     * @return \Illuminate\Http\Response
     */
    public function edit(Lloro $lloro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lloro  $lloro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lloro $lloro)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lloro  $lloro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lloro $lloro)
    {
        //
    }
}
