<?php

namespace App\Http\Controllers;

use App\Models\ChatSession;
use App\Models\Message;
use Illuminate\Http\Request;
use App\Events\MessageSent;
use Illuminate\Support\Facades\Storage;

class ChatController extends Controller
{
    public function startChat(Request $request)
    {
        $chatSession = ChatSession::where('doctor_id', $request->doctor_id)
            ->where('patient_id', $request->patient_id)
            ->first();
        // If no session exists, create a new one
        if (!$chatSession) {
            $chatSession = ChatSession::create([
                'doctor_id' => $request->doctor_id,
                'patient_id' => $request->patient_id,
            ]);
        }

        if (auth()->user()->type == 'patient') {
            return response()->json([
                'session' => $chatSession->id
            ]);
        } else {
            return redirect()->route('chat.view', ['session' => $chatSession->id]);

        }
    }

    public function viewChat($sessionId)
    {


        // Retrieve the chat session by ID
        $chatSession = ChatSession::with(['doctor', 'patient'])->findOrFail($sessionId);


        // Fetch messages related to this chat session
        $messages = Message::where('chat_session_id', $sessionId)->get();

        // Pass data to the view (you'll create the view file)
        return view('chat.view', [
            'chatSession' => $chatSession,
            'messages' => $messages,
        ]);
    }

    public function sendMessage(Request $request)
    {
        $request->validate([
            'message' => 'nullable|string',
            'file' => 'nullable|mimes:pdf|max:10240' // Allow only PDF files, max size 10MB
        ]);
    
        $message = new Message();
        $message->user_id = auth()->id();
        $message->chat_session_id = $request->chat_session_id;
        $message->content = $request->message;
    
        // Handle file upload
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filePath = $file->store('attachments', 'public'); // Save in 'public/attachments'
            $message->file_url = $filePath;
        }
    
        $message->save();
    
        return response()->json([
            'user_name' => auth()->user()->first_name,
            'message_content' => $message->content,
            'message_timestamp' => $message->created_at->format('H:i'),
            'file_url' => $message->file_url ? asset('storage/' . $message->file_url) : null,
        ]);
    }
    

    public function getNewMessages($id)
    {
        $chatSession = ChatSession::find($id);
        $messages = $chatSession->messages()->orderBy('created_at', 'asc')->get();

        return response()->json([
            'new_messages' => true,
            'messages' => $messages->map(function ($message) {
                return [
                    'user_id' => $message->user_id,
                    'content' => $message->content,
                    'file_url' => $message->file_url ? asset('storage/' . $message->file_url) : null,
                    'created_at' => $message->created_at->format('H:i'),
                    'user' => [
                        'first_name' => $message->user->first_name,
                        'last_name' => $message->user->last_name,
                    ],
                ];
            })
        ]);
    }
}