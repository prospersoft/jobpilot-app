@extends('layouts.app')

@section('title', 'Features - JobProfi
')

@section('content')

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background: linear-gradient(135deg, #0c0c0c 0%, #1a1a1a 100%);
            color: white;
            overflow-x: hidden;
        }

        /* Hero Section */
        #testimonials-hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            position: relative;
            padding-top: 80px;
        }

        .hero-bg {
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, #000000 0%, #1a1a1a 50%, #000000 100%);
        }

        .hero-bg::before {
            content: '';
            position: absolute;
            top: 10rem;
            left: 2.5rem;
            width: 16rem;
            height: 16rem;
            background: #3b82f6;
            border-radius: 50%;
            filter: blur(3rem);
            opacity: 0.2;
        }

        .hero-bg::after {
            content: '';
            position: absolute;
            bottom: 10rem;
            right: 2.5rem;
            width: 20rem;
            height: 20rem;
            background: #8b5cf6;
            border-radius: 50%;
            filter: blur(3rem);
            opacity: 0.2;
        }

        .hero-content {
            position: relative;
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 1rem;
            text-align: center;
            z-index: 10;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            padding: 0.5rem 1rem;
            border-radius: 9999px;
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            margin-bottom: 2rem;
            font-size: 0.875rem;
            color: #d1d5db;
        }

        /* .hero-title {
            font-size: clamp(3rem, 8vw, 7rem);
            font-weight: 700;
            margin-bottom: 1.5rem;
            line-height: 1.1;
        } */

        .gradient-text {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero-subtitle {
            font-size: 1.25rem;
            color: #9ca3af;
            margin-bottom: 3rem;
            max-width: 48rem;
            margin-left: auto;
            margin-right: auto;
            line-height: 1.6;
        }

        /* Glass Effect */
        .glass {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* Container */
        .container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 1rem;
        }

        /* Section Padding */
        .section-padding {
            padding: 5rem 0;
        }

        /* Testimonials Grid */
        .testimonials-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
            gap: 2rem;
            margin-top: 4rem;
        }

        .testimonial-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 1.5rem;
            padding: 2rem;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .testimonial-card:hover {
            transform: translateY(-5px);
            background: rgba(255, 255, 255, 0.08);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }

        .testimonial-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, #667eea, #764ba2);
            border-radius: 1.5rem 1.5rem 0 0;
        }

        .stars {
            display: flex;
            gap: 0.25rem;
            margin-bottom: 1rem;
        }

        .star {
            color: #fbbf24;
            font-size: 1.125rem;
        }

        .testimonial-text {
            font-size: 1.125rem;
            line-height: 1.7;
            color: #e5e7eb;
            margin-bottom: 2rem;
            font-style: italic;
        }

        .testimonial-author {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .author-avatar {
            width: 3rem;
            height: 3rem;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea, #764ba2);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 1.125rem;
        }

        .author-info h4 {
            font-weight: 600;
            font-size: 1.125rem;
            margin-bottom: 0.25rem;
        }

        .author-info p {
            color: #9ca3af;
            font-size: 0.875rem;
        }

        /* Featured Testimonial */
        .featured-testimonial {
            grid-column: 1 / -1;
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.1), rgba(118, 75, 162, 0.1));
            padding: 3rem;
            border-radius: 2rem;
            text-align: center;
            position: relative;
        }

        .featured-testimonial .testimonial-text {
            font-size: 1.5rem;
            max-width: 800px;
            margin: 0 auto 2rem;
        }

        .featured-testimonial .author-avatar {
            width: 4rem;
            height: 4rem;
            font-size: 1.5rem;
            margin: 0 auto 1rem;
        }

        /* Stats Section */
        .stats-section {
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.05), rgba(118, 75, 162, 0.05));
            padding: 4rem 2rem;
            border-radius: 2rem;
            margin: 4rem 0;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            text-align: center;
        }

        .stat-item {
            padding: 1.5rem;
        }

        .stat-number {
            font-size: 3rem;
            font-weight: 700;
            color: #667eea;
            margin-bottom: 0.5rem;
        }

        .stat-label {
            color: #9ca3af;
            font-size: 1.125rem;
        }

        /* Video Testimonials */
        .video-testimonials {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }

        .video-card {
            position: relative;
            border-radius: 1rem;
            overflow: hidden;
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: transform 0.3s ease;
        }

        .video-card:hover {
            transform: scale(1.02);
        }

        .video-thumbnail {
            aspect-ratio: 16/9;
            background: linear-gradient(135deg, #667eea, #764ba2);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            cursor: pointer;
        }

        .play-button {
            width: 4rem;
            height: 4rem;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.9);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #667eea;
            font-size: 1.5rem;
            transition: all 0.3s ease;
        }

        .play-button:hover {
            transform: scale(1.1);
            background: white;
        }

        .video-info {
            padding: 1.5rem;
        }

        .video-info h3 {
            font-size: 1.125rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .video-info p {
            color: #9ca3af;
            font-size: 0.875rem;
        }

        /* CTA Section */
        .cta-section {
            text-align: center;
            padding: 4rem 2rem;
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 2rem;
            margin: 4rem 0;
        }

        .cta-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .cta-subtitle {
            font-size: 1.25rem;
            color: #9ca3af;
            margin-bottom: 2rem;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        

        .start{
            background: white;
            color: black;
            padding: 1rem 2rem;
            border-radius: 9999px;
            font-size: 1.125rem;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .start:hover {
            background: #f3f4f6;
            transform: translateY(-2px);
        }

        .demo {
            background: black;
            backdrop-filter: blur(10px);
            
            color: white;
            padding: 1rem 2rem;
            border-radius: 9999px;
            font-size: 1.125rem;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .cta-note {
            color: #6b7280;
            font-size: 0.875rem;
            margin-top: 1rem;
        }

        /* Animations */
        .slide-in {
            opacity: 0;
            transform: translateY(30px);
            animation: slideInUp 0.8s ease-out forwards;
        }

        .fade-in {
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.8s ease-out;
        }

        .fade-in.animate {
            opacity: 1;
            transform: translateY(0);
        }

        .float-animation {
            animation: float 6s ease-in-out infinite;
        }

        @keyframes slideInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .testimonials-grid {
                grid-template-columns: 1fr;
            }
            
            .hero-title {
                font-size: 3rem;
            }
            
            .cta-buttons {
                flex-direction: column;
                align-items: center;
            }
            
            .btn-primary, .btn-secondary {
                width: 100%;
                max-width: 300px;
                justify-content: center;
            }
        }

        /* Staggered Animation Delays */
        .slide-in:nth-child(1) { animation-delay: 0.1s; }
        .slide-in:nth-child(2) { animation-delay: 0.2s; }
        .slide-in:nth-child(3) { animation-delay: 0.3s; }
        .slide-in:nth-child(4) { animation-delay: 0.4s; }
    </style>
</head>
<body>
    <!-- Hero Section -->
    <section id="testimonials-hero">
        <div class="hero-bg"></div>
        <div class="hero-content">
            <div class="hero-badge slide-in">
                <span><i class="fa-solid fa-star-half-stroke"></i> Trusted by 10,000+ Professionals</span>
            </div>
            

            
                <h1 class="text-5xl md:text-7xl font-bold mb-6 slide-in">
                    Success Stories from
                    <span class="block text-blue-600">Our Amazing Clients.</span>
                </h1>
                <p class="text-xl text-gray-400 mb-12 max-w-3xl mx-auto slide-in">
                   Discover how professionals like you have transformed their careers with JobProfi
. Real stories, real results, real impact on their professional journey.</b>
                </p>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="section-padding">
        <div class="container">
            <div class="stats-section glass fade-in">
                <div class="stats-grid">
                    <div class="stat-item">
                        <div class="stat-number">98%</div>
                        <div class="stat-label">Success Rate</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">2.5x</div>
                        <div class="stat-label">Faster Job Placement</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">$15k</div>
                        <div class="stat-label">Average Salary Increase</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">10k+</div>
                        <div class="stat-label">Happy Clients</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Testimonial -->
    <section class="section-padding">
        <div class="container">
            <div class="testimonials-grid fade-in">
                <div class="featured-testimonial">
                    <div class="stars">
                        <i class="fas fa-star star"></i>
                        <i class="fas fa-star star"></i>
                        <i class="fas fa-star star"></i>
                        <i class="fas fa-star star"></i>
                        <i class="fas fa-star star"></i>
                    </div>
                    <p class="testimonial-text">
                        "JobProfi
 completely transformed my job search. What used to take me months now takes weeks. The AI insights helped me tailor my applications perfectly, and I landed my dream job with a 40% salary increase!"
                    </p>
                    <flux:avatar name="Sarah Mitchell" class="w-12 h-12 rounded-full text-center" />
                    <div class="author-info text-start">
                        <h4>Sarah Mitchell</h4>
                        <p>Senior Software Engineer at Google</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Testimonials -->
    <section class="section-padding">
        <div class="container">
            <div class="text-center mb-16 fade-in">
                <h2 class="text-4xl md:text-5xl font-bold mb-4">What Our Clients Say</h2>
                <p class="text-xl text-gray-400">Real experiences from real professionals</p>
            </div>
            
            <div class="testimonials-grid">
                <div class="testimonial-card fade-in">
                    <div class="stars">
                        <i class="fas fa-star star"></i>
                        <i class="fas fa-star star"></i>
                        <i class="fas fa-star star"></i>
                        <i class="fas fa-star star"></i>
                        <i class="fas fa-star star"></i>
                    </div>
                    <p class="testimonial-text">
                        "The application tracking feature alone saved me countless hours. I went from managing spreadsheets to having everything automated. Got 3 job offers in 6 weeks!"
                    </p>
                    <div class="testimonial-author">
                        <flux:avatar name="Michael Johnson" class="w-12 h-12 rounded-full" />
                        <div class="author-info">
                            <h4>Michael Johnson</h4>
                            <p>Marketing Director at Microsoft</p>
                        </div>
                    </div>
                </div>

                <div class="testimonial-card fade-in">
                    <div class="stars">
                        <i class="fas fa-star star"></i>
                        <i class="fas fa-star star"></i>
                        <i class="fas fa-star star"></i>
                        <i class="fas fa-star star"></i>
                        <i class="fas fa-star star"></i>
                    </div>
                    <p class="testimonial-text">
                        "The resume optimization feature is incredible. It analyzed my resume against job descriptions and gave me specific feedback. My callback rate improved by 300%!"
                    </p>
                    <div class="testimonial-author">
                        <flux:avatar name="Emily Chen" class="w-12 h-12 rounded-full" />
                        <div class="author-info">
                            <h4>Emily Chen</h4>
                            <p>Data Scientist at Netflix</p>
                        </div>
                    </div>
                </div>

                <div class="testimonial-card fade-in">
                    <div class="stars">
                        <i class="fas fa-star star"></i>
                        <i class="fas fa-star star"></i>
                        <i class="fas fa-star star"></i>
                        <i class="fas fa-star star"></i>
                        <i class="fas fa-star star"></i>
                    </div>
                    <p class="testimonial-text">
                        "JobProfi
's interview preparation tools were game-changing. The AI-powered mock interviews helped me practice for specific companies. Landed my first FAANG role!"
                    </p>
                    <div class="testimonial-author">
                       <flux:avatar name="David Park" class="w-12 h-12 rounded-full" />
                        <div class="author-info">
                            <h4>David Park</h4>
                            <p>Product Manager at Meta</p>
                        </div>
                    </div>
                </div>

                <div class="testimonial-card fade-in">
                    <div class="stars">
                        <i class="fas fa-star star"></i>
                        <i class="fas fa-star star"></i>
                        <i class="fas fa-star star"></i>
                        <i class="fas fa-star star"></i>
                        <i class="fas fa-star star"></i>
                    </div>
                    <p class="testimonial-text">
                        "As a career changer, I was overwhelmed by the job search process. JobProfi
's analytics showed me exactly what was working and what wasn't. Pure gold!"
                    </p>
                    <div class="testimonial-author">
                        <flux:avatar name="Lisa Rodriguez" class="w-12 h-12 rounded-full" />
                        <div class="author-info">
                            <h4>Lisa Rodriguez</h4>
                            <p>UX Designer at Spotify</p>
                        </div>
                    </div>
                </div>

                <div class="testimonial-card fade-in">
                    <div class="stars">
                        <i class="fas fa-star star"></i>
                        <i class="fas fa-star star"></i>
                        <i class="fas fa-star star"></i>
                        <i class="fas fa-star star"></i>
                        <i class="fas fa-star star"></i>
                    </div>
                    <p class="testimonial-text">
                        "The network mapping feature helped me identify connections at target companies. Made warm introductions that led to my current role. Brilliant!"
                    </p>
                    <div class="testimonial-author">
                        <flux:avatar name="Michael Johnson" class="w-12 h-12 rounded-full" />
                        <div class="author-info">
                            <h4>Michael Johnson</h4>
                            <p>Sales Director at Salesforce</p>
                        </div>
                    </div>
                </div>

                <div class="testimonial-card fade-in">
                    <div class="stars">
                        <i class="fas fa-star star"></i>
                        <i class="fas fa-star star"></i>
                        <i class="fas fa-star star"></i>
                        <i class="fas fa-star star"></i>
                        <i class="fas fa-star star"></i>
                    </div>
                    <p class="testimonial-text">
                        "The salary negotiation insights were invaluable. I learned my market value and negotiated a 25% salary increase. JobProfi
 paid for itself 100x over!"
                    </p>
                    <div class="testimonial-author">
                        <flux:avatar name="Amanda Taylor" class="w-12 h-12 rounded-full" />
                        <div class="author-info">
                            <h4>Amanda Taylor</h4>
                            <p>Engineering Manager at Apple</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Video Testimonials -->
    <!-- <section class="section-padding">
        <div class="container">
            <div class="text-center mb-16 fade-in">
                <h2 class="text-4xl md:text-5xl font-bold mb-4">Video Success Stories</h2>
                <p class="text-xl text-gray-400">Hear directly from our successful clients</p>
            </div>
            
            <div class="video-testimonials">
                <div class="video-card fade-in">
                    <div class="video-thumbnail">
                        <div class="play-button">
                            <i class="fas fa-play"></i>
                        </div>
                    </div>
                    <div class="video-info">
                        <h3>From Unemployed to Tech Lead</h3>
                        <p>Watch how Tom went from 6 months unemployed to landing his dream role at Amazon</p>
                    </div>
                </div>

                <div class="video-card fade-in">
                    <div class="video-thumbnail">
                        <div class="play-button">
                            <i class="fas fa-play"></i>
                        </div>
                    </div>
                    <div class="video-info">
                        <h3>Career Pivot Success</h3>
                        <p>How Rachel successfully transitioned from finance to tech using JobProfi
</p>
                    </div>
                </div>

                <div class="video-card fade-in">
                    <div class="video-thumbnail">
                        <div class="play-button">
                            <i class="fas fa-play"></i>
                        </div>
                    </div>
                    <div class="video-info">
                        <h3>Salary Negotiation Win</h3>
                        <p>Mark shares how he negotiated a $30k salary increase using our tools</p>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

    <!-- CTA Section -->
    <section class="section-padding">
        <div class="container">
            <div class="cta-section fade-in">
                <h2 class="cta-title">Ready to Write Your Success Story?</h2>
                <p class="cta-subtitle">
                    Join thousands of professionals who've transformed their careers with JobProfi
. Your dream job is just one step away.
                </p>
                <div class="cta-buttons">
                    <a href="#" class="start">
                        Start Your Journey
                        <i class="fas fa-arrow-right"></i>
                    </a>
                    <a href="#" class="demo">
                        <i class="fas fa-play"></i>
                        Watch Demo
                    </a>
                </div>
                <p class="cta-note">No credit card required • 14-day free trial</p>
            </div>
        </div>
    </section>

    <script>
        // Intersection Observer for animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate');
                }
            });
        }, observerOptions);

        // Observe all fade-in elements
        document.addEventListener('DOMContentLoaded', () => {
            const fadeElements = document.querySelectorAll('.fade-in');
            fadeElements.forEach(el => observer.observe(el));
        });

        // Add parallax effect to background elements
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            const parallax = document.querySelectorAll('.float-animation');
            
            parallax.forEach(element => {
                const speed = 0.5;
                const yPos = -(scrolled * speed);
                element.style.transform = `translateY(${yPos}px)`;
            });
        });

        // Video play functionality
        document.querySelectorAll('.video-thumbnail').forEach(thumbnail => {
            thumbnail.addEventListener('click', () => {
                // Simulate video play (replace with actual video functionality)
                const playButton = thumbnail.querySelector('.play-button');
                playButton.innerHTML = '<i class="fas fa-pause"></i>';
                
                // Add your video play logic here
                console.log('Video play clicked');
            });
        });
    </script>
@endsection