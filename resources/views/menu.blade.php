<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SatisfactionForms</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            padding: 20px;
        }

        .cards-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 15px;
            width: 100%;
            max-width: 400px;
        }

        .card {
            display: block;
            width: 300px;
            padding: 50px;
            text-decoration: none;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease-in-out, transform 0.3s ease-in-out;
            color: #333;
        }

        .card:hover {
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
            transform: translateY(-5px);
        }

        .card-title {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        .card-text {
            font-size: 1rem;
            color: #666;
        }

        .alert {
            margin-bottom: 15px;
            padding: 15px;
            background-color: #f44336;
            color: white;
            text-align: center;
            border-radius: 5px;
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="cards-container">
        <!-- Check for an error message -->
        @if (session('error'))
            <div class="alert">
                {{ session('error') }}
            </div>
        @else
            <!-- Display the menu cards if no error -->
            @foreach($users as $user)
                <div class="card" data-id="{{ $user->id }}" onclick="redirectToForm({{ $user->id }})">
                    <h2>{{ $user->name }}</h2>
                </div>
            @endforeach
        @endif
    </div>

    <script>
        function redirectToForm(userId) {
            window.location.href = `/form?office_id=${userId}`;
        }
    </script>
</body>
</html>
