<?php
session_start();
// If language already selected and coming back, still show splash
// User can always choose again
?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Minh Bach — Portfolio</title>
  <meta name="description" content="Game Designer & Product Owner Portfolio — Choose your language">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700&family=Plus+Jakarta+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/splash.css">
</head>
<body>

  <!-- Background (blurred via CSS) -->
  <div class="splash-bg"></div>

  <!-- Dark overlay -->
  <div class="splash-overlay"></div>

  <!-- Falling flowers -->
  <div class="flowers" id="flowers"></div>

  <!-- Main content -->
  <div class="splash-content">
    <div class="splash-logo">MB<span>.</span></div>
    <h1 class="splash-title">
      <span class="splash-line-vi">Chọn Ngôn Ngữ</span>
      <span class="splash-line-en">Choose Language</span>
    </h1>
    <div class="splash-buttons">
      <a href="portfolio.php?lang=vi" class="splash-btn" id="btnVi">
        <span class="flag flag-vi" aria-label="Vietnam"></span>
        <span class="splash-btn-text">Tiếng Việt</span>
      </a>
      <a href="portfolio.php?lang=en" class="splash-btn" id="btnEn">
        <span class="flag flag-en" aria-label="English"></span>
        <span class="splash-btn-text">English</span>
      </a>
    </div>
  </div>

  <script>
    // ═══════ Flower petal falling effect ═══════
    const flowerContainer = document.getElementById('flowers');
    const flowerImages = [
      'https://huyenthoailukhach.vn/assets/frontend/homev2/assets/images/infotop2/flower.png',
      'https://huyenthoailukhach.vn/assets/frontend/homev2/assets/images/infotop2/flower2.png'
    ];

    function createFlower() {
      const flower = document.createElement('div');
      flower.className = 'flower';
      const img = flowerImages[Math.floor(Math.random() * flowerImages.length)];
      flower.style.backgroundImage = `url(${img})`;
      flower.style.left = Math.random() * 100 + 'vw';
      flower.style.width = (18 + Math.random() * 22) + 'px';
      flower.style.height = flower.style.width;
      flower.style.opacity = 0.3 + Math.random() * 0.5;
      const duration = 6 + Math.random() * 8;
      const delay = Math.random() * 2;
      const drift = -40 + Math.random() * 80;
      flower.style.animation = `flowerFall ${duration}s ${delay}s linear forwards`;
      flower.style.setProperty('--drift', drift + 'px');
      flower.style.setProperty('--spin', (Math.random() * 360) + 'deg');
      flowerContainer.appendChild(flower);
      setTimeout(() => flower.remove(), (duration + delay) * 1000 + 100);
    }

    // Create initial batch
    for (let i = 0; i < 12; i++) {
      setTimeout(() => createFlower(), i * 400);
    }
    // Continue spawning
    setInterval(createFlower, 800);
  </script>
</body>
</html>
