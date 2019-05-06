document.getElementById('currencyConversionForm').addEventListener('submit',
    function (e) {
        e.preventDefault();
        let request = new XMLHttpRequest(),
            selectCurrencySource = document.getElementById('currencySource'),
            currencySource = selectCurrencySource.options[selectCurrencySource.selectedIndex].value,
            selectCurrencyTarget = document.getElementById('currencyTarget'),
            currencyTarget = selectCurrencyTarget.options[selectCurrencyTarget.selectedIndex].value,
            amount = document.getElementById('amount').value;


        request.open('GET', `/convert/${currencySource}/${currencyTarget}/${amount}`, true);

        request.onload = function () {
            if (200 === request.status) {
                let data = JSON.parse(request.responseText);
                document.getElementById('result').innerText = data.amount.toFixed(2);
                document.getElementById('resultCurrency').innerText = data.currency;
                document.getElementById('message').innerText = data.message;
            }
        };
        request.send();
    }
);
