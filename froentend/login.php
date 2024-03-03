<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    <h1>User Login</h1>
    <form id="loginForm" method="post" action="http://127.0.0.1:8000/api/login">
        <label for="enrollmentNumber">Enrollment Number:</label>
        <input type="text" id="enrollmentNumber" name="enrollment_number" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <button type="submit">Login</button>
    </form>

    <script>
    document.getElementById('loginForm').addEventListener('submit', function(event) {
        event.preventDefault();

        // Create FormData object
        const formData = new FormData();
        formData.append('enrollment_number', document.getElementById('enrollmentNumber').value);
        formData.append('password', document.getElementById('password').value);

        // Send POST request to login endpoint
        fetch('http://127.0.0.1:8000/api/login', {
            method: 'POST',
            body: formData
        })
        .then(response => {
            if (response.ok) {
                alert('Login successful');
                // Redirect to profile page or any other page
            } else {
                throw new Error('Login failed');
            }
        })
        .catch(error => {
            alert('Login failed');
            console.error(error);
        });
    });
    </script>
</body>
</html>
