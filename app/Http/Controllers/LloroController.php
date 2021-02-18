<?php

namespace App\Http\Controllers;

use App\Models\Lloro;
use Illuminate\Http\Request;
use Telegram\Bot\Laravel\Facades\Telegram;

class LloroController extends Controller
{
    public function __construct($update)
    {
        $this->update = $update;

        //dd($this->update);
    }

    public function index()
    {
        

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

        $mensaje = "Vale,\n\nEl lloro se ha registrado correctamente.\n\nLlorica \u{1F4A6}";

        return $mensaje;
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
     * @param  \App\Models\Lloro  $lloro
     * @return \Illuminate\Http\Response
     */
    public function show(Lloro $lloro)
    {
        //
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
