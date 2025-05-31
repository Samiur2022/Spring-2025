
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Customer Profile Dashboard</title>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');

  :root {
    --bg-color: #ffffff;
    --panel-bg: #f9f9f9;
    --text-primary: #222222;
    --text-secondary: #555555;
    --accent-color:rgb(200, 17, 17); /* red primary color */
    --accent-color2:rgb(55, 41, 241); /* red primary color */
    --border-color: #e0e0e0;
    --success-color: #28a745;
    --warning-color: #ffc107;
    --error-color: #d32f2f;
    --font-family: 'Roboto', sans-serif;
    --radius: 12px;
    --box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
  }

  * {
    box-sizing: border-box;
  }

  body {
    margin: 0;
    background-color: var(--bg-color);
    color: var(--text-primary);
    font-family: var(--font-family);
    padding: 2rem;
    min-height: 100vh;
  }

  .dashboard {
    max-width: 1160px;
    margin: 0 auto;
    display: flex;
    gap: 2rem;
    flex-wrap: wrap;
  }

  /* Customer Info - Card with icon style and animations */
  .customer-info {
    flex: 1 1 320px;
    background: var(--panel-bg);
    border-radius: var(--radius);
    padding: 2rem;
    box-shadow: var(--box-shadow);
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
    text-align: center;
    animation: fadeInSlideUp 1s ease forwards;
    position: relative;
  }

  .customer-info h2 {
    margin: 0 0 1.5rem 0;
    font-weight: 700;
    font-size: 2rem;
    color: var(--accent-color);
    border-bottom: 4px solid var(--accent-color);
    padding-bottom: 0.4rem;
    user-select: none;
  }

  .profile-pic-container {
    position: relative;
    margin: 0 auto 1rem auto;
    width: 140px;
    height: 140px;
    border-radius: 50%;
    overflow: hidden;
    box-shadow:
      0 0 2px var(--accent-color),
      0 0 12px var(--accent-color);
    animation: pulseGlow 3s infinite ease-in-out;
  }

  .profile-pic {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 50%;
    border: 4px solid var(--accent-color);
  }

  ul.info-list {
    list-style: none;
    padding: 0;
    margin: 0;
    width: 100%;
  }

  ul.info-list li {
    display: flex;
    justify-content: space-between;
    padding: 0.7rem 1rem;
    border-radius: var(--radius);
    margin-bottom: 0.6rem;
    font-size: 1.05rem;
    font-weight: 500;
    background: #fff6f6;
    color: #6f1a1a;
    box-shadow: 0 2px 8px rgba(211,47,47,0.15);
    border-left: 5px solid var(--accent-color);
    opacity: 0;
    transform: translateX(-20px);
    animation: fadeInRight 0.5s forwards;
  }
  ul.info-list li:nth-child(1) { animation-delay: 0.4s; }
  ul.info-list li:nth-child(2) { animation-delay: 0.6s; }
  ul.info-list li:nth-child(3) { animation-delay: 0.8s; }
  ul.info-list li:nth-child(4) { animation-delay: 1s; }
  ul.info-list li:nth-child(5) { animation-delay: 1.2s; }

  .info-label {
    color: var(--accent-color);
    font-weight: 700;
  }

  .info-value {
    font-weight: 600;
    color: var(--text-primary);
  }

  /* Table Container */
  .data-table {
    /* flex: 2 1 900px; */
    width: 1200px;
    background: var(--panel-bg);
    border-radius: var(--radius);
    padding: 2.5rem 2rem;
    box-shadow: var(--box-shadow);
    overflow-x: auto;
    animation: fadeInSlideUp 1s ease 0.8s forwards;
    opacity: 0;
    transform: translateY(20px);
  }

  .data-table h2 {
    margin: 0 0 1rem 0;
    font-weight: 700;
    font-size: 1.75rem;
    border-bottom: 3px solid var(--accent-color);
    padding-bottom: 0.5rem;
    color: var(--accent-color);
  }

  table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0 15px;
  }

  thead tr {
    background: transparent;
  }

  th {
    text-align: left;
    padding: 0.75rem 1rem;
    font-weight: 700;
    font-size: 1rem;
    color: var(--accent-color);
    border-bottom: 2px solid var(--border-color);
  }

  tbody tr {
    background: #fff6f6;
    transition: background-color 0.3s;
    border-radius: var(--radius);
    box-shadow: 0 4px 10px rgba(211,47,47,0.15);
    display: table-row;
    transform: translateY(20px);
    opacity: 0;
    animation: fadeInUp 0.4s forwards;
  }
  tbody tr:nth-child(1) { animation-delay: 1.1s; }
  tbody tr:nth-child(2) { animation-delay: 1.3s; }
  tbody tr:nth-child(3) { animation-delay: 1.5s; }
  tbody tr:nth-child(4) { animation-delay: 1.7s; }
  tbody tr:nth-child(5) { animation-delay: 1.9s; }

  tbody tr:hover {
    background-color: #fee1e1;
    cursor: pointer;
  }

  td {
    padding: 0.75rem 1rem;
    font-size: 1rem;
    color: var(--text-primary);
    vertical-align: middle;
  }

  tbody tr td:first-child {
    border-top-left-radius: var(--radius);
    border-bottom-left-radius: var(--radius);
  }
  tbody tr td:last-child {
    border-top-right-radius: var(--radius);
    border-bottom-right-radius: var(--radius);
  }

  .status {
    padding: 0.25rem 0.75rem;
    border-radius: 50px;
    font-weight: 700;
    font-size: 0.85rem;
    color: #fff;
    display: inline-block;
    min-width: 80px;
    text-align: center;
    box-shadow: 0 0 5px rgba(0,0,0,0.15);
  }

  .status.completed {
    background-color: var(--success-color);
    box-shadow: 0 0 8px var(--success-color);
  }

  .status.pending {
    background-color: var(--warning-color);
    color: #222;
  }

  .status.cancelled {
    background-color: var(--error-color);
  }

  .btn {
    padding: 0.35rem 0.9rem;
    border-radius: 6px;
    font-weight: 600;
    font-size: 0.9rem;
    border: none;
    color: #fff;
    cursor: pointer;
    user-select: none;
    transition: background-color 0.3s ease, transform 0.2s ease;
  }

  .btn-view {
    background-color: var(--accent-color2);
    margin-right: 0.6rem;
    box-shadow: 0 0 6px var(--accent-color2);
  }

  .btn-view:hover,
  .btn-view:focus {
    background-color: #961616;
    outline: none;
    transform: scale(1.05);
    box-shadow: 0 0 15px #961616;
  }

  .btn-cancel {
    background-color: var(--error-color);
    box-shadow: 0 0 6px var(--error-color);
  }

  .btn-cancel:hover,
  .btn-cancel:focus {
    background-color: #7b1a1a;
    outline: none;
    transform: scale(1.05);
    box-shadow: 0 0 15px #7b1a1a;
  }

  /* Animations keyframes */
  @keyframes fadeInSlideUp {
    0% {
      opacity: 0;
      transform: translateY(20px);
    }
    100% {
      opacity: 1;
      transform: translateY(0);
    }
  }

  @keyframes pulseGlow {
    0%, 100% {
      box-shadow: 0 0 16px var(--accent-color);
    }
    50% {
      box-shadow: 0 0 30px var(--accent-color);
    }
  }

  @keyframes fadeInRight {
    0% {
      opacity: 0;
      transform: translateX(-20px);
    }
    100% {
      opacity: 1;
      transform: translateX(0);
    }
  }

  @keyframes fadeInUp {
    0% {
      opacity: 0;
      transform: translateY(20px);
    }
    100% {
      opacity: 1;
      transform: translateY(0);
    }
  }

  /* Responsive */
  @media (max-width: 900px) {
    .dashboard {
      flex-direction: column;
    }
    .customer-info,
    .data-table {
      flex: 1 1 100%;
      max-width: 100%;
    }
    .profile-pic-container {
      margin: 0 auto 1.5rem;
      display: block;
      width: 140px;
      height: 140px;
    }
  }
</style>
</head>
<body>
  <div class="dashboard" role="main" aria-label="Customer Profile Dashboard">
    <section class="customer-info" aria-label="Customer Information">
      <h2>Customer Info</h2>
      <div class="profile-pic-container">
        <img src="https://randomuser.me/api/portraits/men/42.jpg" alt="Jane Doe Profile Picture" class="profile-pic" />
      </div>
      <ul class="info-list">
        <li><span class="info-label">Name:</span> <span class="info-value">Jane Doe</span></li>
        <li><span class="info-label">Email:</span> <span class="info-value">jane.doe@example.com</span></li>
        <li><span class="info-label">Phone:</span> <span class="info-value">+1 555 123 4567</span></li>
        <li><span class="info-label">Address:</span> <span class="info-value">1234 Maple Street, Springfield, USA</span></li>
        <li><span class="info-label">Member Since:</span> <span class="info-value">January 2021</span></li>
      </ul>
    </section>

    <section class="data-table" aria-label="Customer Orders Table">
      <h2>Order History</h2>
      <table>
        <thead>
          <tr>
            <th scope="col">Order ID</th>
            <th scope="col">Date</th>
            <th scope="col">Product</th>
            <th scope="col">Payment By</th>
            <th scope="col">Status</th>
            <th scope="col">Total</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>#1001</td>
            <td>2024-05-01</td>
            <td>Wireless Headphones</td>
            <td>ssl</td>
            <td><span class="status completed">Completed</span></td>
            <td>$199.99</td>
            <td>
              <button class="btn btn-view" type="button" aria-label="View details for order 1001">View</button>
              <button class="btn btn-cancel" type="button" aria-label="Cancel order 1001">Cancel</button>
            </td>
          </tr>
          
        </tbody>
      </table>
    </section>
  </div>
</body>
</html>

