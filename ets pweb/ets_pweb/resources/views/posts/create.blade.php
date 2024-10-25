<form action="{{ route('posts.store') }}" method="POST">
    @csrf
    <div>
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" required>
    </div>
    <div>
        <label for="body">Content:</label> <!-- 'body' instead of 'content' -->
        <textarea name="body" id="body" required></textarea> <!-- 'body' instead of 'content' -->
    </div>
    <button type="submit">Create Post</button>
</form>
