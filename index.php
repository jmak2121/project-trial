<?php
// index.php
require 'connect.php';

// Retrieve all items from the database, ordered by newest first.
$stmt = $pdo->query("SELECT * FROM items ORDER BY created_at DESC");
$items = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Lost &amp; Found Tracker</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <header>
    <h1>Lost &amp; Found Tracker</h1>
  </header>
  
  <main>
    <!-- Report Item Section -->
    <section id="report-item">
      <h2>Report Lost or Found Item</h2>
      <!-- Form without file upload: no enctype attribute -->
      <form id="report-form" method="post" action="add_item.php">
        <label for="name">Item Name:</label>
        <input type="text" id="name" name="name" placeholder="e.g., Black Backpack" required>
    
        <label for="category">Category:</label>
        <select id="category" name="category">
          <option value="Electronics">Electronics</option>
          <option value="Clothing">Clothing</option>
          <option value="Accessories">Accessories</option>
          <option value="Documents">Documents</option>
          <option value="Other">Other</option>
        </select>
    
        <label for="Description">Detailed Description:</label>
        <textarea id="description" name="description" placeholder="Describe unique features, brand, etc." required></textarea>
    
        <label for="location">Location Found/Lost:</label>
        <input type="text" id="location" name="location" placeholder="e.g., Library Entrance" required>
    
        <button type="submit">Submit Report</button>
      </form>
    </section>

    <!-- Search Section -->
    <section id="search-section">
      <h2>Search Reported Items</h2>
      <input type="text" id="searchBar" placeholder="Search by item name or location">
    </section>
    
    <!-- Items List Section -->
    <section id="items-list">
      <h2>Reported Items</h2>
      <ul>
        <?php foreach ($items as $item): ?>
          <li>
            <strong><?php echo htmlspecialchars($item['name']); ?></strong> (<?php echo htmlspecialchars($item['category']); ?>)<br>
            <em><?php echo htmlspecialchars($item['location']); ?></em><br>
            <?php echo nl2br(htmlspecialchars($item['description'])); ?><br>
            <?php if ($item['claimed']): ?>
              <span style="color: green; font-weight: bold;">Claimed</span>
            <?php else: ?>
              <a href="claim_item.php?id=<?php echo $item['id']; ?>" class="claim-button">Claim Item</a>
            <?php endif; ?>
          </li>
        <?php endforeach; ?>
      </ul>
    </section>
  </main>
  
  <script src="script.js"></script>
</body>
</html>
