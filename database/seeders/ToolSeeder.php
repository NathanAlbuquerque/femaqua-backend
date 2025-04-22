<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tool;
use App\Models\Tag;

class ToolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tools = [
            [
                'title' => 'Notion',
                'link' => 'https://notion.so',
                'description' => 'All in one tool to organize teams and ideas. Write, plan, collaborate, and get organized.',
                'tags' => ['organization', 'planning', 'collaboration', 'writing', 'calendar'],
            ],
            [
                'title' => 'json-server',
                'link' => 'https://github.com/typicode/json-server',
                'description' => 'Fake REST API based on a json schema. Useful for mocking and creating APIs for front-end devs to consume in coding challenges.',
                'tags' => ['api', 'json', 'schema', 'node', 'github', 'rest'],
            ],
            [
                'title' => 'fastify',
                'link' => 'https://www.fastify.io/',
                'description' => 'Extremely fast and simple, low-overhead web framework for NodeJS. Supports HTTP2.',
                'tags' => ['web', 'framework', 'node', 'http2', 'https', 'localhost'],
            ],
        ];

        foreach ($tools as $data) {
            $tool = Tool::create([
                'title' => $data['title'],
                'link' => $data['link'],
                'description' => $data['description'],
            ]);

            $tagIds = collect($data['tags'])->map(function ($tag) {
                return Tag::firstOrCreate(['name' => $tag])->id;
            });

            $tool->tags()->attach($tagIds);
            $this->command->info("Tool '{$tool->title}' seeded with " . count($tagIds) . " tags.");
        }
    }
}
