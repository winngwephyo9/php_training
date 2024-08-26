<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company and Building Toggle</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 8px 12px;
            border: 1px solid #ccc;
            text-align: left;
        }

        .hidden-cell {
            display: none;
        }

        .company-name-cell {
            vertical-align: top;
            background-color: #f9f9f9;
            font-weight: bold;
        }

        .toggle-btn {
            margin-right: 8px;
        }
    </style>
</head>

<body>

    <table id="dataTable">
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
            <!-- Dynamic Rows Will Be Injected Here -->
        </tbody>
    </table>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const data = [
                {
                    companyName: 'ABC Corp',
                    buildings: [
                        {
                            buildingName: 'Building 1',
                            startDate: '2023-01-01',
                            endDate: '2023-12-31',
                            setting: 'Configuration 1',
                            amount: 1000
                        },
                        {
                            buildingName: 'Building 2',
                            startDate: '2023-02-01',
                            endDate: '2023-11-30',
                            setting: 'Configuration 2',
                            amount: 1200
                        },
                        {
                            buildingName: 'Building 5',
                            startDate: '2023-02-01',
                            endDate: '2023-11-30',
                            setting: 'Configuration 2',
                            amount: 1200
                        }
                    ]
                },
                {
                    companyName: 'XYZ Ltd',
                    buildings: [
                        {
                            buildingName: 'Building 3',
                            startDate: '2024-02-01',
                            endDate: '2024-11-30',
                            setting: 'Configuration 3',
                            amount: 1500
                        },
                        {
                            buildingName: 'Building 4',
                            startDate: '2024-02-01',
                            endDate: '2024-11-30',
                            setting: 'Configuration 3',
                            amount: 1500
                        }
                    ]
                }
            ];

            const tableBody = document.querySelector('#dataTable tbody');
            data.forEach(company => {
                const { companyName, buildings } = company;
                buildings.forEach((building, index) => {
                    const row = document.createElement('tr');
                    row.classList.add('building-row');
                    row.dataset.companyName = companyName;

                    if (index === 0) {
                        const companyCell = document.createElement('td');
                        companyCell.classList.add('company-name-cell');
                        companyCell.rowSpan = buildings.length;
                        companyCell.innerHTML = `
                    <input type="checkbox" class="toggle-btn company-toggle-btn" data-company-name="${companyName}">
                    ${companyName}
                `;
                        row.appendChild(companyCell);
                    }

                    // Building Name
                    const buildingCell = document.createElement('td');
                    buildingCell.classList.add('building-name-cell');
                    buildingCell.innerHTML = `
                <input type="checkbox" class="toggle-btn building-toggle-btn">
                ${building.buildingName}
            `;
                    row.appendChild(buildingCell);

                    // Start Date
                    const startDateCell = document.createElement('td');
                    startDateCell.classList.add('start-date-cell');
                    startDateCell.textContent = building.startDate;
                    row.appendChild(startDateCell);

                    // End Date
                    const endDateCell = document.createElement('td');
                    endDateCell.classList.add('end-date-cell');
                    endDateCell.textContent = building.endDate;
                    row.appendChild(endDateCell);

                    // Setting
                    const settingCell = document.createElement('td');
                    settingCell.classList.add('setting-cell');
                    settingCell.textContent = building.setting;
                    settingCell.dataset.originalSetting = building.setting;
                    row.appendChild(settingCell);

                    // Amount
                    const amountCell = document.createElement('td');
                    amountCell.classList.add('amount-cell');
                    amountCell.textContent = building.amount;
                    amountCell.dataset.originalAmount = building.amount;
                    row.appendChild(amountCell);

                    tableBody.appendChild(row);
                });
            });

            // Event Listener for Company Toggle Buttons
            document.querySelectorAll('.company-toggle-btn').forEach(button => {
                button.addEventListener('change', function () {
                    const companyName = this.dataset.companyName;
                    const isChecked = this.checked;
                    const rows = document.querySelectorAll(`tr[data-company-name="${companyName}"]`);
                    let totalAmount = 0;
                    let combinedSettings = [];

                    rows.forEach((row, index) => {
                        let buildingCell = row.querySelector('.building-name-cell');
                        let startDateCell = row.querySelector('.start-date-cell');
                        let endDateCell = row.querySelector('.end-date-cell');
                        let settingCell = row.querySelector('.setting-cell');
                        let amountCell = row.querySelector('.amount-cell');

                        if (isChecked) {
                            if (index === 0) {
                                // Hide BuildingName, StartDate, and EndDate for the first row
                                buildingCell.style.visibility = 'hidden';
                                startDateCell.style.visibility = 'hidden';
                                endDateCell.style.visibility = 'hidden';
                            } else {
                                // Hide Entire Row Except First
                                row.style.display = 'none';
                            }

                            // Collect Settings and Amounts
                            combinedSettings.push(settingCell.dataset.originalSetting);
                            totalAmount += parseFloat(amountCell.dataset.originalAmount);

                            // Ensure that CompanyName for other companies remains visible
                            document.querySelectorAll('.company-name-cell').forEach(companyCell => {
                                if (companyCell.rowSpan > 1 && rows.length === companyCell.rowSpan) {
                                    companyCell.rowSpan = 1;
                                }
                            });
                        } else {
                            // Ensure the company name cell spans the correct number of rows
                            if (index === 0) {
                                const companyCell = row.querySelector('.company-name-cell');
                                companyCell.rowSpan = rows.length;
                            }

                            // Show Cells
                            buildingCell.style.visibility = 'visible';
                            startDateCell.style.visibility = 'visible';
                            endDateCell.style.visibility = 'visible';

                            // Restore Original Settings and Amounts
                            settingCell.textContent = settingCell.dataset.originalSetting;
                            amountCell.textContent = amountCell.dataset.originalAmount;

                            // Show All Rows
                            row.style.display = '';
                        }
                    });

                    if (isChecked && rows.length > 0) {
                        const row = rows[0];
                        const firstSettingCell = row.querySelector('td:nth-child(5)');
                        const firstAmountCell = row.querySelector('td:nth-child(6)');

                        firstSettingCell.textContent = combinedSettings.join(', ');
                        firstAmountCell.textContent = totalAmount;
                    }
                });
            });

            // Event Listener for Building Toggle Buttons
            const buildingToggleButtons = document.querySelectorAll('.building-toggle-btn');

            buildingToggleButtons.forEach(button => {
                button.addEventListener('change', function () {
                    const row = this.closest('tr');
                    const isCompanyNameCellPresent = row.querySelector('td:nth-child(1)').classList.contains('company-name-cell');
                    const startDateCell = isCompanyNameCellPresent
                        ? row.querySelector('td:nth-child(3)')  // If CompanyName cell is present, StartDate is in 3rd column
                        : row.querySelector('td:nth-child(2)'); // If CompanyName cell is not present, StartDate is in 2nd column
                    const endDateCell = isCompanyNameCellPresent
                        ? row.querySelector('td:nth-child(4)')  // If CompanyName cell is present, EndDate is in 4th column
                        : row.querySelector('td:nth-child(3)'); // If CompanyName cell is not present, EndDate is in 3rd column

                    if (startDateCell) {
                        startDateCell.style.visibility = this.checked ? 'hidden' : 'visible';
                    }

                    if (endDateCell) {
                        endDateCell.style.visibility = this.checked ? 'hidden' : 'visible';
                    }
                });
            });
        });
    </script>

</body>

</html>


# php_training
