<x-app-layout>


    <div x-data="dashboard()" class="container" style="padding: var(--spacing-8) 0;">
        <div style="display: flex; flex-direction: column; gap: var(--spacing-8);">
            
            <!-- Welcome Banner -->
            <div style="background: linear-gradient(135deg, var(--color-primary), var(--color-secondary)); border-radius: 12px; padding: var(--spacing-8); color: white; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
                <h3 style="font-size: 2rem; font-weight: bold; margin-bottom: var(--spacing-2);">Welcome back, {{ Auth::user()->name }}!</h3>
                <p style="font-size: 1.125rem; opacity: 0.9;">Ready to plan your next budget-friendly adventure across India?</p>
            </div>

            <!-- Quick Navigation -->
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: var(--spacing-4);">
                <a href="{{ route('ideas.index') }}" class="card" style="text-decoration: none; display: flex; align-items: center; gap: var(--spacing-4); padding: var(--spacing-4);">
                    <div style="width: 50px; height: 50px; border-radius: 12px; background: var(--color-primary); display: flex; align-items: center; justify-content: center; color: white; font-size: 1.5rem;">💡</div>
                    <div>
                        <h4 style="font-size: 1rem; color: var(--color-text-main); margin: 0;">Community Ideas</h4>
                        <p style="font-size: 0.875rem; color: var(--color-text-muted); margin: 0;">Browse & share ideas</p>
                    </div>
                </a>
                
                <a href="{{ route('volunteer.index') }}" class="card" style="text-decoration: none; display: flex; align-items: center; gap: var(--spacing-4); padding: var(--spacing-4);">
                    <div style="width: 50px; height: 50px; border-radius: 12px; background: var(--color-secondary); display: flex; align-items: center; justify-content: center; color: white; font-size: 1.5rem;">🤝</div>
                    <div>
                        <h4 style="font-size: 1rem; color: var(--color-text-main); margin: 0;">Volunteer</h4>
                        <p style="font-size: 0.875rem; color: var(--color-text-muted); margin: 0;">Join activities</p>
                    </div>
                </a>
                
                <a href="{{ route('ideas.index') }}" class="card" style="text-decoration: none; display: flex; align-items: center; gap: var(--spacing-4); padding: var(--spacing-4);">
                    <div style="width: 50px; height: 50px; border-radius: 12px; background: var(--color-success); display: flex; align-items: center; justify-content: center; color: white; font-size: 1.5rem;">✍️</div>
                    <div>
                        <h4 style="font-size: 1rem; color: var(--color-text-main); margin: 0;">Submit Idea</h4>
                        <p style="font-size: 0.875rem; color: var(--color-text-muted); margin: 0;">Share your ideas</p>
                    </div>
                </a>
                
                <a href="{{ route('volunteer.my-applications') }}" class="card" style="text-decoration: none; display: flex; align-items: center; gap: var(--spacing-4); padding: var(--spacing-4);">
                    <div style="width: 50px; height: 50px; border-radius: 12px; background: var(--color-warning); display: flex; align-items: center; justify-content: center; color: white; font-size: 1.5rem;">📋</div>
                    <div>
                        <h4 style="font-size: 1rem; color: var(--color-text-main); margin: 0;">My Applications</h4>
                        <p style="font-size: 0.875rem; color: var(--color-text-muted); margin: 0;">Track applications</p>
                    </div>
                </a>
            </div>

            <div style="display: grid; grid-template-columns: 1fr; gap: var(--spacing-8); align-items: start;">
                <!-- Desktop Sidebar Layout Handling (inline CSS for grid) -->
                <style>
                    @media (min-width: 992px) {
                        .dashboard-grid {
                            display: grid;
                            grid-template-columns: 2fr 1fr;
                            gap: var(--spacing-8);
                        }
                    }
                </style>
                <div class="dashboard-grid">
                    
                    <!-- Main Content -->
                    <div style="display: flex; flex-direction: column; gap: var(--spacing-8);">
                        
                        <!-- Travel Ideas -->
                        <div class="card">
                            <div class="card__content" style="padding: var(--spacing-6);">
                                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: var(--spacing-6);">
                                    <h4 style="font-size: 1.25rem; color: var(--color-text-main); margin: 0;">Top Destinations</h4>
                                    <a href="{{ route('ideas.index') }}" style="background: none; border: none; color: var(--color-primary); font-weight: bold; cursor: pointer; text-decoration: none;">View all</a>
                                </div>
                                
                                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: var(--spacing-6);">
                                    <!-- Idea Card 1 -->
                                    <div style="cursor: pointer;">
                                        <div style="height: 160px; border-radius: 8px; background-color: var(--color-border); overflow: hidden; margin-bottom: var(--spacing-3); position: relative;">
                                            <div style="position: absolute; inset: 0; background: linear-gradient(to top, rgba(0,0,0,0.7), transparent); z-index: 10;"></div>
                                            <img src="https://images.unsplash.com/photo-1514222134-b57cbb8ce073?w=500&q=80" alt="Jaipur" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s;" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'" />
                                            <span style="position: absolute; bottom: 12px; left: 12px; z-index: 20; color: white; font-weight: bold;">Jaipur, Rajasthan</span>
                                            <span style="position: absolute; top: 12px; right: 12px; z-index: 20; background-color: var(--color-success); color: white; font-size: 0.75rem; padding: 2px 8px; border-radius: 12px; font-weight: bold;">₹2000/day</span>
                                        </div>
                                        <p style="font-size: 0.875rem; color: var(--color-text-muted); margin: 0;">The Pink City offers majestic forts, vibrant bazaars, and rich cultural heritage.</p>
                                    </div>
                                    <!-- Idea Card 2 -->
                                    <div style="cursor: pointer;">
                                        <div style="height: 160px; border-radius: 8px; background-color: var(--color-border); overflow: hidden; margin-bottom: var(--spacing-3); position: relative;">
                                            <div style="position: absolute; inset: 0; background: linear-gradient(to top, rgba(0,0,0,0.7), transparent); z-index: 10;"></div>
                                            <img src="https://images.unsplash.com/photo-1602216056096-3b40cc0c9944?w=500&q=80" alt="Kerala" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s;" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'" />
                                            <span style="position: absolute; bottom: 12px; left: 12px; z-index: 20; color: white; font-weight: bold;">Munnar, Kerala</span>
                                            <span style="position: absolute; top: 12px; right: 12px; z-index: 20; background-color: var(--color-success); color: white; font-size: 0.75rem; padding: 2px 8px; border-radius: 12px; font-weight: bold;">₹3000/day</span>
                                        </div>
                                        <p style="font-size: 0.875rem; color: var(--color-text-muted); margin: 0;">Experience serene tea gardens, misty hills, and beautiful backwaters.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Cost Calculator -->
                        <div class="card">
                            <div class="card__content" style="padding: var(--spacing-6);">
                                <h4 style="font-size: 1.25rem; color: var(--color-text-main); margin-bottom: var(--spacing-6); display: flex; align-items: center; gap: 0.5rem; margin-top: 0;">
                                    Trip Cost Estimator
                                </h4>
                                
                                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: var(--spacing-6);">
                                    <div style="display: flex; flex-direction: column; gap: var(--spacing-4);">
                                        <div>
                                            <label class="form-label" style="display: block; margin-bottom: 0.25rem;">Destination Tier</label>
                                            <select x-model="calc.tier" class="form-input">
                                                <option value="budget">Budget (₹1500-₹3000/day)</option>
                                                <option value="mid">Mid-Range (₹3000-₹7000/day)</option>
                                                <option value="luxury">Luxury (₹7000+/day)</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label class="form-label" style="display: block; margin-bottom: 0.25rem;">Number of Days</label>
                                            <input type="number" x-model.number="calc.days" min="1" class="form-input" />
                                        </div>
                                        <div>
                                            <label class="form-label" style="display: block; margin-bottom: 0.25rem;">Flights/Trains (₹)</label>
                                            <input type="number" x-model.number="calc.travel" min="0" class="form-input" />
                                        </div>
                                    </div>
                                    
                                    <div style="background-color: var(--color-background); border-radius: 8px; padding: var(--spacing-6); display: flex; flex-direction: column; justify-content: center; align-items: center; text-align: center; border: 1px solid var(--color-border);">
                                        <span style="font-size: 0.875rem; color: var(--color-text-muted); font-weight: bold; margin-bottom: var(--spacing-2);">Estimated Total</span>
                                        <div style="font-size: 2.5rem; font-weight: 900; color: var(--color-primary);" x-text="'₹' + calculateTotal()"></div>
                                        <p style="font-size: 0.75rem; color: var(--color-text-muted); margin-top: var(--spacing-4);">This is a rough estimate excluding shopping and extra activities.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Secret Spots Section -->
                        <div class="card">
                            <div class="card__content" style="padding: var(--spacing-6);">
                                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: var(--spacing-6);">
                                    <h4 style="font-size: 1.25rem; color: var(--color-text-main); margin: 0;">
                                        🔒 Secret Spots to Visit
                                    </h4>
                                    <span style="font-size: 0.75rem; color: var(--color-text-muted); background: var(--color-background); padding: 4px 12px; border-radius: 20px;">Hidden Gems</span>
                                </div>
                                
                                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: var(--spacing-4);">
                                    <div style="background: var(--color-background); border-radius: 8px; padding: var(--spacing-4); border-left: 4px solid var(--color-primary);">
                                        <h5 style="margin-bottom: var(--spacing-2); color: var(--color-primary);">Gokarna, Karnataka</h5>
                                        <p style="font-size: 0.875rem; color: var(--color-text-muted); margin-bottom: var(--spacing-2);">Peaceful beaches away from Goa crowds</p>
                                        <div style="display: flex; gap: var(--spacing-2); flex-wrap: wrap;">
                                            <span style="font-size: 0.75rem; background: white; padding: 2px 8px; border-radius: 12px;">🏖️ Beach</span>
                                            <span style="font-size: 0.75rem; background: white; padding: 2px 8px; border-radius: 12px;">🧘 Yoga</span>
                                        </div>
                                    </div>
                                    <div style="background: var(--color-background); border-radius: 8px; padding: var(--spacing-4); border-left: 4px solid var(--color-secondary);">
                                        <h5 style="margin-bottom: var(--spacing-2); color: var(--color-secondary);">Ziro Valley, Arunachal</h5>
                                        <p style="font-size: 0.875rem; color: var(--color-text-muted); margin-bottom: var(--spacing-2);">Rice fields and Apatani tribe culture</p>
                                        <div style="display: flex; gap: var(--spacing-2); flex-wrap: wrap;">
                                            <span style="font-size: 0.75rem; background: white; padding: 2px 8px; border-radius: 12px;">🌾 Valley</span>
                                            <span style="font-size: 0.75rem; background: white; padding: 2px 8px; border-radius: 12px;">🏔️ Hills</span>
                                        </div>
                                    </div>
                                    <div style="background: var(--color-background); border-radius: 8px; padding: var(--spacing-4); border-left: 4px solid var(--color-primary);">
                                        <h5 style="margin-bottom: var(--spacing-2); color: var(--color-primary);">Hampi Ruins, Karnataka</h5>
                                        <p style="font-size: 0.875rem; color: var(--color-text-muted); margin-bottom: var(--spacing-2);">Ancient boulder-strewn landscape</p>
                                        <div style="display: flex; gap: var(--spacing-2); flex-wrap: wrap;">
                                            <span style="font-size: 0.75rem; background: white; padding: 2px 8px; border-radius: 12px;">🏛️ Heritage</span>
                                            <span style="font-size: 0.75rem; background: white; padding: 2px 8px; border-radius: 12px;">🌅 Sunset</span>
                                        </div>
                                    </div>
                                    <div style="background: var(--color-background); border-radius: 8px; padding: var(--spacing-4); border-left: 4px solid var(--color-secondary);">
                                        <h5 style="margin-bottom: var(--spacing-2); color: var(--color-secondary);">Majuli Island, Assam</h5>
                                        <p style="font-size: 0.875rem; color: var(--color-text-muted); margin-bottom: var(--spacing-2);">World's largest river island</p>
                                        <div style="display: flex; gap: var(--spacing-2); flex-wrap: wrap;">
                                            <span style="font-size: 0.75rem; background: white; padding: 2px 8px; border-radius: 12px;">🏝️ Island</span>
                                            <span style="font-size: 0.75rem; background: white; padding: 2px 8px; border-radius: 12px;">🎭 Culture</span>
                                        </div>
                                    </div>
                                    <div style="background: var(--color-background); border-radius: 8px; padding: var(--spacing-4); border-left: 4px solid var(--color-primary);">
                                        <h5 style="margin-bottom: var(--spacing-2); color: var(--color-primary);">Spiti Valley, Himachal</h5>
                                        <p style="font-size: 0.875rem; color: var(--color-text-muted); margin-bottom: var(--spacing-2);">Cold desert mountain valley</p>
                                        <div style="display: flex; gap: var(--spacing-2); flex-wrap: wrap;">
                                            <span style="font-size: 0.75rem; background: white; padding: 2px 8px; border-radius: 12px;">🏔️ Mountains</span>
                                            <span style="font-size: 0.75rem; background: white; padding: 2px 8px; border-radius: 12px;">🛕 Monasteries</span>
                                        </div>
                                    </div>
                                    <div style="background: var(--color-background); border-radius: 8px; padding: var(--spacing-4); border-left: 4px solid var(--color-secondary);">
                                        <h5 style="margin-bottom: var(--spacing-2); color: var(--color-secondary);">Chettinad, Tamil Nadu</h5>
                                        <p style="font-size: 0.875rem; color: var(--color-text-muted); margin-bottom: var(--spacing-2);">Heritage mansions & cuisine</p>
                                        <div style="display: flex; gap: var(--spacing-2); flex-wrap: wrap;">
                                            <span style="font-size: 0.75rem; background: white; padding: 2px 8px; border-radius: 12px;">🏛️ Palaces</span>
                                            <span style="font-size: 0.75rem; background: white; padding: 2px 8px; border-radius: 12px;">🍛 Food</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Live India Map -->
                        <div class="card">
                            <div class="card__content" style="padding: var(--spacing-6);">
                                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: var(--spacing-4);">
                                    <h4 style="font-size: 1.25rem; color: var(--color-text-main); margin: 0;">
                                        🗺️ Explore India Map
                                    </h4>
                                    <a href="https://www.google.com/maps/place/India" target="_blank" style="font-size: 0.875rem; color: var(--color-primary); text-decoration: none;">Open in Google Maps →</a>
                                </div>
                                <div style="border-radius: 12px; overflow: hidden; border: 1px solid var(--color-border);">
                                    <iframe 
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15275878.74647374!2d73.73199199999999!3d20.771924!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30635ff06b92b791%3A0xd78c4fa1851a7aed!2sIndia!5e0!3m2!1sen!2sin!4v1699999999999!5m2!1sen!2sin"
                                        width="100%" 
                                        height="400" 
                                        style="border:0;" 
                                        allowfullscreen="" 
                                        loading="lazy" 
                                        referrerpolicy="no-referrer-when-downgrade">
                                    </iframe>
                                </div>
                                <p style="font-size: 0.875rem; color: var(--color-text-muted); margin-top: var(--spacing-3);">
                                    Click on the map to explore different regions of India. Discover destinations across all 28 states and 8 union territories.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Sidebar: AI Chatbot -->
                    <div class="card" style="height: 600px; display: flex; flex-direction: column;">
                        <!-- Chat Header -->
                        <div style="padding: var(--spacing-4); background-color: var(--color-background); border-bottom: 1px solid var(--color-border); display: flex; align-items: center; gap: var(--spacing-3);">
                            <div style="width: 40px; height: 40px; border-radius: 50%; background-color: var(--color-primary); display: flex; align-items: center; justify-content: center; color: white; font-weight: bold;">
                                AI
                            </div>
                            <div>
                                <h4 style="font-weight: bold; color: var(--color-text-main); margin: 0;">Travel Assistant</h4>
                                <span style="font-size: 0.75rem; color: var(--color-success); font-weight: bold; display: flex; align-items: center; gap: 4px;">
                                    <span style="width: 6px; height: 6px; border-radius: 50%; background-color: var(--color-success); display: inline-block;"></span> Online (Gemini)
                                </span>
                            </div>
                        </div>

                        <!-- Chat Messages -->
                        <div id="chat-container" style="flex-grow: 1; padding: var(--spacing-4); overflow-y: auto; display: flex; flex-direction: column; gap: var(--spacing-4);">
                            <!-- Initial Greeting -->
                            <div style="display: flex; gap: var(--spacing-3);">
                                <div style="width: 32px; height: 32px; border-radius: 50%; background-color: var(--color-primary); flex-shrink: 0; display: flex; align-items: center; justify-content: center; color: white; font-size: 0.75rem; font-weight: bold;">AI</div>
                                <div style="background-color: var(--color-background); padding: var(--spacing-3); border-radius: 12px; border-top-left-radius: 2px; font-size: 0.875rem; color: var(--color-text-main);">
                                    Hi {{ Auth::user()->name }}! I'm your AI travel assistant. Where in India are you thinking of going, or what's your budget?
                                </div>
                            </div>

                            <template x-for="(msg, index) in messages" :key="index">
                                <div style="display: flex; gap: var(--spacing-3);" :style="msg.role === 'user' ? 'flex-direction: row-reverse;' : ''">
                                    <div x-show="msg.role === 'ai'" style="width: 32px; height: 32px; border-radius: 50%; background-color: var(--color-primary); flex-shrink: 0; display: flex; align-items: center; justify-content: center; color: white; font-size: 0.75rem; font-weight: bold;">AI</div>
                                    <div style="padding: var(--spacing-3); border-radius: 12px; font-size: 0.875rem; max-width: 85%;"
                                         :style="msg.role === 'user' ? 'background-color: var(--color-secondary); color: white; border-top-right-radius: 2px;' : 'background-color: var(--color-background); color: var(--color-text-main); border-top-left-radius: 2px;'"
                                         x-text="msg.content">
                                    </div>
                                </div>
                            </template>
                            
                            <!-- Loading Indicator -->
                            <div x-show="isTyping" style="display: flex; gap: var(--spacing-3);">
                                <div style="width: 32px; height: 32px; border-radius: 50%; background-color: var(--color-primary); flex-shrink: 0; display: flex; align-items: center; justify-content: center; color: white; font-size: 0.75rem; font-weight: bold;">AI</div>
                                <div style="background-color: var(--color-background); padding: var(--spacing-3); border-radius: 12px; border-top-left-radius: 2px; font-size: 0.875rem; color: var(--color-text-main); display: flex; align-items: center; gap: 4px;">
                                    Typing...
                                </div>
                            </div>
                        </div>

                        <!-- Chat Input -->
                        <div style="padding: var(--spacing-4); border-top: 1px solid var(--color-border);">
                            <form @submit.prevent="sendMessage" style="display: flex; gap: var(--spacing-2);">
                                <input type="text" x-model="newMessage" placeholder="Ask about destinations..." 
                                    class="form-input" style="flex-grow: 1; border-radius: 20px; padding: 0.5rem 1rem;"
                                    :disabled="isTyping" />
                                <button type="submit" class="btn btn--secondary" style="border-radius: 50%; width: 40px; height: 40px; padding: 0; display: flex; align-items: center; justify-content: center; flex-shrink: 0;" :disabled="isTyping || newMessage.trim() === ''">
                                    ➤
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
                    travel: 3000
                },
                
                calculateTotal() {
                    let dailyRate = 0;
                    if (this.calc.tier === 'budget') dailyRate = 2000;
                    else if (this.calc.tier === 'mid') dailyRate = 5000;
                    else if (this.calc.tier === 'luxury') dailyRate = 12000;
                    
                    return ((this.calc.days * dailyRate) + (this.calc.travel || 0)).toLocaleString('en-IN');
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
