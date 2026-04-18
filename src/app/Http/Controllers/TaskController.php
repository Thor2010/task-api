<?php
namespace App\Http\Controllers;

use App\Services\TaskService;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Resources\TaskResource;

class TaskController extends Controller
{
    protected $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function index()
    {
        return TaskResource::collection($this->taskService->getAll());
    }

    public function store(StoreTaskRequest $request)
    {
        $task = $this->taskService->create($request->validated());
        return new TaskResource($task);
    }

    public function update(UpdateTaskRequest $request, $id)
    {
        $task = $this->taskService->update($id, $request->validated());
        return new TaskResource($task);
    }

    public function destroy($id)
    {
        $this->taskService->delete($id);
        return response()->json(null, 204);
    }

    public function show($id)
    {
        $task = $this->taskService->find($id);
        return new TaskResource($task);
    }

    public function externalTasks()
    {
        $response = \Illuminate\Support\Facades\Http::get('https://jsonplaceholder.typicode.com/todos');

        return response()->json($response->json());
    }
}