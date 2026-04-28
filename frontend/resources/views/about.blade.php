<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>About - Travel Economy Idea Hub</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

    <!-- Tailwind -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Instrument Sans', sans-serif;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
            background-color: #0f172a; /* Slate 900 */
            color: #f8fafc;
        }
        .glass-panel {
            background: rgba(30, 41, 59, 0.6);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        }
        .gradient-text {
            background: linear-gradient(135deg, #f472b6, #c084fc, #818cf8);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>
</head>
<body class="antialiased selection:bg-indigo-500 selection:text-white relative min-h-screen flex flex-col justify-between">
    <!-- Background effects -->
    <div class="fixed top-0 right-0 w-[40rem] h-[40rem] bg-fuchsia-500/10 rounded-full blur-[100px] -mr-64 -mt-64 pointer-events-none z-0"></div>
    <div class="fixed bottom-0 left-0 w-[40rem] h-[40rem] bg-indigo-500/10 rounded-full blur-[100px] -ml-64 -mb-64 pointer-events-none z-0"></div>

    <!-- Header -->
    <header class="w-full fixed top-0 py-6 px-8 flex justify-between items-center z-50 glass-panel border-b border-white/5">
        <div class="flex items-center gap-2">
            <svg class="w-8 h-8 text-sky-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <span class="text-xl font-bold tracking-tight">Idea Hub</span>
        </div>
        
        <nav class="flex items-center gap-6 hidden md:flex">
            <a href="{{ route('home') }}" class="text-sm font-medium hover:text-sky-400 transition-colors">Home</a>
            <a href="{{ route('about') }}" class="text-sm font-medium hover:text-fuchsia-400 transition-colors text-fuchsia-400">About</a>
            <a href="{{ route('contact') }}" class="text-sm font-medium hover:text-indigo-400 transition-colors">Contact</a>
            
            <div class="h-6 w-px bg-slate-700 mx-2"></div>
            
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-sm font-medium hover:text-sky-400 transition-colors">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm font-medium text-slate-300 hover:text-white transition-colors">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="text-sm font-medium bg-gradient-to-r from-sky-500 to-indigo-500 px-5 py-2.5 rounded-full hover:shadow-[0_0_20px_rgba(56,189,248,0.4)] transition-all duration-300 transform hover:-translate-y-0.5">Get Started</a>
                    @endif
                @endauth
            @endif
        </nav>
    </header>

    <!-- Main Content -->
    <main class="flex-grow flex flex-col items-center justify-center w-full z-10 pt-32 pb-16 px-4">
        <div class="max-w-4xl w-full">
            <div class="glass-panel p-8 md:p-12 rounded-3xl relative overflow-hidden group">
                <div class="absolute top-0 right-0 w-64 h-64 bg-fuchsia-500/20 rounded-full blur-3xl -mr-32 -mt-32"></div>
                <div class="absolute bottom-0 left-0 w-64 h-64 bg-indigo-500/20 rounded-full blur-3xl -ml-32 -mb-32"></div>
                
                <div class="relative z-10">
                    <h1 class="text-4xl md:text-6xl font-extrabold tracking-tight mb-8 text-center">
                        Our <span class="gradient-text">Mission</span>
                    </h1>
                    
                    <div class="space-y-6 text-slate-300 text-lg leading-relaxed">
                        <p>
                            Welcome to the Travel Economy Idea Hub, your ultimate companion for exploring the world without emptying your wallet. We believe that the joy of travel, the thrill of discovering new cultures, and the beauty of our planet should be accessible to everyone, regardless of their budget.
                        </p>
                        <p>
                            Born from the idea that smart planning unlocks endless possibilities, our platform bridges the gap between wanderlust and financial reality. We leverage modern technology and community insights to provide you with actionable, cost-effective travel itineraries.
                        </p>
                        
                        <div class="my-10 p-6 bg-slate-800/50 rounded-2xl border border-slate-700/50">
                            <h3 class="text-xl font-bold text-white mb-4 flex items-center gap-2">
                                <svg class="w-6 h-6 text-fuchsia-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                                Powered by AI
                            </h3>
                            <p class="text-base text-slate-400">
                                At the heart of our platform is an intelligent AI assistant, ready to help you brainstorm destinations, calculate estimated costs, and suggest hidden gems that traditional travel guides might miss. Just ask, and start planning.
                            </p>
                        </div>

                        <p>
                            Whether you are a solo backpacker looking for the cheapest hostels in Europe, or a family seeking an affordable getaway, the Idea Hub is here to inspire and guide you every step of the way.
                        </p>
                    </div>

                    <div class="mt-12 text-center">
                        <a href="{{ route('home') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-white/5 hover:bg-white/10 border border-white/10 rounded-full transition-colors text-white font-medium">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                            Back to Home
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="w-full py-6 text-center text-slate-400 text-sm z-10 glass-panel border-t border-white/5 mt-auto">
        &copy; {{ date('Y') }} Travel Economy Idea Hub. Built with Laravel.
    </footer>
</body>
</html>
