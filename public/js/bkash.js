class BkashPayment {
    constructor() {
        this.paymentID = null;
    }

    setupBkash() {
        window.bKash = window.bKash || {};
        window.bKash.init({
            paymentMode: "checkout",
            paymentRequest: {},
            createRequest: (request) => this.createPayment(request),
            executeRequestOnAuthorization: () => this.executePayment(),
        });
    }

    async createPayment(request) {
        try {
            const response = await fetch("/bkash/create-payment", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector(
                        'meta[name="csrf-token"]'
                    ).content,
                },
                body: JSON.stringify({
                    amount: request.amount,
                    order_id: this.generateOrderId(),
                }),
            });

            const data = await response.json();

            if (data.success) {
                this.paymentID = data.paymentID;
                window.bKash.create().onSuccess(data);
            } else {
                window.bKash.create().onError();
            }
        } catch (error) {
            console.error("Payment creation error:", error);
            window.bKash.create().onError();
        }
    }

    async executePayment() {
        try {
            const response = await fetch("/bkash/execute-payment", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector(
                        'meta[name="csrf-token"]'
                    ).content,
                },
                body: JSON.stringify({
                    paymentID: this.paymentID,
                }),
            });

            const data = await response.json();

            if (data.success) {
                window.bKash.execute().onSuccess();
                this.showSuccessMessage("Payment successful!");
                this.redirectToSuccessPage();
            } else {
                window.bKash.execute().onError();
                this.showErrorMessage("Payment failed: " + data.message);
            }
        } catch (error) {
            console.error("Payment execution error:", error);
            window.bKash.execute().onError();
            this.showErrorMessage("Payment execution failed");
        }
    }

    generateOrderId() {
        return '01907641877';
    }

    showSuccessMessage(message) {
        alert(message);
    }

    showErrorMessage(message) {
        alert(message);
    }

    redirectToSuccessPage() {
        window.location.href = "/payment/success";
    }

    // Method to trigger payment
    pay(amount, description = "") {
        window.bKash = window.bKash || {};
        window.bKash.init({
            paymentMode: "checkout",
            paymentRequest: {
                amount: amount,
                intent: "sale",
            },
            createRequest: (request) => this.createPayment(request),
            executeRequestOnAuthorization: () => this.executePayment(),
        });

        window.bKash.reconfigure({
            paymentRequest: {
                amount: amount,
                intent: "sale",
            },
        });

        document.getElementById("bKash_button").click();
    }
}

// Usage example
document.addEventListener("DOMContentLoaded", function () {
    const bkash = new BkashPayment();

    // Add event listener to payment button
    const payButton = document.getElementById("pay-with-bkash");
    if (payButton) {
        payButton.addEventListener("click", function () {
            const amount = document.getElementById("amount").value;
            bkash.pay(amount);
        });
    }
});
