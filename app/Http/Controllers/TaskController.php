<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTaskFormRequest;
use App\Http\Requests\UpdateTaskFormRequest;
use App\Http\Resources\Task\TaskResource;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        return TaskResource::collection(Task::query()->select([
            'id',
            'title',
            'description',
            'status',
            'created_at',
        ])
            ->get());
    }

    public function search(Request $request)
    {
        $filters = $request->only(['status', 'created_at']);

        $query = Task::query()->select([
            'id',
            'title',
            'description',
            'status',
            'created_at',
        ]);

        if (isset($filters['status'])) {
            $query->where('status', $filters['status']);
        }
        if (isset($filters['created_at'])) {
            $query->orderBy('created_at', $filters['created_at']);
        }

        return TaskResource::collection($query->get());
    }

    public function show(Task $task)
    {
        return new TaskResource($task);
    }

    public function add(CreateTaskFormRequest $formRequest)
    {
        if (isset($request->validator) && $request->validator->fails()) {
            return $request->validator->errors()->messages();
        }

        /** @var CreateTaskFormRequest $fieldsValid */
        $fieldsValid = $formRequest->validated();

        return Task::query()->create([
            'title' => $fieldsValid['title'],
            'description' => $fieldsValid['description'],
        ]);
    }

    public function update(UpdateTaskFormRequest $formRequest, Task $task)
    {
        if (isset($request->validator) && $request->validator->fails()) {
            return $request->validator->errors()->messages();
        }

        /** @var array AddPersonFormRequest $fieldsValid */
        $fieldsValid = $formRequest->validated();

        return $task->update($fieldsValid);
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return response([]);
    }
}
