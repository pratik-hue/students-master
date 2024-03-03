<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    <h1>Update Profile</h1>
    <form id="updateProfileForm" method="post" action="http://127.0.0.1:8000/api/update-profile">
        <!-- Include fields that the user can update, e.g., qualification, course, contact number -->

        <button type="submit">Update Profile</button>
    </form>

    <script>
    document.getElementById('updateProfileForm').addEventListener('submit', function(event) {
        event.preventDefault();

        // Create FormData object
        const formData = new FormData();
        // Include fields that the user can update
        formData.append('qualification', document.getElementById('qualification').value);
        formData.append('course', document.getElementById('course').value);
        formData.append('contact_number', document.getElementById('contactNumber').value);

        // Send POST request to update profile endpoint
        fetch('http://127.0.0.1:8000/api/update-profile', {
            method: 'POST',
            body: formData
        })
        .then(response => {
            if (response.ok) {
                alert('Profile updated successfully');
                // Redirect to profile page or any other page
            } else {
                throw new Error('Profile update failed');
            }
        })
        .catch(error => {
            alert('Profile update failed');
            console.error(error);
        });
    });
    </script>
</body>
</html>
