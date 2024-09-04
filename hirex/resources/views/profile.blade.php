<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Card with Icons</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #afd8f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .profile-card {
            background-color: white;
            border-radius: 15px;
            padding: 20px;
            text-align: center;
            width: 550px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        .profile-card img {
            border-radius: 50%;
            width: 100px;
            height: 100px;
            margin-bottom: 20px;
        }

        .profile-card h2 {
            margin: 10px 0;
        }

        .profile-card p {
            color: gray;
            margin-bottom: 5px;
        }

        .profile-card .btn-primary {
            background-color: #5289b5;
            border: none;
        }

        .profile-card .btn-primary:hover {
            background-color: #ff3a3a;
        }

        .profile-card .stats {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
        }

        .profile-card .stats div {
            text-align: center;
        }

        .profile-card .icon-text {
            position: absolute;
            top: 15px;
            display: flex;
            align-items: center;
            font-size: 14px;
            font-weight: 500;
        }

        .profile-card .icon-text i {
            font-size: 20px;
            margin-right: 5px;
            color: #5289b5;
        }

        .profile-card .icon-connect {
            left: 20px;
        }

        .profile-card .icon-message {
            right: 20px;
        }
    </style>
</head>

<body>
    <div class="profile-card">
    
        <div class="icon-text icon-connect">
            <i class="bi bi-person-plus-fill"></i>
            <span>Connect</span>
        </div>
       
        <div class="icon-text icon-message">
            <i class="bi bi-chat-dots-fill"></i>
            <span>Message</span>
        </div>

        <img src="https://via.placeholder.com/100" alt="Sami Ghozi">
        <h2>Sami Ghozi</h2>
        <p>Twilio</p>
        <p>A programming company offering custom software solutions and innovative digital applications to meet client needs</p>
        <a href="https://web.whatsapp.com/">https://Twilio.com/</a>

        <div class="stats">
            <div>
                <h4>65</h4>
                <p>Friends</p>
            </div>
            <div>
                <h4>43</h4>
                <p>Photos</p>
            </div>
            <div>
                <h4>21</h4>
                <p>Comments</p>
            </div>
        </div>

        <button class="btn btn-primary mt-3">Posts</button>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
