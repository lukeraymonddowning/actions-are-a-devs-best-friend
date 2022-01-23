<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="font-mono min-h-screen antialiased bg-slate-900">
<x-logo/>
@if(session()->has('poop'))
    <div id="pooping-parrot-container" class="absolute top-24 h-28 inset-x-0">
        <img src="/parrot.gif" id="pooping-parrot" class="absolute h-full -scale-x-100"/>
    </div>
@endif
<div class="flex h-full p-6 space-x-6 justify-around">
    <form action="{{ route('users.register') }}" method="POST" class="flex-1 mt-5">
        @csrf
        <div class="flex space-x-6 mb-6 justify-around">
            <div class="flex-1 flex flex-col">
                <label for="name" class="ml-1 mb-1 text-slate-200">Name</label>
                <input type="text" id="name" name="name" list="names" autocomplete="off"
                       class="bg-transparent text-slate-200 border-2 border-slate-300 rounded-lg focus:border-slate-200 focus:ring-0">
                @error('name')
                <x-validation-error>{{ $message }}</x-validation-error>
                @enderror
                <datalist id="names">
                    @foreach($names as $name)
                        @unless ($users->pluck('name')->contains($name))
                            <option value="{{ $name }}">
                        @endunless
                    @endforeach
                </datalist>
            </div>
            <div class="flex-1 flex flex-col">
                <label for="email" class="ml-1 mb-1 text-slate-200">Email</label>
                <input type="email" id="email" name="email" list="emails" autocomplete="off"
                       class="bg-transparent text-slate-200 border-2 border-slate-300 rounded-lg focus:border-slate-200 focus:ring-0">
                @error('email')
                <x-validation-error>{{ $message }}</x-validation-error>
                @enderror
                <datalist id="emails">
                    @foreach($emails as $email)
                        @unless ($users->pluck('email')->contains($email))
                            <option value="{{ $email }}">
                        @endunless
                    @endforeach
                </datalist>
            </div>
        </div>
        <div class="flex-1 flex flex-col mb-6">
            <label for="email" class="ml-1 mb-1 text-slate-200">Password</label>
            <input type="password" id="password" name="password" autocomplete="off"
                   class="bg-transparent text-slate-200 border-2 border-slate-300 rounded-lg focus:border-slate-200 focus:ring-0">
            @error('password')
            <x-validation-error>{{ $message }}</x-validation-error>
            @enderror
        </div>
        <button type="submit"
                class="rounded-full h-14 w-40 bg-blue-700 hover:bg-blue-600 text-slate-200 border border-blue-600 shadow-lg shadow-blue-800 transition font-bubble">
            Register
        </button>
    </form>
    <div class="flex-1 flex flex-col">
        <h2 class="text-slate-200 text-3xl mb-3">Users</h2>
        <div class="flex-1 p-4">
            @foreach($users as $user)
                <div class="flex items-center">
                    <div class="h-20 w-20 mr-4 relative">
                        <span
                            class="absolute inset-4 @if($user->is(auth()->user())) bg-green-500 @else bg-blue-500 @endif blur-lg"></span>
                        <img src="/heads/{{ $user->picture }}" alt="A head"
                             class="h-full relative transition-opacity"
                             @if(session()->has('poop') && $loop->first) id="first-head" style="opacity: 0" @endif>
                        @if(session()->has('poop') && $loop->first)
                            <img id="poop" src="/poop.png"
                                 class="absolute top-0 inset-0 opacity-0 transition-transform ease-in duration-1000">
                        @endif
                    </div>
                    <div class="flex-1 flex flex-col">
                        <span class="text-yellow-500 text-2xl font-bubble">{{ $user->name }}</span>
                        <span class="text-slate-400">{{ $user->email }}</span>
                    </div>
                    <span class="text-slate-500">Registered {{ $user->created_at->format('H:i') }}</span>
                </div>
            @endforeach
        </div>
    </div>
</div>
@if(session()->has('poop'))
    <script>
        const parrotContainer = document.getElementById('pooping-parrot-container');
        const parrot = document.getElementById('pooping-parrot');
        const poop = document.getElementById('poop');
        const head = document.getElementById('first-head');
        const parrotWidth = parrot.getBoundingClientRect().width;
        let hasPooped = false;

        poop.style.transform = `translateY(-130px) scale(0.1)`;

        let parrotPosition = parrotContainer.getBoundingClientRect().right - parrotWidth;
        parrot.style.left = parrotPosition + 'px';

        const timer = setInterval(() => {
            parrotPosition -= 2;
            parrot.style.left = parrotPosition + 'px';

            if (parrotPosition < -150) {
                parrotContainer.remove();
            }

            if (hasPooped) {
                return;
            }

            if (parrotPosition > head.getBoundingClientRect().left - 50) {
                return;
            }

            poop.style.transform = `translateY(0) scale(1.1)`;
            poop.style.opacity = '1';
            hasPooped = true;

            setTimeout(() => {
                poop.style.transitionDuration = '500ms';
                head.style.transitionDuration = '500ms';
                poop.style.transitionProperty = 'opacity'
                head.style.transitionProperty = 'opacity'
                poop.style.opacity = '0';
                head.style.opacity = '1';
            }, 1100);
        }, 10);
    </script>
@endif
</body>
</html>
