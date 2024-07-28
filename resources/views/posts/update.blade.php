<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(["resources/css/app.css"])
    <title>記事更新</title>
</head>
<body>
    <div class="container mx-auto">
        <h1 class="text-3xl font-bold mt-4 mb-2 text-center">掲示板</h1>
        <form method="POST" action="{{ url('posts')}}">
            <input type="hidden" id="id" name="id" value="{{$post->id}}">
            @csrf <!-- CSRF トークン -->
            <div>
                <textarea name="comment" required rows="3" class="border mt-4 mb-4 p-4 w-full" placeholder="{{$post->comment}}" ></textarea>
            </div>
            <div class="flex justify-center">
                <button type="submit" class="px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white rounded">更新する</button>
            </div>
        </form>
    </div>

</body>
</html>