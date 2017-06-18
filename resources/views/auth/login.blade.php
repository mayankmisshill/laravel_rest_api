
<form action="{{ url('api/login') }}" method="post">
    <input type="email" name="email" placeholder="Email ID" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Submit</button>
</form>