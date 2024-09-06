# php_training
// Mock API call function to fetch company data
async function fetchData() {
    // Replace this with actual API URL
    const response = await fetch('your-api-endpoint-here');
    const data = await response.json();

    // Assuming your API data structure is like this:
    /*
    [
        { company_name: "会社名1", tasks: [ {作業: "作成", 設備モデル: 2, ...}, ...] },
        { company_name: "会社名2", tasks: [ {作業: "修正", 設備モデル: 1, ...}, ...] }
    ]
    */

    // Call the function to populate the table
    populateTable(data);
}

// Function to create and append table rows
function populateTable(data) {
    const tableBody = document.getElementById('table-body');

    data.forEach(company => {
        // Add main row with company name
        const companyRow = document.createElement('tr');
        companyRow.classList.add('company-row');

        companyRow.innerHTML = `
            <td rowspan="${company.tasks.length}">${company.company_name}</td>
            <td>${company.tasks[0].作業}</td>
            <td>${company.tasks[0].意匠モデル || ''}</td>
            <td>${company.tasks[0].構造モデル || ''}</td>
            <td>${company.tasks[0].設備モデル || ''}</td>
            <td>${company.tasks[0].生産設計モデル || ''}</td>
            <td>${company.tasks[0].デジタルモックアップ || ''}</td>
            <td>${company.tasks[0].CG || ''}</td>
            <td>${company.tasks[0].点群モデル || ''}</td>
            <td>${company.tasks[0].意匠図 || ''}</td>
            <td>${company.tasks[0].構造図 || ''}</td>
        `;

        tableBody.appendChild(companyRow);

        // Add additional rows for tasks
        for (let i = 1; i < company.tasks.length; i++) {
            const taskRow = document.createElement('tr');
            taskRow.innerHTML = `
                <td>${company.tasks[i].作業}</td>
                <td>${company.tasks[i].意匠モデル || ''}</td>
                <td>${company.tasks[i].構造モデル || ''}</td>
                <td>${company.tasks[i].設備モデル || ''}</td>
                <td>${company.tasks[i].生産設計モデル || ''}</td>
                <td>${company.tasks[i].デジタルモックアップ || ''}</td>
                <td>${company.tasks[i].CG || ''}</td>
                <td>${company.tasks[i].点群モデル || ''}</td>
                <td>${company.tasks[i].意匠図 || ''}</td>
                <td>${company.tasks[i].構造図 || ''}</td>
            `;
            tableBody.appendChild(taskRow);
        }
    });
}

// Fetch and display the data when the page loads
fetchData();

![image](https://github.com/user-attachments/assets/9efd1af5-5d22-401c-be6e-9b93a633cdf6)


![image](https://github.com/user-attachments/assets/ab665c96-17f6-4bf7-ae1e-c32e2be993d5)


![image](https://github.com/user-attachments/assets/d73b9e02-623d-4241-860a-24ea88a22517)



https://github.com/winngwephyo9/php_training/commit/2e23cdf53f0c450a4a26b323ff25a3d36fbe9724#commitcomment-146210173


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Styled Table</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>PJコード</th>
                    <th>案件名称</th>
                    <th>会社名</th>
                    <th>開始日</th>
                    <th>終了日</th>
                    <th>費用</th>
                    <th colspan="19"></th>
                </tr>
                <tr>
                    <th colspan="6"></th>
                    <th>3</th>
                    <th>4</th>
                    <th>5</th>
                    <th>6</th>
                    <th>7</th>
                    <th>8</th>
                    <th>9</th>
                    <th>10</th>
                    <th>11</th>
                    <th>12</th>
                    <th>13</th>
                    <th>14</th>
                    <th>15</th>
                    <th>16</th>
                    <th>17</th>
                    <th>18</th>
                    <th>19</th>
                    <th>20</th>
                    <th>21</th>
                    <th>22</th>
                </tr>
                <tr>
                    <th colspan="6"></th>
                    <th>火</th>
                    <th>水</th>
                    <th>木</th>
                    <th>金</th>
                    <th>土</th>
                    <th>日</th>
                    <th>月</th>
                    <th>火</th>
                    <th>水</th>
                    <th>木</th>
                    <th>金</th>
                    <th>土</th>
                    <th>日</th>
                    <th>月</th>
                    <th>火</th>
                    <th>水</th>
                    <th>木</th>
                    <th>金</th>
                    <th>土</th>
                </tr>
            </thead>
            <tbody>
                <!-- Your table data here -->
            </tbody>
        </table>
    </div>
    <script src="scripts.js"></script>
</body>
</html>
