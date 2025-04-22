<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreToolRequest;
use App\Http\Resources\ToolResource;
use App\Models\Tag;
use App\Models\Tool;
use Illuminate\Http\JsonResponse;

class ToolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tools = Tool::with('tags')->get();
        return response()->json([
            'message' => 'Ferramentas recuperadas com sucesso.',
            'data' => ToolResource::collection($tools),
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreToolRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $tool = Tool::create($validated);

        if (!empty($validated['tags'])) {
            $tool->tags()->attach(Tag::getOrCreateIds($validated['tags']));
        }

        return response()->json([
            'message' => 'Ferramenta cadastrada com sucesso.',
            'data' => new ToolResource($tool),
        ], 201);
    }
}
