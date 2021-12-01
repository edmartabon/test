<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageRequest;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function message(MessageRequest $messageRequest)
    {
        $message = request('message');

        $contexts = collect([[
            'fields' => ['Hello', 'Hi'],
            'message' => 'Welcome to StationFive.'
        ], [
            'fields' => ['Goodbye', 'bye'],
            'message' => 'Thank you, see you around.'
        ]]);

        $context = $contexts
            ->filter(function($context) use($message) {
                $message = strtolower($message);
                return collect($context['fields'])
                    ->map(fn($field) => strtolower($field))
                    ->filter(fn($field) => strpos($message, $field) !== false)
                    ->first();
            })
            ->first();
            
        $response = [
            'response_id' => request('conversation_id'),
            'message' => 'Sorry, I don’t understand.'
        ];

        if ($context) {
            $response['message'] = $context['message'];
        }

        return $response;
    }
}
