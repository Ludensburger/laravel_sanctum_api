<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reddit Clone - Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-100 min-h-screen">
    <!-- Header -->
    <header class="bg-white border-b border-gray-200 sticky top-0 z-10">
        <div class="max-w-6xl mx-auto px-4 py-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-2">
                    <i class="fab fa-reddit-alien text-orange-500 text-2xl"></i>
                    <h1 class="text-xl font-bold text-gray-900">Reddit Clone</h1>
                </div>
                <div class="flex items-center space-x-4">
                    <button class="bg-orange-500 text-white px-4 py-2 rounded-full text-sm font-medium hover:bg-orange-600 transition">
                        <i class="fas fa-plus mr-1"></i> Create Post
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-4xl mx-auto px-4 py-6">
        @if($posts->count() > 0)
            @foreach($posts as $post)
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 mb-4 overflow-hidden hover:shadow-md transition">
                    <!-- Post Header -->
                    <div class="p-4">
                        <div class="flex items-center space-x-2 text-sm text-gray-500 mb-2">
                            <div class="w-6 h-6 bg-orange-500 rounded-full flex items-center justify-center text-white text-xs font-bold">
                                {{ strtoupper(substr($post->user->name, 0, 1)) }}
                            </div>
                            <span class="font-medium">u/{{ $post->user->name }}</span>
                            <span>•</span>
                            <span>{{ $post->created_at->diffForHumans() }}</span>
                        </div>

                        <!-- Post Title -->
                        <h2 class="text-lg font-semibold text-gray-900 mb-2 hover:text-blue-600 cursor-pointer">
                            {{ $post->title }}
                        </h2>

                        <!-- Post Body -->
                        <div class="text-gray-700 mb-4 leading-relaxed">
                            {{ $post->body }}
                        </div>

                        <!-- Post Actions -->
                        <div class="flex items-center space-x-4 text-sm text-gray-500">
                            <button class="flex items-center space-x-1 hover:bg-gray-100 px-2 py-1 rounded">
                                <i class="far fa-arrow-up"></i>
                                <span>Upvote</span>
                            </button>
                            <button class="flex items-center space-x-1 hover:bg-gray-100 px-2 py-1 rounded">
                                <i class="far fa-arrow-down"></i>
                                <span>Downvote</span>
                            </button>
                            <button class="flex items-center space-x-1 hover:bg-gray-100 px-2 py-1 rounded">
                                <i class="far fa-comment"></i>
                                <span>{{ $post->comments->count() }} Comments</span>
                            </button>
                            <button class="flex items-center space-x-1 hover:bg-gray-100 px-2 py-1 rounded">
                                <i class="far fa-share"></i>
                                <span>Share</span>
                            </button>
                        </div>
                    </div>

                    <!-- Comments Section -->
                    @if($post->comments->count() > 0)
                        <div class="border-t border-gray-100 bg-gray-50">
                            @foreach($post->comments as $comment)
                                <div class="p-4 border-l-2 border-orange-200 ml-4 {{ !$loop->last ? 'border-b border-gray-200' : '' }}">
                                    <div class="flex items-center space-x-2 text-sm text-gray-500 mb-2">
                                        <div class="w-5 h-5 bg-blue-500 rounded-full flex items-center justify-center text-white text-xs font-bold">
                                            {{ strtoupper(substr($comment->user->name, 0, 1)) }}
                                        </div>
                                        <span class="font-medium">u/{{ $comment->user->name }}</span>
                                        <span>•</span>
                                        <span>{{ $comment->created_at->diffForHumans() }}</span>
                                    </div>
                                    <div class="text-gray-700 ml-7">
                                        {{ $comment->body }}
                                    </div>
                                    <div class="flex items-center space-x-3 ml-7 mt-2 text-xs text-gray-500">
                                        <button class="hover:text-orange-500">
                                            <i class="far fa-arrow-up mr-1"></i>Upvote
                                        </button>
                                        <button class="hover:text-blue-500">
                                            <i class="far fa-arrow-down mr-1"></i>Downvote
                                        </button>
                                        <button class="hover:text-gray-700">
                                            <i class="far fa-reply mr-1"></i>Reply
                                        </button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            @endforeach
        @else
            <!-- Empty State -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-12 text-center">
                <i class="fas fa-comments text-gray-300 text-6xl mb-4"></i>
                <h3 class="text-xl font-semibold text-gray-600 mb-2">No posts yet!</h3>
                <p class="text-gray-500 mb-6">Be the first to share something with the community.</p>
                <button class="bg-orange-500 text-white px-6 py-3 rounded-full font-medium hover:bg-orange-600 transition">
                    <i class="fas fa-plus mr-2"></i>Create First Post
                </button>
            </div>
        @endif
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200 mt-12">
        <div class="max-w-6xl mx-auto px-4 py-6 text-center text-gray-500 text-sm">
            <p>&copy; 2025 Reddit Clone. Built with Laravel & Tailwind CSS.</p>
        </div>
    </footer>
</body>
</html>
