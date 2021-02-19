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
            "Llorando como una Charo no vamos a ninguna parte. \n\n", 
            "Un puto mar de lágrimas es lo que eres, maricón. \n\n", 
            "Isqui in li nis dijin a nistri suirti. \n\n", 
            "Busca en Google, coño. \n\n", 
            "He perdido la cuenta de la cantidad de lágrimas que has tirado a la basura. \n\n",
            "Vete a dar un paseo, pastel. \n\n",
            "Cierra al salir, llorica. \n\n",
            "He guardado tus lloros de gaylord. \n\n",
            "Más mierda para la base de datos. \n\n",
            "Lloros guardados, triste que eres un triste. \n\n",
            "Guardado en la base de datos, que ya es como tu puto cubo de lágrimas. \n\n",
            "Seguro que te falta un punto y coma \n\n",
            "En la modalidad Pay2Win no tendrías estos problemas. \n\n",
            "No vas a llegar a la entrega y lo sabes. \n\n",
            "Déjalo como está y entrégalo. \n\n",
            "Cuando todo esto acabe, podrás bañarte en tus lágrimas. \n\n",
            "Busca en StackOverflow, como hace todo el mundo. \n\n",
            "Pregunta en el chat de Telegram a ver si alguien es tan MARICA como tú. \n\n",
            "Cúentale tus fatigas al profe. \n\n",
            "Menudo pastanaga. \n\n",
            "Vaya un mierda de hackerman. \n\n"
        );
            
        $claves_aleatorias = array_rand($respuestas, 1);


        $mensaje = "\n".$respuestas[$claves_aleatorias];
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
