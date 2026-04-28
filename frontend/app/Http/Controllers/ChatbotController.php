<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChatbotController extends Controller
{
    public function chat(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
        ]);

        $apiKey = env('GEMINI_API_KEY');
        
        if (empty($apiKey)) {
            return response()->json([
                'reply' => 'Gemini API key is missing. Please configure GEMINI_API_KEY in your .env file.'
            ], 500);
        }

        $message = $request->input('message');

        try {
            $response = Http::post("https://generativelanguage.googleapis.com/v1beta/models/gemini-pro:generateContent?key={$apiKey}", [
                'contents' => [
                    [
                        'parts' => [
                            ['text' => "You are a helpful travel assistant for the Travel Economy Idea Hub. Provide concise and budget-friendly travel advice. User asks: {$message}"]
                        ]
                    ]
                ]
            ]);

            if ($response->successful()) {
                $data = $response->json();
                $reply = $data['candidates'][0]['content']['parts'][0]['text'] ?? 'Sorry, I could not generate a response.';
                return response()->json(['reply' => $reply]);
            }

            return response()->json([
                'reply' => 'Failed to reach Gemini API.',
                'error' => $response->json()
            ], 500);

        } catch (\Exception $e) {
            return response()->json([
                'reply' => 'An error occurred while communicating with the AI.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
