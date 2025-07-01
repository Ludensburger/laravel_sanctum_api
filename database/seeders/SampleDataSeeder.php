<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SampleDataSeeder extends Seeder
{
    public function run(): void
    {
        // Create sample users
        $users = [
            User::create([
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'password' => Hash::make('password123'),
            ]),
            User::create([
                'name' => 'Jane Smith',
                'email' => 'jane@example.com',
                'password' => Hash::make('password123'),
            ]),
            User::create([
                'name' => 'Mike Johnson',
                'email' => 'mike@example.com',
                'password' => Hash::make('password123'),
            ]),
        ];

        // Create sample posts
        $posts = [
            Post::create([
                'user_id' => $users[0]->id,
                'title' => 'Welcome to our Reddit Clone!',
                'body' => 'This is the first post on our new Reddit-like platform. Feel free to share your thoughts and engage with the community!',
            ]),
            Post::create([
                'user_id' => $users[1]->id,
                'title' => 'Laravel is amazing for building APIs',
                'body' => 'I\'ve been working with Laravel for a while now, and I must say it\'s incredible how easy it is to build robust APIs with Sanctum authentication. The Eloquent ORM makes database interactions so smooth!',
            ]),
            Post::create([
                'user_id' => $users[2]->id,
                'title' => 'Tips for better web development',
                'body' => 'Here are some tips I\'ve learned over the years: 1) Always validate user input, 2) Use version control religiously, 3) Write clean, readable code, 4) Test your applications thoroughly. What other tips would you add?',
            ]),
            Post::create([
                'user_id' => $users[0]->id,
                'title' => 'Question about database design',
                'body' => 'I\'m working on a project and wondering about the best practices for database normalization. Should I always aim for 3NF, or are there cases where denormalization makes sense for performance?',
            ]),
        ];

        // Create sample comments
        $comments = [
            // Comments for first post
            Comment::create([
                'post_id' => $posts[0]->id,
                'user_id' => $users[1]->id,
                'body' => 'Great initiative! Looking forward to seeing this community grow.',
            ]),
            Comment::create([
                'post_id' => $posts[0]->id,
                'user_id' => $users[2]->id,
                'body' => 'Love the design! Very clean and Reddit-like. Nice work!',
            ]),
            
            // Comments for second post
            Comment::create([
                'post_id' => $posts[1]->id,
                'user_id' => $users[0]->id,
                'body' => 'Totally agree! Laravel makes API development so much easier compared to other frameworks.',
            ]),
            Comment::create([
                'post_id' => $posts[1]->id,
                'user_id' => $users[2]->id,
                'body' => 'Have you tried using Laravel Sanctum with SPA authentication? It\'s fantastic!',
            ]),
            
            // Comments for third post
            Comment::create([
                'post_id' => $posts[2]->id,
                'user_id' => $users[0]->id,
                'body' => 'Great tips! I\'d add: Always backup your databases and use environment variables for sensitive data.',
            ]),
            Comment::create([
                'post_id' => $posts[2]->id,
                'user_id' => $users[1]->id,
                'body' => 'Documentation is also crucial! Future you will thank present you for good docs.',
            ]),
            
            // Comments for fourth post
            Comment::create([
                'post_id' => $posts[3]->id,
                'user_id' => $users[1]->id,
                'body' => 'It depends on your use case. For read-heavy applications, some denormalization can improve performance significantly.',
            ]),
            Comment::create([
                'post_id' => $posts[3]->id,
                'user_id' => $users[2]->id,
                'body' => 'I usually start with 3NF and then selectively denormalize based on performance requirements and query patterns.',
            ]),
        ];
    }
}
