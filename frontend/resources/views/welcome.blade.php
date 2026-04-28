<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Travel Economy Idea Hub</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

    <!-- Tailwind -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Three.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>

    <style>
        body {
            font-family: 'Instrument Sans', sans-serif;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
            background-color: #0f172a; /* Slate 900 */
            color: #f8fafc;
        }
        #webgl-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            z-index: -1;
            overflow: hidden;
        }
        .glass-panel {
            background: rgba(30, 41, 59, 0.6);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        }
        .gradient-text {
            background: linear-gradient(135deg, #38bdf8, #818cf8, #e879f9);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .float-anim {
            animation: float 6s ease-in-out infinite;
        }
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0px); }
        }
    </style>
</head>
<body class="antialiased selection:bg-indigo-500 selection:text-white">
    <div id="webgl-container"></div>

    <div class="relative min-h-screen flex flex-col justify-between">
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
                <a href="{{ route('about') }}" class="text-sm font-medium hover:text-fuchsia-400 transition-colors">About</a>
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
        <main class="flex-grow flex flex-col items-center justify-start w-full z-10 pt-24">
            
            <!-- Hero Section -->
            <section class="w-full min-h-[90vh] flex items-center justify-center px-4">
                <div class="max-w-4xl w-full text-center float-anim">
                    <div class="glass-panel p-12 md:p-16 rounded-3xl relative overflow-hidden group">
                        <div class="absolute top-0 right-0 w-64 h-64 bg-sky-500/20 rounded-full blur-3xl -mr-32 -mt-32 group-hover:bg-sky-400/30 transition-all duration-700"></div>
                        <div class="absolute bottom-0 left-0 w-64 h-64 bg-fuchsia-500/20 rounded-full blur-3xl -ml-32 -mb-32 group-hover:bg-fuchsia-400/30 transition-all duration-700"></div>
                        
                        <h1 class="text-5xl md:text-7xl font-extrabold tracking-tight mb-6">
                            Explore the <span class="gradient-text">World</span> <br/>
                            on a Budget.
                        </h1>
                        <p class="text-lg md:text-xl text-slate-300 mb-10 max-w-2xl mx-auto leading-relaxed">
                            Discover cost-effective travel ideas, get real-time AI recommendations, and seamlessly plan your next big adventure with the Travel Economy Idea Hub.
                        </p>
                        
                        <div class="flex flex-col sm:flex-row justify-center items-center gap-4">
                            @if (Route::has('login'))
                                @auth
                                    <a href="{{ url('/dashboard') }}" class="w-full sm:w-auto px-8 py-4 bg-white text-slate-900 font-bold rounded-full hover:bg-slate-200 transition-all shadow-[0_0_20px_rgba(255,255,255,0.3)] hover:scale-105">
                                        Go to Dashboard
                                    </a>
                                @else
                                    <a href="{{ route('register') }}" class="w-full sm:w-auto px-8 py-4 bg-gradient-to-r from-sky-500 to-indigo-500 font-bold rounded-full hover:shadow-[0_0_30px_rgba(99,102,241,0.5)] transition-all hover:scale-105">
                                        Start Exploring Now
                                    </a>
                                    <a href="{{ route('login') }}" class="w-full sm:w-auto px-8 py-4 bg-transparent border border-slate-500 font-medium rounded-full hover:bg-slate-800 hover:border-slate-400 transition-all">
                                        Sign In
                                    </a>
                                @endauth
                            @endif
                        </div>
                    </div>
                </div>
            </section>

            <!-- About Highlight Section -->
            <section class="w-full py-24 px-4 flex items-center justify-center relative">
                <div class="absolute inset-0 bg-slate-900/50 backdrop-blur-sm -z-10"></div>
                <div class="max-w-6xl w-full">
                    <div class="text-center mb-16">
                        <h2 class="text-3xl md:text-5xl font-bold mb-4">Why <span class="text-transparent bg-clip-text bg-gradient-to-r from-fuchsia-400 to-sky-400">Travel Economy?</span></h2>
                        <p class="text-slate-400 max-w-2xl mx-auto text-lg">We believe that traveling shouldn't be a luxury reserved for the few. Our platform empowers you to experience the world without breaking the bank.</p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <!-- Feature 1 -->
                        <div class="glass-panel p-8 rounded-2xl hover:-translate-y-2 transition-transform duration-300 relative overflow-hidden group">
                            <div class="absolute -right-8 -top-8 w-24 h-24 bg-sky-500/20 rounded-full blur-xl group-hover:bg-sky-400/40 transition-all"></div>
                            <div class="w-12 h-12 rounded-full bg-sky-500/20 flex items-center justify-center mb-6 text-sky-400">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <h3 class="text-xl font-bold mb-3 text-white">Smart Budgeting</h3>
                            <p class="text-slate-400 text-sm leading-relaxed">Discover destinations that match your financial goals. Our intelligent system highlights the best cost-effective routes and stays.</p>
                        </div>
                        
                        <!-- Feature 2 -->
                        <div class="glass-panel p-8 rounded-2xl hover:-translate-y-2 transition-transform duration-300 relative overflow-hidden group">
                            <div class="absolute -right-8 -top-8 w-24 h-24 bg-fuchsia-500/20 rounded-full blur-xl group-hover:bg-fuchsia-400/40 transition-all"></div>
                            <div class="w-12 h-12 rounded-full bg-fuchsia-500/20 flex items-center justify-center mb-6 text-fuchsia-400">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                            </div>
                            <h3 class="text-xl font-bold mb-3 text-white">AI-Powered Ideas</h3>
                            <p class="text-slate-400 text-sm leading-relaxed">Chat with our integrated Gemini AI assistant to get personalized travel recommendations based on your preferences and constraints.</p>
                        </div>

                        <!-- Feature 3 -->
                        <div class="glass-panel p-8 rounded-2xl hover:-translate-y-2 transition-transform duration-300 relative overflow-hidden group">
                            <div class="absolute -right-8 -top-8 w-24 h-24 bg-indigo-500/20 rounded-full blur-xl group-hover:bg-indigo-400/40 transition-all"></div>
                            <div class="w-12 h-12 rounded-full bg-indigo-500/20 flex items-center justify-center mb-6 text-indigo-400">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <h3 class="text-xl font-bold mb-3 text-white">Global Community</h3>
                            <p class="text-slate-400 text-sm leading-relaxed">Connect with like-minded budget travelers. Share experiences, hidden gems, and tips to maximize your adventures abroad.</p>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <!-- Footer -->
        <footer class="w-full py-6 text-center text-slate-400 text-sm z-10 glass-panel border-t border-white/5">
            &copy; {{ date('Y') }} Travel Economy Idea Hub. Built with Laravel.
        </footer>
    </div>

    <!-- Three.js Background Animation -->
    <script>
        const init3D = () => {
            const container = document.getElementById('webgl-container');
            const scene = new THREE.Scene();
            
            // Camera
            const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
            camera.position.z = 5;

            // Renderer
            const renderer = new THREE.WebGLRenderer({ alpha: true, antialias: true });
            renderer.setSize(window.innerWidth, window.innerHeight);
            renderer.setPixelRatio(window.devicePixelRatio);
            container.appendChild(renderer.domElement);

            // Particles (Stars/Dust)
            const particlesGeometry = new THREE.BufferGeometry();
            const particlesCount = 2000;
            const posArray = new Float32Array(particlesCount * 3);

            for(let i = 0; i < particlesCount * 3; i++) {
                posArray[i] = (Math.random() - 0.5) * 15;
            }

            particlesGeometry.setAttribute('position', new THREE.BufferAttribute(posArray, 3));
            const particlesMaterial = new THREE.PointsMaterial({
                size: 0.005,
                color: 0x38bdf8,
                transparent: true,
                opacity: 0.8
            });
            const particlesMesh = new THREE.Points(particlesGeometry, particlesMaterial);
            scene.add(particlesMesh);

            // Large Abstract Sphere
            const geometry = new THREE.IcosahedronGeometry(2, 2);
            const material = new THREE.MeshBasicMaterial({ 
                color: 0x818cf8, 
                wireframe: true,
                transparent: true,
                opacity: 0.15
            });
            const sphere = new THREE.Mesh(geometry, material);
            scene.add(sphere);

            // Mouse interaction
            let mouseX = 0;
            let mouseY = 0;
            document.addEventListener('mousemove', (event) => {
                mouseX = event.clientX / window.innerWidth - 0.5;
                mouseY = event.clientY / window.innerHeight - 0.5;
            });

            // Animation Loop
            const clock = new THREE.Clock();

            const tick = () => {
                const elapsedTime = clock.getElapsedTime();

                // Rotate Sphere
                sphere.rotation.y = .1 * elapsedTime;
                sphere.rotation.x = .1 * elapsedTime;

                // Rotate Particles
                particlesMesh.rotation.y = -0.05 * elapsedTime;
                particlesMesh.rotation.x = -0.02 * elapsedTime;

                // Mouse interaction effect
                camera.position.x += (mouseX * 0.5 - camera.position.x) * 0.05;
                camera.position.y += (-mouseY * 0.5 - camera.position.y) * 0.05;
                camera.lookAt(scene.position);

                renderer.render(scene, camera);
                window.requestAnimationFrame(tick);
            };

            tick();

            // Resize handler
            window.addEventListener('resize', () => {
                camera.aspect = window.innerWidth / window.innerHeight;
                camera.updateProjectionMatrix();
                renderer.setSize(window.innerWidth, window.innerHeight);
            });
        };

        // Initialize when DOM is ready
        document.addEventListener('DOMContentLoaded', init3D);
    </script>
</body>
</html>
