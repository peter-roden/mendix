

<!DOCTYPE html>
<html>

<?php $directory = get_template_directory_uri() . '/static/reviews/'; ?>
<head>
  <meta charset="utf-8">
  <title>Mendix — Reviews</title>
  <meta name="robots" content="noindex">
  <link rel="stylesheet" href="<?= $directory ?>insights.css">
  <link rel="stylesheet" href="insights.css">
</head>

<body>
  <div class="dark-bg"></div>
  <div class="content">
    <div class="grid-container grid-x">
      <div class="cell">
        <div class="text-center">
          
          
          <h1>For Customers</h1>
          <p class="heading2">Leave product feedback and receive a €20 Amazon gift card onsite</p>
          <div class="logo-container">
            <img class="logo peer" srcset="<?= $directory ?>peer.png 1x, <?= $directory ?>peer@2x.png 2x, <?= $directory ?>peer@3x.png 3x" src="peer.png" alt="Gartner Peer Insights">
          </div>
        </div>

        <ol>
          <li>You’ll need to use your work e-mail address to be permitted to leave a review, but you will be completely anonymous once the review is published.</li>
          <li>At the conclusion of your review, show a Mendix associate that you’ve completed it, and receive your gift card!</li>
        </ol>
        <div class="btn-container">
          <a href="https://gtnr.it/2IEf3KZ" class="btn-primary" target="_blank">Share your feedback</a>
        </div>

      </div>
      <div class="cell">
        <div class="text-center">
          <h1>For Partners</h1>
          <p class="heading2">Leave product feedback and receive a €20 Amazon gift card onsite</p>
          <div class="logo-container">
            <img class="logo g2" srcset="<?= $directory ?>g2.png 1x, <?= $directory ?>g2@2x.png 2x, <?= $directory ?>g2@3x.png 3x" src="g2.png" alt="G2 Crowd">
          </div>
        </div>
        <ol>
          <li>You may use your work e-mail or LinkedIn Account to leave a review, but you may elect to be completely anonymous when your review is published.</li>
          <li>At the conclusion of your review, show a Mendix associate that you’ve completed it, and receive your gift card!</li>
        </ol>
        <div class="btn-container">
          <a href="https://www.g2crowd.com/products/mendix/take_survey" class="btn-primary" target="_blank">Share your feedback</a>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
