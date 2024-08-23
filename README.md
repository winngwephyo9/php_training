# php_training



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Table</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .hidden {
            display: none;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>CompanyName</th>
                    <th>BuildingName</th>
                    <th>StartDate</th>
                    <th>EndDate</th>
                    <th>Setting</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody id="companyTable">
                <!-- Rows will be inserted here by JavaScript -->
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const data = [
                { companyId: 1, companyName: 'Company A', buildingName: 'Building 1', startDate: '2023-01-01', endDate: '2023-12-31', setting: 10, amount: 1000 },
                { companyId: 1, companyName: 'Company A', buildingName: 'Building 3', startDate: '2023-03-01', endDate: '2023-09-30', setting: 15, amount: 1500 },
                { companyId: 2, companyName: 'Company B', buildingName: 'Building 2', startDate: '2023-02-01', endDate: '2023-11-30', setting: 20, amount: 2000 },
            ];

            const tableBody = document.getElementById('companyTable');
            let displayedCompanies = new Set();
            let displayedBuildings = new Set();

            data.forEach(item => {
                const row = document.createElement('tr');
                const showCompanyName = !displayedCompanies.has(item.companyId);
                const showBuildingName = !displayedBuildings.has(item.buildingName);

                row.innerHTML = `
                <td>${showCompanyName ? item.companyName : ''} ${showCompanyName ? '<button class="btn btn-sm btn-primary toggle-company"></button>' : ''}</td>
                <td class="building-name">${showBuildingName ? item.buildingName : ''} ${showBuildingName ? '<button class="btn btn-sm btn-primary toggle-building"></button>' : ''}</td>
                <td class="start-date">${item.startDate}</td>
                <td class="end-date">${item.endDate}</td>
                <td class="setting">${item.setting}</td>
                <td class="amount">${item.amount}</td>
            `;

                tableBody.appendChild(row);

                if (showCompanyName) displayedCompanies.add(item.companyId);
                if (showBuildingName) displayedBuildings.add(item.buildingName);
            });

            function attachBuildingToggleListeners() {
                document.querySelectorAll('.toggle-building').forEach(button => {
                    button.addEventListener('click', function () {
                        const row = this.closest('tr');
                        const startDateCell = row.querySelector('.start-date');
                        const endDateCell = row.querySelector('.end-date');

                        if (!startDateCell.dataset.originalStartDate) {
                            startDateCell.dataset.originalStartDate = startDateCell.textContent;
                            endDateCell.dataset.originalEndDate = endDateCell.textContent;
                        }

                        const isHidden = startDateCell.textContent === '';
                        startDateCell.textContent = isHidden ? startDateCell.dataset.originalStartDate : '';
                        endDateCell.textContent = isHidden ? endDateCell.dataset.originalEndDate : '';
                    });
                });
            }

            attachBuildingToggleListeners();

            document.querySelectorAll('.toggle-company').forEach(button => {
                button.addEventListener('click', function () {
                    const row = this.closest('tr');
                    const buildingName = row.querySelector('.building-name');
                    const startDateCell = row.querySelector('.start-date');
                    const endDateCell = row.querySelector('.end-date');

                    if (!buildingName.dataset.originalBuildingName) {
                        buildingName.dataset.originalBuildingName = buildingName.textContent;
                        if (!startDateCell.dataset.originalStartDate) {
                            startDateCell.dataset.originalStartDate = startDateCell.textContent;
                            endDateCell.dataset.originalEndDate = endDateCell.textContent;
                        }
                    }

                    const isHidden = startDateCell.textContent === '' && buildingName.textContent === '';
                    buildingName.innerHTML = isHidden ? `${buildingName.dataset.originalBuildingName} <button class="btn btn-sm btn-primary toggle-building"></button>` : '';
                    startDateCell.textContent = isHidden ? startDateCell.dataset.originalStartDate : '';
                    endDateCell.textContent = isHidden ? endDateCell.dataset.originalEndDate : '';

                    attachBuildingToggleListeners(); // Reattach listeners after updating innerHTML
                });
            });
        });
    </script>

</body>

</html>

___________________________________________________________________________________________________

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toggle Table Rows</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        thead th {
            position: sticky;
            top: 0;
            background-color: #f1f1f1;
        }

        .hidden {
            visibility: hidden;
        }
    </style>
</head>

<body>
    <table id="myTable">
        <thead>
            <tr>
                <th>CompanyName</th>
                <th>BuildingName</th>
                <th>StartDate</th>
                <th>EndDate</th>
                <th>Setting</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            <!-- Rows will be added dynamically -->
        </tbody>
    </table>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const tableBody = document.querySelector('#myTable tbody');

            const data = [
                { companyName: 'Company A', buildingName: 'Building 1', startDate: '2024-01-01', endDate: '2024-12-31', setting: 'Setting 1', amount: '1000' },
                { companyName: 'Company A', buildingName: 'Building 2', startDate: '2024-02-01', endDate: '2024-11-30', setting: 'Setting 2', amount: '2000' },
                { companyName: 'Company B', buildingName: 'Building 3', startDate: '2024-03-01', endDate: '2024-10-31', setting: 'Setting 3', amount: '3000' },
                // Add more data as needed
            ];

            let lastCompanyName = '';

            data.forEach(item => {
                const row = document.createElement('tr');

                row.innerHTML = `
                    <td>${item.companyName !== lastCompanyName ? `<button onclick="toggleColumn1(this)">${item.companyName}</button>` : ''}</td>
                    <td>${item.buildingName} <button onclick="toggleColumn2(this)">Toggle</button></td>
                    <td class="toggle-value">${item.startDate}</td>
                    <td class="toggle-value">${item.endDate}</td>
                    <td>${item.setting}</td>
                    <td>${item.amount}</td>
                `;

                lastCompanyName = item.companyName;
                tableBody.appendChild(row);
            });
        });

        function toggleColumn1(button) {
            const row = button.parentElement.parentElement;
            const table = document.getElementById('myTable');
            const rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr');

            for (let i = 0; i < rows.length; i++) {
                if (rows[i] !== row) {
                    rows[i].style.display = rows[i].style.display === 'none' ? '' : 'none';
                }
            }
        }

        function toggleColumn2(button) {
            const row = button.parentElement.parentElement;
            const cells = row.getElementsByClassName('toggle-value');

            for (let i = 0; i < cells.length; i++) {
                cells[i].classList.toggle('hidden');
            }
        }
    </script>
</body>

</html>
