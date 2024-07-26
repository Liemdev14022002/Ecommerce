
function calculateTotal() {
    let total = 0;
    const products = document.querySelectorAll('.checkout__total__products li');
    products.forEach(product => {
        const priceText = product.querySelector('span').textContent.replace(/[^\d]/g, ''); // Remove non-numeric characters
        const price = parseInt(priceText.replace(',', '.')); // Convert to number
        total += price;
    });
    document.getElementById('total_amount').textContent = formatCurrency(total);
    document.getElementById('total_input').value = total;
}

// Format number as currency
function formatCurrency(amount) {
    return amount.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' });
}

// Call calculateTotal when page loads and on any change in product quantities
window.onload = calculateTotal;
