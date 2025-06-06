<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TaskController extends Controller
{
    public function getAllTasks()
    {
        $schema = 'https://';
        $host = config('app.ex2_api_host');
        $path = '/api/tasks';
        Log::info('Request to ex2');

        $response = Http::get($schema.$host.$path);
        return view('tasks', ['response' => $response->json()]);
    }
}
