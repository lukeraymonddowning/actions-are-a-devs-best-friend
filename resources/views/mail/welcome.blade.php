<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="my-6 font-mono min-h-screen antialiased bg-slate-900">
<x-logo/>
<div class="mt-6 mx-6 md:mx-auto max-w-4xl bg-slate-200 rounded-lg p-4 space-y-3">
    <h1 class="text-xl mb-4 font-bold">Hey {{ $user->name }}!</h1>
    <p>
        We're so excited about ParrotCon! We've been working incredibly hard on it. For example,
        there's this cool mini-game where you hit parrots on the head as they pop up to earn points.
        We didn't steal the idea from any other conference. Completely unique.
    </p>
    <p>
        We have tons of talks lined up all about the real problems affecting parrots today, from
        migration issues to parrot-el testing.
    </p>
    <p>
        We'll keep you updated as we get closer to the event. In the meantime, keep parroting on!
    </p>
    <p>
        Regards,<br>
        Parrot Landsman
    </p>
</div>
</body>
</html>
