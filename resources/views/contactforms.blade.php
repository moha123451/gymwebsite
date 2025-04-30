<form action="{{ route('contact.submit') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="url" name="website" placeholder="Website">
    <textarea name="comment" placeholder="Comment" required></textarea>
    <button type="submit">Submit</button>
</form>
