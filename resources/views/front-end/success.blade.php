<!DOCTYPE html>
<html lang="bn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ধন্যবাদ - বিকাশ লোন</title>
    <link href="https://fonts.maateen.me/solaiman-lipi/font.css" rel="stylesheet">
    <style>
        body {
            font-family: 'SolaimanLipi', Arial, sans-serif;
            margin: 0;
            background: linear-gradient(135deg, #e91e63 0%, #f50057 100%);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        header {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            color: white;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header h1 {
            font-size: 22px;
            margin: 0;
        }

        header button {
            background: white;
            color: #e91e63;
            padding: 8px 15px;
            border-radius: 20px;
            border: none;
            cursor: pointer;
            font-weight: bold;
            transition: all 0.3s;
        }

        header button:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        .container {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .thank-you-card {
            background: white;
            border-radius: 25px;
            padding: 50px 40px;
            text-align: center;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
            max-width: 600px;
            width: 100%;
            position: relative;
            overflow: hidden;
        }

        .thank-you-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, #e91e63, #f50057, #e91e63);
            background-size: 200% 100%;
            animation: shimmer 2s linear infinite;
        }

        @keyframes shimmer {
            0% { background-position: -200% 0; }
            100% { background-position: 200% 0; }
        }

        .heart-icon {
            width: 100px;
            height: 100px;
            background: linear-gradient(45deg, #e91e63, #f50057);
            border-radius: 50%;
            margin: 0 auto 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 50px;
            animation: heartbeat 2s ease-in-out infinite;
            position: relative;
        }

        .heart-icon::after {
            content: '';
            position: absolute;
            width: 120px;
            height: 120px;
            border: 3px solid rgba(233, 30, 99, 0.3);
            border-radius: 50%;
            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes heartbeat {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }

        @keyframes pulse {
            0% { transform: scale(1); opacity: 1; }
            100% { transform: scale(1.2); opacity: 0; }
        }

        .thank-you-title {
            color: #e91e63;
            font-size: 36px;
            font-weight: bold;
            margin-bottom: 15px;
            animation: fadeInUp 0.8s ease-out 0.3s both;
        }

        .thank-you-subtitle {
            color: #666;
            font-size: 20px;
            margin-bottom: 30px;
            line-height: 1.6;
            animation: fadeInUp 0.8s ease-out 0.5s both;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .message-box {
            background: #fff0f5;
            border: 2px solid #f48fb1;
            border-radius: 15px;
            padding: 25px;
            margin: 30px 0;
            text-align: left;
            animation: fadeInUp 0.8s ease-out 0.7s both;
        }

        .message-box h3 {
            color: #e91e63;
            font-size: 22px;
            margin-bottom: 15px;
            text-align: center;
        }

        .message-box p {
            color: #555;
            line-height: 1.8;
            margin: 10px 0;
            font-size: 16px;
        }

        .highlight {
            color: #e91e63;
            font-weight: bold;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin: 30px 0;
            animation: fadeInUp 0.8s ease-out 0.9s both;
        }

        .feature-item {
            background: #fff3f7;
            padding: 20px;
            border-radius: 15px;
            text-align: center;
            border: 1px solid #f8bbd0;
            transition: all 0.3s;
        }

        .feature-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(233, 30, 99, 0.1);
        }

        .feature-icon {
            font-size: 30px;
            margin-bottom: 10px;
            display: block;
        }

        .feature-title {
            color: #e91e63;
            font-weight: bold;
            font-size: 18px;
            margin-bottom: 8px;
        }

        .feature-text {
            color: #666;
            font-size: 14px;
        }

        .action-buttons {
            display: flex;
            gap: 15px;
            justify-content: center;
            margin-top: 40px;
            flex-wrap: wrap;
            animation: fadeInUp 0.8s ease-out 1.1s both;
        }

        .btn {
            padding: 15px 30px;
            border: none;
            border-radius: 25px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
            font-family: 'SolaimanLipi', Arial, sans-serif;
            position: relative;
            overflow: hidden;
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            transition: all 0.5s;
            transform: translate(-50%, -50%);
        }

        .btn:hover::before {
            width: 300px;
            height: 300px;
        }

        .btn-primary {
            background: linear-gradient(45deg, #e91e63, #f50057);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(233, 30, 99, 0.3);
        }

        .btn-secondary {
            background: white;
            color: #e91e63;
            border: 2px solid #e91e63;
        }

        .btn-secondary:hover {
            background: #e91e63;
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(233, 30, 99, 0.3);
        }

        .social-links {
            margin-top: 40px;
            padding-top: 30px;
            border-top: 2px solid #f0f0f0;
            animation: fadeInUp 0.8s ease-out 1.3s both;
        }

        .social-links h4 {
            color: #e91e63;
            margin-bottom: 20px;
            font-size: 18px;
        }

        .social-icons {
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .social-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(45deg, #e91e63, #f50057);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            text-decoration: none;
            transition: all 0.3s;
        }

        .social-icon:hover {
            transform: translateY(-3px) rotate(5deg);
            box-shadow: 0 10px 20px rgba(233, 30, 99, 0.3);
        }

        .floating-elements {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: -1;
        }

        .floating-element {
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            animation: float 6s ease-in-out infinite;
        }

        .floating-element:nth-child(1) {
            width: 80px;
            height: 80px;
            top: 20%;
            left: 10%;
            animation-delay: 0s;
        }

        .floating-element:nth-child(2) {
            width: 60px;
            height: 60px;
            top: 60%;
            right: 15%;
            animation-delay: 2s;
        }

        .floating-element:nth-child(3) {
            width: 100px;
            height: 100px;
            bottom: 20%;
            left: 20%;
            animation-delay: 4s;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            33% { transform: translateY(-20px) rotate(120deg); }
            66% { transform: translateY(-10px) rotate(240deg); }
        }

        @media (max-width: 768px) {
            .container {
                padding: 10px;
            }
            
            .thank-you-card {
                padding: 30px 20px;
            }
            
            .thank-you-title {
                font-size: 28px;
            }
            
            .thank-you-subtitle {
                font-size: 18px;
            }
            
            .action-buttons {
                flex-direction: column;
                align-items: center;
            }
            
            .btn {
                width: 100%;
                max-width: 300px;
            }
            
            .features-grid {
                grid-template-columns: 1fr;
            }
        }

        .countdown {
            background: #fff3e0;
            border: 2px solid #ffb74d;
            border-radius: 10px;
            padding: 15px;
            margin: 20px 0;
            text-align: center;
            color: #f57c00;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="floating-elements">
        <div class="floating-element"></div>
        <div class="floating-element"></div>
        <div class="floating-element"></div>
    </div>

    <header>
        <h1>বিকাশ লোন</h1>
        <button onclick="goToApp()">বিকাশ অ্যাপ</button>
    </header>

    <div class="container">
        <div class="thank-you-card">
            <div class="heart-icon">💖</div>
            
            <h1 class="thank-you-title">ধন্যবাদ!</h1>
            <p class="thank-you-subtitle">
                বিকাশ লোন সেবা ব্যবহার করার জন্য আপনাকে অসংখ্য ধন্যবাদ।<br>
                আপনার আস্থাই আমাদের শক্তি।
            </p>

            <div class="message-box">
                <h3>🎉 আপনার লোন অপশন সফলভাবে চালু হয়েছে!</h3>
                <p>
                    <span class="highlight">প্রিয় গ্রাহক,</span> আপনার বিকাশ লোন অপশনটি এখন সক্রিয় হয়েছে। 
                    এখন আপনি যখনই প্রয়োজন হবে, সহজেই বিকাশ অ্যাপ থেকে লোন নিতে পারবেন।
                </p>
                <p>
                    আমরা আশা করি আমাদের এই সেবা আপনার জীবনকে আরও সহজ করে তুলবে। 
                    <span class="highlight">যেকোনো আর্থিক প্রয়োজনে</span> এখন বিকাশ আপনার পাশে আছে।
                </p>
            </div>

            <div class="countdown">
                <p>⏰ আপনার লোন অপশন সক্রিয় হতে আর মাত্র <strong><span id="countdown">৫</span> মিনিট</strong> বাকি!</p>
            </div>

            <div class="features-grid">
                <div class="feature-item">
                    <span class="feature-icon">⚡</span>
                    <div class="feature-title">তাৎক্ষণিক অনুমোদন</div>
                    <div class="feature-text">কয়েক সেকেন্ডেই লোন পেয়ে যান</div>
                </div>
                <div class="feature-item">
                    <span class="feature-icon">🔒</span>
                    <div class="feature-title">নিরাপদ ও সুরক্ষিত</div>
                    <div class="feature-text">সর্বোচ্চ নিরাপত্তার গ্যারান্টি</div>
                </div>
                <div class="feature-item">
                    <span class="feature-icon">📱</span>
                    <div class="feature-title">সহজ ব্যবহার</div>
                    <div class="feature-text">মোবাইল থেকেই সব কিছু</div>
                </div>
            </div>

            <div class="action-buttons">
                <a href="#" class="btn btn-primary" onclick="goToApp()">
                    📱 বিকাশ অ্যাপ খুলুন
                </a>
                <a href="/" class="btn btn-secondary">
                    🏠 হোম পেজে ফিরুন
                </a>
            </div>

            <div class="social-links">
                <h4>আমাদের সাথে যুক্ত থাকুন</h4>
                <div class="social-icons">
                    <a href="#" class="social-icon" title="Facebook">📘</a>
                    <a href="#" class="social-icon" title="Twitter">🐦</a>
                    <a href="#" class="social-icon" title="Instagram">📷</a>
                    <a href="#" class="social-icon" title="YouTube">📹</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Countdown timer
        let countdownValue = 5;
        const countdownElement = document.getElementById('countdown');

        function updateCountdown() {
            countdownElement.textContent = countdownValue;
            
            if (countdownValue > 0) {
                countdownValue--;
            } else {
                countdownElement.textContent = '০';
                document.querySelector('.countdown p').innerHTML = 
                    '✅ <strong>আপনার লোন অপশন এখন সক্রিয়!</strong>';
                document.querySelector('.countdown').style.background = '#e8f5e8';
                document.querySelector('.countdown').style.borderColor = '#4caf50';
                document.querySelector('.countdown').style.color = '#2e7d32';
                clearInterval(countdownInterval);
            }
        }

        const countdownInterval = setInterval(updateCountdown, 60000); // Update every minute

        // Go to bKash app function
        function goToApp() {
            // Try to open bKash app, fallback to website
            const bkashApp = 'bkash://';
            const bkashWeb = 'https://www.bkash.com/';
            
            const iframe = document.createElement('iframe');
            iframe.style.display = 'none';
            iframe.src = bkashApp;
            document.body.appendChild(iframe);
            
            setTimeout(() => {
                document.body.removeChild(iframe);
                window.open(bkashWeb, '_blank');
            }, 1000);
        }

        // Add some interactive effects
        document.querySelectorAll('.feature-item').forEach(item => {
            item.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-10px) scale(1.02)';
            });
            
            item.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) scale(1)';
            });
        });

        // Add click effect to buttons
        document.querySelectorAll('.btn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                const ripple = document.createElement('span');
                ripple.style.position = 'absolute';
                ripple.style.borderRadius = '50%';
                ripple.style.background = 'rgba(255, 255, 255, 0.6)';
                ripple.style.transform = 'scale(0)';
                ripple.style.animation = 'ripple 0.6s linear';
                ripple.style.left = (e.clientX - e.target.offsetLeft) + 'px';
                ripple.style.top = (e.clientY - e.target.offsetTop) + 'px';
                
                this.appendChild(ripple);
                
                setTimeout(() => {
                    ripple.remove();
                }, 600);
            });
        });

        // Add ripple effect CSS
        const rippleCSS = `
            @keyframes ripple {
                to {
                    transform: scale(4);
                    opacity: 0;
                }
            }
        `;
        const style = document.createElement('style');
        style.textContent = rippleCSS;
        document.head.appendChild(style);


        // Add slide in animation
        const slideCSS = `
            @keyframes slideInRight {
                from {
                    transform: translateX(100%);
                    opacity: 0;
                }
                to {
                    transform: translateX(0);
                    opacity: 1;
                }
            }
        `;
        const slideStyle = document.createElement('style');
        slideStyle.textContent = slideCSS;
        document.head.appendChild(slideStyle);
    </script>

</body>

</html>