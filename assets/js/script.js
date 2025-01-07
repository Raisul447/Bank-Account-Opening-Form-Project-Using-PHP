document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector("form");

    form.addEventListener("submit", function(event) {
        const mobileNumber = document.querySelector("input[name='mobile_number']").value;
        const email = document.querySelector("input[name='email_id']").value;
        
        if (!validateMobileNumber(mobileNumber)) {
            alert("Invalid mobile number format!");
            event.preventDefault();
        }

        if (!validateEmail(email)) {
            alert("Invalid email format!");
            event.preventDefault();
        }
    });

    function validateMobileNumber(number) {
        const regex = /^[0-9]{10}$/;
        return regex.test(number);
    }

    function validateEmail(email) {
        const regex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        return regex.test(email);
    }
});
