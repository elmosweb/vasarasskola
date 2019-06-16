

<?php require APPROOT . '/views/inc/header.php'; ?>
  <div class="row mb-3">
    <div class="col-md-12 text-center">
    <h1>Darāmo lietu saraksts </h1>
    </div>
  </div>
  <?php foreach($data['posts'] as $post) : ?>
    <div class="card card-body mb-3">
    <div class="row">
    <div class="col-10 "><h4 class="card-title"><input type="checkbox" name="option" value="<?php echo $post->title; ?>" ><?php echo $post->title; ?></h4></div>
  <div class="col-2 text-right"><?php echo $post->postCreated; ?></div>
</div>
      <p class="card-text"><?php echo $post->body; ?></p>
  <div class="row mb-3">
  <div class="col-md-12 float-right">
  <a href="<?php echo URLROOT; ?>/pages/edit/<?php echo $post->postId; ?>" class="btn btn-info pull-right">Labot</a>
    </div>
    </div>
    </div>
  <?php endforeach; ?>
  <div class="row mb-3">
  <div class="col-md-12 float-right">
      <a href="<?php echo URLROOT; ?>/pages/add" class="btn btn-primary pull-right">
Pievienot jaunu
      </a>
    </div>
    </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>