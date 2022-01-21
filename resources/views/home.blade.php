<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="font-mono min-h-screen antialiased bg-slate-900">
<div class="flex h-full p-6 space-x-6 justify-around">
    <form action="{{ route('users.register') }}" method="POST" class="flex-1 mt-5">
        @csrf
        <div class="flex space-x-6 mb-6 justify-around">
            <div class="flex-1 flex flex-col">
                <label for="name" class="ml-1 mb-1 text-slate-200">Name</label>
                <input type="text" id="name" name="name" list="names" autocomplete="off"
                       class="bg-transparent text-slate-200 border-2 border-slate-300 rounded-lg focus:border-slate-200 focus:ring-0">
                @error('name')
                <span class="mt-1 text-sm text-pink-500">{{ $message }}</span>
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
                <span class="mt-1 text-sm text-pink-500">{{ $message }}</span>
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
            <span class="mt-1 text-sm text-pink-500">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit"
                class="rounded-full h-14 w-40 bg-blue-700 hover:bg-blue-600 text-slate-200 border border-blue-600 shadow-lg shadow-blue-800 transition">
            Register
        </button>
    </form>
    <div class="flex-1 flex flex-col">
        <h2 class="text-slate-200 text-3xl mb-3">Users</h2>
        <div class="flex-1 rounded-lg border-2 border-slate-200 p-4">
            @foreach($users as $user)
                <div class="flex items-center">
                    <img src="/heads/{{ $user->picture }}" alt="A head" class="h-20 mr-4">
                    <div class="flex-1 flex flex-col">
                        <span class="text-slate-200 text-xl">{{ $user->name }}</span>
                        <span class="text-slate-400 text-lg">{{ $user->email }}</span>
                    </div>
                    <span class="text-slate-500">Created {{ $user->created_at->format('H:i') }}</span>
                </div>
            @endforeach
        </div>
    </div>
</div>
</body>
</html>
