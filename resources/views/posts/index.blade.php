<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(["resources/css/app.css"])
    <title>掲示板</title>
</head>
<body>
    <div class="container mx-auto">
        <h1 class="text-3xl font-bold mt-4 mb-2 text-center">掲示板</h1>
        @foreach($posts as $post)
            <div class="border-gray-300 border-b-2 mb-2">{{$post->created_at}} <span class="text-green-500">匿名さん</span></div>
            <a href="/posts/update/{{ $post->id }}" class="text-base">編集</a>
            <div class="mt-2 p-4 py-0">{{$post->comment}}</div>
        @endforeach
        <form method="POST">
            @csrf <!-- CSRF トークン -->
            <div>
                <textarea name="comment" required rows="3" class="border mt-4 mb-4 p-4 w-full"></textarea>
            </div>
            <div class="flex justify-center">
                <button type="submit" class="px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white rounded">コメントする</button>
            </div>
        </form>
    </div>

</body>
</html>