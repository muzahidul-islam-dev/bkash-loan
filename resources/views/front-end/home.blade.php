<!DOCTYPE html>
<html lang="bn">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>বিকাশ — অ্যাড মানি</title>
    <!-- SolaimanLipi Bangla font -->
    <link href="https://fonts.maateen.me/solaiman-lipi/font.css" rel="stylesheet" />
    <style>
        :root {
            --bkash: #E2136E;
            /* primary magenta */
            --bkash-dark: #B10F57;
            --text: #1a1a1a;
            --muted: #666;
            --bg: #ffffff;
            --soft: #f8f5f7;
            --ring: rgba(226, 19, 110, .25);
            --shadow: 0 10px 30px rgba(0, 0, 0, .08);
            --radius: 20px;
        }

        * {
            box-sizing: border-box
        }

        html,
        body {
            height: 100%
        }

        body {
            margin: 0;
            font-family: 'SolaimanLipi', system-ui, -apple-system, Segoe UI, Roboto, Helvetica, Arial, "Noto Sans Bengali", sans-serif;
            color: var(--text);
            background: var(--bg);
        }

        a {
            color: inherit;
            text-decoration: none
        }

        /* Header */
        .nav {
            position: sticky;
            top: 0;
            z-index: 10;
            backdrop-filter: saturate(1.2) blur(6px);
            background: rgba(255, 255, 255, .8);
            border-bottom: 1px solid #eee;
        }

        .nav .wrap {
            max-width: 1100px;
            margin: 0 auto;
            padding: 12px 16px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 700
        }

        .logo {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            background: var(--bkash);
            color: #fff;
            box-shadow: 0 6px 14px var(--ring)
        }

        .menu {
            display: flex;
            gap: 18px;
            align-items: center;
            font-size: 15px;
            color: var(--muted)
        }

        .btn-app {
            background: var(--bkash);
            color: #fff;
            padding: 10px 14px;
            border-radius: 999px;
            font-weight: 700;
            box-shadow: 0 10px 20px var(--ring)
        }

        /* Hero */
        .hero {
            background:
                radial-gradient(1200px 400px at 75% 10%, rgba(226, 19, 110, .08), transparent 60%),
                linear-gradient(180deg, #fff 0%, #fff 40%, #fdf7fa 100%);
            border-bottom: 1px solid #f0e3ea;
        }

        .hero .wrap {
            max-width: 1100px;
            margin: 0 auto;
            padding: 40px 16px 60px;
            display: grid;
            grid-template-columns: 1.1fr .9fr;
            gap: 30px;
            align-items: center
        }

        .tag {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 6px 10px;
            border-radius: 999px;
            background: #fff;
            border: 1px solid #f0e3ea;
            box-shadow: 0 6px 18px rgba(226, 19, 110, .05)
        }

        .tag i {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: var(--bkash)
        }

        .hero h1 {
            font-size: 20px;
            line-height: 1.2;
            margin: 14px 0 10px
        }

        .hero p {
            color: var(--muted);
            font-size: 16px
        }

        .badges {
            display: flex;
            gap: 10px;
            margin-top: 16px;
            justify-content: center;
        }

        .badge {
            background: #d7136f;
            border: 1px dashed #f0b6cf;
            padding: 8px 10px;
            border-radius: 10px;
            font-size: 13px;
            color: #fff;
            font-weight: 900
        }

        /* Right visual */
        .device {
            width: min(360px, 90%);
            justify-self: center;
            aspect-ratio: 9/16;
            background: #fff;
            border: 12px solid #111;
            border-bottom-width: 16px;
            border-top-width: 18px;
            border-radius: 36px;
            box-shadow: 0 30px 60px rgba(226, 19, 110, .18);
            position: relative;
            overflow: hidden;
        }

        .device::before {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, #ffe5f1, #fff 40%);
        }

        .device .ui {
            position: absolute;
            inset: 0;
            padding: 18px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .ui .card {
            background: #fff;
            border: 1px solid #f3d1e0;
            border-radius: 14px;
            padding: 12px
        }

        .ui .cta {
            margin-top: auto;
            display: flex;
            gap: 10px
        }

        .ui .cta button {
            flex: 1;
            border: none;
            background: var(--bkash);
            color: #fff;
            padding: 10px;
            border-radius: 12px;
            font-weight: 700
        }

        .section-title {
            max-width: 1100px;
            margin: 0 auto;
            padding: 26px 16px 40px;
            text-align: center
        }

        /* Chat widget */
        .chat {
            position: fixed;
            right: 18px;
            bottom: 18px;
            width: 360px;
            max-width: calc(100vw - 24px);
            border-radius: 18px;
            background: #fff;
            box-shadow: var(--shadow);
            border: 1px solid #f0e3ea;
            overflow: hidden;
            transition: all .3s ease;
        }

        .chat.collapsed {
            height: 50px;
            width: 220px;
        }

        .chat header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            padding: 12px 14px;
            background: #fff;
            border-bottom: 1px solid #f1d9e5;
            cursor: pointer
        }

        .chat .avatar {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: var(--bkash);
            display: grid;
            place-items: center;
            color: #fff;
            font-weight: 800;
            box-shadow: 0 0 0 4px #fff, 0 8px 20px var(--ring)
        }

        .chat .brand-name {
            font-weight: 800
        }

        .chat .body {
            height: 360px;
            overflow: auto;
            background: linear-gradient(180deg, #fff, #fff 40%, #fdf7fa 100%);
            padding: 16px
        }

        .chat.collapsed .body,
        .chat.collapsed .composer {
            display: none
        }

        .msg {
            max-width: 84%;
            display: inline-block;
            padding: 10px 12px;
            border-radius: 14px;
            font-size: 14px;
            line-height: 1.4;
            box-shadow: 0 6px 14px rgba(0, 0, 0, .04)
        }

        .msg.time {
            color: #999;
            font-size: 12px;
            padding: 0;
            box-shadow: none;
            display: block;
            margin: 4px 0
        }

        .left .msg {
            background: #fff;
            border: 1px solid #f1d9e5
        }

        .right {
            display: flex;
            justify-content: flex-end
        }

        .right .msg {
            background: #fef0f6;
            border: 1px solid #f3c2d7
        }

        .lang {
            display: flex;
            gap: 10px;
            margin-top: 10px
        }

        .pill {
            border: 1px solid #ead2dd;
            padding: 8px 12px;
            border-radius: 999px;
            background: #fff;
            cursor: pointer;
        }

        .composer {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px;
            border-top: 1px solid #f1d9e5;
            background: #fff
        }

        .composer input {
            flex: 1;
            border: 1px solid #eee;
            padding: 12px;
            border-radius: 999px;
            outline: none
        }

        .composer button {
            border: none;
            padding: 10px 14px;
            border-radius: 12px;
            background: var(--bkash);
            color: #fff;
            font-weight: 700
        }

        /* Mobile */
        @media (max-width:900px) {
            .hero .wrap {
                grid-template-columns: 1fr;
                text-align: center
            }

            .device {
                margin-top: 10px
            }
        }

        .modal {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, .6);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 100
        }

        .modal-content {
            background: #fff;
            padding: 20px;
            border-radius: 14px;
            max-width: 400px;
            width: 90%;
            box-shadow: var(--shadow);
            text-align: center;
            position: relative;
            animation: scaleUp .3s ease
        }

        .modal h3 {
            margin-bottom: 16px;
            font-size: 18px
        }

        .options {
            margin: 15px 0;
            text-align: left
        }

        .options label {
            display: block;
            margin-bottom: 10px;
            cursor: pointer
        }

        .options input {
            margin-right: 6px
        }

        .btn {
            margin-top: 16px;
            padding: 12px 18px;
            border: none;
            border-radius: 10px;
            background: var(--bkash);
            color: #fff;
            font-weight: 700;
            cursor: pointer;
            width: 100%;
            transition: .2s
        }

        .btn:hover {
            background: var(--bkash-dark)
        }

        .close {
            position: absolute;
            top: 10px;
            right: 12px;
            background: none;
            border: none;
            font-size: 18px;
            cursor: pointer;
            color: #555
        }

        @keyframes scaleUp {
            from {
                transform: scale(.8);
                opacity: 0
            }

            to {
                transform: scale(1);
                opacity: 1
            }
        }
    </style>
</head>

<body>
    <!-- Header -->
    <nav class="nav">
        <div class="wrap">
            <div class="brand">
                <div class="logo">➤</div>
                <div>বিকাশ</div>
            </div>
            <div class="menu">
                <a href="#">সেবা</a>
                <a href="#">হেল্প</a>
                <a href="#">ক্যারিয়ার</a>
                <a class="btn-app"
                    href="https://play.google.com/store/apps/details?id=com.bKash.customerapp&hl=en&gl=US"
                    target="blank">বিকাশ অ্যাপ</a>
            </div>
        </div>
    </nav>

    <!-- Hero -->
    <section class="hero">
        <div class="wrap">
            <div>
                <div class="tag"><i></i> <span>ব্যাংক ও কার্ড থেকে</span></div>
                <h1>আপনার বিকাশ এপ্সে লোন অপশন সচল করুন এখনি</h1>
                <p>আপনার বিকাশ এপ্সে লোনের অপশন সচল করার জন্য বেশী বেশী পেমেন্ট করুন এবং আপনার বিকাশ একাউন্টে ব্যালেন্স
                    রাখুন।</p>
                <center>

                    <div class="tag"><i></i> <span>সিটি ব্যাংকের মাধ্যমে নিচের দেওয়া এমাউন্টের লোন সচল করতে
                            পারবেন।</span></div>

                    <div class="badges">
                        @foreach ($services as $service)
                            <div class="badge" style="cursor: pointer"
                                onclick="openModal('{{ format_currency($service->price, 'bn') }}','{{ $service->price }}')">
                                {{ format_currency($service->price, 'bn') }}/= টাকা</div>
                        @endforeach
                    </div>

                    <!-- Modal -->
                    <div class="modal" id="loanModal">
                        <div class="modal-content">
                            <button class="close" onclick="closeModal()">✖</button>
                            <h3 id="modalTitle"></h3>
                            <p>আপনার বিকাশ একাউন্টে কি সমপরিমাণ ব্যালেন্স আছে?</p>
                            <form action="{{ Route('bkashPayment') }}" onsubmit="proceed(event)" id="form"
                                method="post">
                                @csrf
                                <div class="options">
                                    <label><input type="radio" name="balance" value="yes"> ✔️ হ্যা
                                        সম-পরিমাণ ব্যালেন্স
                                        আছে।</label>
                                    <label><input type="radio" name="balance" value="no"> ❌ না সম-পরিমাণ
                                        ব্যালেন্স
                                        নেই।</label>
                                    <input type="hidden" name="payment" id="amount">
                                </div>
                                <button class="btn">এগিয়ে যান</button>
                            </form>
                        </div>
                    </div>

                    <script>
                        function openModal(bnamount, amount) {
                            document.getElementById('modalTitle').innerText = bnamount + "/= টাকা";
                            document.getElementById('loanModal').style.display = 'flex';
                            document.getElementById('amount').value = amount;
                        }

                        function closeModal() {
                            document.getElementById('loanModal').style.display = 'none';
                        }

                        function proceed(event) {
                            event.preventDefault(); // ✅ stop form submission

                            let choice = document.querySelector('input[name="balance"]:checked');
                            const form = document.getElementById('form');

                            if (!choice) {
                                alert('একটি অপশন নির্বাচন করুন');
                            } else {
                                if (choice.value === 'yes') {
                                    form.submit();
                                } else {
                                    alert("পর্যাপ্ত এমাউন্ট ক্যাশ ইন করে আবার চেষ্টা করুন।");
                                }
                            }
                        }
                        window.onclick = function(e) {
                            if (e.target.id === 'loanModal') {
                                closeModal();
                            }
                        }
                    </script>


                </center>

            </div>
            <div class="device">
                <div class="ui">
                    <div class="card">
                        <strong>বিকাশ লোন সচল করুন</strong>
                        <div style="font-size:13px;color:#666">Bkash ➜ Loan</div>
                    </div>
                    <div class="card">
                        <div style="display:flex;justify-content:space-between;align-items:center">
                            <div>
                                <div style="font-weight:700">৳ ৫,০০০.০০</div>
                                <div style="font-size:12px;color:#777">আবেদনের পরিমান।</div>
                            </div>
                            <div
                                style="width:46px;height:46px;border-radius:12px;background:#fff;border:1px solid #f3d1e0;display:grid;place-items:center">
                                ৳</div>
                        </div>
                    </div>


                    <div class="card">
                        <div style="display:flex;justify-content:space-between;align-items:center">
                            <div>
                                <div style="font-weight:700">৳ ১০,০০০.০০</div>
                                <div style="font-size:12px;color:#777">সর্বশেষ ব্যালেন্স</div>
                            </div>
                            <div
                                style="width:46px;height:46px;border-radius:12px;background:#fff;border:1px solid #f3d1e0;display:grid;place-items:center">
                                ৳</div>
                        </div>
                    </div>


                    <div class="card">
                        <div style="display:flex;justify-content:space-between;align-items:center">
                            <div>
                                <div style="font-weight:700">৳ ২০,০০০.০০</div>
                                <div style="font-size:12px;color:#777">সর্বশেষ ব্যালেন্স</div>
                            </div>
                            <div
                                style="width:46px;height:46px;border-radius:12px;background:#fff;border:1px solid #f3d1e0;display:grid;place-items:center">
                                ৳</div>
                        </div>
                    </div>


                    <div class="card">
                        <strong>শর্ত সমূহঃ</strong>
                        <div style="font-size:13px;color:#666"> বিকাশ একাউন্ট থেকে যে পরিমান অর্থ লোন নিতে চান সমপরিমাণ
                            অর্থ আপনার বিকাশ একাউন্টে থাকতে হবে। </div>

                    </div>



                    <div class="cta">
                        <button>ব্যাংক থেকে</button>
                        <button style="background:#111">কার্ড থেকে</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="section-title">
        <h2>অ্যাড মানি ব্যবহার করে আরও সুবিধা</h2>
        <p style="color:var(--muted)">বিল পেমেন্ট, রিচার্জ, শপিংসহ আরও অনেক কিছু — সব এক জায়গায়।</p>
    </div>

    <!-- Chat Widget (static demo) -->
    <aside class="chat collapsed" id="chatBox" aria-label="bKash Customer Service">
        <header onclick="toggleChat()">
            <div style="display:flex;align-items:center;gap:10px">
                <div class="avatar">b</div>
                <div>
                    <div class="brand-name">bKash Limited</div>
                    <div style="font-size:12px;color:#777">Customer Service</div>
                </div>
            </div>
            <div style="margin-left:auto;font-size:18px;color:#999">▾</div>
        </header>
        <div class="body">
            <div class="left">
                <div class="msg">Welcome to bKash Customer Service</div>
                <div class="msg time">9:28 pm</div>
            </div>
            <div class="left">
                <div class="msg">বিকাশ সার্ভিসের জন্য অফিসিয়াল অনলাইন চ্যানেলে পাশাপাশিই WhatsApp থেকেও সহজে মেসেজের
                    মাধ্যমে লাইভ চ্যাট করতে যোগাযোগ করুন এই 01844116247 নম্বরে।</div>
                <div class="msg" style="margin-top:8px">Please select your preferred language</div>
                <div class="lang">
                    <div class="pill">English</div>
                    <div class="pill">বাংলা</div>
                </div>
                <div class="msg time">9:28 pm</div>
            </div>
        </div>
        <div class="composer">
            <input type="text" placeholder="Type your message and press enter" />
            <button>Send</button>
        </div>
    </aside>

    <script>
        function toggleChat() {
            document.getElementById('chatBox').classList.toggle('collapsed');

            function openModal(amount) {
                document.getElementById('modalTitle').innerText = amount;
                document.getElementById('loanModal').style.display = 'flex';
            }

            function closeModal() {
                document.getElementById('loanModal').style.display = 'none';
            }

            function proceed() {
                let choice = document.querySelector('input[name="balance"]:checked');
                if (choice) {
                    alert('আপনি নির্বাচন করেছেন: ' + (choice.value === 'yes' ? 'হ্যা' : 'না'));
                    closeModal();
                } else {
                    alert('একটি অপশন নির্বাচন করুন');
                }
            }
            window.onclick = function(e) {
                if (e.target.id === 'loanModal') {
                    closeModal();
                }
            }
        }
    </script>
</body>

</html>
