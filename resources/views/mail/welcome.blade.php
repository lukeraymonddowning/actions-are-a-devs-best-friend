<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="my-6 font-mono min-h-screen antialiased bg-slate-900">
<div class="mt-4 flex flex-col items-center">
    <img src="{{ asset('parrot.png') }}" alt="A Parrot" class="h-20">
    <h1 class="text-5xl font-bold font-bubble tracking-tighter flex select-none">
        <x-logo-letter text-color="text-red-500" background-color="bg-red-500">P</x-logo-letter>
        <x-logo-letter text-color="text-blue-500" background-color="bg-blue-500">a</x-logo-letter>
        <x-logo-letter text-color="text-yellow-500" background-color="bg-yellow-500">r</x-logo-letter>
        <x-logo-letter text-color="text-green-500" background-color="bg-green-500">r</x-logo-letter>
        <x-logo-letter text-color="text-pink-500" background-color="bg-pink-500">o</x-logo-letter>
        <x-logo-letter text-color="text-teal-500" background-color="bg-teal-500">t</x-logo-letter>
        <x-logo-letter text-color="text-lime-500" background-color="bg-lime-500">C</x-logo-letter>
        <x-logo-letter text-color="text-emerald-500" background-color="bg-emerald-500">o</x-logo-letter>
        <x-logo-letter text-color="text-indigo-500" background-color="bg-indigo-500">n</x-logo-letter>
    </h1>
    <span class="mt-1 text-slate-200">Online</span>
</div>
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
