<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    <h1>User Profile</h1>
    <!-- Display user's profile information retrieved from the server -->
    <div id="profileInfo">
        <p><strong>Email:</strong> <span id="email"></span></p>
        <p><strong>Enrollment Number:</strong> <span id="enrollmentNumber"></span></p>
        <p><strong>Qualification:</strong> <span id="qualification"></span></p>
        <p><strong>Course Pursuing:</strong> <span id="course"></span></p>
        <p><strong>Contact Number:</strong> <span id="contactNumber"></span></p>
        <!-- Add more fields as needed -->
    </div>

    <!-- Add a button or link to navigate to the profile update page -->
    <a href="update-profile.blade.php">Update Profile</a>

    <script>
    // Fetch user's profile information from the server and update the HTML elements
    fetch('http://127.0.0.1:8000/api/profile', {
        method: 'GET',
        headers: {
            'Authorization': 'Bearer YOUR_ACCESS_TOKEN', // Include the user's access token here
        }
    })
    .then(response => response.json())
    .then(data => {
        document.getElementById('email').innerText = data.email;
        document.getElementById('enrollmentNumber').innerText = data.enrollment_number;
        document.getElementById('qualification').innerText = data.qualification;
        document.getElementById('course').innerText = data.course;
        document.getElementById('contactNumber').innerText = data.contact_number;
        // Update other fields as needed
    })
    .catch(error => console.error('Error fetching profile:', error));
    </script>
</body>
</html>
