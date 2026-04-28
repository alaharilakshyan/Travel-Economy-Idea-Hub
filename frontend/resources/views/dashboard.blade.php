<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-slate-800 dark:text-slate-100 leading-tight">
            {{ __('My Travel Hub') }}
        </h2>
    </x-slot>

    <div class="py-12" x-data="dashboard()">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            <!-- Welcome Banner -->
            <div class="bg-gradient-to-r from-sky-500 to-indigo-600 rounded-2xl overflow-hidden shadow-xl">
                <div class="p-8 text-white">
                    <h3 class="text-3xl font-extrabold mb-2">Welcome back, {{ Auth::user()->name }}!</h3>
                    <p class="text-sky-100 text-lg">Ready to plan your next budget-friendly adventure?</p>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                <!-- Main Content: Travel Ideas & Calculator -->
                <div class="lg:col-span-2 space-y-8">
                    
                    <!-- Travel Ideas -->
                    <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-sm border border-slate-200 dark:border-slate-700 p-6">
                        <div class="flex items-center justify-between mb-6">
                            <h4 class="text-xl font-bold text-slate-800 dark:text-slate-100">Top Budget Destinations</h4>
                            <button class="text-sm font-medium text-sky-500 hover:text-sky-600">View all</button>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Idea Card 1 -->
                            <div class="group cursor-pointer">
                                <div class="h-40 rounded-xl bg-slate-200 dark:bg-slate-700 overflow-hidden mb-3 relative">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent z-10"></div>
                                    <img src="https://images.unsplash.com/photo-1548013146-72479768bada?w=500&q=80" alt="Bali" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" />
                                    <span class="absolute bottom-3 left-3 z-20 text-white font-bold">Bali, Indonesia</span>
                                    <span class="absolute top-3 right-3 z-20 bg-emerald-500 text-white text-xs px-2 py-1 rounded-full font-semibold">$30/day</span>
                                </div>
                                <p class="text-sm text-slate-600 dark:text-slate-400">Affordable paradise with stunning beaches, temples, and low cost of living.</p>
                            </div>
                            <!-- Idea Card 2 -->
                            <div class="group cursor-pointer">
                                <div class="h-40 rounded-xl bg-slate-200 dark:bg-slate-700 overflow-hidden mb-3 relative">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent z-10"></div>
                                    <img src="https://images.unsplash.com/photo-1555899434-94d1368aa7af?w=500&q=80" alt="Budapest" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" />
                                    <span class="absolute bottom-3 left-3 z-20 text-white font-bold">Budapest, Hungary</span>
                                    <span class="absolute top-3 right-3 z-20 bg-emerald-500 text-white text-xs px-2 py-1 rounded-full font-semibold">$45/day</span>
                                </div>
                                <p class="text-sm text-slate-600 dark:text-slate-400">Rich history, thermal baths, and cheap, delicious street food.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Cost Calculator -->
                    <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-sm border border-slate-200 dark:border-slate-700 p-6">
                        <h4 class="text-xl font-bold text-slate-800 dark:text-slate-100 mb-6 flex items-center gap-2">
                            <svg class="w-6 h-6 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                            Trip Cost Estimator
                        </h4>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Destination Tier</label>
                                    <select x-model="calc.tier" class="w-full rounded-lg border-slate-300 dark:border-slate-600 dark:bg-slate-700 dark:text-white focus:ring-sky-500 focus:border-sky-500">
                                        <option value="budget">Budget ($30-$50/day)</option>
                                        <option value="mid">Mid-Range ($80-$120/day)</option>
                                        <option value="luxury">Luxury ($200+/day)</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Number of Days</label>
                                    <input type="number" x-model.number="calc.days" min="1" class="w-full rounded-lg border-slate-300 dark:border-slate-600 dark:bg-slate-700 dark:text-white focus:ring-sky-500 focus:border-sky-500" />
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Flights ($)</label>
                                    <input type="number" x-model.number="calc.flights" min="0" class="w-full rounded-lg border-slate-300 dark:border-slate-600 dark:bg-slate-700 dark:text-white focus:ring-sky-500 focus:border-sky-500" />
                                </div>
                            </div>
                            
                            <div class="bg-slate-50 dark:bg-slate-700/50 rounded-xl p-6 flex flex-col justify-center items-center text-center border border-slate-100 dark:border-slate-600">
                                <span class="text-sm text-slate-500 dark:text-slate-400 font-medium mb-2">Estimated Total</span>
                                <div class="text-4xl font-black text-transparent bg-clip-text bg-gradient-to-r from-sky-500 to-indigo-500" x-text="'$' + calculateTotal()"></div>
                                <p class="text-xs text-slate-400 mt-4">This is a rough estimate excluding visas and travel insurance.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar: AI Chatbot -->
                <div class="lg:col-span-1">
                    <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-sm border border-slate-200 dark:border-slate-700 h-[600px] flex flex-col overflow-hidden">
                        
                        <!-- Chat Header -->
                        <div class="p-4 bg-slate-50 dark:bg-slate-700/50 border-b border-slate-100 dark:border-slate-700 flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-gradient-to-tr from-fuchsia-500 to-sky-500 flex items-center justify-center text-white font-bold shadow-md">
                                AI
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-800 dark:text-slate-100 leading-tight">Travel Assistant</h4>
                                <span class="text-xs text-sky-500 font-medium flex items-center gap-1">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 block"></span> Online (Gemini)
                                </span>
                            </div>
                        </div>

                        <!-- Chat Messages -->
                        <div class="flex-grow p-4 overflow-y-auto space-y-4" id="chat-container">
                            
                            <!-- Initial Greeting -->
                            <div class="flex gap-3">
                                <div class="w-8 h-8 rounded-full bg-gradient-to-tr from-fuchsia-500 to-sky-500 flex-shrink-0 flex items-center justify-center text-white text-xs font-bold mt-1">AI</div>
                                <div class="bg-slate-100 dark:bg-slate-700 p-3 rounded-2xl rounded-tl-sm text-sm text-slate-700 dark:text-slate-200">
                                    Hi {{ Auth::user()->name }}! I'm your AI travel assistant. Where are you thinking of going, or what's your budget?
                                </div>
                            </div>

                            <template x-for="(msg, index) in messages" :key="index">
                                <div class="flex gap-3" :class="msg.role === 'user' ? 'flex-row-reverse' : ''">
                                    <div x-show="msg.role === 'ai'" class="w-8 h-8 rounded-full bg-gradient-to-tr from-fuchsia-500 to-sky-500 flex-shrink-0 flex items-center justify-center text-white text-xs font-bold mt-1">AI</div>
                                    <div class="p-3 rounded-2xl text-sm max-w-[85%]"
                                         :class="msg.role === 'user' ? 'bg-indigo-500 text-white rounded-tr-sm' : 'bg-slate-100 dark:bg-slate-700 text-slate-700 dark:text-slate-200 rounded-tl-sm'"
                                         x-text="msg.content">
                                    </div>
                                </div>
                            </template>
                            
                            <!-- Loading Indicator -->
                            <div x-show="isTyping" class="flex gap-3">
                                <div class="w-8 h-8 rounded-full bg-gradient-to-tr from-fuchsia-500 to-sky-500 flex-shrink-0 flex items-center justify-center text-white text-xs font-bold mt-1">AI</div>
                                <div class="bg-slate-100 dark:bg-slate-700 p-3 rounded-2xl rounded-tl-sm text-sm text-slate-700 dark:text-slate-200 flex items-center gap-1">
                                    <span class="w-1.5 h-1.5 rounded-full bg-slate-400 animate-bounce"></span>
                                    <span class="w-1.5 h-1.5 rounded-full bg-slate-400 animate-bounce" style="animation-delay: 0.2s"></span>
                                    <span class="w-1.5 h-1.5 rounded-full bg-slate-400 animate-bounce" style="animation-delay: 0.4s"></span>
                                </div>
                            </div>
                        </div>

                        <!-- Chat Input -->
                        <div class="p-4 border-t border-slate-100 dark:border-slate-700">
                            <form @submit.prevent="sendMessage" class="flex gap-2">
                                <input type="text" x-model="newMessage" placeholder="Ask about destinations..." 
                                    class="flex-grow rounded-full border-slate-300 dark:border-slate-600 dark:bg-slate-700 dark:text-white focus:ring-sky-500 focus:border-sky-500 text-sm px-4" 
                                    :disabled="isTyping" />
                                <button type="submit" class="w-10 h-10 rounded-full bg-indigo-500 hover:bg-indigo-600 text-white flex items-center justify-center flex-shrink-0 transition-colors shadow-md disabled:opacity-50" :disabled="isTyping || newMessage.trim() === ''">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('dashboard', () => ({
                // Calculator State
                calc: {
                    tier: 'budget',
                    days: 7,
                    flights: 400
                },
                
                calculateTotal() {
                    let dailyRate = 0;
                    if (this.calc.tier === 'budget') dailyRate = 40;
                    else if (this.calc.tier === 'mid') dailyRate = 100;
                    else if (this.calc.tier === 'luxury') dailyRate = 250;
                    
                    return ((this.calc.days * dailyRate) + (this.calc.flights || 0)).toLocaleString();
                },

                // Chatbot State
                messages: [],
                newMessage: '',
                isTyping: false,

                async sendMessage() {
                    if (this.newMessage.trim() === '') return;
                    
                    const messageText = this.newMessage;
                    this.messages.push({ role: 'user', content: messageText });
                    this.newMessage = '';
                    this.isTyping = true;
                    
                    this.scrollToBottom();

                    try {
                        const response = await fetch('/api/chat', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                            },
                            body: JSON.stringify({ message: messageText })
                        });

                        const data = await response.json();
                        
                        this.messages.push({ 
                            role: 'ai', 
                            content: data.reply || 'Sorry, I encountered an error.' 
                        });
                    } catch (error) {
                        this.messages.push({ 
                            role: 'ai', 
                            content: 'Connection error. Please try again later.' 
                        });
                    } finally {
                        this.isTyping = false;
                        this.scrollToBottom();
                    }
                },

                scrollToBottom() {
                    setTimeout(() => {
                        const container = document.getElementById('chat-container');
                        container.scrollTop = container.scrollHeight;
                    }, 50);
                }
            }))
        })
    </script>
</x-app-layout>
