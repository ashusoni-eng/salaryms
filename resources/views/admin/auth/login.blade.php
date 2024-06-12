<form method="POST" action="{{ route('admin.login.submit') }}">
    @csrf
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Login</button>
    @error('email')
        {{$message}}
    @enderror
</form>
