<?php require APPROOT . '/views/inc/header.php'; ?>
  <div class="card card-body bg-light mt-5">
  <div class= "text-center">
  <h1>Darāmo lietu saraksts </h1>
  <p>Pievienot jaunu </p>
  <div>
    <form action="<?php echo URLROOT; ?>/pages/edit/<?php echo $data['id']; ?>" method="post">
      <div class="form-group">
        <label for="title">Virsraksts</label>
        <input type="text" name="title" class="form-control form-control-lg <?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['title']; ?>">
        <span class="invalid-feedback"><?php echo $data['title_err']; ?></span>
      </div>
      <div class="form-group">
        <label for="body">Apraksts</label>
        <textarea name="body" class="form-control form-control-lg"><?php echo $data['body']; ?></textarea>
      </div>
      <a href="<?php echo URLROOT; ?>" class="btn btn-secondary float-left"> Doties atpakaļ</a>
      <input type="submit" class="btn btn-success float-right" value="Saglabāt">
    </form>
    <div class="col-sm-6">
    <form class="pull-right" action="<?php echo URLROOT; ?>/pages/delete/<?php echo $data['id'] ?>" method="post">
    <input type="submit" value="Dzēst" class="btn btn-danger">
    </div>
  </form>
</div>
  </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>