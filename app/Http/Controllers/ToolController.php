<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreToolRequest;
use App\Http\Resources\ToolResource;
use App\Models\Tag;
use App\Models\Tool;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ToolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $tag = $request->query('tag');

        if ($tag) {
            $tools = Tool::whereHas('tags', function($query) use ($tag) {
                $query->where('name', $tag);
            })->with('tags')->get();
        } else {
            $tools = Tool::with('tags')->get();
        }

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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Encontrando a ferramenta pelo ID
        $tool = Tool::find($id);

        // Verificando se a ferramenta foi encontrada
        if (!$tool) {
            return response()->json([
                'message' => 'Ferramenta não encontrada.',
            ], 404);
        }

        // Deletando a ferramenta
        $tool->delete();

        // Retornando uma resposta de sucesso
        return response()->json([
            'message' => 'Ferramenta removida com sucesso.',
        ], 200);
    }
}
