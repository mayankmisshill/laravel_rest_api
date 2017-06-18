
<form action="{{ url('api/register') }}" method="post">
    <input type="text" name="name" placeholder="Name" required>
    <input type="text" name="email" placeholder="Email ID" required>
    <input type="password" name="password" placeholder="Password" required>
    <input type="password" name="password_confirmation" placeholder="Confirm Password">
    <button type="submit">Submit</button>
</form>