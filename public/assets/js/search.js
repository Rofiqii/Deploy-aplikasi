// public/js/searchTable.js
function searchTable(input, tableId) {
    const filter = input.value.toLowerCase();
    const rows = document.querySelectorAll(`#${tableId} tbody tr`);

    rows.forEach(row => {
        const cells = row.getElementsByTagName('td');
        let match = false;

        for (let i = 0; i < cells.length; i++) {
            if (cells[i].innerText.toLowerCase().includes(filter)) {
                match = true;
                break;
            }
        }

        row.style.display = match ? '' : 'none'; // Menampilkan atau menyembunyikan baris
    });
}

// Menambahkan event listener untuk semua input pencarian
document.addEventListener('DOMContentLoaded', () => {
    const searchInputs = document.querySelectorAll('.search-input');
    
    searchInputs.forEach(input => {
        const tableId = input.dataset.tableId; 
        input.addEventListener('keyup', () => {
            searchTable(input, tableId);
        });
    });
});

// search data domba
document.addEventListener('DOMContentLoaded', function () {
    let searchElement = document.getElementById('search');
    let sheepList = document.getElementById('sheep-list'); 

    if (searchElement && sheepList) {
        searchElement.addEventListener('input', function () {
            let filter = this.value.toLowerCase();
            let items = document.querySelectorAll('#sheep-list .sheep-item');

            items.forEach(function (item) {
                let text = item.textContent.toLowerCase();
                if (text.includes(filter)) {
                    item.style.display = '';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    }
});