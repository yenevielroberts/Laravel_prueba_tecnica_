<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>
    <div>
        <h1>Log in</h1>

        <form method="POST" action="{{ route('user.sendEmail') }}">
            @csrf
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
             <button type="submit" id="btnLogin" name="btnLogin"> Send reset link</button>
        </form>
    </div>
 
</body>
</html>