<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pease wait you are redirecting</title>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

</head>

<body>

    <span id="counter">0</span><span>s</span>
    <p>Please wait for redirecting payment gatway.</p>

    <script>
        const data = @json($result);
        console.log(data)

        const startTime = new Date(data.created_at).getTime();

        const now = new Date().getTime();

        let elapsed = Math.floor((now - startTime) / 1000);

        let remaining = 500 - elapsed;

        if (remaining < 0) remaining = 0;

        const timerEl = document.getElementById("counter");

        const interval = setInterval(() => {
            timerEl.textContent = remaining;

            axios.post('{{ Route("payment.request.checkRequest") }}', data, {
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            }).then(response => {
                console.log(response)
                if (response?.data?.payment != null) {
                    return window.location.href = response?.data?.payment;
                }
            })
            if (remaining <= 0) {
                clearInterval(interval);
            }
            remaining--;
        }, 1000);
    </script>

</body>

</html>